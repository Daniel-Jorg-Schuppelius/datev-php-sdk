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
use Datev\Contracts\Abstracts\API\Desktop\EndpointAbstract;
use Datev\Contracts\Interfaces\API\SearchableEndpointInterface;
use APIToolkit\Entities\ID;
use Datev\Entities\DocumentManagement\Documents\DocumentID;
use Datev\Entities\DocumentManagement\StructureItems\StructureItem;
use Datev\Entities\DocumentManagement\StructureItems\StructureItems;
use Psr\Log\LoggerInterface;

class StructureItemsEndpoint extends EndpointAbstract implements SearchableEndpointInterface {
    protected string $endpointPrefix = 'dms/v2';
    protected string $endpoint = 'documents/{id}/structure-items';

    protected DocumentID $documentID;

    public function __construct(ApiClientInterface $client, ?LoggerInterface $logger = null, DocumentID $documentID = new DocumentID()) {
        parent::__construct($client, $logger);
        $this->documentID = $documentID;
    }

    public function get(?ID $id = null): StructureItem {
        if (is_null($id)) {
            throw new \InvalidArgumentException('ID is required');
        }

        return StructureItem::fromJson(parent::getContents([], [], "{$this->getEndpointUrl()}/{$id->toString()}"));
    }

    public function search(array $queryParams = [], array $options = []): StructureItems {
        return StructureItems::fromJson(parent::getContents($queryParams, $options));
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
