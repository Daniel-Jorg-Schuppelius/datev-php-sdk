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

namespace Datev\API\Online\Endpoints\HrExports;

use APIToolkit\Contracts\Interfaces\API\EndpointInterfaces\SearchableEndpointInterface;
use APIToolkit\Exceptions\ApiException;
use Datev\Contracts\Abstracts\API\Online\EndpointAbstract;
use Datev\Entities\Online\Common\ConsultantClientNumber;
use Datev\Entities\Online\HrExports\Clients\Clients;

/**
 * hr:exports v1: Mandantenliste und Berechtigungsprüfung.
 */
class ClientsEndpoint extends EndpointAbstract implements SearchableEndpointInterface {
    protected string $endpoint = 'clients';

    public function search(array $queryParams = [], array $options = []): ?Clients {
        return $this->logDebugWithTimer(function () use ($queryParams, $options) {
            $response = parent::getContents($queryParams, $options);

            if (empty($response) || $response === '[]') {
                return null;
            }

            return Clients::fromJson($response, self::$logger);
        }, 'Searching HrExports Clients');
    }

    /**
     * Berechtigungsprüfung: GET /clients/{client-id} liefert 200 ohne Body.
     * Liefert false bei 403/404, wirft bei anderen Fehlern.
     */
    public function checkAccess(ConsultantClientNumber|string $clientId): bool {
        return $this->logDebugWithTimer(function () use ($clientId) {
            try {
                parent::getContents([], [], "{$this->getEndpointUrl()}/" . rawurlencode((string) $clientId));

                return true;
            } catch (ApiException $exception) {
                if (in_array($exception->getCode(), [403, 404], true)) {
                    return false;
                }
                throw $exception;
            }
        }, "Checking access (Client: {$clientId})");
    }
}
