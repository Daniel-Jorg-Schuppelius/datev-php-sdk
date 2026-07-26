<?php
/*
 * Created on   : Fri Jul 03 2026
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : FilesEndpoint.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\API\Online\Endpoints\CashRegister;

use Datev\Contracts\Abstracts\API\Online\TenantScopedEndpointAbstract;
use Psr\Http\Message\StreamInterface;

/**
 * cashregister:import v2: Import von Kassenarchiv-Dateien (TAR/DSFinV-K).
 */
class FilesEndpoint extends TenantScopedEndpointAbstract {
    protected string $endpointSuffix = 'files';

    /**
     * Lädt eine Archivdatei samt Metadaten hoch (multipart/form-data, 202 Accepted).
     * Die Datei wird asynchron verarbeitet; bei Problemen (z. B. Virenfund)
     * wird der Benutzer per E-Mail informiert.
     *
     * @param string|StreamInterface $file Dateiinhalt
     * @param string $filename Dateiname der Archivdatei
     * @param array<string, mixed> $metadata Metadaten gemäß Spezifikation (cash_register_metadata)
     * @param string|null $requestId Optionaler Request-Id-Header zur Nachverfolgung
     */
    public function import(string|StreamInterface $file, string $filename, array $metadata, ?string $requestId = null): void {
        $tenantId = self::idToString($this->tenantId);

        $this->logDebugWithTimer(function () use ($file, $filename, $metadata, $requestId) {
            $multipart = [
                [
                    'name' => 'metadata',
                    'contents' => json_encode($metadata, JSON_THROW_ON_ERROR),
                    'filename' => 'metadata.json',
                    'headers' => ['Content-Type' => 'application/json'],
                ],
                [
                    'name' => 'file',
                    'contents' => $file,
                    'filename' => $filename,
                ],
            ];

            $headers = $requestId !== null ? ['Request-Id' => $requestId] : [];

            $this->postMultipartRequest($multipart, "{$this->getEndpointUrl()}/import", 202, $headers);
        }, "Importing CashRegister file '{$filename}' (Tenant: {$tenantId})");
    }
}
