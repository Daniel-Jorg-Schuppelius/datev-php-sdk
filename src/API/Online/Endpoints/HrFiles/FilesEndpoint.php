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

namespace Datev\API\Online\Endpoints\HrFiles;

use Datev\Contracts\Abstracts\API\Online\ClientScopedEndpointAbstract;
use Datev\Entities\Online\HrFiles\Jobs\JobInfo;
use Datev\Enums\Online\{HrImportFileType, HrTargetSystem};
use Psr\Http\Message\StreamInterface;

/**
 * hr:files v1: Upload von Lohn-Importdateien (Bewegungs-/Stammdaten)
 * in das Lohnabrechnungssystem (LODAS oder Lohn und Gehalt).
 */
class FilesEndpoint extends ClientScopedEndpointAbstract {
    protected string $endpoint = 'v1/clients/{client-id}';

    protected string $endpointSuffix = 'files';

    /**
     * Lädt eine Importdatei hoch (multipart/form-data, max. 3 MB, UTF-8,
     * Dateiname max. 50 Zeichen ohne die Zeichen < > : " / \ | ? *).
     *
     * @param string|StreamInterface $file Dateiinhalt
     * @param string $filename Dateiname
     * @param string $fileProvider Name des liefernden Systems (max. 50 Zeichen)
     * @param HrImportFileType $importFileType Bewegungsdaten (bwd) oder Stammdaten (psd)
     * @param string $creationTime Erstellungszeitpunkt im Quellsystem (ISO 8601)
     * @param HrTargetSystem $targetSystem Ziel-Lohnsystem (lodas oder lug)
     * @param string $payrollAccountingMonth Abrechnungsmonat (ISO 8601, z. B. "2026-06-30")
     * @param string|null $mailAddress Optionale Benachrichtigungsadresse (max. 100 Zeichen)
     */
    public function upload(
        string|StreamInterface $file,
        string $filename,
        string $fileProvider,
        HrImportFileType $importFileType,
        string $creationTime,
        HrTargetSystem $targetSystem,
        string $payrollAccountingMonth,
        ?string $mailAddress = null
    ): ?JobInfo {
        return $this->logDebugWithTimer(function () use ($file, $filename, $fileProvider, $importFileType, $creationTime, $targetSystem, $payrollAccountingMonth, $mailAddress) {
            $multipart = [
                ['name' => 'file', 'contents' => $file, 'filename' => $filename],
                ['name' => 'file_provider', 'contents' => $fileProvider],
                ['name' => 'import_file_type', 'contents' => $importFileType->value],
                ['name' => 'creation_time', 'contents' => $creationTime],
                ['name' => 'target_system', 'contents' => $targetSystem->value],
                ['name' => 'payroll_accounting_month', 'contents' => $payrollAccountingMonth],
            ];

            if ($mailAddress !== null) {
                $multipart[] = ['name' => 'mail_address', 'contents' => $mailAddress];
            }

            $response = $this->postMultipart($multipart, null, 201);
            $body = (string) $response->getBody();

            return empty($body) ? null : JobInfo::fromJson($body, self::$logger);
        }, "Uploading HrFiles file '{$filename}'");
    }
}
