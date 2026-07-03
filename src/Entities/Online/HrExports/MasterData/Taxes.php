<?php
/*
 * Created on   : Fri Jul 03 2026
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : Taxes.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\Entities\Online\HrExports\MasterData;

use APIToolkit\Contracts\Abstracts\NamedEntity;
use Psr\Log\LoggerInterface;

/**
 * Steuermerkmale des Arbeitnehmers.
 */
class Taxes extends NamedEntity {
    protected string $denomination;

    protected string $spouses_denomination;

    protected string $tax_class;

    public function __construct($data = null, ?LoggerInterface $logger = null) {
        parent::__construct($data, $logger);
    }

    public function getDenomination(): ?string {
        return $this->denomination ?? null;
    }

    public function getSpousesDenomination(): ?string {
        return $this->spouses_denomination ?? null;
    }

    public function getTaxClass(): ?string {
        return $this->tax_class ?? null;
    }
}
