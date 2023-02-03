<?php
namespace Helper;

// here you can define custom actions
// all public methods declared in helper class will be available in $I
use Symfony\Component\VarDumper\VarDumper;
use Bernard\Producer;
use Bernard\QueueFactory\InMemoryFactory;
use Bernard\Queue\InMemoryQueue;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Codeception\Stub;

class Unit extends \Codeception\Module
{

    protected $queue;

    protected $producer;

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

    /**
     * Retorna o container do Symfony
     */
    function getContainer(){

        return $this->getModule('Symfony')->grabService('kernel')->getContainer();
    }

    /**
     * Escreve um texto no console
     */
    function outputMessage($message){

        $output = new \Codeception\Lib\Console\Output([]);
        $output->writeln($message);
    }

    /**
     * Usa o dump aprimorado do symfony para escrever dados
     */
    public function dump($data)
    {
        VarDumper::dump($data);
    }

    public function executeQuery($query)
    {
        $dbh = $this->getModule("\Helper\Database")->dbh;

        return $dbh->query($query);
    }
}
