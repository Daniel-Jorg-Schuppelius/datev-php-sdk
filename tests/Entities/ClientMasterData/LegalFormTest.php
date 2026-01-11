<?php
/*
 * Created on   : Sat Dec 28 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : LegalFormTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Entities\ClientMasterData;

use Tests\Contracts\EntityTest;

use Datev\Entities\ClientMasterData\LegalForms\LegalForm;
use Datev\Entities\ClientMasterData\LegalForms\LegalForms;
use Datev\Enums\LegalFormType;

class LegalFormTest extends EntityTest {
    public function testCreateLegalForm() {
        $data = [
            "id" => "legal-form-123",
            "display_name" => "GmbH",
            "short_name" => "GmbH",
            "long_name" => "Gesellschaft mit beschränkter Haftung",
            "nation" => "DE",
            "type" => 3
        ];

        $legalForm = new LegalForm($data);
        $this->assertInstanceOf(LegalForm::class, new LegalForm());
        $this->assertInstanceOf(LegalForm::class, $legalForm);
        $this->assertNotNull($legalForm->getID());
        $this->assertEquals("GmbH", $legalForm->getDisplayName());
        $this->assertEquals("GmbH", $legalForm->getShortName());
        $this->assertEquals("Gesellschaft mit beschränkter Haftung", $legalForm->getLongName());
        $this->assertEquals("DE", $legalForm->getNation());
        $this->assertEquals(LegalFormType::Kapitalgesellschaft, $legalForm->getType());
    }

    public function testCreateLegalForms() {
        $data = [
            "content" => [
                [
                    "id" => "lf-001",
                    "display_name" => "GmbH",
                    "short_name" => "GmbH"
                ],
                [
                    "id" => "lf-002",
                    "display_name" => "AG",
                    "short_name" => "AG"
                ]
            ]
        ];

        $legalForms = new LegalForms($data);
        $this->assertInstanceOf(LegalForms::class, $legalForms);
        $this->assertCount(2, $legalForms->getValues());
    }
}
