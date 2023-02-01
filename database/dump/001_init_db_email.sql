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


CREATE TABLE IF NOT EXISTS email.emailsempresas
(
    tenant bigint,
    empresa bigint,
    email character varying(255),
    nome character varying(120),
    lastupdate timestamp without time zone DEFAULT now(),
    emailempresa uuid NOT NULL DEFAULT uuid_generate_v4(),
    ativo boolean,
    CONSTRAINT "PK_email.emailempresa" PRIMARY KEY (emailempresa),
    CONSTRAINT tenantempresaemail UNIQUE (tenant, empresa, email),
    CONSTRAINT tenant_maior_zero_email_emailsempresas CHECK (tenant > 0)
);

ALTER TABLE IF EXISTS email.emailsempresas  OWNER to group_nasajon;

GRANT ALL ON TABLE email.emailsempresas TO group_nasajon;


CREATE TABLE IF NOT EXISTS email.campanhas
(
    campanha uuid NOT NULL,
    empresa bigint,
    tenant bigint NOT NULL,
    nome character varying(250),
    assunto character varying(250),
    descricao text,
    nomeremetente character varying(250),
    emailremetente character varying(250),
    estadocampanha smallint DEFAULT 1,
    datacriacao timestamp without time zone DEFAULT now(),
    lastupdate timestamp without time zone DEFAULT now(),
    versao bigint DEFAULT 1,
    conteudo text,
    dataenvio timestamp without time zone,
    enviadopor character varying(150),
    agendamento timestamp without time zone DEFAULT now(),
    qtdmailmontado bigint,
    emailempresa uuid,
    dataexclusao timestamp without time zone,
    ultimoemailmontado character varying(255),
    CONSTRAINT "PK_email.campanhas" PRIMARY KEY (campanha),
    CONSTRAINT "FK_email.emailempresa_campanha" FOREIGN KEY (emailempresa)
        REFERENCES email.emailsempresas (emailempresa) MATCH SIMPLE
        ON UPDATE NO ACTION
        ON DELETE NO ACTION,
    CONSTRAINT "CK_campanhas_estadocampanha" CHECK (estadocampanha = 1 OR estadocampanha = 2 OR estadocampanha = 3 OR estadocampanha = 4)
);

ALTER TABLE IF EXISTS email.campanhas  OWNER to group_nasajon;

GRANT ALL ON TABLE email.campanhas TO group_nasajon;

COMMENT ON COLUMN email.campanhas.estadocampanha
    IS '1 - Campanha em criação
2 - Campanha pronta para ser montada
3 - Campanha pronta para ser enviada
4 - Campanha enviada';

CREATE INDEX IF NOT EXISTS idx_email_campanhas_estadocampanha
    ON email.campanhas USING btree
    (estadocampanha ASC NULLS LAST)

    WHERE estadocampanha >= 2;

CREATE INDEX IF NOT EXISTS idx_email_campanhas_tenant
    ON email.campanhas USING btree
    (tenant ASC NULLS LAST);

CREATE INDEX IF NOT EXISTS ix_email_email_campanhas_datacriacao_campanha
    ON email.campanhas USING btree
    (datacriacao ASC NULLS LAST, campanha ASC NULLS LAST);

CREATE TABLE IF NOT EXISTS email.listas
(
    lista uuid NOT NULL,
    nome character varying(100),
    empresa bigint,
    tenant bigint,
    descricao text,
    lastupdate timestamp without time zone,
    dataexclusao timestamp without time zone,
    CONSTRAINT "pk_email.listas" PRIMARY KEY (lista)
);

ALTER TABLE IF EXISTS email.listas OWNER to group_nasajon;

GRANT ALL ON TABLE email.listas TO group_nasajon;

CREATE TABLE IF NOT EXISTS email.listascampanhas
(
    lista uuid,
    campanha uuid,
    lastupdate timestamp without time zone DEFAULT now(),
    CONSTRAINT "email.listacampanha" UNIQUE (lista, campanha)
);

ALTER TABLE IF EXISTS email.listascampanhas OWNER to group_nasajon;

GRANT ALL ON TABLE email.listascampanhas TO group_nasajon;

CREATE INDEX IF NOT EXISTS "IX_email.listascampanhas_campanha"
    ON email.listascampanhas USING btree
    (campanha ASC NULLS LAST);

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

