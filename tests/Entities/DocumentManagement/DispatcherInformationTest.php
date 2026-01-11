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

use Tests\Contracts\EntityTest;

use Datev\Entities\DocumentManagement\DispatcherInformations\DispatcherInformation;
use Datev\Entities\DocumentManagement\DispatcherInformations\DispatcherInformations;
use Datev\Entities\DocumentManagement\DispatcherInformations\ExternalDocumentID;

class DispatcherInformationTest extends EntityTest {
    public function testCreateDispatcherInformation(): void {
        $data = [
            "external_id" => "ext-001",
            "application" => "DATEV Unternehmen online",
            "comment" => "Automatisch importiert"
        ];

        $dispatcherInformation = new DispatcherInformation($data);

        $this->assertInstanceOf(DispatcherInformation::class, $dispatcherInformation);
        $this->assertInstanceOf(ExternalDocumentID::class, $dispatcherInformation->getID());
        $this->assertEquals("ext-001", $dispatcherInformation->getID()->getValue());
        $this->assertEquals("DATEV Unternehmen online", $dispatcherInformation->getApplication());
        $this->assertEquals("Automatisch importiert", $dispatcherInformation->getComment());
    }

    public function testCreateDispatcherInformations(): void {
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

        $dispatcherInformations = new DispatcherInformations($data);

        $this->assertInstanceOf(DispatcherInformations::class, $dispatcherInformations);
        $this->assertCount(2, $dispatcherInformations);
        $this->assertInstanceOf(DispatcherInformation::class, $dispatcherInformations->getValues()[0]);
    }
}
