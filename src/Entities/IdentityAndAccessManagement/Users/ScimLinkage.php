<?php
/*
 * Created on   : Sat Dec 27 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : ScimLinkage.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\Entities\IdentityAndAccessManagement\Users;

use APIToolkit\Contracts\Abstracts\NamedEntity;
use Psr\Log\LoggerInterface;

class ScimLinkage extends NamedEntity {
    protected string $value;
    protected ?string $display;
    protected ?string $ref;

    public function __construct($data = null, ?LoggerInterface $logger = null) {
        parent::__construct($data, $logger);
    }

    public function getValue(): string {
        return $this->value;
    }

    public function getDisplay(): ?string {
        return $this->display ?? null;
    }

    public function getRef(): ?string {
        return $this->ref ?? null;
    }
}
