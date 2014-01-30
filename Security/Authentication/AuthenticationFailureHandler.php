<?php

namespace Orkestra\Bundle\ApplicationBundle\Security\Authentication;

use Orkestra\Bundle\ApplicationBundle\Http\JsonErrorResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Exception\AuthenticationException;
use Symfony\Component\Security\Http\Authentication\DefaultAuthenticationFailureHandler;

/**
 * Supports the client side JsonResponse API
 */
class AuthenticationFailureHandler extends DefaultAuthenticationFailureHandler
{
    /**
     * {@inheritDoc}
     */
    public function onAuthenticationFailure(Request $request, AuthenticationException $exception)
    {
        if (($request->get('_format') == 'json'
            || 0 < strpos($request->headers->get('accept'), 'application/json')
            || 0 < strpos($request->headers->get('accept'), 'text/javascript'))
        ) {
            return new JsonErrorResponse('Authentication failed. Please try again.');
        }

        return parent::onAuthenticationFailure($request, $exception);
    }
}
