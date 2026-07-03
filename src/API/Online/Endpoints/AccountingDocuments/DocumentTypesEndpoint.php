<?php
/*
 * Created on   : Fri Jul 03 2026
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : DocumentTypesEndpoint.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\API\Online\Endpoints\AccountingDocuments;

use APIToolkit\Contracts\Interfaces\API\EndpointInterfaces\SearchableEndpointInterface;
use Datev\Contracts\Abstracts\API\Online\ClientScopedEndpointAbstract;
use Datev\Entities\Online\AccountingDocuments\DocumentTypes\DocumentTypes;

/**
 * accounting:documents v2: Belegtypen des Mandanten.
 */
class DocumentTypesEndpoint extends ClientScopedEndpointAbstract implements SearchableEndpointInterface {
    protected string $endpointSuffix = 'document-types';

    public function search(array $queryParams = [], array $options = []): ?DocumentTypes {
        return $this->logDebugWithTimer(function () use ($queryParams, $options) {
            $response = parent::getContents($queryParams, $options);

            if (empty($response) || $response === '[]') {
                return null;
            }

            return DocumentTypes::fromJson($response, self::$logger);
        }, 'Searching DocumentTypes');
    }
}
