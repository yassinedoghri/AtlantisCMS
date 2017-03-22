<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class RegistrationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('email', EmailType::class, array(
            'label' => 'Email (*)',
            'attr' => array(
                'class' => 'form-control'
            )
        ))->add('username', TextType::class, array(
            'label' => 'Username (*)',
            'attr' => array(
                'class' => 'form-control'
            )
        ))->add('plainPassword', RepeatedType::class, array(
            'type' => PasswordType::class,
            'invalid_message' => 'The password fields must match.',
            'options' => array('attr' => array('class' => 'form-control')),
            'required' => true,
            'first_options' => array('label' => 'Password (*)'),
            'second_options' => array('label' => 'Repeat Password (*)'),
        ))->add('firstname', TextType::class, array(
            'label' => 'Firstname (*)',
            'attr' => array(
                'class' => 'form-control'
            )
        ))->add('lastname', TextType::class, array(
            'label' => 'Lastname (*)',
            'attr' => array(
                'class' => 'form-control'
            )
        ))->add('roles', ChoiceType::class, array(
            'choices' => array(
                'Government Agent' => 'ROLE_GOV_AGENT',
                'Call Operator' => 'ROLE_CALL_OPERATOR',
                'Super Admin' => 'ROLE_SUPER_ADMIN',
            ),
            'multiple' => true,
            'required' => false,
            'attr' => array(
                'class' => 'form-control'
            )
        ));
    }

    public function getParent()
    {
        return 'FOS\UserBundle\Form\Type\RegistrationFormType';
    }

    public function getBlockPrefix()
    {
        return 'app_user_registration';
    }
}