CREATE TABLE IF NOT EXISTS email.formularios
(
    formulario uuid NOT NULL,
    lista uuid,
    nome character varying(100),
    lastupdate timestamp without time zone,
    templaterespostaautomatica uuid,
    enviarrespostaautomatica boolean,
    encaminharcontatopara text,
    emailfrom character varying(255),
    templateencaminhamento uuid,
    dataexclusao date,
    encaminharcontato boolean,
    CONSTRAINT "pk_email.formularios" PRIMARY KEY (formulario),
    CONSTRAINT "fk_email.formularioslistas" FOREIGN KEY (lista)
        REFERENCES email.listas (lista) MATCH SIMPLE
        ON UPDATE NO ACTION
        ON DELETE NO ACTION,
    CONSTRAINT "email.template" FOREIGN KEY (templaterespostaautomatica)
        REFERENCES email.templates (template) MATCH SIMPLE
        ON UPDATE NO ACTION
        ON DELETE NO ACTION,
    CONSTRAINT "email.templateencaminhamento" FOREIGN KEY (templateencaminhamento)
        REFERENCES email.templates (template) MATCH SIMPLE
        ON UPDATE NO ACTION
        ON DELETE NO ACTION
);

ALTER TABLE IF EXISTS email.formularios  OWNER to group_nasajon;

GRANT ALL ON TABLE email.formularios TO group_nasajon;

CREATE TABLE IF NOT EXISTS email.contatos
(
    contato uuid NOT NULL DEFAULT uuid_generate_v4(),
    campanha uuid,
    nome character varying(250),
    email character varying(250),
    datacadastro timestamp without time zone DEFAULT now(),
    lista uuid,
    informacaoadicional json,
    formulario uuid,
    lastupdate timestamp without time zone DEFAULT now(),
    origem character varying(100),
    dataexclusao timestamp without time zone,
    CONSTRAINT "PK_email.contatos" PRIMARY KEY (contato),
    CONSTRAINT "FK_email.contatos_campanha" FOREIGN KEY (campanha)
        REFERENCES email.campanhas (campanha) MATCH SIMPLE
        ON UPDATE NO ACTION
        ON DELETE NO ACTION,
    CONSTRAINT "email.formularios" FOREIGN KEY (formulario)
        REFERENCES email.formularios (formulario) MATCH SIMPLE
        ON UPDATE NO ACTION
        ON DELETE NO ACTION
);

ALTER TABLE IF EXISTS email.contatos OWNER to group_nasajon;

CREATE INDEX IF NOT EXISTS "IX_email.contatos_email"
    ON email.contatos USING btree
    (email ASC NULLS LAST);

COMMENT ON INDEX email."IX_email.contatos_email"
    IS 'Criado pra substituir a utilização de OFFSET na paginação.';

CREATE UNIQUE INDEX IF NOT EXISTS "UK_email.contatos_campanha_email"
    ON email.contatos USING btree
    (campanha ASC NULLS LAST, email ASC NULLS LAST);

CREATE UNIQUE INDEX IF NOT EXISTS "UK_email.contatos_lista_email"
    ON email.contatos USING btree
    (lista ASC NULLS LAST, email ASC NULLS LAST);


CREATE TABLE IF NOT EXISTS email.aberturas
(
    abertura uuid NOT NULL,
    campanha uuid,
    contato uuid,
    datahorario timestamp without time zone,
    lastupdate timestamp without time zone DEFAULT now(),
    CONSTRAINT "PK_email.aberturas" PRIMARY KEY (abertura),
    CONSTRAINT "FK_email.aberturas_campanha" FOREIGN KEY (campanha)
        REFERENCES email.campanhas (campanha) MATCH SIMPLE
        ON UPDATE NO ACTION
        ON DELETE NO ACTION,
    CONSTRAINT "FK_email.aberturas_contato" FOREIGN KEY (contato)
        REFERENCES email.contatos (contato) MATCH SIMPLE
        ON UPDATE NO ACTION
        ON DELETE NO ACTION
);

ALTER TABLE IF EXISTS email.aberturas OWNER to group_nasajon;

GRANT ALL ON TABLE email.aberturas TO group_nasajon;

CREATE INDEX IF NOT EXISTS idx_email_aberturas_campanha
    ON email.aberturas USING btree
    (campanha ASC NULLS LAST);

CREATE INDEX IF NOT EXISTS ix_email_aberturas_datahorario_abertura
    ON email.aberturas USING btree
    (datahorario ASC NULLS LAST, abertura ASC NULLS LAST);

