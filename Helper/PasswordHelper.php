<?php

/*
 * This file is part of the OrkestraApplicationBundle package.
 *
 * Copyright (c) Orkestra Community
 *
 * For the full copyright and license information, please view the LICENSE file
 * that was distributed with this source code.
 */

namespace Orkestra\Bundle\ApplicationBundle\Helper;

use Orkestra\Bundle\ApplicationBundle\Entity\HashedEntity;
use Orkestra\Bundle\ApplicationBundle\Model\UserInterface;

class PasswordHelper
{
    /**
     * @var HashedEntityHelper
     */
    private $hashedEntityHelper;

    /**
     * @var EmailHelper
     */
    private $emailHelper;

    /**
     * Constructor
     * 
     * @param EmailHelper        $emailHelper
     * @param HashedEntityHelper $hashedEntityHelper
     */
    public function __construct(
        EmailHelper $emailHelper,  
        HashedEntityHelper $hashedEntityHelper
    ) {
        $this->emailHelper = $emailHelper;
        $this->hashedEntityHelper = $hashedEntityHelper;
    }

    /**
     * Looks up a user with the given hash
     *
     * @param string $hash
     * @param string $className
     * @return null|HashedEntity
     */
    public function lookup($hash, $className = 'Orkestra\Bundle\ApplicationBundle\Entity\User')
    {
        try {
            return $this->hashedEntityHelper->lookup($hash, $className);
            
        } catch (\RuntimeException $e) {
            return null;
        }
    }

    /**
     * Sends password reset message to the user
     *
     * @param User $user
     * @param      $subject
     *
     * @return HashedEntity
     */
    public function sendPasswordResetEmail(UserInterface $user, $subject = 'Password reset request')
    {
        $hashedEntity = $this->createHash($user);
        $this->emailHelper->createAndSendMessageFromTemplate(
            'OrkestraApplicationBundle:Email:setPassword.html.twig',
            array(
                'user' => $user,
                'hash' => $hashedEntity->getHash()
            ),
            $subject,
            $user->getEmail()
        );

        return $hashedEntity;
    }

    /**
     * @param User $user
     * @return HashedEntity
     */
    private function createHash(UserInterface $user)
    {
        $hashedEntity = $this->hashedEntityHelper->create($user, new \DateTime('+1 day'));

        return $hashedEntity;
    }
}
