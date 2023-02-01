<?php

namespace Nasajon\AppBundle\NsjMail\Service;

use Aws\Result;
use Aws\Ses\SesClient;
use Gaufrette\Adapter;
use Monolog\Logger;
use Nasajon\AppBundle\NsjMail\Messages\EnvioMessage;

class EmailSesService {

    /**
     * @var Adapter
     */
    private $adapter;

    /**     
     * @var SesClient
     */
    private $sesClient;

    /**     
     * @var Logger
     */
    private $logger;

    /**     
     * @var string
     */
    private $transactionalConfigurationSetName;

    public function __construct(Adapter $adapter, SesClient $sesClient, Logger $logger, string $transactionalConfigurationSetName) {
        $this->adapter = $adapter;
        $this->sesClient = $sesClient;
        $this->logger = $logger;
        $this->transactionalConfigurationSetName = $transactionalConfigurationSetName;
    }


    public function enviar(EnvioMessage $message) : Result {

        $this->logger->info("Tentativa de envio de email via Amazon SES.", $this->emailMessageToArray($message));

        $data = $message->getCustomheader() . "";
        $data .= "From: " . $message->getFrom() . "\r\n";
        $data .= "To: " . implode(",", $message->getTo()) . "\r\n";
        $data .= "Subject: " . $message->getSubject() . "\r\n";
        $data .= "MIME-Version: 1.0 \r\n";

        $boundary = hash('sha256', uniqid('', true));
        $data .= "Content-Type: multipart/mixed; boundary=\"{$boundary}\"\r\n\r\n";
        $data .= "--{$boundary}\r\n";
        $data .= "Content-Type: text/html; charset=utf-8 \r\n";
        $data .= "\r\n" . $message->getBody() . "\r\n";

        $attachments_urls = empty($message->getAttachments()) ? [] : $message->getAttachments();
        $attachments_names = empty($message->getAttachmentsNames()) ? [] : $message->getAttachmentsNames();
        $attachments_content_types = empty($message->getAttachmentsContentTypes()) ? [] : $message->getAttachmentsContentTypes();

        foreach ($attachments_urls as $key => $url) {
            $data .= "--{$boundary}\r\n";
            $data .= "Content-Type: {$attachments_content_types[$key]}; name=\"{$attachments_names[$key]}\"\r\n";
            $data .= "Content-Description: {$attachments_names[$key]}\r\n";
            $data .= "Content-Disposition: attachment;filename=\"{$attachments_names[$key]}\"\r\n";
            $data .= "Content-Transfer-Encoding: base64\r\n\r\n";
            $data .= \base64_encode($this->adapter->read($url)) . "\r\n";
        }

        $data .= "--{$boundary}--\r\n";

        $email = [
            'Source' => $message->getFrom(),
            "Destinations" => $message->getTo(),
            'RawMessage' => array(
                'Data' => $data,
            ),
        ];

        $email['ConfigurationSetName'] = $this->transactionalConfigurationSetName;

        // Enviando o e-mail ...
        $result = $this->sesClient->sendRawEmail($email);

        if($result) {
            $this->logger->info("O email foi enviado com sucesso.");
            return $result;
        }

    }

    private function emailMessageToArray(EnvioMessage $message) : array {
        return [
            'tenant' => $message->getTenant(),
            'from' => $message->getFrom(),
            'to' => $message->getTo(),
            'template' => $message->getCodigoTemplate()
        ];
    }

}