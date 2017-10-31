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

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\ChoiceList\SimpleChoiceList;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\OptionsResolver\Options;
use Symfony\Component\OptionsResolver\OptionsResolver;

class YearType extends AbstractType
{
    public function getParent()
    {
        return ChoiceType::class;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $choiceList = function (Options $options) {
            $values = $options['sort_desc'] ? range($options['max'], $options['min']) : range($options['min'], $options['max']);

            return array_combine(array_values($values), array_values($values));
        };

        $resolver->setDefaults(array(
            'sort_desc' => false,
            'min' => '1900',
            'max' => date('Y'),
            'choices' => $choiceList,
        ));
    }

    public function getBlockPrefix()
    {
        return 'year';
    }
}
