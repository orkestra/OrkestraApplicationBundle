<?php

namespace Orkestra\Bundle\ApplicationBundle\Http;

use Symfony\Component\HttpFoundation\JsonResponse;

/**
 * A successful JsonSuccessResponse tailored to the Orkestra client side library
 */
class JsonSuccessResponse extends JsonResponse
{
    /**
     * Constructor
     *
     * @param string $message
     * @param bool   $redirect
     * @param bool   $reload
     */
    public function __construct($message = '', $redirect = false, $reload = false)
    {
        $type = true === $redirect
            ? 'redirect'
            : (true === $reload ? 'reload' : 'success');

        $data = array(
            'successful' => true,
            'type'    => $type,
            'message' => $message
        );

        parent::__construct($data);
    }
}
