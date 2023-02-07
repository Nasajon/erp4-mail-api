<?php

namespace Nasajon\AppBundle\NsjMail\Controller;

use Doctrine\ORM\ORMException;
use Doctrine\ORM\ORMInvalidArgumentException;
use FOS\RestBundle\Controller\FOSRestController;
use Nasajon\AppBundle\NsjMail\Exceptions\EmailInvalidoException;
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

            }catch(EmailInvalidoException $e) {
                return new JsonResponse(["message" => $e->getMessage(), "code" => 400], JsonResponse::HTTP_BAD_REQUEST);
            }
            catch(ORMInvalidArgumentException $e) {
                return new JsonResponse(["message" => $e->getMessage(), "code" => 500], JsonResponse::HTTP_INTERNAL_SERVER_ERROR);
            }catch(ORMException $e) {
                return new JsonResponse(["message" => $e->getMessage(), "code" => 500], JsonResponse::HTTP_INTERNAL_SERVER_ERROR);
            }

        } else {
            return new JsonResponse(array('sucesso' => false, 'erros' => $this->getFormErrorMessages($form)), JsonResponse::HTTP_BAD_REQUEST);
        }
    }

    /**
     * Método responsável por iterar os erros do form e retornar em formato de array.     
     * @param Form $form
     * @return array
     */
    public function getFormErrorMessages(Form $form) : array {

        $errors = [];

        foreach (iterator_to_array($form->getErrors(true)) as $error) {
            $errors[$error->getOrigin()->getName()] = $error->getMessage();
        }

        return $errors;
    }
}