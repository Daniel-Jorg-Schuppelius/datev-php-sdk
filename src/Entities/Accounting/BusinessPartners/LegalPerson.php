<?php
/*
 * Created on   : Wed Nov 11 2026
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : LegalPerson.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\Entities\Accounting\BusinessPartners;

use APIToolkit\Contracts\Abstracts\NamedEntity;
use Psr\Log\LoggerInterface;

class LegalPerson extends NamedEntity {
    protected ?string $enterprise_purpose;
    protected ?string $legal_form;
    protected ?string $legal_name;

    /**
     * @param array<string, mixed>|object|null $data
     */
    public function __construct($data = null, ?LoggerInterface $logger = null) {
        parent::__construct($data, $logger);
    }

    public function getEnterprisePurpose(): ?string {
        return $this->enterprise_purpose ?? null;
    }

    public function getLegalForm(): ?string {
        return $this->legal_form ?? null;
    }

    public function getLegalName(): ?string {
        return $this->legal_name ?? null;
    }
}
