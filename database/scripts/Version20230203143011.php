<?php

declare(strict_types = 1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

final class Version20230203143011 extends AbstractMigration {

    public function up(Schema $schema) {

        /** 46377- Evolutiva - [Diretório] Criar documentação para a criação de emails pelo diretório
         * Atendendo à solicitação no PR  de criar uma api para criação do template de email
        */

        $this->addSql(<<<'EOT'
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
EOT
        );
        $this->addSql("ALTER FUNCTION email.api_bouncestransientesparablacklist() OWNER TO group_nasajon;");

        $this->addSql(<<<'EOT'
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
EOT
        );

        $this->addSql("ALTER FUNCTION email.api_bouncespermanentesparablacklist() OWNER TO group_nasajon;");

    }

    public function down(Schema $schema) {
    }

}