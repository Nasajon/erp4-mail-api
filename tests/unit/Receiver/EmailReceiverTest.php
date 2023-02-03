<?php


use Codeception\Stub;
use Nasajon\AppBundle\NsjMail\Messages\EnvioMessage;
use Nasajon\AppBundle\NsjMail\Receiver\EmailReceiver;
use Nasajon\AppBundle\NsjMail\Service\SendEmailService;

class EmailReceiverTest extends \Codeception\Test\Unit
{
    /**
     * @var \UnitTester
     */
    protected $tester;

    protected $logger;

    protected $doctrine;

    protected $producer;

    /** @var string  */
    private $lastLogMessage = "";

    protected function _before()
    {
        $container = $this->tester->getContainer();

        $this->logger = Stub::make(Monolog\Logger::class,[
            "error" => function($message) {
                $this->lastLogMessage = $message;
            },
        ],$this);

        $this->doctrine = $container->get("doctrine");

        $this->producer = $this->tester->getProducer();

    }

    protected function _after()
    {
    }


    public function testEnvio() {
        
        //mocka o objeto de retorno do envio de email para poder testar a gravacao do envio no banco
        $result = stub::makeEmpty(Aws\Result::class,[
            "get" => function(){ return "0000013786031775-163e3910-53eb-4c8e-a04a-f29debf88a84-000000"; }
        ]);

        $service = Stub::makeEmptyExcept(SendEmailService::class,"validateEmails",[
            'sendEmail' => \Codeception\Stub\Expected::atLeastOnce($result)
        ],$this);
        $receiver = new EmailReceiver($this->logger, $service, $this->doctrine, $this->producer);

        /** @var EnvioMessage */
        $message =  new EnvioMessage();

        $message->setFrom("email@nasajon.com.br");
        $message->setTo(["teste@mailinator.com"]);

        $data = $receiver->envio($message);
    }

    public function testEnvioEmailOuRemetenteNaoPreenchidos() {

        //Mock emails service
        $sendEmailService = Stub::makeEmptyExcept(SendEmailService::class,"validateEmails",[
            'sendEmail' => \Codeception\Stub\Expected::never()
        ],$this);

        $receiver = new EmailReceiver($this->logger, $sendEmailService, $this->doctrine, $this->producer);

        /** @var EnvioMessage */
        $message =  new EnvioMessage();

        $data = $receiver->envio($message);

        $this->assertEquals($this->lastLogMessage,'Dados mínimos não enviados');

    }
}