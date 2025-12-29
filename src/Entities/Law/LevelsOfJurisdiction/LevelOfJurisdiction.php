<?php
/*
 * Created on   : Sat Dec 27 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : LevelOfJurisdiction.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\Entities\Law\LevelsOfJurisdiction;

use APIToolkit\Contracts\Abstracts\NamedEntity;
use APIToolkit\Contracts\Interfaces\NamedEntityInterfaces\IdentifiableNamedEntityInterface;
use Psr\Log\LoggerInterface;

class LevelOfJurisdiction extends NamedEntity implements IdentifiableNamedEntityInterface {
    protected ?LevelOfJurisdictionID $id;
    protected ?string $name;

    public function __construct($data = null, ?LoggerInterface $logger = null) {
        parent::__construct($data, $logger);
    }

    public function getID(): ?LevelOfJurisdictionID {
        return $this->id ?? null;
    }

    public function getName(): ?string {
        return $this->name ?? null;
    }
}
