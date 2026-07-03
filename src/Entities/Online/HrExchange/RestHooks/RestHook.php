<?php
/*
 * Created on   : Fri Jul 03 2026
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : RestHook.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\Entities\Online\HrExchange\RestHooks;

use APIToolkit\Contracts\Abstracts\NamedEntity;
use Psr\Log\LoggerInterface;

/**
 * Webhook-Registrierung für Push-Benachrichtigungen.
 */
class RestHook extends NamedEntity {
    protected string $client_url;

    protected string $authorization_header;

    protected string $time_stamp;

    protected RestHookResourceInfo $event_resource;

    public function __construct($data = null, ?LoggerInterface $logger = null) {
        parent::__construct($data, $logger);
    }

    public function getClientUrl(): ?string {
        return $this->client_url ?? null;
    }

    public function getAuthorizationHeader(): ?string {
        return $this->authorization_header ?? null;
    }

    public function getTimeStamp(): ?string {
        return $this->time_stamp ?? null;
    }

    public function getEventResource(): ?RestHookResourceInfo {
        return $this->event_resource ?? null;
    }
}
