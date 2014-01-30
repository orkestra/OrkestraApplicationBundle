<?php

namespace Orkestra\Bundle\ApplicationBundle\Helper;

use Symfony\Component\DependencyInjection\ContainerInterface;
use Monolog\Logger;
use Symfony\Component\Templating\EngineInterface;

use Orkestra\Bundle\ApplicationBundle\Entity\EmailTemplate;

/**
 * Provides additional functionality to Swift_Mailer
 */
class EmailHelper
{
    /**
     * @var \Symfony\Component\Templating\EngineInterface
     */
    protected $templating;

    /**
     * @var \Twig_Environment
     */
    protected $environment;

    /**
     * @var \Twig_LoaderInterface
     */
    protected $templateLoader;

    /**
     * @var \Swift_Mailer
     */
    protected $mailer;

    /**
     * @var string
     */
    protected $defaultSender;

    /**
     * Constructor
     *
     * @param \Symfony\Component\Templating\EngineInterface $engine
     * @param \Twig_Environment                             $environment
     * @param \Swift_Mailer                                 $mailer
     * @param string                                        $defaultSender
     */
    public function __construct(EngineInterface $engine, \Twig_Environment $environment, \Swift_Mailer $mailer, $defaultSender)
    {
        $this->templating = $engine;
        $this->environment = $environment;
        $this->mailer = $mailer;
        $this->defaultSender = $defaultSender;
        
        $this->templateLoader = new \Twig_Loader_String();
    }

    /**
     * Create Message from an EmailTemplate entity
     *
     * @param \Orkestra\Bundle\ApplicationBundle\Entity\EmailTemplate $template
     * @param array $parameters An array of parameters to pass to the the templating engine
     * @return \Swift_Message
     */
    public function createMessageFromTemplateEntity(EmailTemplate $template, array $parameters = array())
    {
        $subject = $this->renderStringTemplate($template->getSubject(), $parameters);
        $recipient = $this->renderStringTemplate($template->getRecipient(), $parameters);
        $body = $this->renderStringTemplate($template->getBody(), $parameters);
        $sender = $template->getSender() ?: $this->defaultSender;

        $message = new \Swift_Message($subject, $body, $template->getMimeType());
        $message->setFrom($sender)
                ->setSender($sender)
                ->setTo($recipient);

        if ($template->hasCc()) {
            $message->setCc($template->getCc());
        }

        if ($template->hasAltBody()) {
            $altBody = $this->renderStringTemplate($template->getAltBody(), $parameters);
            $message->addPart($altBody, $template->getAltMimeType());
        }

        return $message;
    }

    /**
     * Create Message from a file-based template
     * 
     * @param string      $template
     * @param string      $params
     * @param string      $subject
     * @param string      $recipient
     * @param string|null $sender
     *
     * @return \Swift_Message
     */
    public function createMessageFromTemplateFile($template, $params, $subject, $recipient, $sender = null)
    {
        $body = $this->templating->render($template, $params);

        if (!$sender) {
            $sender = $this->defaultSender;
        }

        $message = new \Swift_Message();
        $message->setFrom($sender)
            ->setReplyTo($sender)
            ->setTo($recipient)
            ->setSubject($subject)
            ->setBody($body, 'text/html');
        return $message;
    }

    /**
     * This method creates and sends an email message using the given template
     * 
     * One of two signatures:
     * 
     * function(EmailTemplate $template, array $parameters = array())
     * function($template, $params, $subject, $recipient, $sender = null)
     * 
     * @return bool
     * @throws \RuntimeException
     */
    public function createAndSendMessageFromTemplate()
    {
        $args = func_get_args();
        if (empty($args[0])) {
            throw new \RuntimeException('First parameter must be a template filename or EmailTemplate entity');
            
        } elseif ($args[0] instanceof EmailTemplate) {
            $method = 'createMessageFromTemplateEntity';
            
        } else {
            $method = 'createMessageFromTemplateFile';
        }
        
        $message = call_user_func_array(array($this, $method), $args);
        $this->mailer->send($message);

        return true;
    }

    /**
     * Renders a string template
     * 
     * @param       $template
     * @param array $parameters
     *
     * @return string
     */
    protected function renderStringTemplate($template, $parameters = array())
    {
        $existingLoader = $this->environment->getLoader();
        $this->environment->setLoader($this->templateLoader);

        $template = $this->environment->loadTemplate($template);

        $this->environment->setLoader($existingLoader);
        
        return $this->templating->render($template, $parameters);
    }
}
