<?php
/*
 * Created on   : Sat Dec 27 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : PaymentMethodTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Entities\PublicSector;

use Tests\Contracts\EntityTest;

use Datev\Entities\PublicSector\Common\PaymentMethod;

class PaymentMethodTest extends EntityTest {
    public function testCreatePaymentMethod(): void {
        $data = [
            "id" => "PM001",
            "account_holder" => "Max Mustermann",
            "iban" => "DE89370400440532013000",
            "bic" => "COBADEFFXXX",
            "bank_name" => "Commerzbank",
        ];

        $paymentMethod = new PaymentMethod($data);
        $this->assertInstanceOf(PaymentMethod::class, $paymentMethod);
        $this->assertEquals("PM001", $paymentMethod->getID());
        $this->assertEquals("Max Mustermann", $paymentMethod->getAccountHolder());
        $this->assertEquals("DE89370400440532013000", $paymentMethod->getIban());
        $this->assertEquals("COBADEFFXXX", $paymentMethod->getBic());
    }
}
