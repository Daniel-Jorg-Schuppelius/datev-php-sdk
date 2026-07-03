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

namespace Datev\API\Online\Endpoints\HrPayrollReports;

use Datev\Contracts\Abstracts\API\Online\ClientScopedEndpointAbstract;
use Datev\Entities\Online\Common\Documents\BinaryDocument;
use Datev\Entities\Online\HrPayrollReports\Documents\DocumentsMetadata;

/**
 * hr:payrollreports v1: Auswertungsdokumente der Lohnabrechnung
 * (PDF/ZIP-Downloads über Accept-Negotiation).
 */
class DocumentsEndpoint extends ClientScopedEndpointAbstract {
    protected string $endpointSuffix = 'documents';

    /**
     * Lädt die Auswertungsdokumente einer Abrechnungsperiode herunter.
     *
     * @param string $period Abrechnungsperiode (z. B. "2026-06")
     * @param array<int, string> $documentTypes Optionale Filter auf Dokumenttypen
     * @param int|null $employeeNumber Optionale Personalnummer
     * @param string $accept "application/zip" (Standard) oder "application/pdf"
     */
    public function getDocuments(string $period, array $documentTypes = [], ?int $employeeNumber = null, string $accept = 'application/zip'): ?BinaryDocument {
        return $this->logDebugWithTimer(function () use ($period, $documentTypes, $employeeNumber, $accept) {
            $queryParams = [];
            if (!empty($documentTypes)) {
                $queryParams['document_types'] = implode(',', $documentTypes);
            }
            if ($employeeNumber !== null) {
                $queryParams['employee_number'] = $employeeNumber;
            }

            $urlPath = "{$this->getEndpointUrl()}/" . rawurlencode($period);
            $response = $this->getBinary($urlPath, $accept, $queryParams);

            if ((string) $response->getBody() === '') {
                return null;
            }

            return BinaryDocument::fromResponse($response);
        }, "Fetching payroll documents (Period: {$period})");
    }

    /**
     * Prüft, ob für die Periode Dokumente bereitstehen (GET .../{period}/status).
     */
    public function getStatus(string $period): bool {
        return $this->logDebugWithTimer(function () use ($period) {
            $response = parent::getContents([], [], "{$this->getEndpointUrl()}/" . rawurlencode($period) . '/status');

            return json_decode($response) === true;
        }, "Fetching payroll documents status (Period: {$period})");
    }

    /**
     * Liefert die Personalnummern mit Dokumenten in der Periode
     * (GET .../{period}/employee_numbers).
     *
     * @param array<int, string> $documentTypes Optionale Filter auf Dokumenttypen
     * @return array<int, int>
     */
    public function getEmployeeNumbers(string $period, array $documentTypes = []): array {
        return $this->logDebugWithTimer(function () use ($period, $documentTypes) {
            $queryParams = [];
            if (!empty($documentTypes)) {
                $queryParams['document_types'] = implode(',', $documentTypes);
            }

            $response = parent::getContents($queryParams, [], "{$this->getEndpointUrl()}/" . rawurlencode($period) . '/employee_numbers');

            $data = json_decode($response, true);

            return is_array($data) ? array_map('intval', $data) : [];
        }, "Fetching employee numbers (Period: {$period})");
    }

    /**
     * Liefert die Metadaten der verfügbaren Dokumente (GET clients/{id}/documents-metadata).
     *
     * @param array<string, mixed> $queryParams Optionale Filter: document_types, period, timestamp
     */
    public function getDocumentsMetadata(array $queryParams = []): ?DocumentsMetadata {
        return $this->logDebugWithTimer(function () use ($queryParams) {
            $urlPath = "{$this->getEndpointUrl()}-metadata";
            $queryString = http_build_query($queryParams);
            if ($queryString !== '') {
                $urlPath .= "?{$queryString}";
            }

            $response = parent::getContents([], [], $urlPath);

            if (empty($response) || $response === '[]') {
                return null;
            }

            return DocumentsMetadata::fromJson($response, self::$logger);
        }, 'Fetching documents metadata');
    }
}
