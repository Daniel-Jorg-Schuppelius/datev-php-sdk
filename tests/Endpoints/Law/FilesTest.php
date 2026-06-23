<?php
/*
 * Created on   : Sat Dec 27 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : FilesTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Endpoints\Law;

use Datev\API\Desktop\Endpoints\Law\FilesEndpoint;
use Datev\Entities\Law\Files\{LawFile, LawFiles};
use Tests\Contracts\EndpointTest;

class FilesTest extends EndpointTest {
    protected ?FilesEndpoint $endpoint;

    public function __construct($name = null) {
        parent::__construct($name);
        $this->endpoint = new FilesEndpoint($this->client, self::getLogger());
        $this->apiDisabled = true;
    }

    public function test_json_serialize() {
        $data = [
            'id' => '550e8400-e29b-41d4-a716-446655440000',
            'file_number' => 'AZ-2024-001',
            'short_name' => 'Mustermann vs. Example',
            'category' => 'Zivilrecht',
        ];

        $file = LawFile::fromJson(json_encode($data));

        $this->assertInstanceOf(LawFile::class, $file);
        $this->assertEquals('550e8400-e29b-41d4-a716-446655440000', $file->getID()->toString());
        $this->assertEquals('AZ-2024-001', $file->getFileNumber());
        $this->assertEquals('Mustermann vs. Example', $file->getShortName());
    }

    public function test_json_serialize_collection() {
        $data = [
            [
                'id' => '550e8400-e29b-41d4-a716-446655440000',
                'file_number' => 'AZ-2024-001',
                'short_name' => 'Mustermann vs. Example',
            ],
            [
                'id' => '550e8400-e29b-41d4-a716-446655440001',
                'file_number' => 'AZ-2024-002',
                'short_name' => 'Sample vs. Test',
            ],
        ];

        $files = LawFiles::fromJson(json_encode($data));

        $this->assertInstanceOf(LawFiles::class, $files);
        $this->assertCount(2, $files->getValues());
    }

    public function test_search_files() {
        if ($this->apiDisabled) {
            $this->markTestSkipped('API is disabled');
        }

        $result = $this->endpoint->search();

        $this->assertInstanceOf(LawFiles::class, $result);
    }
}
