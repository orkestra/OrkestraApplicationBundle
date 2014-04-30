<?php

/*
 * This file is part of the OrkestraApplicationBundle package.
 *
 * Copyright (c) Orkestra Community
 *
 * For the full copyright and license information, please view the LICENSE file
 * that was distributed with this source code.
 */

namespace Orkestra\Bundle\ApplicationBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller as BaseController;

/**
 * Base class for any controller
 */
abstract class Controller extends BaseController
{
    /**
     * @var \Orkestra\Bundle\ApplicationBundle\Helper\FormHelper
     */
    protected $_formHelper;

    /**
     * Get Form Type
     *
     * @param object      $entity
     * @param string|null $className If the object being passed is a subclass,
     *    specify the superclass that should be used to find the form type.
     * @param array $options
     *
     * @throws \RuntimeException
     * @return \Symfony\Component\Form\AbstractType
     */
    public function getFormFor($entity, $className = null, array $options = array())
    {
        if (empty($this->_formHelper) && ($this->_formHelper = $this->get('orkestra.application.helper.form')) == null) {
            throw new \RuntimeException('Orkestra FormHelper is not registered as a service');
        }

        $type = $this->container->get('orkestra.application.helper.form')->getType($entity, $className);

        return $this->createForm($type, $entity, $options);
    }

    /**
     * Gets the session container
     *
     * @return \Symfony\Component\HttpFoundation\Session\SessionInterface|\Symfony\Component\HttpFoundation\Session\Session
     */
    public function getSession()
    {
        return $this->get('session');
    }

    /**
     * Gets the repository for the given class
     *
     * @param string $className
     *
     * @return \Doctrine\Common\Persistence\ObjectRepository
     */
    public function getRepository($className)
    {
        return $this->getDoctrine()->getManagerForClass($className)->getRepository($className);
    }
}
