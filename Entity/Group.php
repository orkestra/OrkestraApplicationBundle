<?php

namespace Orkestra\Bundle\ApplicationBundle\Entity;

use Symfony\Component\Security\Core\Role\RoleInterface,
    Doctrine\Common\Collections\ArrayCollection,
    Doctrine\ORM\Mapping as ORM;

use Orkestra\Common\Entity\AbstractEntity,
    Orkestra\Bundle\ApplicationBundle\Entity\User;

/**
 * Group Entity
 *
 * Defines a user group
 *
 * @ORM\Table(name="orkestra_groups")
 * @ORM\Entity
 */
class Group extends AbstractEntity implements RoleInterface
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

    public function __construct()
    {
        $this->users = new ArrayCollection();
    }

    public function __toString()
    {
        return $this->getName();
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getName()
    {
        return $this->name;
    }

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

    public function addUser(User $user)
    {
        $this->users->add($user);
        $user->addGroup($this);
    }

    public function getUsers()
    {
        return $this->users;
    }
}
