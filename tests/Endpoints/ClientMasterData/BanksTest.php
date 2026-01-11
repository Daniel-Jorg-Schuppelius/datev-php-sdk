<?php
/*
 * Created on   : Sun Oct 06 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : BanksTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

namespace Tests\Endpoints\Diagnostics;

use Datev\API\Desktop\Endpoints\ClientMasterData\BanksEndpoint;
use Datev\Entities\ClientMasterData\Banks\Bank;
use Datev\Entities\ClientMasterData\Banks\Banks;
use Tests\Contracts\EndpointTest;

class BanksTest extends EndpointTest {
    protected ?BanksEndpoint $endpoint;

    public function __construct($name) {
        parent::__construct($name);
        $this->endpoint = new BanksEndpoint($this->client, self::getLogger());
        $this->apiDisabled = true; // API is disabled
    }

    public function testGetAddressees() {
        if ($this->apiDisabled) {
            $this->markTestSkipped('API is disabled');
        }

        $banks = $this->endpoint->search();
        $this->assertInstanceOf(Banks::class, $banks);
        $this->assertNotEmpty($banks->getValues(), "No banks found");
        $randomBank = $banks->getValues()[array_rand($banks->getValues())];
        $this->assertInstanceOf(Bank::class, $randomBank);
        $bank = $this->endpoint->get($randomBank->getID());
        $this->assertInstanceOf(Bank::class, $randomBank);
        $this->assertEquals($randomBank->getID(), $bank->getID());
    }
}
