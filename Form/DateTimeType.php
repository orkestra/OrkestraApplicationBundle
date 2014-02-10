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

use Symfony\Component\Form\Extension\Core\Type\DateTimeType as BaseDateTimeType;
use Orkestra\Common\Type\DateTime;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

/**
 * Handles automatically setting of timezones
 */
class DateTimeType extends BaseDateTimeType
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
