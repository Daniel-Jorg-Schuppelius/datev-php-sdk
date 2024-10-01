<?php

declare(strict_types=1);

namespace Datev\Entities\ClientMasterData\LegalForms;

use APIToolkit\Contracts\Abstracts\NamedEntity;
use APIToolkit\Contracts\Interfaces\NamedEntityInterfaces\IdentifiableNamedEntityInterface;
use Datev\Entities\ClientMasterData\LegalFormIDs\LegalFormID;
use Datev\Enums\LegalFormType;
use Psr\Log\LoggerInterface;

class LegalForm extends NamedEntity implements IdentifiableNamedEntityInterface {
    protected ?LegalFormID $id;
    protected ?string $display_name;
    protected ?string $short_name;
    protected ?string $long_name;
    protected ?string $nation;
    protected ?LegalFormType $type;

    public function __construct($data = null, ?LoggerInterface $logger = null) {
        parent::__construct($data, $logger);
    }

    public function getID(): LegalFormID {
        return $this->id;
    }
}
