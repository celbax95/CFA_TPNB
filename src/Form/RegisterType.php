<?php

namespace App\Form;

use App\DTO\AddUser;
use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class RegisterType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('email', EmailType::class, [
                'required' => true,
                'translation_domain' => 'pages',
                'label' => 'register.email',
                'attr' => [
                    'class' => 'email'
                ],
            ])
            ->add('emailConfirm', EmailType::class, [
                'required' => true,
                'translation_domain' => 'pages',
                'label' => 'register.emailConfirm',
                'attr' => [
                    'class' => 'emailConfirm'
                ],
            ])
            ->add('password', PasswordType::class, [
                'required' => true,
                'translation_domain' => 'pages',
                'label' => 'register.password',
                'attr' => [
                    'class' => 'password'
                ],
            ])
            ->add('passwordConfirm', PasswordType::class, [
                'required' => true,
                'translation_domain' => 'pages',
                'label' => 'register.passwordConfirm',
                'attr' => [
                    'class' => 'passwordConfirm'
                ],
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => AddUser::class,
        ]);
    }
}
