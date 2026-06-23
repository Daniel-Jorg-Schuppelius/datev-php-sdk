<?php
/*
 * Created on   : Sat Dec 28 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : ReceiptNumberTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Entities\DocumentManagement;

use Datev\Entities\DocumentManagement\Documents\ReceiptNumber;
use Tests\Contracts\EntityTest;

class ReceiptNumberTest extends EntityTest {
    public function test_create_from_string(): void {
        $receiptNumber = new ReceiptNumber("RE-2024-001234");

        $this->assertEquals("RE-2024-001234", $receiptNumber->getValue());
        $this->assertEquals('receipt_number', $receiptNumber->getEntityName());
    }

    public function test_create_from_integer(): void {
        $receiptNumber = new ReceiptNumber(12345);

        $this->assertEquals(12345, $receiptNumber->getValue());
    }
}
