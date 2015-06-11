<?php
namespace AppBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;


class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('userName')
            ->add('email', 'email')
            ->add('password')
            ->add('save', 'submit')
        ;
    }

    public function getName()
    {
        return 'new_user_form';
    }
}