<?php

namespace Orkestra\Bundle\ApplicationBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class UserType extends AbstractType
{
    protected $_includePassword = true;

    public function __construct($includePassword = true)
    {
        $this->_includePassword = $includePassword;
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('username');

        if ($this->_includePassword) {
            $builder->add('password', 'password');
        }

        $builder->add('firstName', null, array('label' => 'First Name'))
                ->add('lastName', null, array('label' => 'Last Name'))
                ->add('expired', null, array('required' => false))
                ->add('locked', null, array('required' => false))
                ->add('active', null, array('required' => false))
                ->add('groups', null, array('required' => false))
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
        return 'user';
    }
}
