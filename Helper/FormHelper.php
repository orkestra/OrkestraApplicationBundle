<?php

namespace Orkestra\Bundle\ApplicationBundle\Helper;

use Symfony\Component\DependencyInjection\ContainerInterface,
    Symfony\Component\Form\AbstractType;
use Symfony\Component\PropertyAccess\Exception\UnexpectedTypeException;
use Symfony\Component\PropertyAccess\PropertyAccess;

class FormHelper
{
    private $_container;

    private $_types = array();

    public function __construct(ContainerInterface $container)
    {
        $this->_container = $container;
    }

    public function addType($className, AbstractType $type, $property, $value)
    {
        if (empty($property)) {
            $this->_types['defaults'][$className] = $type;
        }
        else {
            $this->_types[$className][$property][$value] = $type;
        }
    }

    public function getTypes()
    {
        return $this->_types;
    }

    public function getDefaultType($entity)
    {
        $className = is_object($entity) ? get_class($entity) : $entity;

        if (!empty($this->_types['defaults'][$className])) {
            return $this->_types['defaults'][$className];
        }

        throw new \RuntimeException(sprintf('Unable to locate FormType for %s: %s', $className, $entity));
    }

    public function getType($entity, $className = null)
    {
        if (!$className) {
            $className = is_object($entity) ? get_class($entity) : $entity;
        }

        if (!empty($this->_types[$className])) {
            foreach ($this->_types[$className] as $property => $values) {
                $value = $this->_parseValue($entity, $property);

                if (is_object($value)) {
                    $value = "{$value}";
                }

                if (!empty($values[$value])) {
                    return $values[$value];
                }
            }
        }

        if (!empty($this->_types['defaults'][$className])) {
            return $this->_types['defaults'][$className];
        }

        throw new \RuntimeException(sprintf('Unable to locate FormType for %s: %s', $className, $entity));
    }

    /**
     * Parse Value
     *
     * Given a starting object, this will split $content into parts and
     * iterate through each part, effectively creating a chained method
     * call.
     *
     * @param object $item
     * @param string $content
     * @return mixed
     */
    protected function _parseValue($item, $content)
    {
        $value = null;
        try {
            $value = PropertyAccess::getPropertyAccessor()->getValue($item, $content);
        } catch (UnexpectedTypeException $e) {
            // Suppress potentially null values
        }

        return $value;
    }
}
