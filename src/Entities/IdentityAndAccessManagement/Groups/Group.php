<?php
/*
 * Created on   : Sat Dec 27 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : Group.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\Entities\IdentityAndAccessManagement\Groups;

use APIToolkit\Contracts\Abstracts\NamedEntity;
use APIToolkit\Contracts\Interfaces\NamedEntityInterfaces\IdentifiableNamedEntityInterface;
use Datev\Entities\IdentityAndAccessManagement\Users\ScimMeta;
use Psr\Log\LoggerInterface;

class Group extends NamedEntity implements IdentifiableNamedEntityInterface {
    protected ?GroupID $id;
    protected ?ScimMeta $meta;
    protected ?array $schemas;
    protected ?string $display_name;
    protected ?GroupMembers $members;
    protected ?DatevGroupExtension $datev_extension;

    public function __construct($data = null, ?LoggerInterface $logger = null) {
        // Transform SCIM extension key before calling parent constructor
        if (is_array($data) && isset($data['urn:ietf:params:scim:schemas:extension:datev:2.0:group'])) {
            $data['datev_extension'] = $data['urn:ietf:params:scim:schemas:extension:datev:2.0:group'];
            unset($data['urn:ietf:params:scim:schemas:extension:datev:2.0:group']);
        }
        parent::__construct($data, $logger);
    }

    public function getID(): ?GroupID {
        return $this->id ?? null;
    }

    public function getMeta(): ?ScimMeta {
        return $this->meta ?? null;
    }

    public function getSchemas(): ?array {
        return $this->schemas ?? null;
    }

    public function getDisplayName(): ?string {
        return $this->display_name ?? null;
    }

    public function getMembers(): ?GroupMembers {
        return $this->members ?? null;
    }

    public function getDatevExtension(): ?DatevGroupExtension {
        return $this->datev_extension ?? null;
    }
}
