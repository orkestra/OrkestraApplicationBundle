<?php

namespace Orkestra\Bundle\ApplicationBundle\Form\Contact;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class AddressType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('phone')
            ->add('altPhone', null, array('label' => 'Alternate Phone'))
            ->add('street')
            ->add('suite')
            ->add('city')
            ->add('postalCode')
            ->add('active')
            ->add('region', null, array('label' => 'State'))
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Orkestra\Bundle\ApplicationBundle\Entity\Contact\Address'
        ));
    }

    public function getName()
    {
        return 'orkestra_bundle_applicationbundle_contact_addresstype';
    }
}
