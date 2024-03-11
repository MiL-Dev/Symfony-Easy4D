<?php

namespace App\Form;

use App\Entity\Produit;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;

class ProduitType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('Easy4D')
            ->add('EAN_Code',null , [
                'required' => false,
                'empty_data' => ''
            ])
            ->add('Designation')
            ->add('Category',null , [
                'required' => false,
                'empty_data' => ''
            ])
            ->add('Brand_name',null , [
                'required' => false,
                'empty_data' => ''
            ])
            ->add('Family_name',null , [
                'required' => false,
                'empty_data' => ''
            ])
            ->add('Width',null , [
                'required' => false,
                'empty_data' => ''
            ])
            ->add('Height',null , [
                'required' => false,
                'empty_data' => ''
            ])
            ->add('Diameter',null , [
                'required' => false,
                'empty_data' => ''
            ])
            ->add('Construction',null , [
                'required' => false,
                'empty_data' => ''
            ])
            ->add('Load_index',null , [
                'required' => false,
                'empty_data' => ''
            ])
            ->add('Speed_index',null , [
                'required' => false,
                'empty_data' => ''
            ])
            ->add('Segment')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Produit::class,
        ]);
    }
}
