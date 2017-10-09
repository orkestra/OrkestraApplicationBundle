<?php

/*
 * This file is part of the OrkestraApplicationBundle package.
 *
 * Copyright (c) Orkestra Community
 *
 * For the full copyright and license information, please view the LICENSE file
 * that was distributed with this source code.
 */

namespace Orkestra\Bundle\ApplicationBundle\Listener;

use Orkestra\Bundle\ApplicationBundle\Http\JsonRedirectResponse;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpKernel\Event\FilterResponseEvent;

class JsonResponseListener
{
    public function onKernelResponse(FilterResponseEvent $event)
    {
        $request = $event->getRequest();
        $response = $event->getResponse();

        if ($response instanceof RedirectResponse
            && ($request->get('_format') == 'json'
                || 0 < strpos($request->headers->get('accept'), 'application/json')
                || 0 < strpos($request->headers->get('accept'), 'text/javascript'))
        ) {
            $event->setResponse(new JsonRedirectResponse($response->getTargetUrl()));
        }
    }
}
