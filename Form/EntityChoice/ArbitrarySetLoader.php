<?php

/*
 * This file is part of the OrkestraApplicationBundle package.
 *
 * Copyright (c) Orkestra Community
 *
 * For the full copyright and license information, please view the LICENSE file
 * that was distributed with this source code.
 */

namespace Orkestra\Bundle\ApplicationBundle\Form\EntityChoice;

use Doctrine\Common\Collections\Collection;
use Symfony\Bridge\Doctrine\Form\ChoiceList\EntityLoaderInterface;
use Symfony\Component\Form\Exception\UnexpectedTypeException;
use Symfony\Component\PropertyAccess\PropertyAccess;

class ArbitrarySetLoader implements EntityLoaderInterface
{
    protected $entities;

    /**
     * @param \Closure $setClosure
     */
    public function __construct($setClosure)
    {
        if ($setClosure instanceof \Closure) {
            $this->entities = $setClosure();
        } elseif (is_array($setClosure) || $setClosure instanceof Collection) {
            $this->entities = $setClosure;
        } else {
            throw new UnexpectedTypeException($setClosure, '\Closure');
        }
    }

    /**
     * Returns an array of entities that are valid choices in the corresponding choice list.
     *
     * @return array The entities.
     */
    public function getEntities()
    {
        return $this->entities;
    }

    /**
     * Returns an array of entities matching the given identifiers.
     *
     * @param string $identifier The identifier field of the object. This method
     *                           is not applicable for fields with multiple
     *                           identifiers.
     * @param array $values The values of the identifiers.
     *
     * @return array The entities.
     */
    public function getEntitiesByIds($identifier, array $values)
    {
        $accessor = PropertyAccess::createPropertyAccessor();
        return array_filter(is_array($this->entities) ? $this->entities : $this->entities->toArray(), function ($entity) use ($identifier, $values, $accessor) {
            return in_array($accessor->getValue($entity, $identifier), $values);
        });
    }
}
