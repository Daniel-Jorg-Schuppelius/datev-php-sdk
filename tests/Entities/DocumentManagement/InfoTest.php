<?php
/*
 * Created on   : Sun Oct 06 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : InfoTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Entities\DocumentManagement;

use Datev\Entities\DocumentManagement\Infos\Info;
use Datev\Entities\DocumentManagement\Infos\InfoID;
use Datev\Entities\DocumentManagement\Infos\Infos;
use PHPUnit\Framework\TestCase;

class InfoTest extends TestCase {
    public function testCreateInfoID(): void {
        $id = new InfoID("12345678-1234-1234-1234-123456789012");
        $this->assertInstanceOf(InfoID::class, $id);
        $this->assertEquals("12345678-1234-1234-1234-123456789012", $id->toString());
    }

    public function testCreateInfo(): void {
        $data = [
            "id" => "12345678-1234-1234-1234-123456789012",
            "environment" => "Production",
            "feature" => "DocumentManagement",
            "data_path" => "C:\\DATEV\\Data",
            "is_client_installed" => true,
        ];

        $info = new Info($data);
        $this->assertInstanceOf(Info::class, $info);
        $this->assertEquals("Production", $info->getEnvironment());
        $this->assertEquals("DocumentManagement", $info->getFeature());
        $this->assertEquals("C:\\DATEV\\Data", $info->getDataPath());
    }

    public function testCreateInfos(): void {
        $data = [
            [
                "id" => "12345678-1234-1234-1234-123456789012",
                "environment" => "Production",
                "feature" => "DocumentManagement",
            ],
            [
                "id" => "87654321-4321-4321-4321-210987654321",
                "environment" => "Test",
                "feature" => "TestFeature",
            ],
        ];

        $infos = new Infos($data);
        $this->assertInstanceOf(Infos::class, $infos);
        $this->assertCount(2, $infos->getValues());
    }
}
