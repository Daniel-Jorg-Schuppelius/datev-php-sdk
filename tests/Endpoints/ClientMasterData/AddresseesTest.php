<?php
/*
 * Created on   : Sun Oct 06 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : AddresseesTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

namespace Tests\Endpoints\Diagnostics;

use Datev\API\Desktop\Endpoints\ClientMasterData\AddresseesEndpoint;
use Datev\Entities\ClientMasterData\Addressees\Addressee;
use Datev\Entities\ClientMasterData\Addressees\Addressees;
use Tests\Contracts\EndpointTest;

class AddresseesTest extends EndpointTest {
    protected ?AddresseesEndpoint $endpoint;

    public function __construct($name) {
        parent::__construct($name);
        $this->endpoint = new AddresseesEndpoint($this->client, $this->logger);
        $this->apiDisabled = true; // API is disabled
    }

    public function testGetAddressees() {
        if ($this->apiDisabled) {
            $this->markTestSkipped('API is disabled');
        }

        $addressees = $this->endpoint->search();
        $this->assertInstanceOf(Addressees::class, $addressees);
        $this->assertNotEmpty($addressees->getValues(), "No addressees found");
        $randomaddressee = $addressees->getValues()[array_rand($addressees->getValues())];
        $this->assertInstanceOf(Addressee::class, $randomaddressee);
        $addresse = $this->endpoint->get($randomaddressee->getId());
        $this->assertInstanceOf(Addressee::class, $addresse);
        $this->assertEquals($randomaddressee->getId(), $addresse->getId());
    }
}
