<?php
/*
 * Created on   : Fri Jul 03 2026
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : DocumentsEndpoint.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\API\Online\Endpoints\AccountingDocuments;

use Datev\Contracts\Abstracts\API\Online\ClientScopedEndpointAbstract;
use Datev\Entities\Online\AccountingDocuments\Documents\Document;
use Psr\Http\Message\StreamInterface;

/**
 * accounting:documents v2: Belegtransfer (Belegbilderservice).
 *
 * Die metadata-/custom_metadata-Strukturen entsprechen der Spezifikation:
 * metadata = {document_type, note, category, folder, register},
 * custom_metadata = {sequence_first_guid, sequence_position}.
 */
class DocumentsEndpoint extends ClientScopedEndpointAbstract {
    protected string $endpointSuffix = 'documents';

    /**
     * Überträgt einen einzelnen Beleg (POST, 201).
     *
     * @param string|StreamInterface $file Dateiinhalt
     * @param array<string, mixed>|null $metadata
     * @param array<string, mixed>|null $customMetadata
     */
    public function upload(string|StreamInterface $file, string $filename, ?array $metadata = null, ?array $customMetadata = null): ?Document {
        return $this->logDebugWithTimer(function () use ($file, $filename, $metadata, $customMetadata) {
            $response = $this->postMultipartRequest($this->buildMultipart([['contents' => $file, 'filename' => $filename]], $metadata, $customMetadata), null, 201);

            return $this->toDocument((string) $response->getBody());
        }, "Uploading Document '{$filename}'");
    }

    /**
     * Überträgt einen Beleg mit vorgegebener Dokument-ID (PUT, 201).
     *
     * @param string|StreamInterface $file Dateiinhalt
     * @param array<string, mixed>|null $metadata
     * @param array<string, mixed>|null $customMetadata
     */
    public function uploadWithId(string $documentId, string|StreamInterface $file, string $filename, ?array $metadata = null, ?array $customMetadata = null): ?Document {
        return $this->logDebugWithTimer(function () use ($documentId, $file, $filename, $metadata, $customMetadata) {
            $urlPath = "{$this->getEndpointUrl()}/" . rawurlencode($documentId);
            $response = $this->putMultipartRequest($this->buildMultipart([['contents' => $file, 'filename' => $filename]], $metadata, $customMetadata), $urlPath, 201);

            return $this->toDocument((string) $response->getBody());
        }, "Uploading Document '{$filename}' (ID: {$documentId})");
    }

    /**
     * Überträgt mehrere Dateien als zusammengehefteten Beleg (PUT stapled, 201).
     *
     * @param array<int, array{contents: string|StreamInterface, filename: string}> $files
     * @param array<string, mixed>|null $metadata
     * @param array<string, mixed>|null $customMetadata
     */
    public function uploadStapled(array $files, ?array $metadata = null, ?array $customMetadata = null): ?Document {
        return $this->logDebugWithTimer(function () use ($files, $metadata, $customMetadata) {
            $urlPath = "{$this->getEndpointUrl()}/stapled";
            $response = $this->putMultipartRequest($this->buildMultipart($files, $metadata, $customMetadata, 'files'), $urlPath, 201);

            return $this->toDocument((string) $response->getBody());
        }, 'Uploading stapled Document (' . count($files) . ' files)');
    }

    /**
     * @param array<int, array{contents: string|StreamInterface, filename: string}> $files
     * @param array<string, mixed>|null $metadata
     * @param array<string, mixed>|null $customMetadata
     * @return array<int, array<string, mixed>>
     */
    private function buildMultipart(array $files, ?array $metadata, ?array $customMetadata, string $filePartName = 'file'): array {
        $multipart = [];

        foreach ($files as $file) {
            $multipart[] = [
                'name' => $filePartName,
                'contents' => $file['contents'],
                'filename' => $file['filename'],
            ];
        }

        if ($metadata !== null) {
            $multipart[] = [
                'name' => 'metadata',
                'contents' => json_encode($metadata, JSON_THROW_ON_ERROR),
                'headers' => ['Content-Type' => 'application/json'],
            ];
        }

        if ($customMetadata !== null) {
            $multipart[] = [
                'name' => 'custom_metadata',
                'contents' => json_encode($customMetadata, JSON_THROW_ON_ERROR),
                'headers' => ['Content-Type' => 'application/json'],
            ];
        }

        return $multipart;
    }

    private function toDocument(string $body): ?Document {
        if (empty($body) || $body === '[]') {
            return null;
        }

        return Document::fromJson($body, self::$logger);
    }
}
