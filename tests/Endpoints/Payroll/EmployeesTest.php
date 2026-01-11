<?php
/*
 * Created on   : Sun Oct 06 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : EmployeesTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

namespace Tests\Endpoints\Payroll;

use Datev\API\Desktop\Endpoints\Payroll\EmployeesEndpoint;
use Tests\Contracts\EndpointTest;

class EmployeesTest extends EndpointTest {
    protected ?EmployeesEndpoint $endpoint = null;
    protected string $mockDomain = 'payroll';

    protected function createEndpoint(): EmployeesEndpoint {
        return new EmployeesEndpoint($this->client, self::getLogger());
    }

    public function testGetEmployees() {
        // Employees hat eine sehr komplexe Entity-Struktur mit verschachtelten Objekten
        // Mock-Daten können diese Struktur nicht vollständig abbilden
        if ($this->isUsingMock()) {
            $this->markTestSkipped('Employees endpoint requires real API due to complex entity structure');
        }

        $this->endpoint = $this->createEndpoint();
        $employees = $this->endpoint->search(["reference-date" => "2021-01-01"]);
        $this->assertNotNull($employees);
    }
}
