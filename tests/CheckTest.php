<?php

namespace TY\Tests;

use GuzzleHttp\Exception\GuzzleException;
use PHPUnit\Framework\TestCase;
use TY\CarChecker\Checker;
use TY\CarChecker\Exceptions\ResponseException;

class CheckTest extends TestCase
{
    protected Checker $checker;

    public function setUp(): void
    {
        $this->checker = new Checker(['vin' => 'JHMEJ9330WS008431']);
    }

    /**
     * @throws ResponseException
     * @throws GuzzleException
     */
    public function testGetHistory()
    {
        $data = $this->checker->history();
        $this->assertIsArray($data);
    }

    /**
     * @throws ResponseException
     * @throws GuzzleException
     */
    public function testGetDiagnostic()
    {
        $data = $this->checker->diagnostic();
        $this->assertIsArray($data);
    }

    /**
     * @throws ResponseException
     * @throws GuzzleException
     */
    public function testGetRestricted()
    {
        $data = $this->checker->restricted();
        $this->assertIsArray($data);
    }

    /**
     * @throws ResponseException
     * @throws GuzzleException
     */
    public function testGetWanted()
    {
        $data = $this->checker->wanted();
        $this->assertIsArray($data);
    }
}