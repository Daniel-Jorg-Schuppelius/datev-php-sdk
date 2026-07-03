<?php
/*
 * Created on   : Fri Jul 03 2026
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : ValidationDetails.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\Entities\Online\AccountingExtfFiles\Jobs;

use APIToolkit\Contracts\Abstracts\NamedEntity;
use Datev\Entities\Online\Common\Errors\AffectedElements;
use Psr\Log\LoggerInterface;

/**
 * Validierungsdetails eines fehlgeschlagenen EXTF-Imports.
 */
class ValidationDetails extends NamedEntity {
    protected string $type;

    protected string $title;

    protected string $detail;

    protected AffectedElements $affected_elements;

    public function __construct($data = null, ?LoggerInterface $logger = null) {
        parent::__construct($data, $logger);
    }

    public function getType(): ?string {
        return $this->type ?? null;
    }

    public function getTitle(): ?string {
        return $this->title ?? null;
    }

    public function getDetail(): ?string {
        return $this->detail ?? null;
    }

    public function getAffectedElements(): ?AffectedElements {
        return $this->affected_elements ?? null;
    }
}
