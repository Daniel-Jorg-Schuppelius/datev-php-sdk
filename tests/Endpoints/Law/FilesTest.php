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
    protected FilesEndpoint $endpoint;

    protected function setUp(): void {
        $this->apiDisabled = true;
        parent::setUp();
        $this->endpoint = new FilesEndpoint($this->client, self::getLogger());
    }

    public function test_json_serialize(): void {
        $data = [
            'id' => '550e8400-e29b-41d4-a716-446655440000',
            'file_number' => 'AZ-2024-001',
            'short_name' => 'Mustermann vs. Example',
            'category' => 'Zivilrecht',
        ];

        $json = json_encode($data);
        $this->assertNotFalse($json);
        $file = LawFile::fromJson($json);

        $this->assertInstanceOf(LawFile::class, $file);
        $this->assertEquals('550e8400-e29b-41d4-a716-446655440000', $file->getID()?->toString());
        $this->assertEquals('AZ-2024-001', $file->getFileNumber());
        $this->assertEquals('Mustermann vs. Example', $file->getShortName());
    }

    public function test_json_serialize_collection(): void {
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

        $json = json_encode($data);
        $this->assertNotFalse($json);
        $files = LawFiles::fromJson($json);

        $this->assertInstanceOf(LawFiles::class, $files);
        $this->assertCount(2, $files->getValues());
    }

    public function test_search_files(): void {
        if ($this->apiDisabled) {
            $this->markTestSkipped('API is disabled');
        }

        $result = $this->endpoint->search();

        $this->assertInstanceOf(LawFiles::class, $result);
    }
}
