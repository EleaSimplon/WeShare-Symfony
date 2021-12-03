<?php

namespace App\Form;

use App\Entity\Post;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Validator\Constraints\File;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\RangeType;


class PostType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('rate', RangeType::class, [
                'attr' => [
                    'min' => 0,
                    'max' => 5
                ]
            ])
            ->add('name')
            ->add('address')
            ->add('phone_number')
            ->add('description')
            ->add('city')
            ->add('web_site')
            ->add('country')
            ->add('categories', ChoiceType::class, [
                'choices'  => [
                    'Choose a category' => [
                        'Restaurant' => 'Restaurant',
                        'Activity' => 'Activity',
                        'Destination' => 'Destination'
                    ]
                ]
            ])
            ->add('picture', FileType::class, [
                'mapped' => false,
                'required' => false,
                'label' => ' ',
                'constraints' => [
                    new File([
                        'mimeTypesMessage' => 'Please upload a valid PDF document',
                    ])
                ],
            ]);
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Post::class,
        ]);
    }
}
