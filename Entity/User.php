<?php

/*
 * This file is part of the OrkestraApplicationBundle package.
 *
 * Copyright (c) Orkestra Community
 *
 * For the full copyright and license information, please view the LICENSE file
 * that was distributed with this source code.
 */

namespace Orkestra\Bundle\ApplicationBundle\Entity;

use Orkestra\Bundle\ApplicationBundle\Model\GroupInterface;
use Orkestra\Bundle\ApplicationBundle\Model\PreferencesInterface;
use Orkestra\Bundle\ApplicationBundle\Model\UserInterface;
use Symfony\Component\Security\Core\User\AdvancedUserInterface;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Orkestra\Common\Entity\AbstractEntity;

/**
 * User Entity
 *
 * Defines an authenticated user
 *
 * @ORM\Table(name="orkestra_users")
 * @ORM\Entity(repositoryClass="Orkestra\Bundle\ApplicationBundle\Repository\UserRepository")
 */
class User extends AbstractEntity implements UserInterface, AdvancedUserInterface, \Serializable
{
    /**
     * @ORM\Column(name="username", type="string", length=100, unique=true)
     */
    private $username;

    /**
     * @ORM\Column(name="salt", type="string", length=40)
     */
    private $salt;

    /**
     * @ORM\Column(name="password", type="string", length=255)
     */
    private $password;

    /**
     * @ORM\Column(name="first_name", type="string", length=60)
     */
    private $firstName;

    /**
     * @ORM\Column(name="last_name", type="string", length=60)
     */
    private $lastName;

    /**
     * @ORM\Column(name="email", type="string", length=100, unique=true, nullable=true)
     */
    private $email;

    /**
     * @ORM\Column(name="expired", type="boolean")
     */
    private $expired = false;

    /**
     * @ORM\Column(name="locked", type="boolean")
     */
    private $locked = false;

    /**
     * @ORM\ManyToMany(targetEntity="Orkestra\Bundle\ApplicationBundle\Entity\Group", inversedBy="users")
     * @ORM\JoinTable(name="orkestra_user_groups",
     *     joinColumns={@ORM\JoinColumn(name="user_id", referencedColumnName="id")},
     *     inverseJoinColumns={@ORM\JoinColumn(name="group_id", referencedColumnName="id")}
     * )
     */
    private $groups;

    /**
     * @ORM\OneToOne(targetEntity="Orkestra\Bundle\ApplicationBundle\Entity\Preferences", mappedBy="user", cascade={"persist"})
     */
    private $preferences;

    /**
     *
     */
    public function __construct()
    {
        $this->salt = base_convert(sha1(uniqid(mt_rand(), true)), 16, 36);
        $this->groups = new ArrayCollection();
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return sprintf('%s %s', $this->getFirstName(), $this->getLastName());
    }

    /**
     * @param $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param $username
     */
    public function setUsername($username)
    {
        $this->username = $username;
    }

    /**
     * @param $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    /**
     * @param $firstName
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;
    }

    /**
     * @return mixed
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * @param $lastName
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;
    }

    /**
     * @return mixed
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * @param GroupInterface $group
     */
    public function addGroup(GroupInterface $group)
    {
        $this->groups[] = $group;
    }

    /**
     * @param $groups
     */
    public function setGroups($groups)
    {
        if ($groups instanceof Group) {
            $this->groups = new ArrayCollection(array($groups));
        } elseif ($groups === null) {
            $this->groups = new ArrayCollection();
        } elseif (is_array($groups)) {
            $this->groups = new ArrayCollection($groups);
        } else {
            $this->groups = $groups;
        }
    }

    /**
     * @return ArrayCollection
     */
    public function getGroups()
    {
        return $this->groups;
    }

    /**
     * @param GroupInterface $group
     *
     * @return ArrayCollection
     */
    public function removeGroup(GroupInterface $group)
    {
        $this->groups->removeElement($group);

        return $this->groups;
    }

    /**
     * @param PreferencesInterface $preferences
     */
    public function setPreferences(PreferencesInterface $preferences)
    {
        $this->preferences = $preferences;
        $this->preferences->setUser($this);
    }

    /**
     * @return mixed
     */
    public function getPreferences()
    {
        return $this->preferences;
    }

    #region AdvancedUserInterface members

    /**
     * @return array
     */
    public function getRoles()
    {
        return $this->groups->toArray();
    }

    /**
     * @param UserInterface $user
     *
     * @return bool
     */
    public function equals(UserInterface $user)
    {
        return $user->getUsername() === $this->username;
    }

    /**
     *
     */
    public function eraseCredentials()
    {
    }

    /**
     * @return mixed
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @return string
     */
    public function getSalt()
    {
        return $this->salt;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @return bool
     */
    public function isAccountNonExpired()
    {
        return !$this->expired;
    }

    /**
     * @return bool
     */
    public function isAccountNonLocked()
    {
        return !$this->locked;
    }

    /**
     * @return bool
     */
    public function isCredentialsNonExpired()
    {
        return true;
    }

    /**
     * @return bool
     */
    public function isEnabled()
    {
        return $this->active;
    }

    /**
     * @return bool
     */
    public function isExpired()
    {
        return $this->expired;
    }

    /**
     * @return bool
     */
    public function isLocked()
    {
        return $this->locked;
    }

    #endregion

    /**
     * @return string
     */
    public function serialize()
    {
        return \json_encode(array($this->username, $this->id));
    }

    /**
     * @param string $serialized
     */
    public function unserialize($serialized)
    {
        list($this->username, $this->id) = json_decode($serialized);
    }
}
