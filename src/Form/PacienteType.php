<?php

namespace App\Form;

use App\Entity\Paciente;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class PacienteType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nome', TextType::class, [
                'label' => "Nome do Paciente",
                'attr' => [
                    'class' => 'form-control'
                ]
            ])
            ->add('email', TextType::class, [
                'label' => "E-mail",
                'attr' => [
                    'class' => 'form-control'
                ]
            ])
            ->add('nome_mae', TextType::class, [
                'label' => "Nome da Mãe",
                'attr' => [
                    'class' => 'form-control'
                ]
            ])
            ->add('nome_pai', TextType::class, [
                'label' => "Nome do Pai",
                'attr' => [
                    'class' => 'form-control'
                ]
            ])
            ->add('status', HiddenType::class, [
                'data' => 1
            ])
            
            ->add('enviar', SubmitType::class, [
                'label' => "Salvar",
                'attr' => [
                    'class' => 'btn btn-primary'
                ]
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            // uncomment if you want to bind to a class
            //'data_class' => Paciente::class,
        ]);
    }
}
