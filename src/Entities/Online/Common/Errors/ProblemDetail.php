<?php
/*
 * Created on   : Fri Jul 03 2026
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : ProblemDetail.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\Entities\Online\Common\Errors;

use APIToolkit\Contracts\Abstracts\NamedEntity;
use Psr\Http\Message\ResponseInterface;
use Psr\Log\LoggerInterface;

/**
 * RFC-7807-Fehlerobjekt (application/problem+json), wie es accounting-clients,
 * accounting:extf-files und der Accounting Data Exchange liefern.
 */
class ProblemDetail extends NamedEntity {
    protected string $type;

    protected string $title;

    protected int $status;

    protected string $detail;

    protected string $instance;

    /**
     * @param array<string, mixed>|object|null $data
     */
    public function __construct($data = null, ?LoggerInterface $logger = null) {
        parent::__construct($data, $logger);
    }

    public function getType(): ?string {
        return $this->type ?? null;
    }

    public function getTitle(): ?string {
        return $this->title ?? null;
    }

    public function getStatus(): ?int {
        return $this->status ?? null;
    }

    public function getDetail(): ?string {
        return $this->detail ?? null;
    }

    public function getInstance(): ?string {
        return $this->instance ?? null;
    }

    /**
     * Versucht, aus einer Fehler-Response ein ProblemDetail zu lesen
     * (z. B. aus ApiException::getResponse()). Liefert null, wenn der Body
     * kein JSON-Objekt ist.
     */
    public static function tryFromResponse(ResponseInterface $response, ?LoggerInterface $logger = null): ?self {
        $body = (string) $response->getBody();

        if ($body === '') {
            return null;
        }

        $data = json_decode($body, true);
        if (!is_array($data)) {
            return null;
        }

        return new self($data, $logger);
    }
}
