<?php
/*
 * Created on   : Fri Jul 03 2026
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : MasterData.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\Entities\Online\HrExports\MasterData;

use APIToolkit\Contracts\Abstracts\NamedEntity;
use Psr\Log\LoggerInterface;

/**
 * Stammdaten eines Arbeitnehmers je Abrechnungsmonat.
 */
class MasterData extends NamedEntity {
    protected int $personnel_number;

    protected string $company_personnel_number;

    protected string $accounting_month;

    protected string $month_of_recalculation;

    protected Employment $employment;

    protected Taxes $taxes;

    protected SocialSecurity $social_security;

    protected PersonalData $personal_data;

    /**
     * @param array<string, mixed>|object|null $data
     */
    public function __construct($data = null, ?LoggerInterface $logger = null) {
        parent::__construct($data, $logger);
    }

    public function getPersonnelNumber(): ?int {
        return $this->personnel_number ?? null;
    }

    public function getCompanyPersonnelNumber(): ?string {
        return $this->company_personnel_number ?? null;
    }

    public function getAccountingMonth(): ?string {
        return $this->accounting_month ?? null;
    }

    public function getMonthOfRecalculation(): ?string {
        return $this->month_of_recalculation ?? null;
    }

    public function getEmployment(): ?Employment {
        return $this->employment ?? null;
    }

    public function getTaxes(): ?Taxes {
        return $this->taxes ?? null;
    }

    public function getSocialSecurity(): ?SocialSecurity {
        return $this->social_security ?? null;
    }

    public function getPersonalData(): ?PersonalData {
        return $this->personal_data ?? null;
    }
}
