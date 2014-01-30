<?php

namespace Orkestra\Bundle\ApplicationBundle\Http;

use Symfony\Component\HttpFoundation\JsonResponse;

/**
 * A successful JsonSuccessResponse that will cause the client's browser to reload the  current page
 */
class JsonRedirectResponse extends JsonResponse
{
    public function __construct($path)
    {
        $data = array(
            'type' => 'redirect',
            'redirect' => $path
        );

        parent::__construct($data);
    }
}
