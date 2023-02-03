<?php

declare(strict_types = 1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

final class Version20230203084911 extends AbstractMigration {

    public function up(Schema $schema) {        

        $this->addSql("
            CREATE TABLE email.tenants_configuracoes_smtp
            (
                id uuid NOT NULL DEFAULT uuid_generate_v4(),
                nome varchar(120) NOT NULL,    
                host varchar(120) NOT NULL,    
                usuario varchar(120) NOT NULL,
                senha varchar(220) NOT NULL,
                port smallint NOT NULL,
                tenant_id smallint NOT NULL,
                CONSTRAINT pk_email_tenants_smtp_id PRIMARY KEY (id)
            );
        ");
    }

    public function down(Schema $schema) {

        
    }

}