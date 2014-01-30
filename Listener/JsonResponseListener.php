<?php

namespace Terramar\Bundle\ApplicationBundle\Listener;

use Symfony\Component\HttpKernel\Event\FilterResponseEvent;
use Terramar\Bundle\ApplicationBundle\Http\JsonRedirectResponse;
use Symfony\Component\HttpFoundation\RedirectResponse;

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
