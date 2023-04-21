<?php

namespace App\Form;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class NewUserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class, array(
                'required' => true,
                'label' => 'Name',
            ))
            ->add('surname', TextType::class, array(
                'required' => true,
                'label' => 'Surname',
            ))
            ->add('email', TextType::class, array(
                'required' => true,
                'label' => 'Email',
            ))
            ->add('passwordNew', PasswordType::class, array(
                'required' => false,
                'mapped' => false,
                'label' => 'New password',
            ))
            ->add('roles', ChoiceType::class, array(
               'choices' => ['ROLE_ADMIN' => 'ROLE_ADMIN', 'ROLE_USER' => 'ROLE_USER'],
                'label' => 'User roles',
                'multiple' => true
            ))
            ->add('submit', SubmitType::class, array(
                'label' => 'Save',
                'attr'   =>  array(
                    'class'   => 'a-button pull-right button no-bg button-action margin-left submit-btn'
                )
            ))
        ;
    }

    public function getBlockPrefix()
    {
        return 'new_user_type';
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            // Configure your form options here
        ]);
    }
}
