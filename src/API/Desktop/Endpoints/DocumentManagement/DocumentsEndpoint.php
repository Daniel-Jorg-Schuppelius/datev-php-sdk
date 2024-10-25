<?php
/*
 * Created on   : Sun Oct 06 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : DocumentsEndpoint.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

namespace Datev\API\Desktop\Endpoints\DocumentManagement;

use APIToolkit\Contracts\Interfaces\API\EndpointInterfaces\SearchableEndpointInterface;
use APIToolkit\Entities\ID;
use Datev\Contracts\Abstracts\API\Desktop\EndpointAbstract;
use Datev\Entities\DocumentManagement\Documents\Document;
use Datev\Entities\DocumentManagement\Documents\Documents;
use InvalidArgumentException;

class DocumentsEndpoint extends EndpointAbstract implements SearchableEndpointInterface {
    protected string $endpointPrefix = 'dms/v2';
    protected string $endpoint = 'documents';

    public function get(?ID $id = null): ?Document {
        if (is_null($id)) {
            $this->logError('ID is required (Class:' . static::class . ')');
            throw new InvalidArgumentException('ID is required');
        }

        $response = parent::getContents([], [], "{$this->getEndpointUrl()}/{$id->toString()}");

        if (empty($response) || $response === '[]') {
            return null;
        }

        return Document::fromJson($response, $this->logger);
    }

    public function search(array $queryParams = [], array $options = []): ?Documents {
        $response = parent::getContents($queryParams, $options);

        if (empty($response) || $response === '[]') {
            return null;
        }

        return Documents::fromJson($response, $this->logger);
    }
}
