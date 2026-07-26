<?php
/*
 * Created on   : Sun Oct 06 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : JobTitleTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Entities\ClientMasterData;

use Datev\Entities\ClientMasterData\JobTitles\{JobTitle, JobTitles};
use Tests\Contracts\EntityTest;

class JobTitleTest extends EntityTest {
    public function test_create_job_title(): void {
        $data = [
            "value" => "Geschäftsführer",
            "valid_from" => "2024-01-01",
        ];

        $title = new JobTitle($data);
        $this->assertInstanceOf(JobTitle::class, $title);
    }

    public function test_create_job_titles(): void {
        $data = [
            [
                "value" => "Geschäftsführer",
                "valid_from" => "2024-01-01",
            ],
        ];

        $titles = new JobTitles($data);
        $this->assertInstanceOf(JobTitles::class, $titles);
    }
}
