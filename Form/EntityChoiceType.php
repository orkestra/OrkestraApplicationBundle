<?php

namespace Orkestra\Bundle\ApplicationBundle\Form;

use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Bridge\Doctrine\Form\Type\DoctrineType;
use Symfony\Bridge\Doctrine\Form\ChoiceList\ORMQueryBuilderLoader;

class EntityChoiceType extends DoctrineType
{
    /**
     * Return the default loader object.
     *
     * @param  ObjectManager         $manager
     * @param  mixed                 $queryBuilder
     * @param  string                $class
     * @return ORMQueryBuilderLoader
     */
    public function getLoader(ObjectManager $manager, $queryBuilder, $class)
    {
        return new EntityChoice\ArbitrarySetLoader(
            $queryBuilder
        );
    }

    public function getName()
    {
        return 'entity_choice';
    }
}
