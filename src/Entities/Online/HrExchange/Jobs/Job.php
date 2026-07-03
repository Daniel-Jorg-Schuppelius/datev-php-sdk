<?php
/*
 * Created on   : Fri Jul 03 2026
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : Job.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\Entities\Online\HrExchange\Jobs;

use APIToolkit\Contracts\Abstracts\NamedEntity;
use Datev\Entities\Online\HrExchange\Errors\ExchangeErrors;
use Psr\Log\LoggerInterface;

/**
 * Asynchroner hr:exchange-Job (alle Schreiboperationen und Lese-Jobs sind 202-async). Der state ist in der Spezifikation nicht formal enumeriert (z. B. "accepted").
 */
class Job extends NamedEntity {
    protected string $id;

    protected string $state;

    protected string $time_stamp;

    protected string $time_stamp_updated;

    protected ExchangeErrors $errors;

    protected string $notify_url;

    protected string $notify_authorization_header;

    public function __construct($data = null, ?LoggerInterface $logger = null) {
        parent::__construct($data, $logger);
    }

    public function getId(): ?string {
        return $this->id ?? null;
    }

    public function getState(): ?string {
        return $this->state ?? null;
    }

    public function getTimeStamp(): ?string {
        return $this->time_stamp ?? null;
    }

    public function getTimeStampUpdated(): ?string {
        return $this->time_stamp_updated ?? null;
    }

    public function getErrors(): ?ExchangeErrors {
        return $this->errors ?? null;
    }

    public function getNotifyUrl(): ?string {
        return $this->notify_url ?? null;
    }

    public function getNotifyAuthorizationHeader(): ?string {
        return $this->notify_authorization_header ?? null;
    }
}
