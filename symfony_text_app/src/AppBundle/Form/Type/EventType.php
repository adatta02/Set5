<?php
namespace AppBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;


class EventType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('eventName')
            ->add('user_Id')
            ->add('date', 'date', array(
                'widget' => 'single_text',
                // this is actually the default format for single_text
                'format' => 'yyyy-MM-dd'))
            ->add('twilioNumber')
            ->add('schedule event', 'submit')
        ;
    }

    public function getName()
    {
        return 'new_event_form';
    }
}