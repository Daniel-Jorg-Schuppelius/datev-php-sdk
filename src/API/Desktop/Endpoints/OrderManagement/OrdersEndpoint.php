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
            $this->logError('Order ID is required (Class:' . static::class . ')');
            throw new InvalidArgumentException('Order ID is required');
        }

        $response = parent::getContents($queryParams, [], "{$this->getEndpointUrl()}/{$orderId}");

        if (empty($response) || $response === '[]') {
            return null;
        }

        return Order::fromJson($response, self::$logger);
    }

    public function search(array $queryParams = [], array $options = []): ?Orders {
        $response = parent::getContents($queryParams, $options);

        if (empty($response) || $response === '[]') {
            return null;
        }

        return Orders::fromJson($response, self::$logger);
    }

    public function update(int $orderId, Order $order): bool {
        $response = parent::putContents($order->toArray(), [], "{$this->getEndpointUrl()}/{$orderId}");

        return $response !== false;
    }
}
