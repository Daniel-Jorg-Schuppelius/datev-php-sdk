<?php
/*
 * Created on   : Sat Dec 27 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : GroupMember.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\Entities\IdentityAndAccessManagement\Groups;

use APIToolkit\Contracts\Abstracts\NamedEntity;
use Psr\Log\LoggerInterface;

class GroupMember extends NamedEntity {
    protected string $value;
    protected ?string $ref;

    public function __construct($data = null, ?LoggerInterface $logger = null) {
        // Transform $ref key before calling parent constructor
        if (is_array($data) && isset($data['$ref'])) {
            $data['ref'] = $data['$ref'];
            unset($data['$ref']);
        }
        parent::__construct($data, $logger);
    }

    public function getValue(): string {
        return $this->value;
    }

    public function getRef(): ?string {
        return $this->ref ?? null;
    }
}
