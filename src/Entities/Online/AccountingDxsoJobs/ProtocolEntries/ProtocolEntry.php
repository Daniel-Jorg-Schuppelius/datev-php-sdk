<?php
/*
 * Created on   : Fri Jul 03 2026
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : ProtocolEntry.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\Entities\Online\AccountingDxsoJobs\ProtocolEntries;

use APIToolkit\Contracts\Abstracts\NamedEntity;
use Psr\Log\LoggerInterface;

/**
 * Protokolleintrag der Verarbeitung eines DXSO-Jobs.
 */
class ProtocolEntry extends NamedEntity {
    protected string $time;

    protected string $text;

    protected string $context;

    protected string $type;

    protected string $filename;

    public function __construct($data = null, ?LoggerInterface $logger = null) {
        parent::__construct($data, $logger);
    }

    public function getTime(): ?string {
        return $this->time ?? null;
    }

    public function getText(): ?string {
        return $this->text ?? null;
    }

    public function getContext(): ?string {
        return $this->context ?? null;
    }

    public function getType(): ?string {
        return $this->type ?? null;
    }

    public function getFilename(): ?string {
        return $this->filename ?? null;
    }
}
