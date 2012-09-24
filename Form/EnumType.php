<?php

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
        $builder->appendNormTransformer(new EnumTransformer($options['enum']));
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $choiceList = function (Options $options) {
            $reflected = new \ReflectionClass($options['enum']);
            $values = $reflected->getConstants();
            $values = array_combine(array_values($values), array_values($values));

            return new SimpleChoiceList($values);
        };

        $resolver->setRequired(array(
            'enum'
        ));

        $resolver->setDefaults(array(
            'choice_list' => $choiceList,
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
