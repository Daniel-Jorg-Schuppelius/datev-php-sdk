<?php
/*
 * Created on   : Sun Oct 06 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : EndpointTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Contracts;

use APIToolkit\Contracts\Interfaces\API\ApiClientInterface;
use ERRORToolkit\Factories\ConsoleLoggerFactory;
use Datev\API\Desktop\Endpoints\Diagnostics\EchoEndpoint;
use PHPUnit\Framework\TestCase;
use Psr\Log\LoggerInterface;
use Tests\TestAPIClientFactory;

abstract class EndpointTest extends TestCase {
    protected ?LoggerInterface $logger = null;

    protected ?ApiClientInterface $client;

    protected bool $apiDisabled = false;

    public function __construct($name) {
        parent::__construct($name);
        $this->logger = ConsoleLoggerFactory::getLogger();
        $this->client = TestAPIClientFactory::getClient();
    }

    final protected function setUp(): void {
        if (!$this->apiDisabled) {
            try {
                $endpoint = new EchoEndpoint($this->client);
                $echoResponse = $endpoint->get();
                $this->apiDisabled = !$echoResponse->isValid();
            } catch (\Exception $e) {
                error_log("API disabled -> " . $e->getMessage());
                $this->apiDisabled = true;
            }
        }
    }
}
