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

namespace Datev\Contracts\Abstracts\API\Desktop;

use APIToolkit\Contracts\Abstracts\API\EndpointAbstract as APIEndpointAbstract;

abstract class EndpointAbstract extends APIEndpointAbstract {
    /**
     * Ohne endpointSuffix: den hängt jeder Endpunkt selbst an.
     */
    protected function getEndpointUrl(): string {
        return "{$this->getServiceUrl()}/{$this->endpoint}";
    }

    /**
     * Basispfad des Dienstes für Ressourcen neben $endpoint (z. B. /addressees/deletion-log).
     */
    protected function getServiceUrl(): string {
        return "/datev/api/{$this->endpointPrefix}";
    }
}
