<?php
/*
 * Created on   : Sat Dec 27 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : User.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\Entities\IdentityAndAccessManagement\Users;

use APIToolkit\Contracts\Abstracts\NamedEntity;
use APIToolkit\Contracts\Interfaces\NamedEntityInterfaces\IdentifiableNamedEntityInterface;
use Psr\Log\LoggerInterface;

class User extends NamedEntity implements IdentifiableNamedEntityInterface {
    protected ?UserID $id;
    protected ?ScimMeta $meta;
    protected ?array $schemas;
    protected ?ScimName $name;
    protected ?string $display_name;
    protected ?bool $active;
    protected ?ScimLinkages $groups;
    protected ?array $entitlements;
    protected ?DatevUserExtension $datev_extension;

    public function __construct($data = null, ?LoggerInterface $logger = null) {
        // Transform SCIM extension key before calling parent constructor
        if (is_array($data) && isset($data['urn:ietf:params:scim:schemas:extension:datev:2.0:user'])) {
            $data['datev_extension'] = $data['urn:ietf:params:scim:schemas:extension:datev:2.0:user'];
            unset($data['urn:ietf:params:scim:schemas:extension:datev:2.0:user']);
        }
        parent::__construct($data, $logger);
    }

    public function getID(): ?UserID {
        return $this->id ?? null;
    }

    public function getMeta(): ?ScimMeta {
        return $this->meta ?? null;
    }

    public function getSchemas(): ?array {
        return $this->schemas ?? null;
    }

    public function getName(): ?ScimName {
        return $this->name ?? null;
    }

    public function getDisplayName(): ?string {
        return $this->display_name ?? null;
    }

    public function isActive(): ?bool {
        return $this->active ?? null;
    }

    public function getGroups(): ?ScimLinkages {
        return $this->groups ?? null;
    }

    public function getEntitlements(): ?array {
        return $this->entitlements ?? null;
    }

    public function getDatevExtension(): ?DatevUserExtension {
        return $this->datev_extension ?? null;
    }
}
