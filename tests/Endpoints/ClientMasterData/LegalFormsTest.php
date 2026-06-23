<?php
/*
 * Created on   : Sat Jan 11 2025
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : LegalFormsTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Endpoints\ClientMasterData;

use Datev\API\Desktop\Endpoints\ClientMasterData\LegalFormsEndpoint;
use Tests\Contracts\EndpointTest;

class LegalFormsTest extends EndpointTest {
    protected ?LegalFormsEndpoint $endpoint;

    public function __construct($name) {
        parent::__construct($name);
        $this->endpoint = new LegalFormsEndpoint($this->client, self::getLogger());
        $this->apiDisabled = true;
    }

    public function test_get_legal_forms() {
        if ($this->apiDisabled) {
            $this->markTestSkipped('API is disabled');
        }

        $legalForms = $this->endpoint->search();
        $this->assertNotNull($legalForms);
    }
}
