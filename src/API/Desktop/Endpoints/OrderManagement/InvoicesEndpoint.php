<?php
/*
 * Created on   : Sat Dec 27 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : InvoicesEndpoint.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\API\Desktop\Endpoints\OrderManagement;

use APIToolkit\Contracts\Interfaces\API\EndpointInterfaces\SearchableEndpointInterface;
use APIToolkit\Entities\ID;
use Datev\Contracts\Abstracts\API\Desktop\EndpointAbstract;
use Datev\Entities\OrderManagement\Invoices\Invoice;
use Datev\Entities\OrderManagement\Invoices\Invoices;
use InvalidArgumentException;

class InvoicesEndpoint extends EndpointAbstract implements SearchableEndpointInterface {
    protected string $endpointPrefix = 'order-management/v1';
    protected string $endpoint = 'invoices';

    public function get(?ID $id = null): ?Invoice {
        if (is_null($id)) {
            return null;
        }
        return $this->getById((int) $id->toString());
    }

    public function getById(?int $invoiceId = null): ?Invoice {
        if (is_null($invoiceId)) {
            $this->logErrorAndThrow(InvalidArgumentException::class, 'Invoice ID is required');
        }

        return $this->logDebugWithTimer(function () use ($invoiceId) {
            $response = parent::getContents([], [], "{$this->getEndpointUrl()}/{$invoiceId}");

            if (empty($response) || $response === '[]') {
                return null;
            }

            return Invoice::fromJson($response, self::$logger);
        }, "Fetching Invoice (ID: {$invoiceId})");
    }

    public function search(array $queryParams = [], array $options = []): ?Invoices {
        return $this->logDebugWithTimer(function () use ($queryParams, $options) {
            $response = parent::getContents($queryParams, $options);

            if (empty($response) || $response === '[]') {
                return null;
            }

            return Invoices::fromJson($response, self::$logger);
        }, 'Searching Invoices');
    }
}
