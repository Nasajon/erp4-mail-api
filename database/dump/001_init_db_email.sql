DO
$do$
BEGIN
   IF NOT EXISTS (
      SELECT FROM pg_catalog.pg_roles
      WHERE  rolname = 'group_nasajon') THEN
      CREATE ROLE group_nasajon NOSUPERUSER INHERIT NOCREATEDB NOCREATEROLE NOREPLICATION;
   END IF;
END
$do$;

-- CREATE DATABASE email WITH TEMPLATE = template0 ENCODING = 'UTF8' LC_COLLATE = 'en_US.utf8' LC_CTYPE = 'en_US.utf8';

ALTER DATABASE email OWNER TO group_nasajon;

-- \connect email;

SET statement_timeout = 0;
SET lock_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SELECT pg_catalog.set_config('search_path', 'public', false);
SET check_function_bodies = false;
SET client_min_messages = warning;


CREATE SCHEMA IF NOT EXISTS email;

ALTER SCHEMA email OWNER TO group_nasajon;

CREATE EXTENSION IF NOT EXISTS plpgsql WITH SCHEMA pg_catalog;

COMMENT ON EXTENSION plpgsql IS 'PL/pgSQL procedural language';

CREATE EXTENSION IF NOT EXISTS pgcrypto WITH SCHEMA public;

COMMENT ON EXTENSION pgcrypto IS 'cryptographic functions';

CREATE EXTENSION IF NOT EXISTS "uuid-ossp" WITH SCHEMA public;

COMMENT ON EXTENSION "uuid-ossp" IS 'generate universally unique identifiers (UUIDs)';

CREATE OR REPLACE FUNCTION public.uuid_generate_v4(
	)
    RETURNS uuid
    LANGUAGE 'c'
    COST 1
    VOLATILE STRICT PARALLEL UNSAFE
AS '$libdir/uuid-ossp', 'uuid_generate_v4'
;

ALTER FUNCTION public.uuid_generate_v4() OWNER TO group_nasajon;

CREATE TABLE IF NOT EXISTS email.remetentes
(
    remetente uuid NOT NULL DEFAULT uuid_generate_v4(),
    tenant bigint,
    email character varying(255) NOT NULL,
    nome character varying(120),
    envio_ativo boolean NOT NULL DEFAULT false,
    recepcao_ativa boolean NOT NULL DEFAULT true,
    padrao boolean NOT NULL DEFAULT false,
    interno boolean NOT NULL DEFAULT false,
    sistema_id bigint,
    lastupdate timestamp without time zone DEFAULT now(),
    CONSTRAINT "PK_email.remetentes_remetente" PRIMARY KEY (remetente),
    CONSTRAINT "UK_email.remetentes_tenant_email" UNIQUE (tenant, email)
);

ALTER TABLE IF EXISTS email.remetentes OWNER to group_nasajon;

GRANT ALL ON TABLE email.remetentes TO group_nasajon;

CREATE TABLE IF NOT EXISTS email.templates
(
    template uuid NOT NULL,
    categoria uuid,
    descricao character varying(250),
    conteudo text,
    lastupdate timestamp without time zone DEFAULT now(),
    versao bigint DEFAULT 1,
    tenant bigint,
    assunto character varying(250),
    codigo character varying(250),
    empresa bigint,
    remetente uuid,
    CONSTRAINT "PK_email.templates" PRIMARY KEY (template),
    CONSTRAINT "FK_email.templates_remetente" FOREIGN KEY (remetente)
        REFERENCES email.remetentes (remetente) MATCH SIMPLE
        ON UPDATE NO ACTION
        ON DELETE NO ACTION
);

ALTER TABLE IF EXISTS email.templates OWNER to group_nasajon;

CREATE TABLE IF NOT EXISTS email.blacklistemails
(
    blacklistemail uuid NOT NULL,
    bounce uuid NOT NULL,
    email character varying(250) NOT NULL,
    created_at timestamp without time zone,
    expiracao timestamp without time zone,
    CONSTRAINT "PK_email_blacklistemails.blacklistemail" PRIMARY KEY (blacklistemail),
    CONSTRAINT "UK_email.blacklistemails_email" UNIQUE (email)
);

ALTER TABLE IF EXISTS email.blacklistemails  OWNER to group_nasajon;

