<?php

/*
 * This file is part of the OrkestraApplicationBundle package.
 *
 * Copyright (c) Orkestra Community
 *
 * For the full copyright and license information, please view the LICENSE file
 * that was distributed with this source code.
 */

namespace Orkestra\Bundle\ApplicationBundle\Helper;

use Symfony\Component\DependencyInjection\ContainerInterface;
use Monolog\Logger;
use Symfony\Component\Templating\EngineInterface;

use Orkestra\Bundle\ApplicationBundle\Entity\EmailTemplate;

/**
 * Mail Helper
 *
 * Provides additional functionality to Swift_Mailer
 */
class MailHelper
{
    /**
     * @var \Symfony\Component\Templating\EngineInterface
     */
    protected $_engine;

    /**
     * @var \Twig_Environment
     */
    protected $_environment;

    /**
     * @var \Twig_LoaderInterface
     */
    protected $_templateLoader;

    /**
     * Constructor
     *
     * @param \Symfony\Component\Templating\EngineInterface $engine
     * @param \Twig_Environment $environment
     */
    public function __construct(EngineInterface $engine, \Twig_Environment $environment)
    {
        $this->_engine = $engine;
        $this->_environment = $environment;

        $this->_templateLoader = new \Twig_Loader_String();
    }

    /**
     * Create Message From Template
     *
     * @param Orkestra\Bundle\ApplicationBundle\Entity\EmailTemplate $template
     * @param array $parameters An array of parameters to pass to the the templating engine
     * @return Swift_Message
     */
    public function createMessageFromTemplate(EmailTemplate $template, array $parameters = array())
    {
        $subject = $this->_render($template->getSubject(), $parameters);
        $recipient = $this->_render($template->getRecipient(), $parameters);
        $body = $this->_render($template->getBody(), $parameters);

        $message = new \Swift_Message($subject, $body, $template->getMimeType());
        $message->setFrom($template->getSender())
                ->setSender($template->getSender())
                ->setTo($recipient);

        if ($template->hasCc()) {
            $message->setCc($template->getCc());
        }

        if ($template->hasAltBody()) {
            $altBody = $this->_render($template->getAltBody(), $parameters);
            $message->addPart($altBody, $template->getAltMimeType());
        }

        return $message;
    }

    protected function _loadTemplate($template)
    {
        $existingLoader = $this->_environment->getLoader();
        $this->_environment->setLoader($this->_templateLoader);

        $template = $this->_environment->loadTemplate($template);

        $this->_environment->setLoader($existingLoader);

        return $template;
    }

    protected function _render($template, $parameters = array())
    {
        return $this->_engine->render($this->_loadTemplate($template), $parameters);
    }
}
