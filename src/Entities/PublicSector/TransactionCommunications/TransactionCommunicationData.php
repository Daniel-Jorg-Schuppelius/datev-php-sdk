<?php
/*
 * Created on   : Sun Jan 12 2025
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : TransactionCommunicationData.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\Entities\PublicSector\TransactionCommunications;

use APIToolkit\Contracts\Abstracts\NamedEntity;
use Psr\Log\LoggerInterface;

class TransactionCommunicationData extends NamedEntity {
    protected ?string $id;
    protected ?string $communication_data_content;
    protected ?string $communication_number_standardized;
    protected ?string $communication_type;
    protected ?string $note;
    protected ?CommunicationUsageType $communication_usage_type;

    public function __construct($data = null, ?LoggerInterface $logger = null) {
        parent::__construct($data, $logger);
    }

    public function getID(): ?string {
        return $this->id ?? null;
    }

    public function getCommunicationDataContent(): ?string {
        return $this->communication_data_content ?? null;
    }

    public function getCommunicationNumberStandardized(): ?string {
        return $this->communication_number_standardized ?? null;
    }

    public function getCommunicationType(): ?string {
        return $this->communication_type ?? null;
    }

    public function getNote(): ?string {
        return $this->note ?? null;
    }

    public function getCommunicationUsageType(): ?CommunicationUsageType {
        return $this->communication_usage_type ?? null;
    }
}
