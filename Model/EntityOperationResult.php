<?php

/*
 * This file is part of the OrkestraApplicationBundle package.
 *
 * Copyright (c) Orkestra Community
 *
 * For the full copyright and license information, please view the LICENSE file
 * that was distributed with this source code.
 */

namespace Orkestra\Bundle\ApplicationBundle\Model;

use Doctrine\Common\Persistence\ObjectManager;

/**
 * A resulting set of new or updated entities
 *
 * This class is useful when creating a group of entities without a single
 * entry point, or to allow for explicit control of persisting without using
 * cascade operations.
 */
class EntityOperationResult implements \Iterator, \ArrayAccess, \Countable
{
    /**
     * @var object The root entity, usually the main one created during the operation
     */
    public $root;

    /**
     * @var array
     */
    private $entities = array();

    /**
     * Add an entity to this result
     *
     * @param object $entity
     */
    public function addEntity($entity)
    {
        $this->entities[] = $entity;
    }

    /**
     * Persist all stored entities with the given ObjectManager
     *
     * @param ObjectManager $manager
     */
    public function persist(ObjectManager $manager)
    {
        foreach ($this->entities as $entity) {
            $manager->persist($entity);
        }

        if ($this->root) {
            $manager->persist($this->root);
        }
    }

    /**
     * @param mixed $offset
     *
     * @return bool
     */
    public function offsetExists($offset)
    {
        return isset($this->entities[$offset]);
    }

    /**
     * @param mixed $offset
     *
     * @return mixed|null
     */
    public function offsetGet($offset)
    {
        return $this->offsetExists($offset) ? $this->entities[$offset] : null;
    }

    /**
     * @param mixed $offset
     * @param mixed $value
     */
    public function offsetSet($offset, $value)
    {
        $this->entities[$offset] = $value;
    }

    /**
     * @param mixed $offset
     */
    public function offsetUnset($offset)
    {
        unset($this->entities[$offset]);
    }

    /**
     * @return mixed
     */
    public function current()
    {
        return current($this->entities);
    }

    /**
     * @return mixed
     */
    public function next()
    {
        return next($this->entities);
    }

    /**
     * @return mixed|void
     */
    public function key()
    {
        return key($this->entities);
    }

    /**
     * @return bool
     */
    public function valid()
    {
        return $this->offsetExists(key($this->entities));
    }

    /**
     * @return void
     */
    public function rewind()
    {
        reset($this->entities);
    }

    /**
     * @return int
     */
    public function count()
    {
        return count($this->entities) + (null !== $this->root ? 1 : 0);
    }
}
