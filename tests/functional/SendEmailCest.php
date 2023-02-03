<?php

use Codeception\Util\HttpCode;

class SendEmailCest
{

    /**
     * @var \Bernard\Queue
     */
    private $queue;

    public function _before(FunctionalTester $I)
    {
        $I->amLoggedInAs(1);
        /**
         * @var Bernard\Queue\InMemoryQueue
         */
        $this->queue = $I->getQueue();
    }

    public function apiEnvioDeEmail(FunctionalTester $I) {

        $mail = [
            'to' => ['destino@mailinator.com'],
            'from' => 'noreply@nsmail.com.br',
            'codigo' => 'nsj_gerenciador_usuarios_convite',
            'tags' =>  array(
                'url' => getenv('usuario_url') . '/cadastro?cvt=12345',
                'usuario' => 'usuario',
                'usuario_email' => 'usuario@mailinator.com',
                'tenant' => '47'
            ),
            'tenant' => '47'
        ];

        $I->sendRaw('POST', '/v2/api/sendmail', $mail, [], [], null);

        $retorno = json_decode($I->grabResponse());

        $I->seeResponseCodeIs(HttpCode::OK);
        $I->assertTrue($retorno->sucesso);

       

    }

    public function apiEnvioDeEmailRemetenteDoTemplate(FunctionalTester $I)
    {

        $mail = [
            'to' => ['destino@mailinator.com'],
            'from' => 'noreply@nsmail.com.br',
            'codigo' => 'nsj_gerenciador_usuarios_convite',
            'tags' =>  array(
                'url' => getenv('usuario_url') . '/cadastro?cvt=12345',
                'usuario' => 'usuario',
                'usuario_email' => 'usuario@mailinator.com',
                'tenant' => '47'
            ),
            'tenant' => '47'
        ];

        $I->sendRaw('POST', '/v2/api/sendmail', $mail, [], [], null);

        $retorno = json_decode($I->grabResponse());

        $I->seeResponseCodeIs(HttpCode::OK);
        $I->assertTrue($retorno->sucesso);

        /**
         * @var Nasajon\AppBundle\NsjMail\Messages\EnvioMessage
         */
        $message = $this->queue->dequeue()->getMessage();

        $I->assertEquals('noreply@nsmail.com.br', $message->getFrom());
    }

    public function apiEnvioDeEmailNaBlacklist(FunctionalTester $I)
    {
        $I->amConnectedToDatabase("email");
        $I->haveInDatabase("email.blacklistemails", ["blacklistemail" => "860b1a2c-0cfe-4301-88be-d2130536f8b6", "bounce" => "860b1a2c-0cfe-4301-88be-d2130536f8b6" ,"email" => "blacklisted@mailinator.com" ] );

        $mail = [
            'to' => ['blacklisted@mailinator.com'],
            'from' => 'noreply@nsmail.com.br',
            'codigo' => 'nsj_gerenciador_usuarios_convite',
            'tags' =>  array(
                'url' => getenv('usuario_url') . '/cadastro?cvt=12345',
                'usuario' => 'usuario',
                'usuario_email' => 'blacklisted@mailinator.com',
                'tenant' => '47'
            ),
            'tenant' => '47'
        ];

        $I->sendRaw('POST', '/v2/api/sendmail', $mail, [], [], null);

        $retorno = json_decode($I->grabResponse());

        $I->seeResponseCodeIs(HttpCode::OK);

        $I->assertTrue($retorno->sucesso);
    }

    public function apiEnvioDeEmailComAnexos(FunctionalTester $I)
    {

        try {

            $nomearquivo = "arquivo.txt";
            $I->writeToFile($nomearquivo, "conteúdo do arquivo");
            $arquivo = file_get_contents($nomearquivo);
            $contentType ='text/plain';

            /*
            $nomearquivo = "teste.pdf";
            $arquivo = file_get_contents("/var/www/html/teste.pdf");
            $contentType ='application/pdf';
            */

            $mail = [
                'to' => ['destinocomanexos@mailinator.com'],
                'from' => 'Não Responda <noreply@nsmail.com.br>',
                'codigo' => 'nsj_gerenciador_usuarios_convite',
                'tags' =>  array(
                    'url' => getenv('usuario_url') . '/cadastro?cvt=56789',
                    'usuario' => 'usuario com anexos',
                    'usuario_email' => 'usuariocomanexos@mailinator.com',
                    'tenant' => '47'
                ),
                'tenant' => '47',
                'attachments' => [$arquivo],
                'attachments_names' => [$nomearquivo],
                'attachments_content_types'  => [$contentType]
            ];

            $I->sendRaw('POST', '/v2/api/sendmail', $mail, [], [], null);

            $I->grabResponse();
            $retorno = json_decode($I->grabResponse());

            $I->seeResponseCodeIs(HttpCode::OK);

            $I->assertTrue($retorno->sucesso);


        } finally {
            $I->deleteFile($nomearquivo);
        }
    }

