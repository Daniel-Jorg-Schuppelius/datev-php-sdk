<?php
/*
 * Created on   : Sun Oct 06 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : StructureItemsEndpoint.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

namespace Datev\API\Desktop\Endpoints\DocumentManagement;

use APIToolkit\Contracts\Interfaces\API\ApiClientInterface;
use APIToolkit\Contracts\Interfaces\API\EndpointInterfaces\SearchableEndpointInterface;
use APIToolkit\Entities\ID;
use Datev\Contracts\Abstracts\API\Desktop\EndpointAbstract;
use Datev\Entities\DocumentManagement\Documents\DocumentID;
use Datev\Entities\DocumentManagement\StructureItems\StructureItem;
use Datev\Entities\DocumentManagement\StructureItems\StructureItems;
use InvalidArgumentException;
use Psr\Log\LoggerInterface;

class StructureItemsEndpoint extends EndpointAbstract implements SearchableEndpointInterface {
    protected string $endpointPrefix = 'dms/v2';
    protected string $endpoint = 'documents/{id}';
    protected string $endpointSuffix = 'structure-items';

    protected DocumentID $documentID;

    public function __construct(ApiClientInterface $client, ?LoggerInterface $logger = null, DocumentID $documentID = new DocumentID()) {
        parent::__construct($client, $logger);
        $this->documentID = $documentID;
    }

    public function get(?ID $id = null): ?StructureItem {
        if (is_null($id)) {
            $this->logErrorAndThrow(InvalidArgumentException::class, 'ID is required');
        }

        return $this->logDebugWithTimer(function () use ($id) {
            $response = parent::getContents([], [], "{$this->getEndpointUrl()}/{$id->toString()}");

            if (empty($response) || $response === '[]') {
                return null;
            }

            return StructureItem::fromJson($response, self::$logger);
        }, "Fetching StructureItem (ID: {$id})");
    }

    public function search(array $queryParams = [], array $options = []): ?StructureItems {
        return $this->logDebugWithTimer(function () use ($queryParams, $options) {
            $response = parent::getContents($queryParams, $options);

            if (empty($response) || $response === '[]') {
                return null;
            }

            return StructureItems::fromJson($response, self::$logger);
        }, 'Searching StructureItems');
    }

    public function getDocumentID(): DocumentID {
        return $this->documentID;
    }

    public function setDocumentID(DocumentID $documentID): void {
        $this->documentID = $documentID;
    }

    protected function getEndpointUrl(): string {
        return str_replace('{id}', $this->documentID->toString(), parent::getEndpointUrl());
    }
}
