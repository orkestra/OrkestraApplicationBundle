<?php

namespace Orkestra\Bundle\ApplicationBundle\Form\DataTransformer;

use Symfony\Component\Form\Exception\TransformationFailedException;
use Symfony\Component\Form\DataTransformerInterface;

class EnumTransformer implements DataTransformerInterface
{
    protected $_className;

    public function __construct($className)
    {
        $this->_className = $className;
    }

    public function transform($val)
    {
        if (empty($val)) {
            return '';
        }

        return $val->getValue();
    }

    public function reverseTransform($val)
    {
        if (!$val) {
            return null;
        }

        $className = $this->_className;

        return new $className($val);
    }
}
