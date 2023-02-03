
<?php

use Codeception\Util\HttpCode;

class ApiConfiguracoesSmtpTest {

    public function _before(FunctionalTester $I) {        
        $I->register($I);
    }

    public function apiInsertConfiguracaoSmtpTest(FunctionalTester $I) {

        $I->amSamlLoggedInAs('colaborador@nasajon.com.br');

        $data = [
            "nome" => "Usuário Qualquer",
	        "host" => "smtp.gmail.com",
	        "smtp_auth" => true,
	        "usuario" => "usuarioqualquer@gmail.com",
	        "senha" => "abcdefghiklas",
	        "port" => 465,
	        "tenant_id" => 47
        ];

        $I->sendRaw('POST', '/v2/api/configuracao-smtp', $data, [], [], null);
        $I->seeResponseCodeIs(HttpCode::CREATED);
    }
}