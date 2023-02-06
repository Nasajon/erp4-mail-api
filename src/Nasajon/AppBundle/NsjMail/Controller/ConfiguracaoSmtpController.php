<?php

namespace Nasajon\AppBundle\NsjMail\Controller;

use Doctrine\ORM\ORMException;
use Doctrine\ORM\ORMInvalidArgumentException;
use FOS\RestBundle\Controller\FOSRestController;
use Nasajon\AppBundle\NsjMail\Exceptions\EmailInvalidoExeception;
use Nasajon\AppBundle\NsjMail\Form\SmtpType;
use Nasajon\AppBundle\NsjMail\Service\ConfiguracaoSmtpService;
use Symfony\Component\Form\Form;
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

            }catch(EmailInvalidoExeception $e) {
                return new JsonResponse($e->getMessage(), JsonResponse::HTTP_BAD_REQUEST);
            }
            catch(ORMInvalidArgumentException $e) {
                return new JsonResponse($e->getMessage(), JsonResponse::HTTP_INTERNAL_SERVER_ERROR);
            }catch(ORMException $e) {
                return new JsonResponse($e->getMessage(), JsonResponse::HTTP_INTERNAL_SERVER_ERROR);
            }

        } else {
            return new JsonResponse(array('sucesso' => false, 'erros' => $this->getFormErrorMessages($form)), JsonResponse::HTTP_BAD_REQUEST);
        }
    }

    public function getFormErrorMessages(Form $form) {

        $errors = [];

        foreach (iterator_to_array($form->getErrors(true)) as $error) {
            $errors[$error->getOrigin()->getName()] = $error->getMessage();
        }

        return $errors;
    }
}