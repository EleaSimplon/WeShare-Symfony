<?php

namespace App\Form;

use App\Entity\Review;
use App\Entity\Category;
use Symfony\Component\Form\AbstractType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\RangeType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\File;


class ReviewType extends AbstractType
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
            ->add('title')
            ->add('description',TextareaType::class, [
                'required' => false,
            ])
            ->add('picture', FileType::class, [
                'mapped' => false,
                'required' => false,
                'label' => ' ',
                'constraints' => [
                    new File([
                        'maxSize' => '1024k',
                        'mimeTypes' => [

                        ],
                        'mimeTypesMessage' => 'Please upload a valid PDF document',
                    ])
                ],
            ])
            ->add('category', EntityType::class, [
                'class'  => Category::class])
            ;
            
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Review::class,
        ]);
    }
}