    public function apiFalhaAoEnviarEmailTemplateInexistente(FunctionalTester $I){

        $mail = [
            'to' => ['destino@mailinator.com'],
            'from' => 'noreply@nsmail.com.br',
            'codigo' => 'template_inexistente',
            'tags' =>  array(
                'url' => getenv('usuario_url') . '/cadastro?cvt=12345',
                'usuario' => 'usuario',
                'usuario_email' => 'usuario@mailinator.com',
                'tenant' => '47',
            ),
            'tenant' => '47'
        ];
        $I->sendRaw('POST', '/v2/api/sendmail', $mail, [], [], null);

        $retorno = json_decode($I->grabResponse());

        $I->seeResponseCodeIs(HttpCode::BAD_REQUEST);
        $I->assertFalse($retorno->sucesso);
        $I->assertEquals("Problemas ao carregar o template informado, por favor verifique se o nome do template está correto",$retorno->erros);

    }

    public function apiFalhaAoEnviarEmailSemDestinatario(FunctionalTester $I){

        $mail = [
            'to' => [],
            'from' => 'noreply@nsmail.com.br',
            'codigo' => 'nsj_gerenciador_usuarios_convite',
            'tags' =>  array(
                'url' => getenv('usuario_url') . '/cadastro?cvt=12345',
                'usuario' => 'usuario',
                'usuario_email' => 'usuario@mailinator.com',
                'tenant' => '47'
            ),
            'tenant' => '47'
        ];
        $I->sendRaw('POST', '/v2/api/sendmail', $mail, [], [], null);

        $retorno = json_decode($I->grabResponse());

        $I->seeResponseCodeIs(HttpCode::BAD_REQUEST);
        $I->assertFalse($retorno->sucesso);
        $I->assertEquals("O campo 'to' não pode ser vazio.",$retorno->erros->to);

    }

    public function apiFalhaAoEnviarEmailSemDestinatarioOmiteCampo(FunctionalTester $I){

        $mail = [
            'from' => 'noreply@nsmail.com.br',
            'codigo' => 'nsj_gerenciador_usuarios_convite',
            'tags' =>  array(
                'url' => getenv('usuario_url') . '/cadastro?cvt=12345',
                'usuario' => 'usuario',
                'usuario_email' => 'usuario@mailinator.com',
                'tenant' => '47'
            ),
            'tenant' => '47'
        ];
        $I->sendRaw('POST', '/v2/api/sendmail', $mail, [], [], null);

        $retorno = json_decode($I->grabResponse());

        $I->seeResponseCodeIs(HttpCode::BAD_REQUEST);
        $I->assertFalse($retorno->sucesso);
        $I->assertEquals("O campo 'to' não pode ser vazio.",$retorno->erros->to);

    }

    public function apiFalhaAoEnviarEmailComAnexosInconsistentes(FunctionalTester $I){

        $mail = [
            'to' => ['destino@mailinator.com'],
            'from' => 'noreply@nsmail.com.br',
            'codigo' => 'nsj_gerenciador_usuarios_convite',
            'tags' =>  array(
                'url' => getenv('usuario_url') . '/cadastro?cvt=12345',
                'usuario' => 'usuario',
                'usuario_email' => 'usuario@mailinator.com',
                'tenant' => '47'
            ),
            'tenant' => '47',
            'attachments' => [],
            'attachments_names' => ['arquivonaoexiste.txt'],
            'attachments_content_types'  => ['text/plain']
        ];
        $I->sendRaw('POST', '/v2/api/sendmail', $mail, [], [], null);

        $retorno = json_decode($I->grabResponse());

        $I->seeResponseCodeIs(HttpCode::BAD_REQUEST);
        $I->assertFalse($retorno->sucesso);
        $I->assertEquals("Quantidade de anexos não é igual a quantidade de nomes ou do content-type dos anexos",$retorno->erros);

    }

}
