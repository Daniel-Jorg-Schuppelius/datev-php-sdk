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

namespace Datev\API\Online\Endpoints\HrExchange;

use APIToolkit\Exceptions\ApiException;
use Datev\Contracts\Abstracts\API\Online\ClientScopedEndpointAbstract;

/**
 * hr:exchange v1: Berechtigungsprüfung für einen Mandanten
 * (GET /clients/{client-id} liefert 200 ohne Body).
 */
class ClientsEndpoint extends ClientScopedEndpointAbstract {
    /**
     * Liefert false bei 403/404, wirft bei anderen Fehlern.
     */
    public function checkAccess(): bool {
        return $this->logDebugWithTimer(function () {
            try {
                parent::getContents();

                return true;
            } catch (ApiException $exception) {
                if (in_array($exception->getCode(), [403, 404], true)) {
                    return false;
                }
                throw $exception;
            }
        }, 'Checking hr:exchange client access');
    }
}
