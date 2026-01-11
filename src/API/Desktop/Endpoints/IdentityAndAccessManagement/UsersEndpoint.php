<?php
/*
 * Created on   : Sat Dec 27 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : UsersEndpoint.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\API\Desktop\Endpoints\IdentityAndAccessManagement;

use APIToolkit\Contracts\Interfaces\API\EndpointInterfaces\SearchableEndpointInterface;
use APIToolkit\Entities\ID;
use Datev\Contracts\Abstracts\API\Desktop\EndpointAbstract;
use Datev\Entities\IdentityAndAccessManagement\Users\User;
use Datev\Entities\IdentityAndAccessManagement\Users\Users;
use InvalidArgumentException;

class UsersEndpoint extends EndpointAbstract implements SearchableEndpointInterface {
    protected string $endpointPrefix = 'iam/v1';
    protected string $endpoint = 'Users';

    public function get(?ID $id = null): ?User {
        if (is_null($id)) {
            $this->logErrorAndThrow(InvalidArgumentException::class, 'ID is required');
        }

        return $this->logDebugWithTimer(function () use ($id) {
            $response = parent::getContents([], [], "{$this->getEndpointUrl()}/{$id->toString()}");

            if (empty($response) || $response === '[]') {
                return null;
            }

            return User::fromJson($response, self::$logger);
        }, "Fetching User (ID: {$id})");
    }

    public function search(array $queryParams = [], array $options = []): ?Users {
        return $this->logDebugWithTimer(function () use ($queryParams, $options) {
            $response = parent::getContents($queryParams, $options);

            if (empty($response) || $response === '[]') {
                return null;
            }

            return Users::fromJson($response, self::$logger);
        }, 'Searching Users');
    }

    public function me(): ?User {
        return $this->logDebugWithTimer(function () {
            $response = parent::getContents([], [], "{$this->getEndpointUrl()}/me");

            if (empty($response) || $response === '[]') {
                return null;
            }

            return User::fromJson($response, self::$logger);
        }, 'Fetching current User (me)');
    }
}
