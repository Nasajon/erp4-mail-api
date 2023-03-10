<?php

namespace Nasajon\AppBundle\NsjMail\Controller;

use FOS\RestBundle\Controller\FOSRestController;
use Nasajon\AppBundle\NsjMail\Form\EmailsType;
use FOS\RestBundle\Controller\Annotations as FOS;
use Nasajon\AppBundle\NsjMail\Service\EmailsService;
use Symfony\Component\Form\Form;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class EmailsController extends FOSRestController {

    public function getService() : EmailsService {
        return $this->get('Nasajon\AppBundle\NsjMail\Service\EmailsService');
    }

     /**
     *
     * @FOS\Post("/sendEmail/", defaults={ "_format" = "json" })
     */
    public function sendEmailAction(Request $request) {

        $headers = $request->headers->all();

        $form = $this->get('form.factory')
            ->createNamedBuilder(null, EmailsType::class, null, ['method' => 'POST'])
            ->getForm();

        $form->handleRequest($request);

        if ($form->isValid()) {

            $email = $form->getData();

            if (count($email['attachments']) != count($email['attachments_names']) || count($email['attachments']) != count($email['attachments_content_types'])) {
                return new JsonResponse([
                    'sucesso' => false,
                    'mensagem' => "Quantidade de anexos não é igual a quantidade de nomes ou do content-type dos anexos",
                    'erros' => "Quantidade de anexos não é igual a quantidade de nomes ou do content-type dos anexos",
                ], JsonResponse::HTTP_BAD_REQUEST);
            }

            $tenant = $email['tenant'];
            $sistema = $this->getUser()->getUsername();
            $template = $this->getService()->getTemplateByCodigo($email['codigo'], $tenant);

            if (!$template) {
                return new JsonResponse([
                    'sucesso' => false,
                    'erros' => "Problemas ao carregar o template informado, por favor verifique se o nome do template está correto",
                ], JsonResponse::HTTP_BAD_REQUEST);
            }           
            
            //Desabilitado temporariamente
            // $email["from"] = $this->identificaRemetenteDoTemplate($template, $email["from"]);

            try {

                $this->getService()->validateEmails($email['to']);

            }catch(\Exception $ex){

                /** @var LoggerInterface */
                $this->get('logger')->error($ex->getMessage(), $email);
                return new JsonResponse(array('sucesso' => false, 'erros' => $ex->getMessage()),
                JsonResponse::HTTP_BAD_REQUEST);
            }

            if ( (isset($email['split']) && $email['split'] === true )  || count($email['to']) >= 50 ) {
                
                foreach ($email['to'] as $key => $mail) {
                    $this->getService()->queueMail($tenant, $sistema, $email['from'], [$mail],
                        $template, $email['tags'],
                        isset($email['attachments'][$key]) ? [$email['attachments'][$key]] : [],
                        isset($email['attachments_names'][$key]) ? [$email['attachments_names'][$key]] : [],
                        isset($email['attachments_content_types'][$key]) ? [$email['attachments_content_types'][$key]] : []);
                }
            } else {
                $this->getService()->queueMail($tenant, $sistema, $email['from'], $email['to'], $template, $email['tags'], $email['attachments'], $email['attachments_names'], $email['attachments_content_types']);
            }

            return new JsonResponse(['sucesso' => true]);

        } else {
            return new JsonResponse(array('sucesso' => false, 'erros' => $this->getFormErrorMessages($form)), JsonResponse::HTTP_BAD_REQUEST);
        }
    }

    public function getFormErrorMessages(Form $form) {

        $errors = [];

        foreach (iterator_to_array($form->getErrors(true, false)) as $error) {
            $errors[$error->getOrigin()->getName()] = $error->getMessage();
        }

        return $errors;
    }

    protected function identificaRemetenteDoTemplate(array $template, string $default) : string {

        if (isset($template['remetente'])) {
            $remetente = $this->getService()->getRemetenteByID($template['remetente']);

            if ($remetente){
                return $remetente['email'];
            }
        }
        
        return $default;
    }

}