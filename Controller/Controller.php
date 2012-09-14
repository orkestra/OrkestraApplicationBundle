<?php

namespace Orkestra\Bundle\ApplicationBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller as ControllerBase;

/**
 * Controller
 *
 * Base class for any controller
 */
abstract class Controller extends ControllerBase
{
    /**
     * @var \Orkestra\Bundle\ApplicationBundle\Helper\FormHelper
     */
    protected $_formHelper;

    /**
     * Get Form Type
     *
     * @param object $entity
     * @param string|null $className
     *
     * @throws \RuntimeException
     * @return \Symfony\Component\Form\AbstractType
     */
    public function getFormFor($entity, $className = null)
    {
        if (empty($this->_formHelper) && ($this->_formHelper = $this->get('orkestra.form_helper')) == null) {
            throw new \RuntimeException('Orkestra FormHelper is not registered as a service');
        }

        $type = $this->container->get('orkestra.form_helper')->getType($entity, $className);

        return $this->createForm($type, $entity);
    }
}
