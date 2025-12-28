<?php
/*
 * Created on   : Sun Jan 12 2025
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : SubordersStateBillingEndpoint.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\API\Desktop\Endpoints\OrderManagement;

use APIToolkit\Contracts\Interfaces\API\EndpointInterfaces\SearchableEndpointInterface;
use APIToolkit\Entities\ID;
use Datev\Contracts\Abstracts\API\Desktop\EndpointAbstract;
use Datev\Entities\OrderManagement\SuborderStateBilling\SuborderStateBilling;
use Datev\Entities\OrderManagement\SuborderStateBilling\SubordersStateBilling;
use InvalidArgumentException;

class SubordersStateBillingEndpoint extends EndpointAbstract implements SearchableEndpointInterface {
    protected string $endpointPrefix = 'order-management/v1';
    protected string $endpoint = 'orders/subordersstatebilling';

    public function get(?ID $id = null): ?SuborderStateBilling {
        if (is_null($id)) {
            return null;
        }
        return $this->getByOrderId((int) $id->toString());
    }

    public function getByOrderId(?int $orderId = null, array $queryParams = []): ?SuborderStateBilling {
        if (is_null($orderId)) {
            $this->logError('Order ID is required (Class:' . static::class . ')');
            throw new InvalidArgumentException('Order ID is required');
        }

        $response = parent::getContents($queryParams, [], $this->buildOrderUrl($orderId));

        if (empty($response) || $response === '[]') {
            return null;
        }

        return SuborderStateBilling::fromJson($response, self::$logger);
    }

    public function search(array $queryParams = [], array $options = []): ?SubordersStateBilling {
        $response = parent::getContents($queryParams, $options);

        if (empty($response) || $response === '[]') {
            return null;
        }

        return SubordersStateBilling::fromJson($response, self::$logger);
    }

    private function buildOrderUrl(int $orderId): string {
        return str_replace('subordersstatebilling', '', $this->getEndpointUrl()) . "{$orderId}/subordersstatebilling";
    }
}
