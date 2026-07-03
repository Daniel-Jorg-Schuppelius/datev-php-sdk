<?php
/*
 * Created on   : Fri Jul 03 2026
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : RestHookResourceInfo.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\Entities\Online\HrExchange\RestHooks;

use APIToolkit\Contracts\Abstracts\NamedEntity;
use Psr\Log\LoggerInterface;

/**
 * Ressourceninformation eines RestHook-Ereignisses.
 */
class RestHookResourceInfo extends NamedEntity {
    protected string $resource;

    protected string $resource_id;

    protected string $server_url;

    protected string $http_method;

    protected string $additional_info;

    public function __construct($data = null, ?LoggerInterface $logger = null) {
        parent::__construct($data, $logger);
    }

    public function getResource(): ?string {
        return $this->resource ?? null;
    }

    public function getResourceId(): ?string {
        return $this->resource_id ?? null;
    }

    public function getServerUrl(): ?string {
        return $this->server_url ?? null;
    }

    public function getHttpMethod(): ?string {
        return $this->http_method ?? null;
    }

    public function getAdditionalInfo(): ?string {
        return $this->additional_info ?? null;
    }
}
