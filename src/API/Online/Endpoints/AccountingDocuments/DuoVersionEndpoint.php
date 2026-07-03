<?php
/*
 * Created on   : Fri Jul 03 2026
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : DuoVersionEndpoint.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\API\Online\Endpoints\AccountingDocuments;

use APIToolkit\Entities\ID;
use Datev\Contracts\Abstracts\API\Online\ClientScopedEndpointAbstract;
use Datev\Entities\Online\AccountingDocuments\DuoVersion\DuoVersion;

/**
 * accounting:documents v2: erlaubte Dateiendungen der
 * DATEV-Unternehmen-online-Version des Mandanten.
 */
class DuoVersionEndpoint extends ClientScopedEndpointAbstract {
    protected string $endpointSuffix = 'duo-version';

    public function get(?ID $id = null): ?DuoVersion {
        return $this->logDebugWithTimer(function () {
            $response = parent::getContents();

            if (empty($response) || $response === '[]') {
                return null;
            }

            return DuoVersion::fromJson($response, self::$logger);
        }, 'Fetching DuoVersion');
    }
}
