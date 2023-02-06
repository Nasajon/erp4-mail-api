
<?php

use Codeception\Util\HttpCode;

class ApiConfiguracoesSmtpCest {

    public function _before(FunctionalTester $I) {        
        $I->register($I);
    }

    public function apiInsertConfiguracaoSmtpTest(FunctionalTester $I) {

        $I->amLoggedInAs(1);

        $data = [
            "nome" => "Usuário Qualquer",
	        "host" => "smtp.gmail.com",	        
	        "usuario" => "usuarioqualquer@gmail.com",
	        "senha" => "abcdefghiklas",
	        "port" => 465,
	        "tenant_id" => 47
        ];

        $I->sendRaw('POST', '/v2/api/configuracao-smtp', $data, [], [], null);
        $I->seeResponseCodeIs(HttpCode::CREATED);
    }

    public function apiInsertConfiguracaoDuplicadoSmtpTest(FunctionalTester $I) {

        $I->amLoggedInAs(1);

        $data = [
            "nome" => "Usuário Qualquer",
	        "host" => "smtp.gmail.com",	        
	        "usuario" => "usuarioqualquer@gmail.com",
	        "senha" => "abcdefghiklas",
	        "port" => 465,
	        "tenant_id" => 47
        ];

        $data = $I->sendRaw('POST', '/v2/api/configuracao-smtp', $data, [], [], null);

        $I->assertEquals("Este email já está cadastrado para outro tenant.", $data["message"]);
        $I->seeResponseCodeIs(HttpCode::INTERNAL_SERVER_ERROR);
    }

    public function apiFalhaAoInserirSemNome(FunctionalTester $I) {

        $I->amLoggedInAs(1);

        $data = [
	        "host" => "smtp.gmail.com",	        
	        "usuario" => "usuarioqualquer@gmail.com",
	        "senha" => "abcdefghiklas",
	        "port" => 465,
	        "tenant_id" => 47
        ];

        $data = $I->sendRaw('POST', '/v2/api/configuracao-smtp', $data, [], [], null);

        $I->assertEquals("O campo nome não pode ser vazio.", $data["erros"]["nome"]);
        $I->seeResponseCodeIs(HttpCode::BAD_REQUEST);
    }

    public function apiFalhaAoInserirSemHost(FunctionalTester $I) {

        $I->amLoggedInAs(1);

        $data = [
	        "nome" => "Usuário qualquer",	        
	        "usuario" => "usuarioqualquer@gmail.com",
	        "senha" => "abcdefghiklas",
	        "port" => 465,
	        "tenant_id" => 47
        ];

        $data = $I->sendRaw('POST', '/v2/api/configuracao-smtp', $data, [], [], null);

        $I->assertEquals("O campo host não pode ser vazio.", $data["erros"]["host"]);
        $I->seeResponseCodeIs(HttpCode::BAD_REQUEST);
    }

    public function apiFalhaAoInserirSemUsuario(FunctionalTester $I) {

        $I->amLoggedInAs(1);

        $data = [
            "nome" => "Usuário Qualquer",
	        "host" => "smtp.gmail.com",
	        "senha" => "abcdefghiklas",
	        "port" => 465,
	        "tenant_id" => 47
        ];

        $data = $I->sendRaw('POST', '/v2/api/configuracao-smtp', $data, [], [], null);

        $I->assertEquals("O campo usuario não pode ser vazio.", $data["erros"]["usuario"]);
        $I->seeResponseCodeIs(HttpCode::BAD_REQUEST);
    }

    public function apiFalhaAoInserirSemSenha(FunctionalTester $I) {

        $I->amLoggedInAs(1);

        $data = [
            "nome" => "Usuário Qualquer",
            "host" => "smtp.gmail.com",	        
            "usuario" => "usuarioqualquer@gmail.com",            
            "port" => 465,
            "tenant_id" => 47
        ];

        $data = $I->sendRaw('POST', '/v2/api/configuracao-smtp', $data, [], [], null);

        $I->assertEquals("O campo senha não pode ser vazio.", $data["erros"]["senha"]);
        $I->seeResponseCodeIs(HttpCode::BAD_REQUEST);
    }

    public function apiFalhaAoInserirSemPort(FunctionalTester $I) {

        $I->amLoggedInAs(1);

        $data = [
            "nome" => "Usuário Qualquer",
            "host" => "smtp.gmail.com",	        
            "usuario" => "usuarioqualquer@gmail.com",
            "senha" => "abcdefghiklas",            
            "tenant_id" => 47
        ];

        $data = $I->sendRaw('POST', '/v2/api/configuracao-smtp', $data, [], [], null);

        $I->assertEquals("O campo port não pode ser vazio.", $data["erros"]["port"]);
        $I->seeResponseCodeIs(HttpCode::BAD_REQUEST);
    }

    public function apiFalhaAoInserirSemTenant(FunctionalTester $I) {

        $I->amLoggedInAs(1);

        $data = [
            "nome" => "Usuário Qualquer",
            "host" => "smtp.gmail.com",	        
            "usuario" => "usuarioqualquer@gmail.com",
            "senha" => "abcdefghiklas",
            "port" => 465
        ];

        $data = $I->sendRaw('POST', '/v2/api/configuracao-smtp', $data, [], [], null);

        $I->assertEquals("O campo tenant_id não pode ser vazio.", $data["erros"]["tenant_id"]);
        $I->seeResponseCodeIs(HttpCode::BAD_REQUEST);
    }

    public function apiInsertConfiguracaoSmtpPortaInvalidaTest(FunctionalTester $I) {

        $I->amLoggedInAs(1);

        $data = [
            "nome" => "Usuário Qualquer",
	        "host" => "smtp.gmail.com",	        
	        "usuario" => "usuarioqualquer@gmail.com",
	        "senha" => "abcdefghiklas",
	        "port" => 400,
	        "tenant_id" => 47
        ];

        $data = $I->sendRaw('POST', '/v2/api/configuracao-smtp', $data, [], [], null);
        $I->assertEquals('A porta deve ser uma das seguintes: 587, 465 ou 25.', $data['erros']['port']);
        $I->seeResponseCodeIs(HttpCode::BAD_REQUEST);
    }
}