<?php
/*
 * Created on   : Sun Oct 06 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : LegalFormIDTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Entities\ClientMasterData;

use Tests\Contracts\EntityTest;

use DateTime;
use Datev\Entities\ClientMasterData\LegalForms\LegalFormID;
use Datev\Entities\ClientMasterData\LegalForms\LegalFormIDs;

class LegalFormIDTest extends EntityTest {
    public function testCreateLegalFormID() {
        $data = [
            "valid_from" => "2024-09-30",
            "value" => "S00009"
        ];

        $legalFormID = new LegalFormID($data);
        $this->assertTrue($legalFormID->isValid());
        $this->assertInstanceOf(LegalFormID::class, new LegalFormID());
        $this->assertInstanceOf(LegalFormID::class, $legalFormID);
        $this->assertEquals($data, $legalFormID->toArray(true, "Y-m-d"));
        $this->assertEquals(["id" => "S00009"], $legalFormID->toArray());
        $this->assertEquals(new DateTime("2024-09-30"), $legalFormID->getValidFrom());
    }

    public function testCreateLegalFormIDs() {
        $data = [
            [
                "valid_from" => "2024-09-30",
                "value" => "S00009"
            ],
            [
                "valid_from" => "2024-06-20",
                "value" => "S00019"
            ]
        ];
        $data1 = [
            [
                "valid_from" => "2024-09-30T00:00:00.000+00:00",
                "value" => "S00009"
            ],
            [
                "valid_from" => "2024-06-20T00:00:00.000+00:00",
                "value" => "S00019"
            ]
        ];

        $legalFormIDs = new LegalFormIDs($data);
        $this->assertInstanceOf(LegalFormIDs::class, $legalFormIDs);
        $this->assertEquals($data, $legalFormIDs->toArray(true, "Y-m-d"));
        $this->assertEquals($data1, $legalFormIDs->toArray());
    }
}
