<?php

namespace Helper;


use FunctionalTester;
use Bernard\Producer;
use Bernard\QueueFactory\InMemoryFactory;
use Bernard\Queue\InMemoryQueue;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Codeception\Stub;
use JWT;

// here you can define custom actions
// all public methods declared in helper class will be available in $I

class Functional extends \Codeception\Module {

    protected $I;
    protected $queue;
    protected $producer;


    public function register(FunctionalTester $I){
        $this->I = $I;
    }

    public function __construct($moduleContainer, $config = null){

        parent::__construct($moduleContainer, $config);

        /** Mocka a fila para facilitar os testes que dependam deste */
        $this->queue = new InMemoryQueue('mocked_queue');
        $this->producer = Stub::make(Producer::class,[
           "queues"     => Stub::make(InMemoryFactory::class,['create' => $this->queue]),
           "dispatcher" => Stub::makeEmpty(EventDispatcherInterface::class)
        ]);
    }

    /**
     * retorna o Mock da fila
     * @return \Bernard\Queue
     */
    public function getQueue($clear = true) : \Bernard\Queue
    {
        if ($clear){
                while ($this->queue->count() > 0){
                $this->queue->dequeue();
            }
        }
        return $this->queue;
    }

    /**
     * Retorna o mock do producer de mensagens do rabbit
     * @return \Bernard\Producer
     */
    public function getProducer() : \Bernard\Producer
    {
        return $this->producer;
    }

    public function getContainer(){
        return $this->getModule('Symfony')->grabService('kernel')->getContainer();
    }

    public function amSamlLoggedInAs($username, $gerarSemPermissao = null) {
        $container = $this->getModule('Symfony')->grabService('kernel')->getContainer();

        $codTenant = 'gednasajon';
        $tenant = new \Nasajon\LoginBundle\Entity\Tenant([
            'id' => 47,
            'codigo' => $codTenant,
            'nome' => 'Nasajon',
            'sistemas' => [
                [
                    'id' => 278,
                    'codigo' => 'multinotas',
                    'nome' => 'Multinotas',
                    'logo' => 'url-logo',
                    'icone' => 'url-icone',
                    'funcoes' => [
                        [
                            'codigo' => 'admin',
                            'id' => 1,
                            'nome' => 'Admin'
                        ],
                        [
                            'codigo' => 'usuario',
                            'id' => 2,
                            'nome' => 'Usuário'
                        ]
                    ]
                ]
            ]
        ]);
        $user = (new \Nasajon\LoginBundle\Security\User\ContaUser($username, 'Usuário logado.'));

        if (!$gerarSemPermissao) {
            $user->setTenants([$codTenant => $tenant])
                ->addRole('ROLE_CONTAS')
                ->addRole('ROLE_TENANTS')
                ->setSistemaAtual(278, 'provisao');
        }

        $firewall = 'secured_area';

        $token = new \LightSaml\SpBundle\Security\Authentication\Token\SamlSpToken($user->getRoles(), $firewall, [], $user);

        $session = $container->get('session');

        $session->set('main_saml_request_state_', []);
        $session->set('samlsso', new \LightSaml\State\Sso\SsoState());

        $session->set('_security_' . $firewall, serialize($token));
        $session->save();

        $this->getModule('Symfony')->setCookie($session->getName(), $session->getId());
    }

    public function amLoggedInAs($userId) {

        $secret = $this->getModule('Symfony')->grabService('kernel')->getContainer()->getParameter('kernel.secret');

        $token = JWT::encode([
                    'tipo' => 'conta',
                    'conta' => $userId
                        ], $secret, 'HS256');
        $this->getModule('REST')->haveHttpHeader('apikey', $token);
    }

    public function amLoggedInAsSistema($sistema) {

        $secret = $this->getModule('Symfony')->grabService('kernel')->getContainer()->getParameter('kernel.secret');

        $token = JWT::encode([
                    'tipo' => 'sistema',
                    'sistema' => $sistema
                        ], $secret, 'HS256');
        $this->getModule('REST')->haveHttpHeader('apikey', $token);
    }

    public function amLoggedInAsApiKey($token) {

        $this->getContainer()->set('bernard.producer', $this->producer);

        $this->getModule('REST')->haveHttpHeader('apikey', $token);
    }

    public function sendRaw($method, $uri, $parameters, $files, $server, $content) {

        $this->getContainer()->set('bernard.producer', $this->producer);

        $response = json_decode($this->getModule('Symfony')->_request($method, $uri, $parameters, $files, $server, $content), true);

        if ( (is_array($response)) && ( array_key_exists("code",$response) || array_key_exists("message",$response) ) && !is_null($this->I) )
            var_dump($this->I->grabResponse());
        return $response;
    }

    /**
     * Gerador de UUID V4
     * Autor: Andrew Moore
     * Origem: https://www.php.net/manual/en/function.uniqid.php#94959
     *
     * @return type
     */
    public function generateUuidV4()
    {
        return sprintf('%04x%04x-%04x-%04x-%04x-%04x%04x%04x',
            // 32 bits for "time_low"
            mt_rand(0, 0xffff), mt_rand(0, 0xffff),
            // 16 bits for "time_mid"
            mt_rand(0, 0xffff),
            // 16 bits for "time_hi_and_version",
            // four most significant bits holds version number 4
            mt_rand(0, 0x0fff) | 0x4000,
            // 16 bits, 8 bits for "clk_seq_hi_res",
            // 8 bits for "clk_seq_low",
            // two most significant bits holds zero and one for variant DCE1.1
            mt_rand(0, 0x3fff) | 0x8000,
            // 48 bits for "node"
            mt_rand(0, 0xffff), mt_rand(0, 0xffff), mt_rand(0, 0xffff)
        );
    }

    public function executeQuery($query)
    {
        $dbh = $this->getModule("Db")->dbh;

        return $dbh->query($query);
    }
}
