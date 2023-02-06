<?php

namespace Nasajon\AppBundle\NsjMail\Service;

use Aws\Sns\Message;
use Doctrine\Bundle\DoctrineBundle\Registry;
use GuzzleHttp\Client;
use JMS\Serializer\Serializer;
use Nasajon\AppBundle\NsjMail\Entity\NotificationType;
use Nasajon\AppBundle\NsjMail\Entity\Notification as Aws;
use Symfony\Component\Serializer\Exception\UnsupportedException;


class SnsNotificationService {

    /**     
     * @var Registry
     */
    private $registry;

    /**     
     * @var Serializer
     */
    private $serializer;

    /**
     * @var string
    */
    protected $notificationClass;

    public function __construct(Registry $registry, Serializer $serializer) {
        $this->registry = $registry;
        $this->serializer = $serializer;
        $this->notificationClass = 'Nasajon\AppBundle\NsjMail\Entity\Notification\Notification';
    }


    public function processSnsMessage(Message $message) {

        switch ($message->offsetGet('Type')) {
            case 'SubscriptionConfirmation':

                /**  @var GuzzleHttp\Psr7\Response */
                $res = (new Client)->get($message->offsetGet('SubscribeURL'));
                break;

            case 'Notification':

                $data = $message->offsetGet('Message');
                $subtipo = json_decode($data,true);
                if (!in_array($subtipo["eventType"],[ NotificationType::BOUNCE, NotificationType::COMPLAINT ]))
                    throw new UnsupportedException("Tipo de notificação não suportado: ".$subtipo["eventType"]);

                $notification = $this->serializer->deserialize($data, $this->notificationClass, 'json');
                $this->processNotification($notification);
                break;

            default:
                throw new UnsupportedException("Tipo de mensagem não suportado.");
        }

    }

    public function processNotification(Aws\Notification $notification) {

        switch ($notification->getType()) {
            case NotificationType::BOUNCE :
                $this->processBounce($notification);
                break;
            case NotificationType::COMPLAINT :
                $this->processComplaint($notification);
                break;
            default:
                throw new UnsupportedException("Tipo não suportado.");
        }
    }

    private function processBounce(Aws\BounceNotification $notification) {

        $bounce = $notification->getBounce();
        $mailMessage = $notification->getMail();

        /** @var Nasajon\Diretorio\MailServiceBundle\Entity\Envios */
        $envio = $this->registry->getManager("target")->getRepository("NasajonMailServiceBundle:Envios")
                ->find($mailMessage->getMessageId());

        $rows = array();
        foreach ($bounce->getEmails() as $email) {

            $rows[] = [
                'feedbackid' => $bounce->getFeedbackId(),
                'tipobounce' => $bounce->getBounceType(),
                'subtipobounce' => $bounce->getBounceSubType(),
                'messageid' => $mailMessage->getMessageId(),
                'datahora' => $bounce->getTimestamp(),
                'emailremetente' => $mailMessage->getSource(),
                'tenant' => $envio ? $envio->getTenant() : null,
                'emaildestinatario' => $email
            ];
        }

        /** @var Nasajon\Diretorio\MailServiceBundle\Repository\BounceRepository */
        $rep = $this->registry->getManager("target")->getRepository("NasajonMailServiceBundle:Notification\Bounce");
        $rep->gravaDados($rows);
    }

    private function processComplaint(Aws\ComplaintNotification $notification) {

        $complaint = $notification->getComplaint();
        $mailMessage = $notification->getMail();

        /** @var Nasajon\Diretorio\MailServiceBundle\Entity\Envios */
        $envio = $this->registry->getManager("target")->getRepository("NasajonMailServiceBundle:Envios")
                ->find($mailMessage->getMessageId());

        $rows = array();
        foreach ($complaint->getEmails() as $email) {
            $rows[] = [
                'feedbackid' => $complaint->getFeedbackId(),
                'tipobounce' => $notification->getType(),
                'subtipobounce' => $complaint->getComplaintFeedbackType(),
                'messageid' => $mailMessage->getMessageId(),
                'datahora' => $complaint->getTimestamp(),
                'emailremetente' => $mailMessage->getSource(),
                'tenant' => $envio ? $envio->getTenant() : null,
                'emaildestinatario' => $email
            ];
        }

        /** @var Nasajon\Diretorio\MailServiceBundle\Repository\BounceRepository */
        $rep = $this->registry->getManager("target")->getRepository("NasajonMailServiceBundle:Notification\Bounce");
        $rep->gravaDados($rows);
    }
}