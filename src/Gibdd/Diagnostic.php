<?php

namespace TY\CarChecker\Gibdd;

use GuzzleHttp\Exception\GuzzleException;
use TY\CarChecker\Exceptions\ResponseException;

class Diagnostic extends Api
{
    protected string $method = 'diagnostic';

    /**
     * @throws GuzzleException
     * @throws ResponseException
     */
    public function data(): array
    {
        return $this->request('diagnostic');
    }
}