<?php

namespace Orkestra\Bundle\ApplicationBundle\Form;

use Symfony\Component\Form\Extension\Core\Type\TimeType as BaseTimeType;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Orkestra\Common\Type\DateTime;

/**
 * Handles automatically setting of timezones
 */
class TimeType extends BaseTimeType
{
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        parent::setDefaultOptions($resolver);

        $defaults = array(
            'model_timezone' => DateTime::getServerTimezone()->getName(),
            'view_timezone' => DateTime::getUserTimezone()->getName()
        );

        $resolver->replaceDefaults($defaults);
    }
}
