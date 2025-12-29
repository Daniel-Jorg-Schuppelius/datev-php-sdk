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
            $this->logError('Document File ID is required (Class:' . static::class . ')');
            throw new InvalidArgumentException('Document File ID is required');
        }

        $response = parent::getContents([], [], "{$this->getEndpointUrl()}/{$fileId}");

        if (empty($response)) {
            return null;
        }

        return $response;
    }

    public function upload(string $fileContent): ?DocumentFile {
        if (empty($fileContent)) {
            $this->logError('File content is required (Class:' . static::class . ')');
            throw new InvalidArgumentException('File content is required');
        }

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
    }
}
