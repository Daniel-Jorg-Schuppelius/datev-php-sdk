<?php
/*
 * Created on   : Fri Jul 03 2026
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : RestHooksEndpoint.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\API\Online\Endpoints\HrExchange;

use APIToolkit\Contracts\Interfaces\API\EndpointInterfaces\SearchableEndpointInterface;
use APIToolkit\Entities\ID;
use Datev\Contracts\Abstracts\API\Online\ClientScopedEndpointAbstract;
use Datev\Entities\Online\HrExchange\RestHooks\{RestHook, RestHooks};
use InvalidArgumentException;

/**
 * hr:exchange v1: RestHooks (Webhooks) für Push-Benachrichtigungen
 * über abgeschlossene Jobs.
 */
class RestHooksEndpoint extends ClientScopedEndpointAbstract implements SearchableEndpointInterface {
    protected string $endpointSuffix = 'resthooks';

    public function search(array $queryParams = [], array $options = []): ?RestHooks {
        return $this->logDebugWithTimer(function () use ($queryParams, $options) {
            $response = parent::getContents($queryParams, $options);

            if (empty($response) || $response === '[]') {
                return null;
            }

            return RestHooks::fromJson($response, self::$logger);
        }, 'Searching RestHooks');
    }

    public function get(ID|string|null $uuid = null): ?RestHook {
        if (is_null($uuid) || $uuid === '') {
            $this->logErrorAndThrow(InvalidArgumentException::class, 'RestHook-UUID is required');
        }

        $id = $uuid instanceof ID ? $uuid->toString() : (string) $uuid;

        return $this->logDebugWithTimer(function () use ($id) {
            $response = parent::getContents([], [], "{$this->getEndpointUrl()}/" . rawurlencode($id));

            if (empty($response) || $response === '[]') {
                return null;
            }

            return RestHook::fromJson($response, self::$logger);
        }, "Fetching RestHook (UUID: {$id})");
    }

    /**
     * Registriert einen RestHook (POST, 201).
     *
     * @param RestHook|array<string, mixed> $restHook
     */
    public function create(RestHook|array $restHook): void {
        $data = $restHook instanceof RestHook ? $restHook->toArray() : $restHook;

        $this->logDebugWithTimer(function () use ($data) {
            parent::postContents($data, [], null, 201);
        }, 'Creating RestHook');
    }

    /**
     * Aktualisiert einen RestHook (PUT, 200).
     *
     * @param RestHook|array<string, mixed> $restHook
     */
    public function update(string $uuid, RestHook|array $restHook): void {
        $data = $restHook instanceof RestHook ? $restHook->toArray() : $restHook;

        $this->logDebugWithTimer(function () use ($uuid, $data) {
            parent::putContents($data, [], "{$this->getEndpointUrl()}/" . rawurlencode($uuid), 200);
        }, "Updating RestHook (UUID: {$uuid})");
    }

    /**
     * Löscht einen RestHook (DELETE, 204).
     */
    public function delete(string $uuid): void {
        $this->logDebugWithTimer(function () use ($uuid) {
            parent::deleteContents([], "{$this->getEndpointUrl()}/" . rawurlencode($uuid), 204);
        }, "Deleting RestHook (UUID: {$uuid})");
    }

    /**
     * Löst einen Test-Aufruf des RestHooks aus (POST .../test, 202).
     */
    public function test(string $uuid): void {
        $this->logDebugWithTimer(function () use ($uuid) {
            parent::postContents([], [], "{$this->getEndpointUrl()}/" . rawurlencode($uuid) . '/test', 202);
        }, "Testing RestHook (UUID: {$uuid})");
    }
}
