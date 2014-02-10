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
