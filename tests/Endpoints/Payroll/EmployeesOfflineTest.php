<?php
/*
 * Created on   : Wed Nov 11 2026
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : EmployeesOfflineTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Endpoints\Payroll;

use APIToolkit\Entities\ID;
use DateTime;
use Datev\API\Desktop\Endpoints\Payroll\EmployeesEndpoint;
use Datev\Entities\Common\Clients\ClientID;
use Datev\Entities\Payroll\Employees\{Employee, Employees};
use PHPUnit\Framework\TestCase;
use Psr\Log\NullLogger;
use Tests\Mocks\MockClient;

/**
 * Die Mitarbeiterabfrage fragte /clients/{id} statt /clients/{id}/employees ab
 * und las damit den Mandanten statt seiner Mitarbeiter; reference-date ist Pflicht.
 */
final class EmployeesOfflineTest extends TestCase {
    private const CLIENT = '11111111-2222-4333-8444-555555555555';
    private const BASE = '/datev/api/hr/v3/clients/' . self::CLIENT . '/employees';

    private function endpoint(MockClient $client): EmployeesEndpoint {
        return new EmployeesEndpoint($client, new NullLogger, new ClientID(self::CLIENT));
    }

    public function test_search_reads_the_employees_of_the_client(): void {
        $client = new MockClient;
        $client->registerMockResponse('GET', self::BASE, 200, [
            ['id' => '00001', 'surname' => 'Muster', 'first_name' => 'Erika'],
        ]);

        $employees = $this->endpoint($client)->search();

        $this->assertInstanceOf(Employees::class, $employees);
        $this->assertSame('Muster', $employees->getValues()[0]->getSurname());
        $this->assertMatchesRegularExpression('/[?&]reference-date=\d{4}-\d{2}-\d{2}(&|$)/', $client->getRecordedRequests()[0]['uri']);
    }

    public function test_get_reads_one_employee(): void {
        $client = new MockClient;
        $client->registerMockResponse('GET', self::BASE . '/00001', 200, ['id' => '00001', 'surname' => 'Muster']);

        $employee = $this->endpoint($client)->get(new ID('00001'), 'all', new DateTime('2024-01-31'));

        $this->assertInstanceOf(Employee::class, $employee);
        $this->assertSame('Muster', $employee->getSurname());
        $this->assertSame(self::BASE . '/00001?reference-date=2024-01-31&expand=all', $client->getRecordedRequests()[0]['uri']);
    }
}
