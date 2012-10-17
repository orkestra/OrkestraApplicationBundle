<?php

namespace Orkestra\Bundle\ApplicationBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Orkestra\Bundle\ApplicationBundle\Entity\User;

/**
 * Loads the database with an initial administrative user
 */
class InitialUserData extends AbstractFixture implements ContainerAwareInterface, OrderedFixtureInterface
{
    /**
     * @var \Symfony\Component\DependencyInjection\ContainerInterface
     */
    private $container;

    /**
     * Load data fixtures with the passed EntityManager
     *
     * @param \Doctrine\Common\Persistence\ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        $userGroup = $this->getReference('user-group');
        $adminGroup = $this->getReference('admin-group');

        $user = new User();
        $user->setFirstName('Administrative');
        $user->setLastName('User');
        $user->setUsername('admin');
        $user->setPassword('password');
        $user->addGroup($userGroup);
        $user->addGroup($adminGroup);

        $factory = $this->container->get('security.encoder_factory');
        $encoder = $factory->getEncoder($user);
        $user->setPassword($encoder->encodePassword($user->getPassword(), $user->getSalt()));

        $manager->persist($user);

        $manager->flush();
    }

    /**
     * Sets the container
     *
     * @param \Symfony\Component\DependencyInjection\ContainerInterface $container
     */
    public function setContainer(ContainerInterface $container = null)
    {
        $this->container = $container;
    }

    /**
     * Get the order of this fixture
     *
     * @return integer
     */
    public function getOrder()
    {
        return 2;
    }
}