CREATE TABLE IF NOT EXISTS email.arquivosimportacao
(
    arquivoimportacao uuid NOT NULL DEFAULT uuid_generate_v4(),
    entidade character varying(100) NOT NULL,
    entidadepk uuid,
    tenant integer NOT NULL,
    status smallint DEFAULT 1,
    arquivo character varying(255),
    header json,
    resposta json,
    linhasimportadas integer DEFAULT 0,
    datacriacao timestamp without time zone DEFAULT now(),
    dataatualizacao timestamp without time zone DEFAULT now(),
    lastupdate timestamp without time zone DEFAULT now(),
    usuariocriacao character varying(64),
    CONSTRAINT "PK_email.arquivosimportacao" PRIMARY KEY (arquivoimportacao)
);

ALTER TABLE IF EXISTS email.arquivosimportacao OWNER to group_nasajon;


CREATE INDEX IF NOT EXISTS idx_email_arquivosimportacao_usuariocriacao_tenant
    ON email.arquivosimportacao USING btree
    (usuariocriacao ASC NULLS LAST, tenant ASC NULLS LAST);

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


CREATE TABLE IF NOT EXISTS email.bouncescampanhas
(
    bouncecampanha uuid NOT NULL,
    campanha uuid,
    tipobounce character varying(20),
    quantidade integer,
    CONSTRAINT "PK_email_bouncescampanhas.bouncecampanha" PRIMARY KEY (bouncecampanha)
);

ALTER TABLE IF EXISTS email.bouncescampanhas OWNER to group_nasajon;

GRANT ALL ON TABLE email.bouncescampanhas TO group_nasajon;

CREATE INDEX IF NOT EXISTS ix_email_bouncescampanhas_campanha
    ON email.bouncescampanhas USING btree
    (campanha ASC NULLS LAST);

CREATE INDEX IF NOT EXISTS ix_email_bouncescampanhas_quantidade
    ON email.bouncescampanhas USING btree
    (quantidade ASC NULLS LAST);

CREATE INDEX IF NOT EXISTS ix_email_bouncescampanhas_tipobounce
    ON email.bouncescampanhas USING btree
    (tipobounce ASC NULLS LAST);

CREATE TABLE IF NOT EXISTS email.cancelamentos
(
    cancelamento uuid NOT NULL,
    emailremetente character varying(250),
    emaildestinatario character varying(250),
    campanha uuid,
    tenant bigint NOT NULL,
    empresa bigint,
    datahorario timestamp without time zone DEFAULT now(),
    motivoscancelamento uuid,
    motivotexto text,
    cancelamentoanulado boolean DEFAULT false,
    usuarioresponsavelanulamento character varying(250),
    datahorarioanulamento timestamp(6) without time zone,
    lastupdate timestamp without time zone DEFAULT now(),
    emailempresa uuid,
    CONSTRAINT "PK_email.cancelamentos" PRIMARY KEY (cancelamento),
    CONSTRAINT "UK_email.emailempresa_email" UNIQUE (emaildestinatario, emailempresa),
    CONSTRAINT "FK_email.emailempresa_cancelamento" FOREIGN KEY (emailempresa)
        REFERENCES email.emailsempresas (emailempresa) MATCH SIMPLE
        ON UPDATE NO ACTION
        ON DELETE NO ACTION
);

ALTER TABLE IF EXISTS email.cancelamentos OWNER to group_nasajon;

GRANT ALL ON TABLE email.cancelamentos TO group_nasajon;

CREATE INDEX IF NOT EXISTS idx_email_cancelamentos_campanha
    ON email.cancelamentos USING btree
    (campanha ASC NULLS LAST);

CREATE INDEX IF NOT EXISTS idx_email_cancelamentos_emailempresa
    ON email.cancelamentos USING btree
    (emailempresa ASC NULLS LAST);

CREATE UNIQUE INDEX IF NOT EXISTS idx_email_cancelamentos_unicos
    ON email.cancelamentos USING btree
    (emaildestinatario ASC NULLS LAST, emailempresa ASC NULLS LAST);

CREATE TABLE IF NOT EXISTS email.cliques
(
    clique uuid NOT NULL,
    link uuid NOT NULL,
    contato uuid NOT NULL,
    datahorario timestamp without time zone DEFAULT now(),
    lastupdate timestamp without time zone DEFAULT now(),
    CONSTRAINT "PK_email.cliques" PRIMARY KEY (clique)
);

