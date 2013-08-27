<?php

namespace Orkestra\Bundle\ApplicationBundle\Form\EntityChoice;

use Symfony\Bridge\Doctrine\Form\ChoiceList\EntityLoaderInterface;
use Symfony\Component\Form\Util\PropertyPath;
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
        $accessor = PropertyAccess::getPropertyAccessor();
        return array_filter($this->entities->toArray(), function ($entity) use ($identifier, $values, $accessor) {
            return in_array($accessor->getValue($entity, $identifier), $values);
        });
    }
}
