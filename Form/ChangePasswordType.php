<?php

namespace Orkestra\Bundle\ApplicationBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class ChangePasswordType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('current', 'password', array('label' => 'Current'))
            ->add('password', 'password', array('label' => 'New Password'))
            ->add('confirm', 'password', array('label' => 'Confirm'));
    }

    public function getName()
    {
        return 'change_password';
    }
}