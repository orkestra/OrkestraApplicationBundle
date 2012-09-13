<?php

namespace Orkestra\Bundle\ApplicationBundle\Form;

use Symfony\Component\Form\Extension\Core\Type\DateTimeType as BaseDateTimeType;
use Orkestra\Common\Type\DateTime;

/**
 * Handles automatically setting of timezones
 */
class DateTimeType extends BaseDateTimeType
{
    public function getDefaultOptions(array $options)
    {
        $options = parent::getDefaultOptions($options);

        $options['data_timezone'] = DateTime::getServerTimezone()->getName();
        $options['user_timezone'] = DateTime::getUserTimezone()->getName();

        return $options;
    }
}
