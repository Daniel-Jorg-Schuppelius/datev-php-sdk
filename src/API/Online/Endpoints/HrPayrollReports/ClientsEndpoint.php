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

namespace Datev\API\Online\Endpoints\HrPayrollReports;

use APIToolkit\Contracts\Interfaces\API\EndpointInterfaces\SearchableEndpointInterface;
use APIToolkit\Entities\ID;
use Datev\Contracts\Abstracts\API\Online\EndpointAbstract;
use Datev\Entities\Online\Common\ConsultantClientNumber;
use Datev\Entities\Online\HrPayrollReports\Clients\{ClientWithAccessList, Clients};
use InvalidArgumentException;

/**
 * hr:payrollreports v1: Mandantenliste und Dokumenttyp-Zugriffsrechte.
 */
class ClientsEndpoint extends EndpointAbstract implements SearchableEndpointInterface {
    protected string $endpoint = 'clients';

    /**
     * Liefert einen Mandanten inkl. Zugriffsliste. Die client-id ist die
     * Verbundnummer "Beraternummer-Mandantennummer".
     */
    public function get(ID|ConsultantClientNumber|string|null $clientId = null): ?ClientWithAccessList {
        if (is_null($clientId) || $clientId === '') {
            $this->logErrorAndThrow(InvalidArgumentException::class, 'Client-ID is required');
        }

        $id = $clientId instanceof ID ? $clientId->toString() : (string) $clientId;

        return $this->logDebugWithTimer(function () use ($id) {
            $response = parent::getContents([], [], "{$this->getEndpointUrl()}/" . rawurlencode($id));

            if (empty($response) || $response === '[]') {
                return null;
            }

            return ClientWithAccessList::fromJson($response, self::$logger);
        }, "Fetching Client with access list (ID: {$id})");
    }

    /**
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
}
