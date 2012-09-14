<?php

namespace Orkestra\Bundle\ApplicationBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class PreferencesType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('timezone', 'choice', array(
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
            ->add('dateFormat', 'choice', array(
                'label' => 'Date Format',
                'choices' => array('Y-m-d' => '2011-12-31', 'm-d-Y' => '12-31-2011', 'm/d/y' => '12/31/2011'),
            ))
            ->add('timeFormat', 'choice', array(
                'label' => 'Time Format',
                'choices' => array('H:i:s' => '16:12:45 (24-hour)', 'h:i:s A' => '04:12:45 PM'),
                'required' => false,
                'empty_value' => 'Hide timestamps',
            ))
        ;
    }

    public function getDefaultOptions(array $options)
    {
        return array(
            'data_class' => 'Orkestra\Bundle\ApplicationBundle\Entity\Preferences',
        );
    }

    public function getName()
    {
        return 'preferences';
    }
}
