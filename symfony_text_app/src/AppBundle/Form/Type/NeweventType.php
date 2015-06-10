<?php
namespace AppBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;


class NewuserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('eventName')
            ->add('userID')
            ->add('date', array(
                'widget' => 'single_text',
                // this is actually the default format for single_text
                'format' => 'yyyy-MM-dd',
                'placeholder' => array('year' => 'Year', 'month' => 'Month', 'day' => 'Day')))
            ->add('twilioNumber')
            ->add('save', 'submit')
        ;
    }

    public function getName()
    {
        return 'task';
    }
}