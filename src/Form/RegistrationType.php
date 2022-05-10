<?php

namespace App\Form;

use App\Entity\Client;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

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
            ->add('billingCountry')
            ->add('billingPhoneNumber')
            ->add('emailAddress')
            ->add('deliveryFirstname')
            ->add('deliverySurname')
            ->add('deliveryAddress')
            ->add('deliveryAddressComplement')
            ->add('deliveryCity')
            ->add('deliveryPostCode')
            ->add('deliveryCountry')
            ->add('deliveryPhoneNumber')
            ->add('isDifferentAddress')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Client::class,
        ]);
    }
}
