<?php

namespace Orkestra\Bundle\ApplicationBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('username');

        if (false !== $options['include_password']) {
            $builder->add('password', 'password');
        }

        $builder->add('firstName', null, array('label' => 'First Name'))
                ->add('lastName', null, array('label' => 'Last Name'))
                ->add('email', null, array('label' => 'Email Address'))
                ->add('expired', null, array('required' => false))
                ->add('locked', null, array('required' => false))
                ->add('active', null, array('required' => false))
                ->add('groups', null, array('required' => false))
                ->add('preferences', new PreferencesType());
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'include_password' => true,
            'data_class' => 'Orkestra\Bundle\ApplicationBundle\Entity\User',
        ));
    }

    public function getName()
    {
        return 'user';
    }
}
