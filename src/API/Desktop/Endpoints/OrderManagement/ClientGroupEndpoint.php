<?php
/*
 * Created on   : Sat Dec 27 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : ClientGroupEndpoint.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\API\Desktop\Endpoints\OrderManagement;

use APIToolkit\Entities\ID;
use Datev\Contracts\Abstracts\API\Desktop\EndpointAbstract;
use Datev\Entities\OrderManagement\ClientGroups\ClientGroups;
use InvalidArgumentException;

class ClientGroupEndpoint extends EndpointAbstract {
    protected string $endpointPrefix = 'order-management/v1';
    protected string $endpoint = 'clientgroup';

    public function get(?ID $clientId = null): ?ClientGroups {
        if (is_null($clientId)) {
            $this->logError('Client ID is required (Class:' . static::class . ')');
            throw new InvalidArgumentException('Client ID is required');
        }

        $response = parent::getContents(['clientid' => $clientId->toString()]);

        if (empty($response) || $response === '[]') {
            return null;
        }

        return ClientGroups::fromJson($response, self::$logger);
    }
}
