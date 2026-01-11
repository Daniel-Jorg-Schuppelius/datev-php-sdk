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
use Datev\API\Desktop\Endpoints\Diagnostics\EchoEndpoint;
use ERRORToolkit\Traits\ErrorLog;
use PHPUnit\Framework\TestCase;
use Tests\TestAPIClientFactory;
use Throwable;

abstract class EndpointTest extends TestCase {
    use ErrorLog;

    protected ?ApiClientInterface $client;

    protected bool $apiDisabled = false;

    public function __construct($name) {
        parent::__construct($name);
        self::setLogger(TestAPIClientFactory::getLogger());
        $this->client = TestAPIClientFactory::getClient();
    }

    final protected function setUp(): void {
        if (!$this->apiDisabled) {
            try {
                $endpoint = new EchoEndpoint($this->client);
                $echoResponse = $endpoint->get();
                $this->apiDisabled = !$echoResponse->isValid();
            } catch (Throwable $e) {
                self::logException($e);
                $this->apiDisabled = true;
            }
        }
    }

    /**
     * Führt einen Test-Callback mit Timer-Logging aus.
     *
     * @template T
     * @param callable(): T $callback
     * @param string $description
     * @return T
     */
    protected function runWithTiming(callable $callback, string $description): mixed {
        return $this->logDebugWithTimer($callback, $description);
    }

    /**
     * Loggt eine Warnung, wenn die Bedingung erfüllt ist.
     */
    protected function warnIf(bool $condition, string $message): void {
        $this->logWarningIf($condition, $message);
    }

    /**
     * Loggt den Wert und gibt ihn zurück - nützlich für Debugging.
     *
     * @template T
     * @param T $value
     * @param string $message
     * @return T
     */
    protected function logAndReturn(mixed $value, string $message): mixed {
        return $this->logDebugAndReturn($value, $message);
    }
}
