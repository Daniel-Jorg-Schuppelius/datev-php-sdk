<?php
/*
 * Created on   : Fri Jul 03 2026
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : ExchangeError.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\Entities\Online\HrExchange\Errors;

use APIToolkit\Contracts\Abstracts\NamedEntity;
use Psr\Log\LoggerInterface;

/**
 * Fehlerobjekt des hr:exchange-Dienstes (Spec-Schema "Error").
 */
class ExchangeError extends NamedEntity {
    protected string $error;

    protected string $error_description;

    protected string $error_uri;

    protected string $request_id;

    protected AdditionalErrors $additional_messages;

    /**
     * @param array<string, mixed>|object|null $data
     */
    public function __construct($data = null, ?LoggerInterface $logger = null) {
        parent::__construct($data, $logger);
    }

    public function getError(): ?string {
        return $this->error ?? null;
    }

    public function getErrorDescription(): ?string {
        return $this->error_description ?? null;
    }

    public function getErrorUri(): ?string {
        return $this->error_uri ?? null;
    }

    public function getRequestId(): ?string {
        return $this->request_id ?? null;
    }

    public function getAdditionalMessages(): ?AdditionalErrors {
        return $this->additional_messages ?? null;
    }
}
