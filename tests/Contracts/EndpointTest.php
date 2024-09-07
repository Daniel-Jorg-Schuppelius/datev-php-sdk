<?php

declare(strict_types=1);

namespace Tests\Contracts;

use APIToolkit\Logger\ConsoleLoggerFactory;
use Datev\API\Desktop\ClientBasicAuth;
use PHPUnit\Framework\TestCase;
use Psr\Log\LoggerInterface;
use Tests\TestAPIClientFactory;

abstract class EndpointTest extends TestCase {
    protected ?LoggerInterface $logger = null;

    protected ?ClientBasicAuth $client;

    protected bool $apiDisabled = false;

    public function __construct($name) {
        parent::__construct($name);
        $this->logger = ConsoleLoggerFactory::getLogger();
        $this->client = TestAPIClientFactory::getClient();
    }

    final protected function setUp(): void {
        if (!$this->apiDisabled) {
            // try {
            //     $response = $this->client->get("ping");
            //     $this->apiDisabled = $response->getStatusCode() != 200;
            // } catch (\Exception $e) {
            //     error_log("API disabled -> " . $e->getMessage());
            //     $this->apiDisabled = true;
            // }
        }
    }
}
