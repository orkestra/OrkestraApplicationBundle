<?php

/*
 * This file is part of the OrkestraApplicationBundle package.
 *
 * Copyright (c) Orkestra Community
 *
 * For the full copyright and license information, please view the LICENSE file
 * that was distributed with this source code.
 */

namespace Orkestra\Bundle\ApplicationBundle\Form\DataTransformer;

use Symfony\Component\Form\DataTransformerInterface;

class EnumTransformer implements DataTransformerInterface
{
    protected $_className;
    protected $_multiple;

    public function __construct($className, $multiple)
    {
        $this->_className = $className;
        $this->_multiple = $multiple;
    }

    public function transform($val)
    {
        if (empty($val)) {
            if ($this->_multiple) {
                return array();
            }
            return '';
        }

        if ($this->_multiple) {
            return $val;
        }
        return $val->getValue();
    }

    public function reverseTransform($val)
    {
        if (empty($val)) {
            if ($this->_multiple) {
                return array();
            }
            return null;
        }

        if ($this->_multiple) {
            return $val;
        }

        $className = $this->_className;
        return new $className($val);
    }
}
