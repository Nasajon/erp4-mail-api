<?php

declare(strict_types = 1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\DBAL\Migrations\AbstractMigration;

final class Version20201023094945 extends AbstractMigration {

    public function up(Schema $schema) {

        /** 46377- Evolutiva - [Diretório] Criar documentação para a criação de emails pelo diretório
         * Atendendo à solicitação no PR  de criar uma api para criação do template de email
        */

        $this->addSql(<<<'EOT'
            CREATE OR REPLACE FUNCTION email.api_criar_template(
                a_codigo varchar(250), a_descricao varchar(250), a_assunto varchar(250), a_conteudo text, a_tenant integer
            )
            RETURNS void AS
            $BODY$
            BEGIN
                INSERT INTO email.templates
                ("template", descricao, conteudo, lastupdate,  tenant, assunto, codigo)
                VALUES
                (uuid_generate_v4(), a_descricao, a_conteudo, now(), a_tenant, a_assunto, a_codigo);
            END;
            $BODY$ LANGUAGE plpgsql;
EOT
        );
        $this->addSql("ALTER FUNCTION email.api_criar_template(varchar(250), varchar(250), varchar(250), text, integer)  OWNER TO group_nasajon;");


    }

    public function down(Schema $schema) {
    }

}