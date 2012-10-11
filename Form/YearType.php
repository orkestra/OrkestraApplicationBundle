<?php

namespace Orkestra\Bundle\ApplicationBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\ChoiceList\SimpleChoiceList;
use Symfony\Component\OptionsResolver\Options;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class YearType extends AbstractType
{
    public function getParent()
    {
        return 'choice';
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $choiceList = function (Options $options) {
            $values = $options['sort_desc'] ? range($options['max'], $options['min']) : range($options['min'], $options['max']);

            return new SimpleChoiceList(array_combine(array_values($values), array_values($values)));
        };

        $resolver->setDefaults(array(
            'sort_desc' => false,
            'min' => '1900',
            'max' => date('Y'),
            'choice_list' => $choiceList,
        ));
    }

    public function getName()
    {
        return 'year';
    }
}
