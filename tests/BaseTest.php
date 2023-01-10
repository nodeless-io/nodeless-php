<?php

declare(strict_types=1);

namespace NodelessIO\Tests;

use Dotenv\Dotenv;
use PHPUnit\Framework\TestCase;

class BaseTest extends TestCase
{
    protected string $host;
    protected string $apiKey;
    protected string $nodeUri;
    protected string $storeId;

    public static function setUpBeforeClass(): void
    {
        $dotenv = Dotenv::createImmutable(__DIR__);
        $dotenv->safeLoad();

        if (!isset($_ENV['NODELESS_API_KEY'], $_ENV['NODELESS_HOST'])) {
            throw new \Exception('Missing .env variables');
        }
    }

    protected function setUp(): void
    {
        $this->host = $_ENV['NODELESS_HOST'];
        $this->apiKey = $_ENV['NODELESS_API_KEY'];
    }

    public function testThatAllTheVariablesAreSet(): void
    {
        $this->assertIsString($this->apiKey);
        $this->assertIsString($this->host);

        $this->assertNotEmpty($this->apiKey);
        $this->assertNotEmpty($this->host);
    }
}
