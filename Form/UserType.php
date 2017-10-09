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
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('username');

        if (false !== $options['include_password']) {
            $builder->add('password', PasswordType::class);
        }

        $builder->add('firstName', TextType::class, array('label' => 'First Name'))
                ->add('lastName', TextType::class, array('label' => 'Last Name'))
                ->add('email', TextType::class, array('label' => 'Email Address'))
                ->add('expired', TextType::class, array('required' => false))
                ->add('locked', TextType::class, array('required' => false))
                ->add('active', TextType::class, array('required' => false))
                ->add('groups', TextType::class, array('required' => false))
                ->add('preferences', PreferencesType::class);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'include_password' => true,
            'data_class' => 'Orkestra\Bundle\ApplicationBundle\Entity\User',
        ));
    }

    public function getBlockPrefix()
    {
        return 'user';
    }
}
