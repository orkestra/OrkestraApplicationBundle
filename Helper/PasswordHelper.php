<?php

namespace Orkestra\Bundle\ApplicationBundle\Helper;

use EPK\Bundle\ApplicationBundle\Helper\HashedEntityHelper;
use Orkestra\Bundle\ApplicationBundle\Entity\HashedEntity;
use Orkestra\Bundle\ApplicationBundle\Entity\User;

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
     * @param $hash
     * @return HashedEntity | null
     */
    public function lookup($hash)
    {
        try {
            return $this->hashedEntityHelper->lookup($hash, 'Orkestra\Bundle\ApplicationBundle\Entity\User');
            
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
    public function sendPasswordResetEmail(User $user, $subject = 'Password reset request')
    {
        $hashedEntity = $this->createHash($user);
        $this->emailHelper->createAndSendMessageFromTemplate(
            'EPKApplicationBundle:Auth/PasswordSet:setEmail.html.twig',
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
    private function createHash(User $user)
    {
        $hashedEntity = $this->hashedEntityHelper->create($user, new \DateTime('+1 day'));

        return $hashedEntity;
    }
}
