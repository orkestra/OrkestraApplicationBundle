<?php

/*
 * This file is part of the OrkestraApplicationBundle package.
 *
 * Copyright (c) Orkestra Community
 *
 * For the full copyright and license information, please view the LICENSE file
 * that was distributed with this source code.
 */

namespace Orkestra\Bundle\ApplicationBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ChangePasswordType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        if (false !== $options['require_current']) {
            $builder->add('current', 'password', array('label' => 'Current'));
        }

        $builder->add('password', 'repeated', array(
            'type' => 'password',
            'first_options' => array(
                'label' => 'New Password'
            ),
            'second_options' => array(
                'label' => 'Confirm'
            ),
            'invalid_message' => 'The passwords do not match.'
        ));
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'require_current' => true
        ));
    }

    public function getName()
    {
        return 'change_password';
    }
}