ALTER TABLE IF EXISTS email.cliques  OWNER to group_nasajon;

GRANT ALL ON TABLE email.cliques TO group_nasajon;

CREATE INDEX IF NOT EXISTS ix_email_cliques_datahorario_clique
    ON email.cliques USING btree
    (datahorario ASC NULLS LAST, clique ASC NULLS LAST);

CREATE TABLE IF NOT EXISTS email.envios
(
    campanha uuid,
    contato uuid,
    dataenvio timestamp without time zone,
    messageid character varying(60) NOT NULL,
    tenant bigint,
    CONSTRAINT "PK_email.envios" PRIMARY KEY (messageid),
    CONSTRAINT "FK_email.envios_campanha" FOREIGN KEY (campanha)
        REFERENCES email.campanhas (campanha) MATCH SIMPLE
        ON UPDATE NO ACTION
        ON DELETE NO ACTION
);

ALTER TABLE IF EXISTS email.envios  OWNER to group_nasajon;

GRANT ALL ON TABLE email.envios TO group_nasajon;

CREATE INDEX IF NOT EXISTS "IX_email.envios_dataenvio"
    ON email.envios USING btree
    (dataenvio ASC NULLS LAST);

CREATE INDEX IF NOT EXISTS idx_email_envios_campanha
    ON email.envios USING btree
    (campanha ASC NULLS LAST);


CREATE INDEX IF NOT EXISTS ix_email_envios_campanha
    ON email.envios USING btree
    (campanha ASC NULLS LAST);

CREATE TABLE IF NOT EXISTS email.exportacoes
(
    exportacao uuid NOT NULL DEFAULT uuid_generate_v4(),
    descricao character varying(255) NOT NULL,
    entidade character varying(100) NOT NULL,
    nomefuncao character varying(100) NOT NULL,
    parametrosfuncao json,
    tenant bigint NOT NULL,
    estado integer DEFAULT 0,
    usuariocriacao character varying(250) NOT NULL,
    datacriacao timestamp without time zone DEFAULT now(),
    dataexportacao timestamp without time zone,
    caminhoarquivo character varying(255),
    usuarioexclusao character varying(255),
    dataexclusao timestamp without time zone,
    resposta json,
    CONSTRAINT "PK_email.exportacoes" PRIMARY KEY (exportacao)
);

ALTER TABLE IF EXISTS email.exportacoes OWNER to group_nasajon;

GRANT ALL ON TABLE email.exportacoes TO group_nasajon;

COMMENT ON COLUMN email.exportacoes.estado
    IS '0 = Aguardando
 1 = Exportando
 2 = Exportado
 3 = Erro';

CREATE INDEX IF NOT EXISTS ix_email_exportacoes_tenant_usuariocriacao
    ON email.exportacoes USING btree
    (tenant ASC NULLS LAST, usuariocriacao ASC NULLS LAST);


CREATE TABLE IF NOT EXISTS email.links
(
    link uuid NOT NULL,
    campanha uuid NOT NULL,
    url text,
    lastupdate timestamp without time zone DEFAULT now(),
    CONSTRAINT "PK_email.links" PRIMARY KEY (link),
    CONSTRAINT "FK_email.links_campanha" FOREIGN KEY (campanha)
        REFERENCES email.campanhas (campanha) MATCH SIMPLE
        ON UPDATE NO ACTION
        ON DELETE NO ACTION
        DEFERRABLE INITIALLY DEFERRED
);

ALTER TABLE IF EXISTS email.links  OWNER to group_nasajon;

GRANT ALL ON TABLE email.links TO group_nasajon;

CREATE TABLE IF NOT EXISTS email.motivoscancelamentos
(
    motivoscancelamento uuid NOT NULL,
    label character varying(250),
    exigirtexto boolean DEFAULT false,
    ordem integer DEFAULT 0,
    tenant bigint NOT NULL,
    empresa bigint,
    lastupdate timestamp without time zone DEFAULT now(),
    dataexclusao timestamp without time zone,
    CONSTRAINT "PK_email.motivoscancelamentos" PRIMARY KEY (motivoscancelamento)
);

ALTER TABLE IF EXISTS email.motivoscancelamentos OWNER to group_nasajon;

GRANT ALL ON TABLE email.motivoscancelamentos TO group_nasajon;
