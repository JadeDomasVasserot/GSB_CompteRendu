<?php

namespace App\Form;

use App\Entity\Rapportmedicament;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class RapportmedicamentType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('quantite')
            ->add('estechantillon')
            ->add('estdocumente')
            ->add('idmedicament')
            ->add('idrapport')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Rapportmedicament::class,
        ]);
    }
}
