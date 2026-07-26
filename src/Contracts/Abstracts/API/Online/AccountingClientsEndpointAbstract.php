<?php
/*
 * Created on   : Fri Jul 03 2026
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : AccountingClientsEndpointAbstract.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\Contracts\Abstracts\API\Online;

use APIToolkit\Entities\ID;
use Datev\Entities\Online\Accounting\Clients\{ClientBasics, Clients};
use Datev\Entities\Online\Common\ConsultantClientNumber;
use InvalidArgumentException;

/**
 * Gemeinsame Mandanten-Endpunkte der Accounting-Dienstfamilie:
 * accounting:documents und accounting:dxso-jobs liefern identische
 * Client-/ClientBasics-Strukturen unter /clients bzw. /clients/{client-id}.
 */
abstract class AccountingClientsEndpointAbstract extends EndpointAbstract {
    protected string $endpoint = 'clients';

    /**
     * Liefert einen Mandanten inkl. Buchführungs-Grunddaten. Die client-id
     * ist die Verbundnummer "Beraternummer-Mandantennummer".
     */
    public function get(ID|ConsultantClientNumber|string|null $clientId = null): ?ClientBasics {
        if (is_null($clientId) || $clientId === '') {
            $this->logErrorAndThrow(InvalidArgumentException::class, 'Client-ID is required');
        }

        $id = $clientId instanceof ID ? $clientId->toString() : (string) $clientId;

        return $this->logDebugWithTimer(function () use ($id) {
            $response = parent::getContents([], [], "{$this->getEndpointUrl()}/" . rawurlencode($id));

            if (empty($response) || $response === '[]') {
                return null;
            }

            return ClientBasics::fromJson($response, self::$logger);
        }, "Fetching ClientBasics (ID: {$id})");
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
