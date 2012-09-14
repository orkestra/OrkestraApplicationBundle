<?php

namespace Orkestra\Bundle\ApplicationBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

use Orkestra\Bundle\ApplicationBundle\Form\DataTransformer\EnumTransformer;

class EnumType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->appendNormTransformer(new EnumTransformer($options['enum']));
    }

    public function getDefaultOptions(array $options)
    {
        $reflected = new \ReflectionClass($options['enum']);
        $values = $reflected->getConstants();
        $values = array_combine(array_values($values), array_values($values));

        return array(
            'enum' => null,
            'choices' => $values
        );
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
