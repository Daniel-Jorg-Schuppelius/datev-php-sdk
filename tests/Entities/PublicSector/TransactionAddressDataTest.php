<?php
/*
 * Created on   : Sat Dec 28 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : TransactionAddressDataTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Entities\PublicSector;

use Datev\Entities\PublicSector\TransactionAddresses\TransactionAddressData;
use ERRORToolkit\Factories\ConsoleLoggerFactory;
use PHPUnit\Framework\TestCase;

class TransactionAddressDataTest extends TestCase {
    public function testCreateTransactionAddressData(): void {
        $logger = ConsoleLoggerFactory::getLogger();

        $data = [
            "street" => "Musterstraße",
            "house_number" => "123",
            "postal_code" => "12345",
            "city" => "Berlin",
            "country" => "DE"
        ];

        $addressData = new TransactionAddressData($data, $logger);

        $this->assertInstanceOf(TransactionAddressData::class, $addressData);
    }
}
