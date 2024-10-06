<?php
/*
 * Created on   : Sun Oct 06 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : StructureItemUpdate.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\Entities\DocumentManagement\StructureItems\Updates;

use Datev\Entities\DocumentManagement\StructureItems\BaseStructureItem;
use Datev\Entities\DocumentManagement\StructureItems\StructureItemID;
use Psr\Log\LoggerInterface;

class StructureItemUpdate extends BaseStructureItem {
    protected ?string $name;

    public function __construct($data = null, ?LoggerInterface $logger = null) {
        parent::__construct($data, $logger);
    }

    public function getID(): StructureItemID {
        return $this->id;
    }

    public function getName(): ?string {
        return $this->name ?? null;
    }
}
