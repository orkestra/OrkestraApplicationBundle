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
