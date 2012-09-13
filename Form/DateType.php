<?php

namespace Orkestra\Bundle\ApplicationBundle\Form;

use Symfony\Component\Form\Extension\Core\Type\DateType as BaseDateType;
use Orkestra\Common\Type\DateTime;

/**
 * Handles automatically setting of timezones
 */
class DateType extends BaseDateType
{
    public function getDefaultOptions(array $options)
    {
        $options = parent::getDefaultOptions($options);

        $options['data_timezone'] = DateTime::getServerTimezone()->getName();
        $options['user_timezone'] = DateTime::getUserTimezone()->getName();

        return $options;
    }
}
