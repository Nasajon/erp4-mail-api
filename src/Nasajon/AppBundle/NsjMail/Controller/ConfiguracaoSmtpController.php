<?php

namespace Nasajon\AppBundle\NsjMail\Controller;

use Doctrine\ORM\ORMException;
use Doctrine\ORM\ORMInvalidArgumentException;
use FOS\RestBundle\Controller\FOSRestController;
use Nasajon\AppBundle\NsjMail\Form\SmtpType;
use Nasajon\AppBundle\NsjMail\Service\ConfiguracaoSmtpService;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class ConfiguracaoSmtpController extends FOSRestController {   

    public function getService() : ConfiguracaoSmtpService {
        return $this->get('Nasajon\AppBundle\NsjMail\Service\ConfiguracaoSmtpService');
    }
    
    /**
     * Método responsável por inserir as configurações do SMTP no banco de dados.     
     * @param Request $request
     * @return JsonResponse
     */
    public function postAction(Request $request) : JsonResponse {

        $form = $this->get('form.factory')
            ->createNamedBuilder(null, SmtpType::class, null, ['method' => 'POST'])
            ->getForm();

        $form->handleRequest($request);

        if($form->isValid()) {
            
            //Pega os dados do formulário.
            $postData = $form->getData();

            try {
                
                $data = $this->getService()->insert($postData);
                return new JsonResponse($data, JsonResponse::HTTP_CREATED);

            }catch(ORMInvalidArgumentException $e) {
                return new JsonResponse($e->getMessage(), JsonResponse::HTTP_INTERNAL_SERVER_ERROR);
            }catch(ORMException $e) {
                return new JsonResponse($e->getMessage(), JsonResponse::HTTP_INTERNAL_SERVER_ERROR);
            }
        }
    }
}

