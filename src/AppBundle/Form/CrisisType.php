<?php

namespace AppBundle\Form;

use AppBundle\Entity\Crisis;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CrisisType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('contactFirstname', TextType::class, array(
            'attr' => array(
                'class' => 'form-control',
                'placeholder' => 'Firstname'
            )
        ))->add('contactLastname', TextType::class, array(
            'attr' => array(
                'class' => 'form-control',
                'placeholder' => 'Lastname'
            )
        ))->add('contactPhoneNumber', TextType::class, array(
            'attr' => array(
                'class' => 'form-control',
                'data-inputmask' => "'mask' : '(+99) 9999 9999'"
            )
        ))->add('addressLine1', TextType::class, array(
            'attr' => array(
                'class' => 'form-control',
                'placeholder' => 'Search for address...'
            )
        ))->add('addressLine2', TextType::class, array(
            'attr' => array(
                'class' => 'form-control',
                'placeholder' => 'Bulding Unit Number'
            ),
            'required' => false,
        ))->add('streetNumber', TextType::class, array(
            'attr' => array(
                'class' => 'form-control',
                'id' => 'street_number',
                'placeholder' => 'Street Number',
                'disabled' => 'true'
            )
        ))->add('streetRoute', TextType::class, array(
            'attr' => array(
                'class' => 'form-control',
                'id' => 'route',
                'placeholder' => 'Route',
                'disabled' => 'true'
            )
        ))->add('postalCode', TextType::class, array(
            'attr' => array(
                'class' => 'form-control',
                'id' => 'postal_code',
                'disabled' => 'true'
            )
        ))->add('city', TextType::class, array(
            'attr' => array(
                'class' => 'form-control',
                'id' => 'locality',
                'disabled' => 'true'
            )
        ))->add('country', TextType::class, array(
            'attr' => array(
                'class' => 'form-control',
                'id' => 'country',
                'disabled' => 'true'
            )
        ))->add('latitude', HiddenType::class, array(
            'attr' => array(
                'id' => 'latitude'
            )
        ))->add('longitude', HiddenType::class, array(
            'attr' => array(
                'id' => 'longitude'
            )
        ))->add('message', TextareaType::class, array(
            'attr' => array(
                'class' => 'form-control'
            ),
            'required' => false,
        ))->add('category', EntityType::class, array(
            'class' => 'AppBundle:Category',
            'choice_label' => 'wording',
            'attr' => array(
                'class' => 'form-control'
            )
        ))->add('assistanceList', EntityType::class, array(
            'class' => 'AppBundle:Assistance',
            'choice_label' => 'wording',
            'mapped' => false,
            'multiple' => true,
            'attr' => array(
                'class' => 'form-control',
            )
        ))->add('status', ChoiceType::class, array(
            'attr' => array(
                'class' => 'form-control'
            ),
            'choices' => array(
                'Request' => 'request',
                'In progress' => 'in_progress',
                'Done' => 'done',
            ),
            'data' => 'request'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => Crisis::class,
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_crisis';
    }


}
