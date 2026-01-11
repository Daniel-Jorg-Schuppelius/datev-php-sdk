<?php
/*
 * Created on   : Sat Dec 27 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : ResourceTypes.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\Entities\IdentityAndAccessManagement\Schemas;

use APIToolkit\Contracts\Abstracts\NamedValues;
use Psr\Log\LoggerInterface;

/**
 * @extends NamedValues<ResourceType>
 */
class ResourceTypes extends NamedValues {
    public function __construct($data = null, ?LoggerInterface $logger = null) {
        $this->entityName = "Resources";
        $this->valueClassName = ResourceType::class;

        // Extract Resources array if wrapped in SCIM ListResponse format
        if (is_array($data) && array_key_exists($this->entityName, $data)) {
            $data = $data[$this->entityName];
        }

        parent::__construct($data, $logger);
    }
}
