<?php

declare(strict_types=1);

namespace Datev\Contracts\Abstracts\API;

use Datev\Contracts\Interfaces\API\ApiClientInterface;
use Datev\Exceptions\ApiException;
use Psr\Log\LoggerInterface;
use GuzzleHttp\Client as HttpClient;
use Datev\Exceptions\BadRequestException;
use Datev\Exceptions\ConflictException;
use Datev\Exceptions\ForbiddenException;
use Datev\Exceptions\NotAcceptableException;
use Datev\Exceptions\NotAllowedException;
use Datev\Exceptions\NotFoundException;
use Datev\Exceptions\PaymentRequiredException;
use Datev\Exceptions\TooManyRequestsException;
use Datev\Exceptions\UnauthorizedException;
use Datev\Exceptions\UnsupportedMediaTypeException;
use Psr\Http\Message\ResponseInterface;

abstract class ClientAbstract implements ApiClientInterface {
    public const MIN_INTERVAL = 0.5;
    protected bool $sleepAfterRequest;
    protected float $lastRequestTime = 0.0;
    protected float $requestInterval = 0.65;

    protected HttpClient $client;
    protected ?LoggerInterface $logger;

    public function __construct(HttpClient $client, ?LoggerInterface $logger = null, bool $sleepAfterRequest = false) {
        $this->client = $client;
        $this->logger = $logger;
        $this->sleepAfterRequest = $sleepAfterRequest;
    }

    public function setRequestInterval(float $requestInterval): void {
        if ($requestInterval < ClientAbstract::MIN_INTERVAL) {
            throw new \InvalidArgumentException('Request interval must be at least ' . ClientAbstract::MIN_INTERVAL . ' seconds');
        }
        $this->requestInterval = $requestInterval;
    }

    public function getRequestInterval(): float {
        return $this->requestInterval;
    }

    public function get(string $uri, array $options = []): ResponseInterface {
        return $this->request('GET', $uri, $options);
    }

    public function post(string $uri, array $options = []): ResponseInterface {
        return $this->request('POST', $uri, $options);
    }

    public function put(string $uri, array $options = []): ResponseInterface {
        return $this->request('PUT', $uri, $options);
    }

    public function delete(string $uri, array $options = []): ResponseInterface {
        return $this->request('DELETE', $uri, $options);
    }

    private function request(string $method, string $uri, array $options = []): ResponseInterface {
        $timeSinceLastRequest = microtime(true) - $this->lastRequestTime;
        $microsecondsToSleep = 0;

        if ($timeSinceLastRequest < $this->requestInterval) {
            usleep((int)(($this->requestInterval - $timeSinceLastRequest) * 1e6));
        }

        if ($this->logger) {
            $this->logger->info("Sending {$method} request to {$uri} (waiting {$microsecondsToSleep} microseconds to execute)", $options);
        }

        $options['http_errors'] = false;
        $this->lastRequestTime = microtime(true);
        $response = $this->client->request($method, $uri, $options);

        if ($this->sleepAfterRequest) {
            // Sleep for 0.5 seconds after each request to avoid rate limiting
            usleep((int)(ClientAbstract::MIN_INTERVAL * 1e6));
        }

        if ($response->getStatusCode() >= 400) {
            switch ($response->getStatusCode()) {
                case 400:
                    throw new BadRequestException('Bad Request', 400, $response);
                case 401:
                    throw new UnauthorizedException('Unauthorized', 401, $response);
                case 402:
                    throw new PaymentRequiredException('Payment Required', 402, $response);
                case 403:
                    throw new ForbiddenException('Forbidden', 403, $response);
                case 404:
                    throw new NotFoundException('Resource not found', 404, $response);
                case 405:
                    throw new NotAllowedException('Not Allowed', 405, $response);
                case 406:
                    throw new NotAcceptableException('Not Acceptable', 406, $response);
                case 409:
                    throw new ConflictException('Conflict', 409, $response);
                case 415:
                    throw new UnsupportedMediaTypeException('Unsupported Media Type', 415, $response);
                case 429:
                    throw new TooManyRequestsException('Too Many Requests! Set a higher value for Client->requestInterval', 429, $response);
                default:
                    throw new ApiException('Unexpected response status code', $response->getStatusCode(), $response);
                    break;
            }
        }

        return $response;
    }
}
