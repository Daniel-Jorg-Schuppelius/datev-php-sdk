<?php
/*
 * Created on   : Sun Oct 06 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : Info.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\Entities\DocumentManagement\Infos;

use APIToolkit\Contracts\Abstracts\NamedEntity;
use APIToolkit\Contracts\Interfaces\NamedEntityInterfaces\IdentifiableNamedEntityInterface;
use Datev\Entities\DocumentManagement\Versions\Versions;
use Psr\Log\LoggerInterface;

class Info extends NamedEntity implements IdentifiableNamedEntityInterface {
    protected ?InfoID $id;
    protected ?string $environment;
    protected ?string $feature;
    protected ?Versions $versions;
    protected ?string $data_path;
    protected ?bool $is_client_installed;

    public function __construct($data = null, ?LoggerInterface $logger = null) {
        parent::__construct($data, $logger);
    }

    public function getID(): ?InfoID {
        return $this->id ?? null;
    }

    public function getEnvironment(): ?string {
        return $this->environment ?? null;
    }

    public function getFeature(): ?string {
        return $this->feature ?? null;
    }

    public function getVersions(): ?Versions {
        return $this->versions ?? null;
    }

    public function getDataPath(): ?string {
        return $this->data_path ?? null;
    }

    public function getIsClientInstalled(): ?bool {
        return $this->is_client_installed ?? null;
    }
}
