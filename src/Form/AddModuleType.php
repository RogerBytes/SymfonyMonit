<?php

namespace App\Form;

use App\Entity\IotModule;
use App\Enum\MeasureType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\EnumType;

class AddModuleType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name')
            ->add('measure_type', EnumType::class, [
                'class' => MeasureType::class,
                'multiple'=> true,
                'expanded'=> true,
            ])
            ->add('createdAt', null, [
                'widget' => 'single_text',
            ])
            ->add('status')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => IotModule::class,
        ]);
    }
}
