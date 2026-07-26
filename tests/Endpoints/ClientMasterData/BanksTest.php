<?php
/*
 * Created on   : Sun Oct 06 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : BanksTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

namespace Tests\Endpoints\ClientMasterData;

use Datev\API\Desktop\Endpoints\ClientMasterData\BanksEndpoint;
use Datev\Entities\ClientMasterData\Banks\{Bank, Banks};
use Tests\Contracts\EndpointTest;

class BanksTest extends EndpointTest {
    protected BanksEndpoint $endpoint;

    protected function setUp(): void {
        $this->apiDisabled = true;
        parent::setUp();
        $this->endpoint = new BanksEndpoint($this->client, self::getLogger());
    }

    public function test_get_addressees(): void {
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
        $this->assertEquals($randomBank->getID(), $bank?->getID());
    }
}
