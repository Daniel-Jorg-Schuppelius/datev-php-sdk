<?php
/*
 * Created on   : Sun Oct 06 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : PayrollEndpointAbstract.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\Contracts\Abstracts\API\Desktop\Payroll;

use APIToolkit\Contracts\Interfaces\API\ApiClientInterface;
use APIToolkit\Contracts\Interfaces\NamedEntityInterface;
use APIToolkit\Entities\ID;
use Datev\Contracts\Abstracts\API\Desktop\EndpointAbstract;
use Datev\Entities\Common\Clients\ClientID;
use Psr\Log\LoggerInterface;

abstract class PayrollEndpointAbstract extends EndpointAbstract {
    protected string $endpointPrefix = 'hr/v3';
    protected string $endpoint = 'clients/{client-id}';

    protected ClientID $clientID;

    public function __construct(ApiClientInterface $client, ?LoggerInterface $logger = null, ClientID $clientID = new ClientID()) {
        parent::__construct($client, $logger);
        $this->clientID = $clientID;
    }

    public function get(?ID $id = null): ?NamedEntityInterface {
        return null;
    }

    public function getClientID(): ClientID {
        return $this->clientID;
    }

    public function setClientID(ClientID $clientID): void {
        $this->clientID = $clientID;
    }

    protected function getEndpointUrl(): string {
        $url = parent::getEndpointUrl();
        $url = str_replace('{client-id}', $this->clientID->toString(), $url);
        return rtrim($url, '/');
    }
}
