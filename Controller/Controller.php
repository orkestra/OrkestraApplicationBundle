<?php

namespace Orkestra\Bundle\ApplicationBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller as ControllerBase;

use Orkestra\Bundle\ApplicationBundle\Component\Listing\ListingOptions,
    Orkestra\Bundle\ApplicationBundle\Component\Listing\Listing;

use Orkestra\Bundle\ApplicationBundle\Component\Report\IReport;

/**
 * Controller
 *
 * Base class for any controller
 */
abstract class Controller extends ControllerBase
{
    /**
     * @var Orkestra\Bundle\ApplicationBundle\Helper\FormHelper
     */
    protected $_formHelper;

    /**
     * Create Listing
     *
     * @param Orkestra\Bundle\ApplicationBundle\Component\Listing\ListingOptions $options
     * @return Orkestra\Bundle\ApplicationBundle\Component\Listing\Listing
     */
    public function createListing(ListingOptions $options)
    {
        return new Listing($this->container, $options);
    }

    /**
     * Get Form Type
     *
     * @param object $entity
     * @param string|null $className
     *
     * @return Symfony\Component\Form\AbstractType
     */
    public function getFormFor($entity, $className = null)
    {
        if (empty($this->_formHelper) && ($this->_formHelper = $this->get('orkestra.form_helper')) == null) {
            throw new \RuntimeException('Orkestra FormHelper is not registered as a service');
        }

        $type = $this->container->get('orkestra.form_helper')->getType($entity, $className);

        return $this->createForm($type, $entity);
    }

    /**
     * Creates a Presentation given a Presenter and Report
     *
     * @param Orkestra\Bundle\ApplicationBundle\Component\Report\IPresenter|string $presenter If a string, an attempt to lookup the presenter will be done
     * @param Orkestra\Bundle\ApplicationBundle\Component\Report\IReport|string $report If a string, an attempt to lookup the report will be done
     *
     * @return Orkestra\Bundle\ApplicationBundle\Component\Report\Presentation
     */
    public function createPresentation($presenter, $report)
    {
        $factory = $this->get('orkestra.report_factory');

        if (!is_object($presenter)) {
            $presenter = $factory->getPresenter($presenter);
        }

        if (!is_object($report)) {
            $report = $factory->getReport($report);
        }

        return $factory->createPresentation($presenter, $report);
    }
}
