<?php
/*
 * Created on   : Sat Dec 27 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : ServiceProviderConfig.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\Entities\IdentityAndAccessManagement\ServiceProvider;

use APIToolkit\Contracts\Abstracts\NamedEntity;
use Datev\Entities\IdentityAndAccessManagement\Users\ScimMeta;
use Psr\Log\LoggerInterface;

class ServiceProviderConfig extends NamedEntity {
    protected ?array $schemas;
    protected ?string $documentation_uri;
    protected ?ScimSupported $patch;
    protected ?ScimBulk $bulk;
    protected ?ScimFilter $filter;
    protected ?ScimSupported $change_password;
    protected ?ScimSupported $sort;
    protected ?ScimSupported $etag;
    protected ?AuthenticationSchemes $authentication_schemes;
    protected ?ScimMeta $meta;

    public function __construct($data = null, ?LoggerInterface $logger = null) {
        parent::__construct($data, $logger);
    }

    public function getSchemas(): ?array {
        return $this->schemas ?? null;
    }

    public function getDocumentationUri(): ?string {
        return $this->documentation_uri ?? null;
    }

    public function getPatch(): ?ScimSupported {
        return $this->patch ?? null;
    }

    public function getBulk(): ?ScimBulk {
        return $this->bulk ?? null;
    }

    public function getFilter(): ?ScimFilter {
        return $this->filter ?? null;
    }

    public function getChangePassword(): ?ScimSupported {
        return $this->change_password ?? null;
    }

    public function getSort(): ?ScimSupported {
        return $this->sort ?? null;
    }

    public function getEtag(): ?ScimSupported {
        return $this->etag ?? null;
    }

    public function getAuthenticationSchemes(): ?AuthenticationSchemes {
        return $this->authentication_schemes ?? null;
    }

    public function getMeta(): ?ScimMeta {
        return $this->meta ?? null;
    }
}
