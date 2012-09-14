<?php

namespace Orkestra\Bundle\ApplicationBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class ProfileType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('username')
            ->add('firstName', null, array('label' => 'First Name'))
            ->add('lastName', null, array('label' => 'Last Name'))
            ->add('preferences', new PreferencesType());
    }

    public function getDefaultOptions(array $options)
    {
        return array(
            'data_class' => 'Orkestra\Bundle\ApplicationBundle\Entity\User',
        );
    }

    public function getName()
    {
        return 'profile';
    }
}
