<?php

namespace Orkestra\Bundle\ApplicationBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Orkestra\Bundle\ApplicationBundle\Entity\Group;

/**
 * Loads default group data
 */
class GroupData extends AbstractFixture implements OrderedFixtureInterface
{
    /**
     * Load data fixtures with the passed EntityManager
     *
     * @param \Doctrine\Common\Persistence\ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        // Normal user
        $group = new Group();
        $group->setName('User');
        $group->setRole('ROLE_USER');
        $manager->persist($group);
        $this->addReference('user-group', $group);

        // Administrator
        $group = new Group();
        $group->setName('Administrator');
        $group->setRole('ROLE_ADMIN');
        $manager->persist($group);
        $this->addReference('admin-group', $group);

        $manager->flush();
    }

    /**
     * Get the order of this fixture
     *
     * @return integer
     */
    public function getOrder()
    {
        return 1;
    }
}
