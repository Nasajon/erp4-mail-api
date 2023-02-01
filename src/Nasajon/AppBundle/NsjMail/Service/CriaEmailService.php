<?php

namespace Nasajon\AppBundle\NsjMail\Service;

use Bernard\Producer;
use DateTime;
use Gaufrette\Adapter;
use Twig\Environment;
use Twig\Loader\ArrayLoader;
use Gaufrette\Adapter\AwsS3 as AwsS3Adapter;
use Nasajon\AppBundle\NsjMail\Messages\EnvioMessage;

class CriaEmailService {

     /**          
     * @var Producer
     */
    private $producer;

    /**          
     * @var Adpter
     */
    private $adapter;

    public function __construct(Producer $producer, Adapter $adapter) {
        $this->producer = $producer;
        $this->adapter = $adapter;        
    }

    public function criaEmail($tenant, $campanha, $sistema, $from, $to, $codigo_template, $assunto, $conteudo, $tipo, $tags = array(), $contato = null, $customheader = '', $attachments = array(), $attachments_names = array(), $attachments_content_types = array())
    {

        if (empty($campanha)) {
            $twig = new Environment(new ArrayLoader([
                'assunto' => $assunto,
                'conteudo' => $conteudo,
            ]), array(
                'autoescape' => false,
                'strict_variables' => false,
                'optimizations' => 0,
            ));
            //adicionar os destinatários nas tags para caso esteja usando o mesmo template para vários destinatários diferentes
            $tags['to'] = $to;
            $assunto_rendered = $twig->render('assunto', $tags);
            $campanha_rendered = "<style type='text/css'>a, a * { cursor: pointer; }</style>" . $twig->render('conteudo', $tags);
        } else {
            $assunto_rendered = $this->render($tags, $assunto);
            $campanha_rendered = "<style type='text/css'>a, a * { cursor: pointer; }</style>" . $this->render($tags, $conteudo);
        }

        $attachments_urls = [];

        if ($attachments) {
            /** */
            foreach ($attachments as $key => $attachment) {
                $url = $tenant . '/attachments/' . date('Y/m/d/') . sha1(uniqid(mt_rand(), true));
                
                // Verifica se o adapter é uma instância de AwsS3.
                // Isso é necessário porque o adapter Local não possui o método setMetadata.
                if ($this->adapter instanceof AwsS3Adapter) {
                    $this->adapter->setMetadata($url, ["file-type" => "send-mail-attachment"]);
                }
                
                $this->adapter->write($url, $attachment);
                $attachments_urls[$key] = $url;
            }
        }

        $envioMessage = new EnvioMessage();
        $envioMessage->setFrom($from);
        $envioMessage->setTo($to);
        $envioMessage->setCodigoTemplate($codigo_template);
        $envioMessage->setSubject($assunto_rendered);
        $envioMessage->setBody($campanha_rendered);
        $envioMessage->setTenant($tenant);
        $envioMessage->setSistema($sistema);
        $envioMessage->setCampanha($campanha);
        $envioMessage->setDataCadastro(new DateTime());
        $envioMessage->setTipo($tipo);
        $envioMessage->setContato($contato);
        $envioMessage->setCustomheader($customheader);
        $envioMessage->setAttachments($attachments_urls);
        $envioMessage->setAttachmentsNames($attachments_names);
        $envioMessage->setAttachmentsContentTypes($attachments_content_types);

        $this->producer->produce($envioMessage);

        // unset all the things
        unset($envioMessage);

        unset($campanha_rendered);
        unset($campanha);
        unset($conteudo);

        unset($assunto_rendered);
    }

    private function render($tags, $input) {
        
        $output = $input;

        foreach ($tags as $tag => $value) {
            $tag = preg_quote($tag, '/');
            $output = preg_replace("/{\{\s?$tag\s?\}}/", $value, $output);
        }

        return $output;
    }

}

