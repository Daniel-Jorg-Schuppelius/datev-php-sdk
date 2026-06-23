<?php
/*
 * Created on   : Sat Dec 28 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : CommunicationUsageTypeTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Entities\PublicSector;

use Datev\Entities\PublicSector\TransactionCommunications\CommunicationUsageType;
use Tests\Contracts\EntityTest;

class CommunicationUsageTypeTest extends EntityTest {
    public function test_create_communication_usage_type(): void {
        $data = [
            "is_main_communication_usage_type" => true,
            "is_main_management_phone" => false,
        ];

        $usageType = new CommunicationUsageType($data);

        $this->assertInstanceOf(CommunicationUsageType::class, $usageType);
    }
}
