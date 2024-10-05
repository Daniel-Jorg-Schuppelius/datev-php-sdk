<?php

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
}
