<?php

namespace Nasajon\AppBundle\NsjMail\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;

class SmtpType extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nome', TextType::class, [
                'required' => true,
                'constraints' => [
                    new \Symfony\Component\Validator\Constraints\NotBlank([
                        'message' => 'O campo nome não pode ser vazio.',
                    ])
                ],
            ])->add('host', TextType::class, [
                'required' => true,
                'constraints' => [
                    new \Symfony\Component\Validator\Constraints\NotBlank([
                        'message' => 'O campo host não pode ser vazio.',
                    ])
                ],
            ])->add('smtp_auth', CheckboxType::class, [
                'required' => true,
                'constraints' => [
                    new \Symfony\Component\Validator\Constraints\NotBlank([
                        'message' => 'O campo smtp_auth não pode ser vazio.',
                    ])
                ],
            ])->add('usuario', TextType::class, [
                'required' => true,
                'constraints' => [
                    new \Symfony\Component\Validator\Constraints\NotBlank([
                        'message' => 'O campo usuario não pode ser vazio.',
                    ])
                ],
            ])->add('senha', TextType::class, [
                'required' => true,
                'constraints' => [
                    new \Symfony\Component\Validator\Constraints\NotBlank([
                        'message' => 'O campo senha não pode ser vazio.',
                    ])
                ],
            ])->add('port', TextType::class, [
                'required' => true,
                'constraints' => [
                    new \Symfony\Component\Validator\Constraints\NotBlank([
                        'message' => 'O campo senha não pode ser vazio.',
                    ])
                ],
            ])->add('tenant_id', TextType::class, [
                'required' => true,
                'constraints' => [
                    new \Symfony\Component\Validator\Constraints\NotBlank([
                        'message' => 'O campo senha não pode ser vazio.',
                    ])
                ],
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(['csrf_protection' => false,'allow_extra_fields' => true,]);
    }
}
