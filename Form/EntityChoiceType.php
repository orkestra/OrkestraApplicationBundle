<?php

/*
 * This file is part of the OrkestraApplicationBundle package.
 *
 * Copyright (c) Orkestra Community
 *
 * For the full copyright and license information, please view the LICENSE file
 * that was distributed with this source code.
 */

namespace Orkestra\Bundle\ApplicationBundle\Form;

use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Bridge\Doctrine\Form\ChoiceList\EntityLoaderInterface;
use Symfony\Bridge\Doctrine\Form\ChoiceList\ORMQueryBuilderLoader;
use Symfony\Bridge\Doctrine\Form\Type\DoctrineType;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EntityChoiceType extends DoctrineType
{
    // TODO might look into deprecating this type. Most if not all functionality is available through EntityType
    public function configureOptions(OptionsResolver $resolver)
    {
        parent::configureOptions($resolver);
    }
    /**
     * Return the default loader object.
     *
     * @param  ObjectManager         $manager
     * @param  mixed                 $queryBuilder
     * @param  string                $class
     * @return EntityLoaderInterface
     */
    public function getLoader(ObjectManager $manager, $queryBuilder, $class)
    {
        return new EntityChoice\ArbitrarySetLoader(
            $queryBuilder
        );
    }

    public function getBlockPrefix()
    {
        return 'entity_choice';
    }
}
