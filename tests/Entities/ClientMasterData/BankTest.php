<?php
/*
 * Created on   : Sun Oct 06 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : BankTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Entities\ClientMasterData;

use ERRORToolkit\Logger\ConsoleLogger;;

use ERRORToolkit\Factories\ConsoleLoggerFactory;
use Datev\Entities\ClientMasterData\Banks\Bank;
use PHPUnit\Framework\TestCase;

class BankTest extends TestCase {
    private ?ConsoleLogger $logger = null;

    public function __construct($name) {
        parent::__construct($name);
        $this->logger = ConsoleLoggerFactory::getLogger();
    }

    public function testCreateBankAccount() {
        $data = [
            "id" => "007130",
            "bank_code" => "76050101",
            "bic" => "SSKNDE77XXX",
            "city" => "Nürnberg",
            "country_code" => "abc",
            "name" => "Sparkasse Nürnberg",
            "standard" => true,
            "timestamp" => "2019-03-31T00:00:00.000+00:00"
        ];

        $bank = new Bank($data, $this->logger);
        $this->assertTrue($bank->isValid());
        $this->assertInstanceOf(Bank::class, new Bank());
        $this->assertInstanceOf(Bank::class, $bank);
        $this->assertEquals($data, $bank->toArray());
    }
}
