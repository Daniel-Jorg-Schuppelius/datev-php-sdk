<?php
/*
 * Created on   : Sat Dec 28 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : TransactionCommunicationDataTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Entities\PublicSector;

use Tests\Contracts\EntityTest;

use Datev\Entities\PublicSector\TransactionCommunications\TransactionCommunicationData;

class TransactionCommunicationDataTest extends EntityTest {
    public function testCreateTransactionCommunicationData(): void {
        $data = [
            "id" => "comm-001",
            "communication_data_content" => "test@example.com",
            "communication_number_standardized" => "+49123456789",
            "communication_type" => "email",
            "note" => "Primäre E-Mail",
            "communication_usage_type" => [
                "is_main_communication_usage_type" => true,
                "is_main_management_phone" => false
            ]
        ];

        $commData = new TransactionCommunicationData($data);

        $this->assertInstanceOf(TransactionCommunicationData::class, $commData);
        $this->assertEquals("comm-001", $commData->getID());
        $this->assertEquals("test@example.com", $commData->getCommunicationDataContent());
        $this->assertEquals("email", $commData->getCommunicationType());
    }
}
