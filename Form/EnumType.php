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
use Symfony\Component\OptionsResolver\Options;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\Form\FormBuilderInterface;

use Orkestra\Bundle\ApplicationBundle\Form\DataTransformer\EnumTransformer;

class EnumType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->addModelTransformer(new EnumTransformer($options['enum'], $options['multiple']));
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $choiceList = function (Options $options) {
            $reflected = new \ReflectionClass($options['enum']);
            $values = $reflected->getConstants();
            if (!empty($options['exclude'])) {
                $exclude = !is_array($options['exclude']) ? array($options['exclude']) : $options['exclude'];
                $values = array_filter($values, function($value) use ($exclude) {
                    return !in_array($value, $exclude);
                });
            }
            $values = array_combine(array_values($values), array_values($values));
            foreach ($options['labels'] as $value => $label) {
                if (!empty($values[$value])) {
                    $values[$value] = $label;
                }
            }

            return new SimpleChoiceList($values);
        };

        $resolver->setRequired(array(
            'enum'
        ));

        $resolver->setOptional(array(
            'exclude',
            'labels'
        ));

        $resolver->setDefaults(array(
            'choice_list' => $choiceList,
            'exclude' => array(),
            'labels' => array()
        ));
    }

    public function getParent()
    {
        return 'choice';
    }

    public function getName()
    {
        return 'enum';
    }
}
