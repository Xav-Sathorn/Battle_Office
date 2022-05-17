<?php

namespace App\Form;

use App\Entity\Client;
use App\Form\ItemType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class RegistrationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('firstname')
            ->add('surname')
            ->add('billingAddress')
            ->add('billingAddressComplement')
            ->add('billingCity')
            ->add('billingPostCode')
            ->add('billingCountry',  ChoiceType::class, [
                'choices' => [
                    'France' => 'fr',
                    'Belgique' => 'bl',
                    'Luxembourg' => 'lx',
                ]
            ])
            ->add('billingPhoneNumber', TelType::class)
            ->add('emailAddress', EmailType::class)
            ->add('confirmationEmailAddress', EmailType::class)
            ->add('deliveryFirstname')
            ->add('deliverySurname')
            ->add('deliveryAddress')
            ->add('deliveryAddressComplement')
            ->add('deliveryCity')
            ->add('deliveryPostCode')
            ->add('deliveryCountry',   ChoiceType::class, [
                'choices' => [
                    'France' => 'fr',
                    'Belgique' => 'bl',
                    'Luxembourg' => 'lx',
                ]
            ])
            ->add('deliveryPhoneNumber', TelType::class, ['required' => false]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Client::class,
        ]);
    }
}
