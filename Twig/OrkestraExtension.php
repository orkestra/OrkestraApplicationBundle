<?php

namespace Orkestra\Bundle\ApplicationBundle\Twig;

use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Adds useful functionality to Twig
 *
 * @author Tyler Sommer <sommertm@gmail.com>
 */
class OrkestraExtension extends \Twig_Extension
{
    /**
     * @var \Symfony\Component\DependencyInjection\ContainerInterface
     */
    protected $container;

    /**
     * @var string
     */
    protected $controller;

    /**
     * @var string
     */
    protected $action;

    private $request;

    /**
     * @return array
     */
    public function getFunctions()
    {
        return array(
            'current_controller' => new \Twig_Function_Method($this, 'getController'),
            'current_action'     => new \Twig_Function_Method($this, 'getAction'),
            'is_currently_on'    => new \Twig_Function_Method($this, 'isCurrentlyOn'),
            'is_current_route'   => new \Twig_Function_Method($this, 'isCurrentRoute'),
        );
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'orkestra_extension';
    }

    /**
     * @param \Symfony\Component\DependencyInjection\ContainerInterface $container
     */
    public function setContainer(ContainerInterface $container)
    {
        $this->container = $container;
        if ($this->container->isScopeActive('request')) {
            $this->request = $this->container->get('request');
        }
    }

    /**
     * Returns true if the user is currently on the given controller(s)
     *
     * @param string|array $controllers
     *
     * @return bool
     */
    public function isCurrentlyOn($controllers)
    {
        $controllers = is_array($controllers) ? $controllers : array($controllers);

        foreach ($controllers as $controller) {
            if ($this->getController() == $controller) {
                return true;
            }
        }

        return false;
    }

    /**
     * Returns true if the given route matches the current route
     *
     * @param string $route
     *
     * @return bool
     */
    public function isCurrentRoute($route)
    {
        return $route === $this->getCurrentRequest()->get('_route');
    }

    /**
     * @return string
     */
    public function getController()
    {
        // TODO Check if request is the same as it was so that the controller gets changed
        if (!$this->controller) {
            $pattern = "#Controller\\\([a-zA-Z\\\\]*)Controller#";
            $matches = array();
            preg_match($pattern, $this->getCurrentRequest()->get('_controller'), $matches);

            $this->controller = isset($matches[1]) ? $matches[1] : null;
        }

        return $this->controller;
    }

    /**
     * @return string
     */
    public function getAction()
    {
        if (!$this->action) {
            $pattern = "#::([a-zA-Z]*)Action#";
            $matches = array();
            preg_match($pattern, $this->getCurrentRequest()->get('_controller'), $matches);

            $this->action = isset($matches[1]) ? $matches[1] : null;
        }

        return $this->action;
    }

    /**
     * @return \Symfony\Component\HttpFoundation\Request
     */
    protected function getCurrentRequest()
    {
        if (!$this->request) {
            if ($this->container->isScopeActive('request')) {
                $this->request = $this->container->get('request');
            } else {
                throw new \RuntimeException('Unable to get "request" service');
            }
        }

        return $this->request;
    }
}
