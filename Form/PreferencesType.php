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
                    'Greenwich Mean Time (Etc/GMT)' =>  'Etc/GMT' ,
                    'Atlantic Standard Time (America/Puerto_Rico)' =>  'America/Puerto_Rico' ,
                    'Eastern Standard Time (America/New_York)' =>  'America/New_York' ,
                    'Central Standard Time (America/Chicago)' =>  'America/Chicago' ,
                    'Mountain Standard Time (America/Boise)' =>  'America/Boise' ,
                    'Pacific Standard Time (America/Los_Angeles)' =>  'America/Los_Angeles' ,
                    'Alaska (America/Juneau)' =>  'America/Juneau' ,
                    'Hawaii (Pacific/Honolulu)' =>  'Pacific/Honolulu' ,
                ),
            ))
            ->add('dateFormat', ChoiceType::class, array(
                'label' => 'Date Format',
                'choices' => array(
                    '2011-12-31' =>  'Y-m-d' ,
                    '12-31-2011' =>  'm-d-Y' ,
                    '12/31/2011' =>  'm/d/y' ,
            )))
            ->add('timeFormat', ChoiceType::class, array(
                'label' => 'Time Format',
                'choices' => array(
                    '16:12:45 (24-hour)' =>  'H:i:s' ,
                    '04:12:45 PM' => 'h:i:s A'
                ),
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
