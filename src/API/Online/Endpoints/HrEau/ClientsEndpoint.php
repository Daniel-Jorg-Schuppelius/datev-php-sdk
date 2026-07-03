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

namespace Datev\API\Online\Endpoints\HrEau;

use APIToolkit\Entities\ID;
use Datev\Contracts\Abstracts\API\Online\EndpointAbstract;
use Datev\Entities\Online\Common\ConsultantClientNumber;
use Datev\Entities\Online\HrEau\Clients\ClientId;
use InvalidArgumentException;

/**
 * hr:eau v1: Mandantenprüfung über die Verbundnummer.
 */
class ClientsEndpoint extends EndpointAbstract {
    protected string $endpoint = 'clients';

    /**
     * Liefert die Mandantenkennung (Verbundnummer "Beraternummer-Mandantennummer").
     */
    public function get(ID|ConsultantClientNumber|string|null $clientId = null): ?ClientId {
        if (is_null($clientId) || $clientId === '') {
            $this->logErrorAndThrow(InvalidArgumentException::class, 'Client-ID (consultantNumber-clientNumber) is required');
        }

        $id = $clientId instanceof ID ? $clientId->toString() : (string) $clientId;

        return $this->logDebugWithTimer(function () use ($id) {
            $response = parent::getContents([], [], "{$this->getEndpointUrl()}/" . rawurlencode($id));

            if (empty($response) || $response === '[]') {
                return null;
            }

            return ClientId::fromJson($response, self::$logger);
        }, "Fetching eAU Client (ID: {$id})");
    }
}
