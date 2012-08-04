<?php

namespace JeffreyDD\OpkomstAppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

class MeetingType extends AbstractType
{
    public function buildForm(FormBuilder $builder, array $options)
    {
        $builder
            ->add('title')
            ->add('description')
            ->add('meetingtype')
            ->add('date')
        ;
    }

    public function getName()
    {
        return 'jeffreydd_opkomstappbundle_meetingtype';
    }
}
