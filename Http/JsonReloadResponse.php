<?php

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