CREATE TABLE IF NOT EXISTS email.bounces
(
    bounce uuid NOT NULL,
    feedbackid character(60) NOT NULL,
    tipobounce character varying(20) NOT NULL,
    subtipobounce character varying(100),
    messageid character(60),
    datahora timestamp without time zone,
    emailremetente character varying(250) NOT NULL,
    tenant bigint,
    emaildestinatario character varying(250) NOT NULL,
    useragent character varying(250),
    arrivaldate timestamp without time zone,
    remotemtaip character varying(50),
    reportingmta character varying(250),
    diagnostico character varying(500),
    CONSTRAINT "PK_email_bounces.bounce" PRIMARY KEY (bounce),
    CONSTRAINT tenant_maior_zero_email_bounces CHECK (tenant > 0)
);

ALTER TABLE IF EXISTS email.bounces OWNER to group_nasajon;

CREATE INDEX IF NOT EXISTS ix_email_bounces_messageid
    ON email.bounces USING btree
    (messageid ASC NULLS LAST);

CREATE INDEX IF NOT EXISTS ix_email_bounces_tipobounce
    ON email.bounces USING btree
    (tipobounce ASC NULLS LAST);

CREATE TABLE IF NOT EXISTS email.tenants_configuracoes_smtp
(
    id uuid NOT NULL DEFAULT public.uuid_generate_v4(),
    nome character varying(120) COLLATE pg_catalog."default" NOT NULL,
    host character varying(120) COLLATE pg_catalog."default" NOT NULL,
    usuario character varying(120) COLLATE pg_catalog."default" NOT NULL,
    senha character varying(220) COLLATE pg_catalog."default" NOT NULL,
    port smallint NOT NULL,
    tenant_id smallint NOT NULL,
    CONSTRAINT pk_email_tenants_smtp_id PRIMARY KEY (id),
    CONSTRAINT uk_tenant_email UNIQUE (usuario, tenant_id)
);

ALTER TABLE IF EXISTS email.tenants_configuracoes_smtp OWNER to group_nasajon;

--FUNÇÕES.

CREATE OR REPLACE FUNCTION email.api_bouncespermanentesparablacklist()
    RETURNS void
    LANGUAGE 'plpgsql'
    COST 100
    VOLATILE SECURITY DEFINER PARALLEL UNSAFE
    AS $BODY$
        BEGIN
            INSERT INTO email.blacklistemails
            (blacklistemail, bounce, email, created_at, expiracao)
            SELECT DISTINCT ON (b.emaildestinatario) uuid_generate_v4(), b.bounce, b.emaildestinatario, now(), NULL
            FROM email.bounces b
            LEFT JOIN email.blacklistemails be ON b.emaildestinatario = be.email
            WHERE  tipobounce = 'Permanent'
            AND be.blacklistemail IS NULL;
        END;        
    $BODY$;

    ALTER FUNCTION email.api_bouncespermanentesparablacklist()
    OWNER TO group_nasajon;

CREATE OR REPLACE FUNCTION email.api_bouncestransientesparablacklist()
    RETURNS void
    LANGUAGE 'plpgsql'
    COST 100
    VOLATILE SECURITY DEFINER PARALLEL UNSAFE
    AS $BODY$
        BEGIN
            INSERT INTO email.blacklistemails
            (blacklistemail, bounce, email, created_at, expiracao)
            SELECT DISTINCT ON (b.emaildestinatario) uuid_generate_v4(), b.bounce, b.emaildestinatario, now(), (now() + '90 days'::interval)
            FROM email.bounces b
            LEFT JOIN email.blacklistemails be ON b.emaildestinatario = be.email
            WHERE  tipobounce = 'Transient'
            AND be.blacklistemail IS NULL;
        END;            
    $BODY$;

    ALTER FUNCTION email.api_bouncestransientesparablacklist()
    OWNER TO group_nasajon;

CREATE OR REPLACE FUNCTION email.api_criar_template(
	a_codigo character varying,
	a_descricao character varying,
	a_assunto character varying,
	a_conteudo text,
	a_tenant integer)
    RETURNS void
    LANGUAGE 'plpgsql'
    COST 100
    VOLATILE PARALLEL UNSAFE
    AS $BODY$
        BEGIN
            INSERT INTO email.templates
            ("template", descricao, conteudo, lastupdate,  tenant, assunto, codigo)
            VALUES
            (uuid_generate_v4(), a_descricao, a_conteudo, now(), a_tenant, a_assunto, a_codigo);
        END;                
    $BODY$;

    ALTER FUNCTION email.api_criar_template(character varying, character varying, character varying, text, integer)
    OWNER TO group_nasajon;