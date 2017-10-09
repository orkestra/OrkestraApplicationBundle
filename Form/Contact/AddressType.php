<?php

/*
 * This file is part of the OrkestraApplicationBundle package.
 *
 * Copyright (c) Orkestra Community
 *
 * For the full copyright and license information, please view the LICENSE file
 * that was distributed with this source code.
 */

namespace Orkestra\Bundle\ApplicationBundle\Form\Contact;

use Doctrine\ORM\EntityRepository;
use Orkestra\Bundle\ApplicationBundle\Form\PhoneType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AddressType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $countryCode = $options['country_code'];

        $builder
            ->add('phone', PhoneType::class)
            ->add('altPhone', PhoneType::class, array('required' => false, 'label' => 'Alternate Phone'))
            ->add('street')
            ->add('suite', null, array('required' => false))
            ->add('city')
            ->add('postalCode', null, array('label' => 'Zip'))
            ->add('region', null, array(
                'label' => 'State',
                'query_builder' => function(EntityRepository $er) use ($countryCode) {
                    $qb = $er->createQueryBuilder('r')
                        ->where('r.active = true');
                    if (null !== $countryCode) {
                        $qb->join('r.country', 'c')
                            ->andWhere('c.code = :code')
                            ->setParameter('code', $countryCode);
                    }

                    return $qb;
                }
            ))
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'country_code' => 'US',
            'data_class' => 'Orkestra\Bundle\ApplicationBundle\Entity\Contact\Address'
        ));
    }

    public function getBlockPrefix()
    {
        return 'address';
    }
}
