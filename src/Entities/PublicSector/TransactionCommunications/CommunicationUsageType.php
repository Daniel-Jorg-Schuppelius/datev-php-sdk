<?php
/*
 * Created on   : Sun Jan 12 2025
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : CommunicationUsageType.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\Entities\PublicSector\TransactionCommunications;

use APIToolkit\Contracts\Abstracts\NamedEntity;
use Psr\Log\LoggerInterface;

class CommunicationUsageType extends NamedEntity {
    protected ?bool $is_main_communication_usage_type;
    protected ?bool $is_main_management_phone;

    public function __construct($data = null, ?LoggerInterface $logger = null) {
        parent::__construct($data, $logger);
    }

    public function isMainCommunicationUsageType(): ?bool {
        return $this->is_main_communication_usage_type ?? null;
    }

    public function isMainManagementPhone(): ?bool {
        return $this->is_main_management_phone ?? null;
    }
}
