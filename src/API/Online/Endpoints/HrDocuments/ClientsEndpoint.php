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

namespace Datev\API\Online\Endpoints\HrDocuments;

use APIToolkit\Contracts\Interfaces\API\EndpointInterfaces\SearchableEndpointInterface;
use APIToolkit\Entities\ID;
use Datev\Contracts\Abstracts\API\Online\EndpointAbstract;
use Datev\Entities\Online\Common\ConsultantClientNumber;
use Datev\Entities\Online\HrDocuments\Clients\{Client, Clients, ClientsResponse};
use InvalidArgumentException;

/**
 * Datenservice Dokumente Personalwirtschaft v1: Mandantenliste.
 */
class ClientsEndpoint extends EndpointAbstract implements SearchableEndpointInterface {
    protected string $endpoint = 'clients';

    /**
     * Liefert einen Mandanten über die Verbundnummer
     * "Beraternummer-Mandantennummer" (für langlebige Token).
     */
    public function get(ID|ConsultantClientNumber|string|null $clientId = null): ?Client {
        if (is_null($clientId) || $clientId === '') {
            $this->logErrorAndThrow(InvalidArgumentException::class, 'Client-ID (consultantnumber-clientnumber) is required');
        }

        $id = $clientId instanceof ID ? $clientId->toString() : (string) $clientId;

        return $this->logDebugWithTimer(function () use ($id) {
            $response = parent::getContents([], [], "{$this->getEndpointUrl()}/" . rawurlencode($id));

            if (empty($response) || $response === '[]') {
                return null;
            }

            return Client::fromJson($response, self::$logger);
        }, "Fetching HrDocuments Client (ID: {$id})");
    }

    /**
     * Liefert alle zugreifbaren Mandanten (entpackt den clients-Wrapper).
     */
    public function search(array $queryParams = [], array $options = []): ?Clients {
        return $this->logDebugWithTimer(function () use ($queryParams, $options) {
            $response = parent::getContents($queryParams, $options);

            if (empty($response) || $response === '[]') {
                return null;
            }

            return ClientsResponse::fromJson($response, self::$logger)->getClients();
        }, 'Searching HrDocuments Clients');
    }
}
