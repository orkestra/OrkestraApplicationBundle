<?php

namespace Orkestra\Bundle\ApplicationBundle\Entity;

use Symfony\Component\Security\Core\User\AdvancedUserInterface,
    Symfony\Component\Security\Core\User\UserInterface,
    Doctrine\Common\Collections\ArrayCollection,
    Doctrine\ORM\Mapping as ORM;

use Orkestra\Common\Entity\AbstractEntity;

/**
 * User Entity
 *
 * Defines an authenticated user
 *
 * @ORM\Table(name="orkestra_users")
 * @ORM\Entity(repositoryClass="Orkestra\Bundle\ApplicationBundle\Repository\UserRepository")
 */
class User extends AbstractEntity implements AdvancedUserInterface
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

    public function __construct()
    {
        $this->salt = base_convert(sha1(uniqid(mt_rand(), true)), 16, 36);
        $this->groups = new ArrayCollection();
    }

    public function __toString()
    {
        return sprintf('%s %s', $this->getFirstName(), $this->getLastName());
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setUsername($username)
    {
        $this->username = $username;
    }

    public function setPassword($password)
    {
        $this->password = $password;
    }

    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;
    }

    public function getFirstName()
    {
        return $this->firstName;
    }

    public function setLastName($lastName)
    {
        $this->lastName = $lastName;
    }

    public function getLastName()
    {
        return $this->lastName;
    }

    public function addGroup(Group $group)
    {
        $this->groups[] = $group;
    }

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

    public function getGroups()
    {
        return $this->groups;
    }

    public function removeGroup(Group $group)
    {
        $this->groups->removeElement($group);
        return $this->groups;
    }


    public function getPreferences()
    {
        if (empty($this->preferences)) {
            $this->preferences = new Preferences();
            $this->preferences->setUser($this);
        }

        return $this->preferences;
    }

    #region AdvancedUserInterface members

    public function getRoles()
    {
        return $this->groups->toArray();
    }

    public function equals(UserInterface $user)
    {
        return $user->getUsername() === $this->username;
    }

    public function eraseCredentials()
    {
    }

    public function getUsername()
    {
        return $this->username;
    }

    public function getSalt()
    {
        return $this->salt;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function isAccountNonExpired()
    {
        return !$this->expired;
    }

    public function isAccountNonLocked()
    {
        return !$this->locked;
    }

    public function isCredentialsNonExpired()
    {
        return true;
    }

    public function isEnabled()
    {
        return $this->active;
    }

    public function isExpired()
    {
        return $this->expired;
    }

    public function isLocked()
    {
        return $this->locked;
    }

    #endregion
}
