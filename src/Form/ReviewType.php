<?php

namespace App\Form;

use App\Entity\Review;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\RangeType;
use App\Entity\Category;

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
            ->add('description')
            ->add('picture')
            ->add('user')
            ->add('category', EntityType::class, [
                'class'  => Category::class])
            ;
            // ->add('posted_at')
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Review::class,
        ]);
    }
}
