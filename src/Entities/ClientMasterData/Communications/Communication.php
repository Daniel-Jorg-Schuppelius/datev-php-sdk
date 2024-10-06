<?php
/*
 * Created on   : Sun Oct 06 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : Communication.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\Entities\ClientMasterData\Communications;

use APIToolkit\Contracts\Abstracts\NamedEntity;
use APIToolkit\Contracts\Interfaces\NamedEntityInterfaces\IdentifiableNamedEntityInterface;
use Datev\Entities\Common\NumberStandardized;
use Datev\Enums\CommunicationType;
use Psr\Log\LoggerInterface;

class Communication extends NamedEntity implements IdentifiableNamedEntityInterface {
    protected ?CommunicationID $id;
    protected CommunicationType $type;
    protected ?string $data_content;
    protected NumberStandardized $number_standardized;
    protected ?string $note;
    protected ?string $name;
    protected ?bool $is_main_communication;
    protected ?bool $is_management_phone;

    public function __construct($data = null, ?LoggerInterface $logger = null) {
        parent::__construct($data, $logger);
    }

    public function getID(): CommunicationID {
        return $this->id;
    }

    public function getType(): CommunicationType {
        return $this->type;
    }

    public function getDataContent(): ?string {
        return $this->data_content ?? null;
    }

    public function getNumberStandardized(): NumberStandardized {
        return $this->number_standardized;
    }

    public function getNote(): ?string {
        return $this->note ?? null;
    }

    public function getName(): ?string {
        return $this->name ?? null;
    }

    public function isMainCommunication(): bool {
        return $this->is_main_communication ?? false;
    }

    public function isManagementPhone(): bool {
        return $this->is_management_phone ?? false;
    }
}
