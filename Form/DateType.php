<?php

namespace Orkestra\Bundle\ApplicationBundle\Form;

use Symfony\Component\Form\Extension\Core\Type\DateType as BaseDateType;
use Orkestra\Common\Type\DateTime;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

/**
 * Handles automatically setting of timezones
 */
class DateType extends BaseDateType
{
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        parent::setDefaultOptions($resolver);
        
        $resolver->setDefaults(array(
            'data_timezone' => DateTime::getServerTimezone()->getName(),
            'user_timezone' => DateTime::getUserTimezone()->getName()
        ));
    }
}
