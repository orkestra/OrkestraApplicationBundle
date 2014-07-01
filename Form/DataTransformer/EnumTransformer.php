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
    protected $_expanded;

    public function __construct($className, $expanded)
    {
        $this->_className = $className;
        $this->_expanded = $expanded;
    }

    public function transform($val)
    {
        if (empty($val)) {
            if ($this->_expanded) {
                return array();
            }
            return '';
        }

        if ($this->_expanded) {
            $transformed = array();
            foreach($val as $enum) {
                $transformed[] = $enum->getValue();
            }
            return $transformed;
        }
        return $val->getValue();
    }

    public function reverseTransform($val)
    {
        if (empty($val)) {
            if ($this->_expanded) {
                return array();
            }
            return null;
        }

        $className = $this->_className;
        if ($this->_expanded) {
            $reverseTransformed = array();
            foreach($val as $enum) {
                $reverseTransformed[] = new $className($enum);
            }
            return $reverseTransformed;
        }

        return new $className($val);
    }
}
