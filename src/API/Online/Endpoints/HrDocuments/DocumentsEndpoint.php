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

namespace Datev\API\Online\Endpoints\HrDocuments;

use APIToolkit\Entities\GUID;
use Datev\Contracts\Abstracts\API\Online\EndpointAbstract;
use Datev\Entities\Online\Common\ConsultantClientNumber;
use Psr\Http\Message\StreamInterface;

/**
 * Datenservice Dokumente Personalwirtschaft v1: Dokumenten-Upload in die
 * digitale Personalakte (multipart, max. 20 MB).
 *
 * Duale Adressierung gemäß Spezifikation:
 * - uploadByGuid(): POST /clients/{client_guid}/documents
 * - uploadByConsultantClientNumber(): POST /clients/{verbundnummer}/documents/upload
 */
class DocumentsEndpoint extends EndpointAbstract {
    protected string $endpoint = 'clients';

    /**
     * Upload über die Mandanten-GUID (kurzlebige Token).
     *
     * @param string|StreamInterface $file Dateiinhalt
     * @param string|null $clientApplication Optionaler Client-Application-Header
     */
    public function uploadByGuid(GUID|string $clientGuid, string|StreamInterface $file, string $filename, ?string $clientApplication = null): void {
        $guid = $clientGuid instanceof GUID ? $clientGuid->toString() : $clientGuid;

        $this->logDebugWithTimer(function () use ($guid, $file, $filename, $clientApplication) {
            $urlPath = "{$this->getEndpointUrl()}/" . rawurlencode($guid) . '/documents';
            $this->uploadDocument($urlPath, $file, $filename, $clientApplication);
        }, "Uploading HR document '{$filename}' (Client-GUID: {$guid})");
    }

    /**
     * Upload über die Verbundnummer "Beraternummer-Mandantennummer" (langlebige Token).
     *
     * @param string|StreamInterface $file Dateiinhalt
     * @param string|null $clientApplication Optionaler Client-Application-Header
     */
    public function uploadByConsultantClientNumber(ConsultantClientNumber|string $clientNumber, string|StreamInterface $file, string $filename, ?string $clientApplication = null): void {
        $number = (string) $clientNumber;

        $this->logDebugWithTimer(function () use ($number, $file, $filename, $clientApplication) {
            $urlPath = "{$this->getEndpointUrl()}/" . rawurlencode($number) . '/documents/upload';
            $this->uploadDocument($urlPath, $file, $filename, $clientApplication);
        }, "Uploading HR document '{$filename}' (Client: {$number})");
    }

    private function uploadDocument(string $urlPath, string|StreamInterface $file, string $filename, ?string $clientApplication): void {
        $headers = $clientApplication !== null ? ['Client-Application' => $clientApplication] : [];

        $this->postMultipart([
            ['name' => 'file', 'contents' => $file, 'filename' => $filename],
        ], $urlPath, 200, $headers);
    }
}
