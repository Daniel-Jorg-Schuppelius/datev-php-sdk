<?php
/*
 * Created on   : Sun Oct 06 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : LegalForm.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\Entities\ClientMasterData\LegalForms;

use APIToolkit\Contracts\Abstracts\NamedEntity;
use APIToolkit\Contracts\Interfaces\NamedEntityInterfaces\IdentifiableNamedEntityInterface;
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

    public function getDisplayName(): ?string {
        return $this->display_name ?? null;
    }

    public function getShortName(): ?string {
        return $this->short_name ?? null;
    }

    public function getLongName(): ?string {
        return $this->long_name ?? null;
    }

    public function getNation(): ?string {
        return $this->nation ?? null;
    }

    public function getType(): ?LegalFormType {
        return $this->type ?? null;
    }
}
