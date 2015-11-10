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

use Orkestra\Bundle\ApplicationBundle\Entity\EmailTemplate;

interface EmailHelperInterface
{
    /**
     * Create Message from an EmailTemplate entity
     *
     * @param \Orkestra\Bundle\ApplicationBundle\Entity\EmailTemplate $template
     * @param array $parameters An array of parameters to pass to the the templating engine
     * @return mixed
     */
    public function createMessageFromTemplateEntity(EmailTemplate $template, array $parameters = array());

    /**
     * Create Message from a file-based template
     *
     * @param string $template
     * @param string $params
     * @param string $subject
     * @param string $recipient
     * @param string|null $sender
     *
     * @return mixed
     */
    public function createMessageFromTemplateFile($template, $params, $subject, $recipient, $sender = null);

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
    public function createAndSendMessageFromTemplate();
}
