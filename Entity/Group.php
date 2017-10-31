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

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Orkestra\Bundle\ApplicationBundle\Model\GroupInterface;
use Orkestra\Bundle\ApplicationBundle\Model\UserInterface;
use Orkestra\Common\Entity\AbstractEntity;
use Symfony\Component\Security\Core\Role\RoleInterface;

/**
 * Group Entity
 *
 * Defines a user group
 *
 * @ORM\Table(name="orkestra_groups")
 * @ORM\Entity
 */
class Group extends AbstractEntity implements RoleInterface, GroupInterface
{
    /**
     * @ORM\Column(name="name", type="string", length=100)
     */
    private $name;

    /**
     * @ORM\Column(name="role", type="string", length=100, unique=true)
     */
    private $role;

    /**
     * @ORM\ManyToMany(targetEntity="Orkestra\Bundle\ApplicationBundle\Entity\User", mappedBy="groups")
     */
    private $users;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->users = new ArrayCollection();
    }

    /**
     * @return mixed
     */
    public function __toString()
    {
        return $this->getName();
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $role
     */
    public function setRole($role)
    {
        $this->role = $role;
    }

    /**
     * @see RoleInterface
     */
    public function getRole()
    {
        return $this->role;
    }

    /**
     * @param UserInterface $user
     */
    public function addUser(UserInterface $user)
    {
        $this->users->add($user);
        $user->addGroup($this);
    }

    /**
     * @return \Doctrine\Common\Collections\Collection|UserInterface[]
     */
    public function getUsers()
    {
        return $this->users;
    }
}
