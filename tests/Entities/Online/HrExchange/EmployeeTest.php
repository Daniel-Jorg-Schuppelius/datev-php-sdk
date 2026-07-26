<?php
/*
 * Created on   : Fri Jul 03 2026
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : EmployeeTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Entities\Online\HrExchange;

use Datev\Entities\Online\HrExchange\Employees\{Employee, GrossPayment};
use Tests\Contracts\EntityTest;

class EmployeeTest extends EntityTest {
    private const EXAMPLE = [
        'surname' => 'Mustermann',
        'first_name' => 'Max',
        'personnel_number' => 77,
        'company_personnel_number' => 'F-0815',
        'payment_method' => 'bank_transfer',
        'account' => ['iban' => 'DE02120300000000202051', 'bic' => 'BYLADEM1001'],
        'address' => ['city' => 'Musterstadt', 'street' => 'Musterstraße', 'house_number' => '42', 'postal_code' => '90429', 'country' => 'DE'],
        'personal_data' => ['sex' => 'male', 'date_of_birth' => '1990-01-15', 'nationality' => '000'],
        'activity' => ['weekly_working_hours' => 38.5, 'activity_type' => 1],
        'employment_periods' => [
            ['date_of_commencement_of_employment' => '2020-01-01'],
            ['date_of_commencement_of_employment' => '2026-07-01', 'date_of_termination_of_employment' => '2026-12-31'],
        ],
        'gross_payments' => [
            ['id' => 1, 'amount' => 4200.5, 'salary_type_id' => 100, 'payment_months' => 'all'],
        ],
        'hourly_wages' => [
            ['id' => 1, 'amount' => 24.5],
        ],
        'tax_card' => ['tax_class' => '1', 'child_tax_allowances' => 0.5],
        'social_insurance' => ['contribution_class_health_insurance' => 1, 'is_additional_contribution_to_nursing_insurance_for_childless_ignored' => false],
        'vacation_entitlement' => ['basic_vacation_entitlement' => 30.0],
    ];

    public function test_deep_hydration(): void {
        $employee = Employee::fromJson(json_encode(self::EXAMPLE));

        $this->assertSame('Mustermann', $employee->getSurname());
        $this->assertSame(77, $employee->getPersonnelNumber());
        $this->assertSame('DE02120300000000202051', $employee->getAccount()?->getIban());
        $this->assertSame('Musterstadt', $employee->getAddress()?->getCity());
        $this->assertSame('1990-01-15', $employee->getPersonalData()?->getDateOfBirth());
        $this->assertSame(38.5, $employee->getActivity()?->getWeeklyWorkingHours());
        $this->assertSame(2, $employee->getEmploymentPeriods()?->count());
        $this->assertSame('2026-12-31', $employee->getEmploymentPeriods()?->getValues()[1]->getDateOfTerminationOfEmployment());

        $grossPayment = $employee->getGrossPayments()?->getFirstValue();
        $this->assertInstanceOf(GrossPayment::class, $grossPayment);
        $this->assertSame('4200.50', $grossPayment->getAmount()?->getAmount());

        $this->assertSame('24.50', $employee->getHourlyWages()?->getFirstValue()?->getAmount()?->getAmount());
        $this->assertSame('1', $employee->getTaxCard()?->getTaxClass());
        $this->assertSame(30.0, $employee->getVacationEntitlement()?->getBasicVacationEntitlement());
    }

    public function test_to_array_round_trip(): void {
        $employee = Employee::fromJson(json_encode(self::EXAMPLE));
        $array = $employee->toArray();

        $this->assertSame('Mustermann', $array['surname']);
        $this->assertSame(77, $array['personnel_number']);
        $this->assertIsArray($array['account']);
        $this->assertIsArray($array['employment_periods']);
    }
}
