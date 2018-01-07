<?php

namespace ErUserBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

/**
 * RegistrationType class.
 */
class RegistrationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options) 
    {
        //parent::buildForm($builder, $options);
        $builder->add('firstName', TextType::class);
        $builder->add('lastName', TextType::class);
        $builder->add('superior', EntityType::class, array(
            'class' => 'ErUserBundle:user',
            'choice_label' => function($user) {
                return $user->getFirstName().' '.$user->getLastName();
            },
            'multiple' => false,
            'expanded' => false,
        ));
        
    }
    
    /**
     * @return string
     */
    public function getParent()
    {
        return 'FOS\UserBundle\Form\Type\RegistrationFormType';
    }
    
    /**
     * @return string
     */
    public function getName()
    {
       return $this->getBlockPrefix(); 
    }
    
    
    /**
     * @return string
     */
    public function getBlockPrefix()
    {
       return 'er_user_registration';
    }
}

