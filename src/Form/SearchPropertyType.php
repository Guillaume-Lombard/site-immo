<?php

namespace App\Form;

use App\Entity\Property;
use App\Model\SearchProperty;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SearchPropertyType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('minArea', NumberType::class, [
                'label' => 'Surface minimum',
                'required' => false,
            ])
            ->add('maxArea', NumberType::class, [
                'label' => 'Surface maximum',
                'required' => false,
            ])
            ->add('minRooms', NumberType::class, [
                'label' => 'Nombre de pièces minimum',
                'required' => false,
            ])
            ->add('maxRooms', NumberType::class, [
                'label' => 'Nombre de pièces maximum',
                'required' => false,
            ])
            ->add('type', ChoiceType::class, [
                'label' => 'Type',
                'choices' => [
                    'Vente' => 'vente',
                    'Location' => 'location',
                ],
                'multiple'=>false,
                'required'=>false,
            ])
            ->add('housseType', ChoiceType::class, [
                'label' => 'Type de logement',
                'choices' => [
                    'Maison' => 'maison',
                    'Appartement' => 'appartement',
                    'Yourte' => 'yourte',
                ],
                'multiple'=>false,
                'required'=>false,
            ])
            ->add('address', TextType::class, [
                'label' => 'Adresse',
                'required' => false,
            ])
            ->add('garage', ChoiceType::class, [
                'label' => 'Garage',
                'required' => false,
            ])
            ->add('swimmingPool', ChoiceType::class, [
                'label' => 'Piscine',
                'required' => false,
            ])
            ->add('minPrice', NumberType::class, [
                'label' => 'Prix minimum',
                'required' => false,
            ])
            ->add('maxPrice', NumberType::class, [
                'label' => 'Prix maximum',
                'required' => false,
            ])
            ->add('buyingOrLeasing', ChoiceType::class, [
                'label' => 'Vente ou location',
                'choices' => [
                    'Vente' => 'vente',
                    'Location' => 'location',
                ],
                'required' => false,
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => SearchProperty::class,
        ]);
    }
}
