<?php

namespace App\Form;

use App\Entity\Property;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PropertyType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('area', NumberType::class, [
                'label' => 'Surface du bien (m²)',
                'attr' => ['placeholder' => '9.50'],
            ])
            ->add('room', NumberType::class, [
                'label' => 'Nombre de piéces',
                'attr' => ['placeholder' => '2']
            ])
            ->add('type', ChoiceType::class, [
                'choices' => [
                    'Maison' => 'maison',
                    'Appartement' => 'appartement',
                    'Yourte' => 'yourte',
                ],
                'multiple' => false,
            ])
            ->add('address', TextareaType::class, [
                'label' => 'Adresse',
            ])
            ->add('swimmingPool', ChoiceType::class, [
                'label' => 'Piscine',
                'choices' => [
                    'Oui' => 'oui',
                    'Non' => 'non',
                ],
                'data' => 'non',
            ])
            ->add('outside', NumberType::class, [
                'label' => 'Exterieur (m²)',
                'required' => false,
                'attr' => ['placeholder' => 'laisser vide si pas de jardin']
            ])
            ->add('garage', ChoiceType::class, [
                'label' => 'Garage',
                'choices' => [
                    'Oui' => 'oui',
                    'Non' => 'non',
                ],
                'data' => 'non',
            ])
            ->add('buyingOrLeasing', ChoiceType::class, [
                'label' => 'Vente ou location',
                'choices' => [
                    'Vente' => 'vente',
                    'Location' => 'location',
                ],
            ])
            ->add('price', NumberType::class, [
                'label' => 'Prix (€)',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Property::class,
        ]);
    }
}
