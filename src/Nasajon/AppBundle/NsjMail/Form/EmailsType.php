<?php

namespace Nasajon\AppBundle\NsjMail\Form;


use Nasajon\AppBundle\NsjMail\Validator\Constraints\StreamSize;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;


class EmailsType extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('from', EmailType::class,
                [
                    'required' => true,
                    'constraints' => [
                        new \Symfony\Component\Validator\Constraints\NotBlank([
                            'message' => 'O campo from não pode ser vazio.',
                        ]),
                        new \Symfony\Component\Validator\Constraints\Email([
                            'message' => 'O campo from tem que ser um email.',
                        ]),
                    ],
                ])
            ->add('to', CollectionType::class,
                [
                    'entry_type' => EmailType::class, 'allow_add' => true, 'required' => true,
                    'constraints' => [
                        new \Symfony\Component\Validator\Constraints\NotBlank([
                            'message' => "O campo 'to' não pode ser vazio.",
                        ]),
                        new \Symfony\Component\Validator\Constraints\All([
                            'constraints' => [
                                new \Symfony\Component\Validator\Constraints\Email([
                                    'message' => "O campo 'to' tem que ser um email.",
                                ]),
                            ],
                        ]),
                    ],
                ])
            ->add('replyto', EmailType::class)
            ->add('split')
            ->add('tags', CollectionType::class, ['allow_add' => true])
            ->add('codigo')
            ->add('tenant', TextType::class, ['required' => true])
            ->add('attachments', CollectionType::class,[
                'entry_type' => TextType::class, 'allow_add' => true,
                'entry_options'  => [
                    'constraints' => [ new StreamSize(20000000)]
                ]])
            ->add('attachments_names', CollectionType::class,
                ['entry_type' => TextType::class, 'allow_add' => true])
            ->add('attachments_content_types', CollectionType::class,
                ['entry_type' => TextType::class, 'allow_add' => true]);

    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(['csrf_protection' => false,'allow_extra_fields' => true,]);
    }
}
