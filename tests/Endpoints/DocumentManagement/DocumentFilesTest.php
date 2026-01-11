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
    protected ?DocumentFilesEndpoint $endpoint;

    public function __construct($name) {
        parent::__construct($name);
        $this->endpoint = new DocumentFilesEndpoint($this->client, self::getLogger());
        $this->apiDisabled = true;
    }

    public function testGetDocumentFiles() {
        if ($this->apiDisabled) {
            $this->markTestSkipped('API is disabled');
        }

        $files = $this->endpoint->search();
        $this->assertNotNull($files);
    }
}
