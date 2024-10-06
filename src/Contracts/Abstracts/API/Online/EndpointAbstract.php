<?php
/*
 * Created on   : Sun Oct 06 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : EndpointAbstract.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\Contracts\Abstracts\API\Online;

use APIToolkit\Contracts\Abstracts\API\EndpointAbstract as APIEndpointAbstract;

abstract class EndpointAbstract extends APIEndpointAbstract {
    protected function getEndpointUrl(): string {
        return "{$this->endpointPrefix}/{$this->endpoint}";
    }
}
