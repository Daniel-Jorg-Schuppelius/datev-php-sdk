<?php
/*
 * Created on   : Fri Jul 03 2026
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : ClientsEndpoint.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\API\Online\Endpoints\AccountingClients;

use APIToolkit\Contracts\Interfaces\API\EndpointInterfaces\SearchableEndpointInterface;
use APIToolkit\Entities\ID;
use Datev\API\Online\Support\{LinkHeaderParser, PageMeta, PageResult};
use Datev\Contracts\Abstracts\API\Online\EndpointAbstract;
use Datev\Entities\Online\AccountingClients\Clients\{Client, Clients};
use Datev\Entities\Online\Common\ConsultantClientNumber;
use InvalidArgumentException;

/**
 * accounting-clients v2: Mandantenliste inkl. freigeschalteter Datenservices.
 *
 * Unterstützte Query-Parameter für search()/searchPage():
 * - filter: nur "consultant_number eq X" und "client_number eq Y" (and-verknüpft)
 * - skip / top: OData-Paginierung (top max. 100)
 */
class ClientsEndpoint extends EndpointAbstract implements SearchableEndpointInterface {
    protected string $endpoint = 'clients';

    /**
     * Liefert einen einzelnen Mandanten. Die client-id ist die technische
     * Verbundnummer "Beraternummer-Mandantennummer" (z. B. "29098-55003").
     */
    public function get(ID|ConsultantClientNumber|string|null $clientId = null): ?Client {
        if (is_null($clientId) || $clientId === '') {
            $this->logErrorAndThrow(InvalidArgumentException::class, 'Client-ID is required');
        }

        $id = $clientId instanceof ID ? $clientId->toString() : (string) $clientId;

        return $this->logDebugWithTimer(function () use ($id) {
            $response = parent::getContents([], [], "{$this->getEndpointUrl()}/" . rawurlencode($id));

            if (empty($response) || $response === '[]') {
                return null;
            }

            return Client::fromJson($response, self::$logger);
        }, "Fetching Client (ID: {$id})");
    }

    /**
     * Liefert die Liste aller zugreifbaren Mandanten.
     * @param array<string, mixed> $options
     * @param array<string, mixed> $queryParams
     */
    public function search(array $queryParams = [], array $options = []): ?Clients {
        return $this->logDebugWithTimer(function () use ($queryParams, $options) {
            $response = parent::getContents($queryParams, $options);

            if (empty($response) || $response === '[]') {
                return null;
            }

            return Clients::fromJson($response, self::$logger);
        }, 'Searching Clients');
    }

    /**
     * Wie search(), liefert aber zusätzlich die Paging-Metadaten aus den
     * Response-Headern (Link, Total-Items).
     * @param array<string, mixed> $options
     * @param array<string, mixed> $queryParams
     * @return PageResult<\Datev\Entities\Online\AccountingClients\Clients\Client>
     */
    public function searchPage(array $queryParams = [], array $options = []): PageResult {
        return $this->logDebugWithTimer(function () use ($queryParams, $options) {
            $urlPath = $this->getEndpointUrl();
            $queryString = http_build_query($queryParams);
            if ($queryString !== '') {
                $urlPath .= "?{$queryString}";
            }

            $response = $this->requestResponse('GET', $urlPath, $options, 200);
            $body = (string) $response->getBody();

            $items = (empty($body) || $body === '[]') ? null : Clients::fromJson($body, self::$logger);
            $totalItems = $response->getHeaderLine('Total-Items');

            return new PageResult(
                $items,
                is_numeric($totalItems) ? (int) $totalItems : null,
                LinkHeaderParser::fromResponse($response),
                PageMeta::fromResponse($response)
            );
        }, 'Searching Clients (paged)');
    }

    /**
     * Iteriert alle Mandanten über sämtliche Seiten hinweg (folgt rel="next").
     *
     * @param array<string, mixed> $queryParams
     * @param array<string, mixed> $options
     * @param int|null $maxPages Obergrenze für die Zahl geladener Seiten
     * @return \Generator<int, \Datev\Entities\Online\AccountingClients\Clients\Client>
     */
    public function searchAll(array $queryParams = [], array $options = [], ?int $maxPages = null): \Generator {
        $urlPath = $this->getEndpointUrl();
        $queryString = http_build_query($queryParams);
        if ($queryString !== '') {
            $urlPath .= "?{$queryString}";
        }

        yield from $this->iterateLinkPages(
            $urlPath,
            function ($response): array {
                $body = (string) $response->getBody();
                if ($body === '' || $body === '[]') {
                    return [];
                }

                return Clients::fromJson($body, self::$logger)->getValues();
            },
            $options,
            $maxPages
        );
    }
}
