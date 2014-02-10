<?php

/*
 * This file is part of the OrkestraApplicationBundle package.
 *
 * Copyright (c) Orkestra Community
 *
 * For the full copyright and license information, please view the LICENSE file
 * that was distributed with this source code.
 */

namespace Orkestra\Bundle\ApplicationBundle\Listener;

use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\EventDispatcher\EventDispatcher;
use Symfony\Component\EventDispatcher\Event;

use Orkestra\Common\Type\DateTime;
use Orkestra\Common\Type\Date;

use Orkestra\Bundle\ApplicationBundle\Entity\User;

/**
 * Configures the current user's time and date formatting
 */
class UserPreferencesListener
{
    private $container;

    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
    }

    public function onKernelController(Event $event)
    {
        $token = $this->container->get('security.context')->getToken();

        if (!empty($token)) {
            $user = $token->getUser();

            if ($user instanceof User && ($preferences = $user->getPreferences())) {
                DateTime::setUserTimezone(new \DateTimeZone($preferences->getTimezone()));
                $timeFormat = $preferences->getTimeFormat() ? ' ' . $preferences->getTimeFormat() : '';
                DateTime::setDefaultFormat($preferences->getDateFormat() . $timeFormat);
                Date::setDefaultFormat($preferences->getDateFormat());
            }
        }
    }
}

