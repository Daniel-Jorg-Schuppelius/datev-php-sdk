<?php
/*
 * Created on   : Sun Oct 06 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : DocumentFilesTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

namespace Tests\Endpoints\DocumentManagement;

use Datev\API\Desktop\Endpoints\DocumentManagement\DocumentFilesEndpoint;
use Tests\Contracts\EndpointTest;

class DocumentFilesTest extends EndpointTest {
    protected DocumentFilesEndpoint $endpoint;

    protected function setUp(): void {
        $this->apiDisabled = true;
        parent::setUp();
        $this->endpoint = new DocumentFilesEndpoint($this->client, self::getLogger());
    }

    public function test_get_document_files(): void {
        if ($this->apiDisabled) {
            $this->markTestSkipped('API is disabled');
        }

        $files = $this->endpoint->get();
        $this->assertNotNull($files);
    }
}
