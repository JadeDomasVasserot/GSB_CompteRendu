<?php

namespace App\Form;

use App\Entity\Rapportvisite;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class RapportvisiteType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('datevisite')
            ->add('estremplacant')
            ->add('bilan')
            ->add('idmotif')
            ->add('idvisiteur')
            ->add('idpraticien')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Rapportvisite::class,
        ]);
    }
}
