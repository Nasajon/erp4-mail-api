<?php

use Codeception\Stub;
use Bernard\Queue\PersistentQueue;
use Bernard\Driver;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Bernard\QueueFactory\InMemoryFactory;
use Bernard\Producer;

class EmailsServiceTest extends \Codeception\Test\Unit
{
    /**
     * @var \UnitTester
     */
    protected $tester;

     /**
     * @var \Nasajon\AppBundle\NsjMail\Service\EmailsService
     */
    protected $service;

    protected function _before()
    {
        $this->service = $this->tester->getContainer()->get("Nasajon\AppBundle\NsjMail\Service\EmailsService");

        $serializer = $this->tester->getContainer()->get('bernard.serializer');
        $producer = Stub::make(Producer::class,[
            "queues" => Stub::make(InMemoryFactory::class,[
                'create' =>
                    new PersistentQueue('envio',Stub::makeEmpty(Driver::class),$serializer)]
            ),
            "dispatcher" => Stub::makeEmpty(EventDispatcherInterface::class)
        ]);

        $this->tester->getContainer()->set('bernard.producer', $producer);
    }

    protected function _after()
    {
    }

    public function testEnfileirarEmail()
    {

        $tenant = null;
        $from = 4;
        $to = "noreply@nsemail.com";
        $codigo = ["destino@mailinator.com"];
        $body = [
            "template" => "b15fdf57-0545-4ea4-9790-73144c4e9eeb",
            "codigo" => "nsj_gerenciador_usuarios_convite",
            "conteudo" => "",
            "assunto" => "Convite Tenant"
        ];
        $subject = [
            "url" => "https://conta.nasajonsistemas.com.br/cadastro?cvt=1234",
            "usuario" => "usuario de teste",
            "usuario_email" => "usuario@mailinator.com",
            "tenant" => "Tenant"
        ];
        $replyto = [];
        $cc = [];
        $bcc = [];
        $tags = null;
        $empresa = null;
        $sistema = null;

        $this->service->queueMail($tenant, $from, $to, $codigo, $body, $subject, $replyto = null, $cc = null, $bcc = null, $tags = null, $empresa = null, $sistema = null);

    }

    public function testEmailNãoConstaBlacklist(){

        $data = $this->service->isBlacklisted("destino@mailinator.com");
        $this->assertFalse($data);
    }

    public function testEmailConstaBlacklist(){

        $this->tester->amConnectedToDatabase("email");
        $this->tester->haveInDatabase("email.blacklistemails", ["blacklistemail" => "860b1a2c-0cfe-4301-88be-d2130536f8b6", "bounce" => "860b1a2c-0cfe-4301-88be-d2130536f8b6", "email" => "blacklisted@mailinator.com" ] );

        $data = $this->service->isBlacklisted("blacklisted@mailinator.com");
        $this->assertTrue($data);
    }

    public function testFilterBlacklistedEmails(){

        $this->tester->amConnectedToDatabase("email");
        $this->tester->haveInDatabase("email.blacklistemails", ["blacklistemail" => "860b1a2c-0cfe-4301-88be-d2130536f8b6", "bounce" => "860b1a2c-0cfe-4301-88be-d2130536f8b6", "email" => "blacklisted@mailinator.com" ] );

        //testa somente email existente na blacklist
        $data = $this->service->filterBlacklistedEmails(["blacklisted@mailinator.com"]);
        $this->assertCount(0,$data);

        //testa somente email que não está na blacklist
        $data = $this->service->filterBlacklistedEmails(["destino@mailinator.com"]);
        $this->assertCount(1,$data);

        //testa com email que estão e não estão na blacklist
        $data = $this->service->filterBlacklistedEmails(["blacklisted@mailinator.com","destino@mailinator.com"]);
        $this->assertCount(1,$data);
        $this->assertTrue(in_array("destino@mailinator.com",$data));

    }

}