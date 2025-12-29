<?php
/*
 * Created on   : Sun Oct 06 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : RegisteredCompanyNameTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Entities\ClientMasterData;

use Datev\Entities\ClientMasterData\RegisteredCompanyNames\RegisteredCompanyName;
use Datev\Entities\ClientMasterData\RegisteredCompanyNames\RegisteredCompanyNames;
use PHPUnit\Framework\TestCase;

class RegisteredCompanyNameTest extends TestCase {
    public function testCreateRegisteredCompanyName() {
        $data = [
            "value" => "Muster GmbH",
            "valid_from" => "2024-01-01"
        ];

        $name = new RegisteredCompanyName($data);
        $this->assertInstanceOf(RegisteredCompanyName::class, $name);
    }

    public function testCreateRegisteredCompanyNames() {
        $data = [
            [
                "value" => "Muster GmbH",
                "valid_from" => "2024-01-01"
            ]
        ];

        $names = new RegisteredCompanyNames($data);
        $this->assertInstanceOf(RegisteredCompanyNames::class, $names);
    }
}
