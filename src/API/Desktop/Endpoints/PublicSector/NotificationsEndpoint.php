<?php
/*
 * Created on   : Sat Dec 27 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : NotificationsEndpoint.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\API\Desktop\Endpoints\PublicSector;

use APIToolkit\Contracts\Interfaces\API\EndpointInterfaces\SearchableEndpointInterface;
use APIToolkit\Entities\GUID;
use APIToolkit\Entities\ID;
use Datev\Contracts\Abstracts\API\Desktop\EndpointAbstract;
use Datev\Entities\PublicSector\Notifications\Notification;
use Datev\Entities\PublicSector\Notifications\Notifications;
use InvalidArgumentException;

class NotificationsEndpoint extends EndpointAbstract implements SearchableEndpointInterface {
    protected string $endpointPrefix = 'public-sector/v1';
    protected string $endpoint = 'clients';

    protected GUID $clientId;
    protected GUID $citizenId;

    public function setClientId(GUID $clientId): void {
        $this->clientId = $clientId;
    }

    public function setCitizenId(GUID $citizenId): void {
        $this->citizenId = $citizenId;
    }

    public function get(?ID $id = null): ?Notification {
        return $this->getById($id?->toString());
    }

    public function getById(?string $notificationId = null): ?Notification {
        if (!isset($this->clientId) || !isset($this->citizenId)) {
            $this->logErrorAndThrow(InvalidArgumentException::class, 'Client ID and Citizen ID are required');
        }

        if (is_null($notificationId)) {
            $this->logErrorAndThrow(InvalidArgumentException::class, 'Notification ID is required');
        }

        return $this->logDebugWithTimer(function () use ($notificationId) {
            $response = parent::getContents([], [], "{$this->getEndpointUrl()}/{$this->clientId->toString()}/citizens/{$this->citizenId->toString()}/notifications/{$notificationId}");

            if (empty($response) || $response === '[]') {
                return null;
            }

            return Notification::fromJson($response, self::$logger);
        }, "Fetching Notification (ID: {$notificationId})");
    }

    public function search(array $queryParams = [], array $options = []): ?Notifications {
        if (!isset($this->clientId) || !isset($this->citizenId)) {
            $this->logErrorAndThrow(InvalidArgumentException::class, 'Client ID and Citizen ID are required');
        }

        return $this->logDebugWithTimer(function () use ($queryParams, $options) {
            $response = parent::getContents($queryParams, $options, "{$this->getEndpointUrl()}/{$this->clientId->toString()}/citizens/{$this->citizenId->toString()}/notifications");

            if (empty($response) || $response === '[]') {
                return null;
            }

            return Notifications::fromJson($response, self::$logger);
        }, "Searching Notifications");
    }

    public function getDocument(string $notificationId): ?string {
        if (!isset($this->clientId) || !isset($this->citizenId)) {
            $this->logErrorAndThrow(InvalidArgumentException::class, 'Client ID and Citizen ID are required');
        }

        return $this->logDebugWithTimer(function () use ($notificationId) {
            $response = parent::getContents([], [], "{$this->getEndpointUrl()}/{$this->clientId->toString()}/citizens/{$this->citizenId->toString()}/notifications/{$notificationId}/document");

            if (empty($response)) {
                return null;
            }

            return $response;
        }, "Fetching Notification Document (ID: {$notificationId})");
    }
}
