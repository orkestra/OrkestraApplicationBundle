<?php

/*
 * This file is part of the OrkestraApplicationBundle package.
 *
 * Copyright (c) Orkestra Community
 *
 * For the full copyright and license information, please view the LICENSE file
 * that was distributed with this source code.
 */

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
