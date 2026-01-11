<?php
/*
 * Created on   : Sat Dec 27 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : OrdersEndpoint.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\API\Desktop\Endpoints\OrderManagement;

use APIToolkit\Contracts\Interfaces\API\EndpointInterfaces\SearchableEndpointInterface;
use APIToolkit\Entities\ID;
use Datev\Contracts\Abstracts\API\Desktop\EndpointAbstract;
use Datev\Entities\OrderManagement\Orders\Order;
use Datev\Entities\OrderManagement\Orders\Orders;
use InvalidArgumentException;

class OrdersEndpoint extends EndpointAbstract implements SearchableEndpointInterface {
    protected string $endpointPrefix = 'order-management/v1';
    protected string $endpoint = 'orders';

    public function get(?ID $id = null): ?Order {
        if (is_null($id)) {
            return null;
        }
        return $this->getById((int) $id->toString());
    }

    public function getById(?int $orderId = null, array $queryParams = []): ?Order {
        if (is_null($orderId)) {
            $this->logErrorAndThrow(InvalidArgumentException::class, 'Order ID is required');
        }

        return $this->logDebugWithTimer(function () use ($orderId, $queryParams) {
            $response = parent::getContents($queryParams, [], "{$this->getEndpointUrl()}/{$orderId}");

            if (empty($response) || $response === '[]') {
                return null;
            }

            return Order::fromJson($response, self::$logger);
        }, "Fetching Order (ID: {$orderId})");
    }

    public function search(array $queryParams = [], array $options = []): ?Orders {
        return $this->logDebugWithTimer(function () use ($queryParams, $options) {
            $response = parent::getContents($queryParams, $options);

            if (empty($response) || $response === '[]') {
                return null;
            }

            return Orders::fromJson($response, self::$logger);
        }, 'Searching Orders');
    }

    public function update(int $orderId, Order $order): bool {
        return $this->logDebugWithTimer(function () use ($orderId, $order) {
            $response = parent::putContents($order->toArray(), [], "{$this->getEndpointUrl()}/{$orderId}");

            return $response !== false;
        }, "Updating Order (ID: {$orderId})");
    }
}
