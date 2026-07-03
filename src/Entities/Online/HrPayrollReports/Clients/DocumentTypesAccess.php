<?php
/*
 * Created on   : Fri Jul 03 2026
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : DocumentTypesAccess.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\Entities\Online\HrPayrollReports\Clients;

use APIToolkit\Contracts\Abstracts\NamedEntity;
use Psr\Log\LoggerInterface;

/**
 * Zugriffsrechte auf Dokumenttypen (gewährt/verweigert).
 */
class DocumentTypesAccess extends NamedEntity {
    /** @var array<int, string> */
    protected array $access_granted;

    /** @var array<int, string> */
    protected array $access_denied;

    public function __construct($data = null, ?LoggerInterface $logger = null) {
        parent::__construct($data, $logger);
    }

    /**
     * @return array<int, string>
     */
    public function getAccessGranted(): array {
        return $this->access_granted ?? [];
    }

    /**
     * @return array<int, string>
     */
    public function getAccessDenied(): array {
        return $this->access_denied ?? [];
    }
}
