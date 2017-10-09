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
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ChangePasswordType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        if (false !== $options['require_current']) {
            $builder->add('current', PasswordType::class, array('label' => 'Current'));
        }

        $builder->add('password', RepeatedType::class, array(
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

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'require_current' => true
        ));
    }

    public function getBlockPrefix()
    {
        return 'change_password';
    }
}
