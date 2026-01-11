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
use Datev\Entities\DocumentManagement\DispatcherInformations\DispatcherInformation;
use Datev\Entities\DocumentManagement\Documents\Document;
use Datev\Entities\DocumentManagement\Documents\Documents;
use InvalidArgumentException;

class DocumentsEndpoint extends EndpointAbstract implements SearchableEndpointInterface {
    protected string $endpointPrefix = 'dms/v2';
    protected string $endpoint = 'documents';

    public function get(?ID $id = null): ?Document {
        if (is_null($id)) {
            $this->logErrorAndThrow(InvalidArgumentException::class, 'ID is required');
        }

        return $this->logDebugWithTimer(function () use ($id) {
            $response = parent::getContents([], [], "{$this->getEndpointUrl()}/{$id->toString()}");

            if (empty($response) || $response === '[]') {
                return null;
            }

            return Document::fromJson($response, self::$logger);
        }, "Fetching Document (ID: {$id->toString()})");
    }

    public function search(array $queryParams = [], array $options = []): ?Documents {
        return $this->logDebugWithTimer(function () use ($queryParams, $options) {
            $response = parent::getContents($queryParams, $options);

            if (empty($response) || $response === '[]') {
                return null;
            }

            return Documents::fromJson($response, self::$logger);
        }, 'Searching Documents');
    }

    public function deletePermanently(ID $id): bool {
        return $this->logDebugWithTimer(function () use ($id) {
            $response = parent::deleteContents([], "{$this->getEndpointUrl()}/{$id->toString()}/delete-permanently");

            return $response === 'success';
        }, "Deleting Document permanently (ID: {$id->toString()})");
    }

    public function addDispatcherInformation(ID $documentId, DispatcherInformation $dispatcherInfo): bool {
        return $this->logDebugWithTimer(function () use ($documentId, $dispatcherInfo) {
            $response = parent::postContents(
                $dispatcherInfo->toArray(),
                [],
                "{$this->getEndpointUrl()}/{$documentId->toString()}/dispatcher-information",
                204
            );

            return $response === 'success';
        }, "Adding DispatcherInformation to Document (ID: {$documentId->toString()})");
    }
}
