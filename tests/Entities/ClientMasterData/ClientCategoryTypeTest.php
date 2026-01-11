<?php
/*
 * Created on   : Sun Oct 06 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : ClientCategoryTypeTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Entities\ClientMasterData;

use Tests\Contracts\EntityTest;

use Datev\Entities\ClientMasterData\ClientCategoryTypes\ClientCategoryType;

class ClientCategoryTypeTest extends EntityTest {
    public function testCreateClientCategoryType() {
        $data = [
            "id" => "c43f9c3f-380c-494e-47c8-d12fff738188",
            "name" => "A-Mandant",
            "note" => "Bemerkung zur Kategorie A-Mandant.",
            "short_name" => "abc",
            "timestamp" => "2018-03-31T00:00:00.000+00:00"
        ];

        $clientCategoryType = new ClientCategoryType($data);
        $this->assertTrue($clientCategoryType->isValid());
        $this->assertInstanceOf(ClientCategoryType::class, new ClientCategoryType());
        $this->assertInstanceOf(ClientCategoryType::class, $clientCategoryType);
        $this->assertEquals($data, $clientCategoryType->toArray());
    }
}
