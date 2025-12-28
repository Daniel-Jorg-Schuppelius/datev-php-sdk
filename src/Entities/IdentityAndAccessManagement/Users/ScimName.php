<?php
/*
 * Created on   : Sat Dec 27 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : ScimName.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\Entities\IdentityAndAccessManagement\Users;

use APIToolkit\Contracts\Abstracts\NamedEntity;
use Psr\Log\LoggerInterface;

class ScimName extends NamedEntity {
    protected ?string $given_name;
    protected ?string $family_name;
    protected ?string $honorific_prefix;

    public function __construct($data = null, ?LoggerInterface $logger = null) {
        parent::__construct($data, $logger);
    }

    public function getGivenName(): ?string {
        return $this->given_name ?? null;
    }

    public function getFamilyName(): ?string {
        return $this->family_name ?? null;
    }

    public function getHonorificPrefix(): ?string {
        return $this->honorific_prefix ?? null;
    }
}
