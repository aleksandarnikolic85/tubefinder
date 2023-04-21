<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SearchType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('search', TextType::class, array(
                'required' => false,
                'mapped' => false,
                'label' => '$.search_form.search_button',
                'attr' => array(
                    'placeholder' => '$.search_form.label_text',
                    'autocomplete' => 'off',
                )
            ))
            ->add('submit', SubmitType::class, array(
                'label' => '$.search_form.search_button',
                'attr'   =>  array(
                    'class'   => 'a-button pull-right button no-bg button-action margin-left submit-btn'
                )
            ))
        ;
    }

    public function getBlockPrefix()
    {
        return 'substitube_search';
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            // Configure your form options here
        ]);
    }
}
