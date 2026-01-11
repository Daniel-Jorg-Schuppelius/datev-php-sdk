<?php
/*
 * Created on   : Sun Jan 12 2025
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : OrderStateWorkEndpoint.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\API\Desktop\Endpoints\OrderManagement;

use APIToolkit\Contracts\Interfaces\API\EndpointInterfaces\SearchableEndpointInterface;
use APIToolkit\Entities\ID;
use Datev\Contracts\Abstracts\API\Desktop\EndpointAbstract;
use Datev\Entities\OrderManagement\OrderStateWork\OrderStateWork;
use Datev\Entities\OrderManagement\OrderStateWork\OrderStateWorks;
use InvalidArgumentException;

class OrderStateWorkEndpoint extends EndpointAbstract implements SearchableEndpointInterface {
    protected string $endpointPrefix = 'order-management/v1';
    protected string $endpoint = 'orders/orderstatework';

    public function get(?ID $id = null): ?OrderStateWork {
        if (is_null($id)) {
            return null;
        }
        return $this->getByOrderId((int) $id->toString());
    }

    public function getByOrderId(?int $orderId = null, array $queryParams = []): ?OrderStateWork {
        if (is_null($orderId)) {
            $this->logErrorAndThrow(InvalidArgumentException::class, 'Order ID is required');
        }

        return $this->logDebugWithTimer(function () use ($orderId, $queryParams) {
            $response = parent::getContents($queryParams, [], $this->buildOrderUrl($orderId));

            if (empty($response) || $response === '[]') {
                return null;
            }

            return OrderStateWork::fromJson($response, self::$logger);
        }, "Fetching OrderStateWork (OrderID: {$orderId})");
    }

    public function search(array $queryParams = [], array $options = []): ?OrderStateWorks {
        return $this->logDebugWithTimer(function () use ($queryParams, $options) {
            $response = parent::getContents($queryParams, $options);

            if (empty($response) || $response === '[]') {
                return null;
            }

            return OrderStateWorks::fromJson($response, self::$logger);
        }, 'Searching OrderStateWorks');
    }

    private function buildOrderUrl(int $orderId): string {
        return str_replace('orderstatework', '', $this->getEndpointUrl()) . "{$orderId}/orderstatework";
    }
}
