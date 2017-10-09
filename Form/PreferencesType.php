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
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PreferencesType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('timezone', ChoiceType::class, array(
                'choices' => array(
                    'Etc/GMT' => 'Greenwich Mean Time (Etc/GMT)',
                    'America/Puerto_Rico' => 'Atlantic Standard Time (America/Puerto_Rico)',
                    'America/New_York' => 'Eastern Standard Time (America/New_York)',
                    'America/Chicago' => 'Central Standard Time (America/Chicago)',
                    'America/Boise' => 'Mountain Standard Time (America/Boise)',
                    'America/Los_Angeles' => 'Pacific Standard Time (America/Los_Angeles)',
                    'America/Juneau' => 'Alaska (America/Juneau)',
                    'Pacific/Honolulu' => 'Hawaii (Pacific/Honolulu)',
                ),
            ))
            ->add('dateFormat', ChoiceType::class, array(
                'label' => 'Date Format',
                'choices' => array('Y-m-d' => '2011-12-31', 'm-d-Y' => '12-31-2011', 'm/d/y' => '12/31/2011'),
            ))
            ->add('timeFormat', ChoiceType::class, array(
                'label' => 'Time Format',
                'choices' => array('H:i:s' => '16:12:45 (24-hour)', 'h:i:s A' => '04:12:45 PM'),
                'required' => false,
                'placeholder' => 'Hide timestamps',
            ))
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Orkestra\Bundle\ApplicationBundle\Entity\Preferences',
        ));
    }

    public function getBlockPrefix()
    {
        return 'preferences';
    }
}
