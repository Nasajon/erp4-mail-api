<?php

namespace Nasajon\AppBundle\NsjMail\Controller\Sns;

use Aws\Sns\Message;
use RuntimeException;
use Aws\Sns\MessageValidator;
use Symfony\Component\HttpFoundation\Request;
use Aws\Sns\Exception\InvalidSnsMessageException;
use Codeception\Util\HttpCode;
use Nasajon\AppBundle\NsjMail\Service\SnsNotificationService;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Serializer\Exception\UnsupportedException;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;


/**
 * @Route("/snsEvent")
 */
class SnsEventController extends Controller {


    private function getService() : SnsNotificationService {
        return $this->get('Nasajon\AppBundle\NsjMail\Service\SnsNotificationService');
    }

    /**
     * @Route("")
     * @Route("/")
     * @Method("POST")
     */
    public function postAction(Request $request) {

        try {
            // Create a message from the post data and validate its signature
            $data = json_decode($request->getContent(), true);

            if (JSON_ERROR_NONE !== json_last_error() || !is_array($data)) {
                throw new RuntimeException('Invalid POST data.');
            }

            $message = new Message($data);
            
            if ( $this->getParameter('kernel.environment') === 'prod'){
                $validator = new MessageValidator();
                $validator->validate($message);
            }            

            try{
                $this->getService()->processSnsMessage($message);
            }catch(\GuzzleHttp\Exception\ClientException $ex){
                return new JsonResponse(null,$ex->getCode());
            }catch(UnsupportedException $ex){
                return new JsonResponse($ex->getMessage(), HttpCode::BAD_REQUEST);
            }

            return new JsonResponse();

        } catch (InvalidSnsMessageException $e) {
            throw $this->createNotFoundException();
        }

    }
}