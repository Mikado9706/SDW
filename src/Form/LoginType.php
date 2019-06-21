<?php
namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class LoginType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('username', TextType::class, [
                'label' => 'Identifiant',
                'type' => 'email',
                'name' => 'email',
                'id' => 'inputEmail',
                'placeholder' => 'Email'
            ])
            ->add('password', PasswordType::class, [
                'label' => 'Mot de passe',
                'type' => 'password',
                'name' => 'password',
                'id' => 'inputPassword',
                'placeholder' => 'Password'
            ])
            ->add('search', SubmitType::class, [
                'label' => "Se connecter",
                'type' => 'submit',
                'attr' => [
                    'class' => 'btn waves-effect waves-light white validationForm'
                    ]
                ])
        ;
    }
}