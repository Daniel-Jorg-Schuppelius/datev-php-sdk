<?php
/*
 * Created on   : Fri Jul 03 2026
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : ConsultantClientNumberTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Entities\Online\Common;

use Datev\Entities\Online\Common\ConsultantClientNumber;
use InvalidArgumentException;
use PHPUnit\Framework\TestCase;

class ConsultantClientNumberTest extends TestCase {
    public function test_construct_and_to_string(): void {
        $number = new ConsultantClientNumber(29098, 100);

        $this->assertSame(29098, $number->getConsultantNumber());
        $this->assertSame(100, $number->getClientNumber());
        $this->assertSame('29098-100', $number->toString());
        $this->assertSame('29098-100', (string) $number);
    }

    public function test_from_string(): void {
        $number = ConsultantClientNumber::fromString('29098-55003');

        $this->assertSame(29098, $number->getConsultantNumber());
        $this->assertSame(55003, $number->getClientNumber());
    }

    public function test_equals(): void {
        $this->assertTrue(ConsultantClientNumber::fromString('1-2')->equals(new ConsultantClientNumber(1, 2)));
        $this->assertFalse(ConsultantClientNumber::fromString('1-2')->equals(new ConsultantClientNumber(1, 3)));
    }

    public function test_invalid_string_throws(): void {
        $this->expectException(InvalidArgumentException::class);
        ConsultantClientNumber::fromString('not-a-number');
    }

    public function test_invalid_consultant_number_throws(): void {
        $this->expectException(InvalidArgumentException::class);
        new ConsultantClientNumber(0, 100);
    }

    public function test_invalid_client_number_throws(): void {
        $this->expectException(InvalidArgumentException::class);
        new ConsultantClientNumber(29098, 100000);
    }
}
