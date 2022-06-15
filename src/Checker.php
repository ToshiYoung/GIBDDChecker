<?php

namespace TY\CarChecker;

use GuzzleHttp\Exception\GuzzleException;
use TY\CarChecker\Gibdd\Diagnostic;
use TY\CarChecker\Gibdd\History;
use TY\CarChecker\Gibdd\Restricted;
use TY\CarChecker\Gibdd\Wanted;

class Checker implements CheckerInterface
{
    public function __construct(protected array $car)
    {
    }

    /**
     * @throws GuzzleException
     * @throws Exceptions\ResponseException
     */
    public function history(): array
    {
        return (new History($this->car))->data();
    }

    /**
     * @throws GuzzleException
     * @throws Exceptions\ResponseException
     */
    public function diagnostic(): array
    {
        return (new Diagnostic($this->car))->data();
    }

    /**
     * @throws GuzzleException
     * @throws Exceptions\ResponseException
     */
    public function restricted(): array
    {
        return (new Restricted($this->car))->data();
    }

    /**
     * @throws GuzzleException
     * @throws Exceptions\ResponseException
     */
    public function wanted(): array
    {
        return (new Wanted($this->car))->data();
    }
}