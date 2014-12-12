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

/**
 * A successful JsonSuccessResponse that will cause the client's browser to reload the  current page
 */
class JsonReloadResponse extends JsonSuccessResponse
{
    public function __construct()
    {
        parent::__construct('', false, true);
    }
}
