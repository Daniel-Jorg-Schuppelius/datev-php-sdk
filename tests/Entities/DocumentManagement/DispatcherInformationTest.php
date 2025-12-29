<?php
/*
 * Created on   : Sun Oct 06 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : DispatcherInformationTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Entities\DocumentManagement;

use Datev\Entities\DocumentManagement\DispatcherInformations\DispatcherInformation;
use Datev\Entities\DocumentManagement\DispatcherInformations\DispatcherInformations;
use Datev\Entities\DocumentManagement\DispatcherInformations\ExternalDocumentID;
use ERRORToolkit\Factories\ConsoleLoggerFactory;
use PHPUnit\Framework\TestCase;

class DispatcherInformationTest extends TestCase {
    public function testCreateDispatcherInformation(): void {
        $logger = ConsoleLoggerFactory::getLogger();

        $data = [
            "external_id" => "ext-001",
            "application" => "DATEV Unternehmen online",
            "comment" => "Automatisch importiert"
        ];

        $dispatcherInformation = new DispatcherInformation($data, $logger);

        $this->assertInstanceOf(DispatcherInformation::class, $dispatcherInformation);
        $this->assertInstanceOf(ExternalDocumentID::class, $dispatcherInformation->getID());
        $this->assertEquals("ext-001", $dispatcherInformation->getID()->getValue());
        $this->assertEquals("DATEV Unternehmen online", $dispatcherInformation->getApplication());
        $this->assertEquals("Automatisch importiert", $dispatcherInformation->getComment());
    }

    public function testCreateDispatcherInformations(): void {
        $logger = ConsoleLoggerFactory::getLogger();

        $data = [
            "content" => [
                [
                    "external_id" => "ext-001",
                    "application" => "DATEV Unternehmen online",
                    "comment" => "Automatisch importiert"
                ],
                [
                    "external_id" => "ext-002",
                    "application" => "DATEV Lohn",
                    "comment" => "Manuell hinzugefügt"
                ]
            ]
        ];

        $dispatcherInformations = new DispatcherInformations($data, $logger);

        $this->assertInstanceOf(DispatcherInformations::class, $dispatcherInformations);
        $this->assertCount(2, $dispatcherInformations);
        $this->assertInstanceOf(DispatcherInformation::class, $dispatcherInformations->getValues()[0]);
    }
}
