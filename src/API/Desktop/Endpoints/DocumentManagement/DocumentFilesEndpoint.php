<?php
/*
 * Created on   : Sun Jan 12 2025
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : DocumentFilesEndpoint.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\API\Desktop\Endpoints\DocumentManagement;

use APIToolkit\Entities\ID;
use Datev\Contracts\Abstracts\API\Desktop\EndpointAbstract;
use Datev\Entities\DocumentManagement\DocumentFiles\DocumentFile;
use InvalidArgumentException;

class DocumentFilesEndpoint extends EndpointAbstract {
    protected string $endpointPrefix = 'dms/v2';
    protected string $endpoint = 'document-files';

    public function get(?ID $id = null): ?DocumentFile {
        // This endpoint returns binary file content, not a DocumentFile entity
        // Use getFile() or getFileById() to retrieve file content
        return null;
    }

    public function getFile(?ID $id = null): ?string {
        if (is_null($id)) {
            return null;
        }
        return $this->getFileById($id->toString());
    }

    public function getFileById(?string $fileId = null): ?string {
        if (is_null($fileId)) {
            $this->logErrorAndThrow(InvalidArgumentException::class, 'Document File ID is required');
        }

        return $this->logDebugWithTimer(function () use ($fileId) {
            $response = parent::getContents([], [], "{$this->getEndpointUrl()}/{$fileId}");

            if (empty($response)) {
                return null;
            }

            return $response;
        }, "Fetching DocumentFile (ID: {$fileId})");
    }

    public function upload(string $fileContent): ?DocumentFile {
        if (empty($fileContent)) {
            $this->logErrorAndThrow(InvalidArgumentException::class, 'File content is required');
        }

        return $this->logDebugWithTimer(function () use ($fileContent) {
            $response = $this->client->post($this->getEndpointUrl(), [
                'body' => $fileContent,
                'headers' => [
                    'Content-Type' => 'application/octet-stream'
                ]
            ]);

            $body = $response->getBody()->getContents();

            if (empty($body) || $body === '[]') {
                return null;
            }

            return DocumentFile::fromJson($body, self::$logger);
        }, 'Uploading DocumentFile');
    }
}
