<?php
/*
 * Created on   : Sat Jan 11 2025
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : PayrollFixtures.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Mocks\Fixtures;

/**
 * Mock-Fixtures für Payroll (HR) Endpoints.
 */
class PayrollFixtures {
    public static function getClients(): array {
        return [
            [
                'id' => 'hr-12345',
                'consultant_number' => 12345,
                'client_number' => 1001,
                'name' => 'Musterfirma GmbH',
                'reference_date' => date('Y-m-d'),
            ],
        ];
    }

    public static function getClient(): array {
        return [
            'id' => 'hr-12345',
            'consultant_number' => 12345,
            'client_number' => 1001,
            'name' => 'Musterfirma GmbH',
            'reference_date' => date('Y-m-d'),
        ];
    }

    public static function getEmployees(): array {
        return [
            'content' => [
                [
                    'id' => 1,
                    'personnel_number' => 1,
                    'first_name' => 'Max',
                    'last_name' => 'Mustermann',
                    'date_of_birth' => '1985-05-15',
                    'entry_date' => '2020-01-01',
                    'status' => 'active',
                ],
                [
                    'id' => 2,
                    'personnel_number' => 2,
                    'first_name' => 'Erika',
                    'last_name' => 'Musterfrau',
                    'date_of_birth' => '1990-08-22',
                    'entry_date' => '2021-06-01',
                    'status' => 'active',
                ],
            ],
        ];
    }

    public static function getEmployee(): array {
        return [
            'id' => 1,
            'personnel_number' => 1,
            'first_name' => 'Max',
            'last_name' => 'Mustermann',
            'date_of_birth' => '1985-05-15',
            'entry_date' => '2020-01-01',
            'status' => 'active',
        ];
    }

    public static function getAddresses(): array {
        return [
            [
                'id' => 'addr-001',
                'street' => 'Musterstraße 123',
                'postal_code' => '12345',
                'city' => 'Musterstadt',
                'country' => 'DE',
            ],
        ];
    }

    public static function getSalaryComponents(): array {
        return [
            [
                'id' => 'sal-001',
                'type' => 'base_salary',
                'amount' => 4500.00,
                'currency' => 'EUR',
            ],
            [
                'id' => 'sal-002',
                'type' => 'bonus',
                'amount' => 500.00,
                'currency' => 'EUR',
            ],
        ];
    }

    public static function getWorkingHours(): array {
        return [
            'id' => 'wh-001',
            'weekly_hours' => 40.0,
            'daily_hours' => 8.0,
            'working_days' => ['monday', 'tuesday', 'wednesday', 'thursday', 'friday'],
        ];
    }

    public static function getTaxData(): array {
        return [
            [
                'id' => 'tax-001',
                'tax_class' => 1,
                'tax_id' => '12345678901',
                'church_tax' => true,
            ],
        ];
    }

    public static function getSocialInsurance(): array {
        return [
            [
                'id' => 'si-001',
                'health_insurance' => 'AOK',
                'pension_insurance' => true,
                'unemployment_insurance' => true,
                'nursing_insurance' => true,
            ],
        ];
    }

    public static function getPayslips(): array {
        return [
            [
                'id' => 'slip-001',
                'period' => '2024-01',
                'gross_amount' => 4500.00,
                'net_amount' => 2800.00,
                'payment_date' => '2024-01-31',
            ],
        ];
    }

    public static function getAbsences(): array {
        return [
            [
                'id' => 'abs-001',
                'type' => 'vacation',
                'start_date' => '2024-07-01',
                'end_date' => '2024-07-14',
                'days' => 10,
            ],
            [
                'id' => 'abs-002',
                'type' => 'sick_leave',
                'start_date' => '2024-03-15',
                'end_date' => '2024-03-17',
                'days' => 3,
            ],
        ];
    }

    public static function getAccountableEmployees(): array {
        return [
            [
                'id' => 'acc-emp-001',
                'personnel_number' => 1,
                'first_name' => 'Max',
                'last_name' => 'Mustermann',
            ],
        ];
    }

    public static function getAccountableEmployee(): array {
        return [
            'id' => 'acc-emp-001',
            'personnel_number' => 1,
            'first_name' => 'Max',
            'last_name' => 'Mustermann',
        ];
    }

    public static function getCostCenters(): array {
        return [
            [
                'id' => 'cc-001',
                'number' => '1000',
                'name' => 'Allgemein',
            ],
        ];
    }

    public static function getCostUnits(): array {
        return [
            [
                'id' => 'cu-001',
                'number' => '100',
                'name' => 'Produktion',
            ],
        ];
    }

    public static function getDepartments(): array {
        return [
            [
                'id' => 'dept-001',
                'number' => '10',
                'name' => 'IT-Abteilung',
            ],
        ];
    }

    public static function getReasonsForAbsence(): array {
        return [
            [
                'id' => 'rfa-001',
                'code' => 'KR',
                'name' => 'Krankheit',
            ],
        ];
    }

    public static function getSalaryTypes(): array {
        return [
            [
                'id' => 'st-001',
                'number' => '1',
                'name' => 'Grundgehalt',
            ],
        ];
    }

    public static function getCalendarRecords(): array {
        return [
            [
                'id' => 'cal-001',
                'date' => '2024-01-01',
                'type' => 'holiday',
            ],
        ];
    }

    public static function getActivities(): array {
        return [
            [
                'id' => 'act-001',
                'number' => '1',
                'name' => 'Haupttätigkeit',
            ],
        ];
    }

    public static function getEmployeeGroups(): array {
        return [
            [
                'id' => 'eg-001',
                'number' => '1',
                'name' => 'Angestellte',
            ],
        ];
    }

    public static function getGenericData(): array {
        return [
            'id' => 1,
            'status' => 'active',
        ];
    }

    public static function getGenericList(): array {
        return [
            [
                'id' => 1,
                'status' => 'active',
            ],
        ];
    }

    public static function getAllResponses(): array {
        return [
            'GET:/datev/api/hr/v3/clients' => [
                'statusCode' => 200,
                'body' => self::getClients(),
            ],
            'GET:/datev/api/hr/v3/clients/{id}' => [
                'statusCode' => 200,
                'body' => self::getClient(),
            ],
            // Accountable Employees
            'GET:/datev/api/hr/v3/clients/*/accountable-employees' => [
                'statusCode' => 200,
                'body' => self::getAccountableEmployees(),
            ],
            'GET:/datev/api/hr/v3/clients/*/accountable-employees/*' => [
                'statusCode' => 200,
                'body' => self::getAccountableEmployee(),
            ],
            // Employees
            'GET:/datev/api/hr/v3/clients/*/employees' => [
                'statusCode' => 200,
                'body' => self::getEmployees(),
            ],
            'GET:/datev/api/hr/v3/clients/*/employees/*' => [
                'statusCode' => 200,
                'body' => self::getEmployee(),
            ],
            'GET:/datev/api/hr/v3/clients/*/employees/*/addresses' => [
                'statusCode' => 200,
                'body' => self::getAddresses(),
            ],
            'GET:/datev/api/hr/v3/clients/*/employees/*/salary-components' => [
                'statusCode' => 200,
                'body' => self::getSalaryComponents(),
            ],
            'GET:/datev/api/hr/v3/clients/*/employees/*/working-hours' => [
                'statusCode' => 200,
                'body' => self::getWorkingHours(),
            ],
            'GET:/datev/api/hr/v3/clients/*/employees/*/tax-data' => [
                'statusCode' => 200,
                'body' => self::getTaxData(),
            ],
            'GET:/datev/api/hr/v3/clients/*/employees/*/social-insurance' => [
                'statusCode' => 200,
                'body' => self::getSocialInsurance(),
            ],
            'GET:/datev/api/hr/v3/clients/*/payslips' => [
                'statusCode' => 200,
                'body' => self::getPayslips(),
            ],
            'GET:/datev/api/hr/v3/clients/*/absences' => [
                'statusCode' => 200,
                'body' => self::getAbsences(),
            ],
            // Cost Centers & Units
            'GET:/datev/api/hr/v3/clients/*/cost-centers' => [
                'statusCode' => 200,
                'body' => self::getCostCenters(),
            ],
            'GET:/datev/api/hr/v3/clients/*/cost-centers/*' => [
                'statusCode' => 200,
                'body' => self::getCostCenters()[0],
            ],
            'GET:/datev/api/hr/v3/clients/*/cost-units' => [
                'statusCode' => 200,
                'body' => self::getCostUnits(),
            ],
            'GET:/datev/api/hr/v3/clients/*/cost-units/*' => [
                'statusCode' => 200,
                'body' => self::getCostUnits()[0],
            ],
            // Departments
            'GET:/datev/api/hr/v3/clients/*/departments' => [
                'statusCode' => 200,
                'body' => self::getDepartments(),
            ],
            'GET:/datev/api/hr/v3/clients/*/departments/*' => [
                'statusCode' => 200,
                'body' => self::getDepartments()[0],
            ],
            // Reasons for Absence
            'GET:/datev/api/hr/v3/clients/*/reasons-for-absence' => [
                'statusCode' => 200,
                'body' => self::getReasonsForAbsence(),
            ],
            'GET:/datev/api/hr/v3/clients/*/reasons-for-absence/*' => [
                'statusCode' => 200,
                'body' => self::getReasonsForAbsence()[0],
            ],
            // Salary Types
            'GET:/datev/api/hr/v3/clients/*/salary-types' => [
                'statusCode' => 200,
                'body' => self::getSalaryTypes(),
            ],
            'GET:/datev/api/hr/v3/clients/*/salary-types/*' => [
                'statusCode' => 200,
                'body' => self::getSalaryTypes()[0],
            ],
            // Calendar Records
            'GET:/datev/api/hr/v3/clients/*/calendar-records' => [
                'statusCode' => 200,
                'body' => self::getCalendarRecords(),
            ],
            // Activities
            'GET:/datev/api/hr/v3/clients/*/activities' => [
                'statusCode' => 200,
                'body' => self::getActivities(),
            ],
            'GET:/datev/api/hr/v3/clients/*/activities/*' => [
                'statusCode' => 200,
                'body' => self::getActivities()[0],
            ],
            // Employee Groups
            'GET:/datev/api/hr/v3/clients/*/employee-groups' => [
                'statusCode' => 200,
                'body' => self::getEmployeeGroups(),
            ],
            'GET:/datev/api/hr/v3/clients/*/employee-groups/*' => [
                'statusCode' => 200,
                'body' => self::getEmployeeGroups()[0],
            ],
            // Generic patterns for remaining employee sub-endpoints
            'GET:/datev/api/hr/v3/clients/*/employees/*/account' => [
                'statusCode' => 200,
                'body' => self::getGenericData(),
            ],
            'GET:/datev/api/hr/v3/clients/*/employees/*/activity' => [
                'statusCode' => 200,
                'body' => self::getGenericData(),
            ],
            'GET:/datev/api/hr/v3/clients/*/employees/*/disability' => [
                'statusCode' => 200,
                'body' => self::getGenericData(),
            ],
            'GET:/datev/api/hr/v3/clients/*/employees/*/employee-group' => [
                'statusCode' => 200,
                'body' => self::getGenericData(),
            ],
            'GET:/datev/api/hr/v3/clients/*/employees/*/employee-group-accounting' => [
                'statusCode' => 200,
                'body' => self::getGenericData(),
            ],
            'GET:/datev/api/hr/v3/clients/*/employees/*/employment-periods' => [
                'statusCode' => 200,
                'body' => self::getGenericList(),
            ],
            'GET:/datev/api/hr/v3/clients/*/employees/*/financial-accounting' => [
                'statusCode' => 200,
                'body' => self::getGenericData(),
            ],
            'GET:/datev/api/hr/v3/clients/*/employees/*/gross-payments' => [
                'statusCode' => 200,
                'body' => self::getGenericList(),
            ],
            'GET:/datev/api/hr/v3/clients/*/employees/*/hourly-wages' => [
                'statusCode' => 200,
                'body' => self::getGenericList(),
            ],
            'GET:/datev/api/hr/v3/clients/*/employees/*/individual-data' => [
                'statusCode' => 200,
                'body' => self::getGenericData(),
            ],
            'GET:/datev/api/hr/v3/clients/*/employees/*/initial-activities' => [
                'statusCode' => 200,
                'body' => self::getGenericList(),
            ],
            'GET:/datev/api/hr/v3/clients/*/employees/*/month-records' => [
                'statusCode' => 200,
                'body' => self::getGenericList(),
            ],
            'GET:/datev/api/hr/v3/clients/*/employees/*/personal-data' => [
                'statusCode' => 200,
                'body' => self::getGenericData(),
            ],
            'GET:/datev/api/hr/v3/clients/*/employees/*/private-insurance' => [
                'statusCode' => 200,
                'body' => self::getGenericData(),
            ],
            'GET:/datev/api/hr/v3/clients/*/employees/*/salaries' => [
                'statusCode' => 200,
                'body' => self::getGenericList(),
            ],
            'GET:/datev/api/hr/v3/clients/*/employees/*/taxation' => [
                'statusCode' => 200,
                'body' => self::getGenericData(),
            ],
            'GET:/datev/api/hr/v3/clients/*/employees/*/tax-card' => [
                'statusCode' => 200,
                'body' => self::getGenericData(),
            ],
            'GET:/datev/api/hr/v3/clients/*/employees/*/vacation-entitlement' => [
                'statusCode' => 200,
                'body' => self::getGenericData(),
            ],
            'GET:/datev/api/hr/v3/clients/*/employees/*/vocational-trainings' => [
                'statusCode' => 200,
                'body' => self::getGenericList(),
            ],
            'GET:/datev/api/hr/v3/clients/*/employees/*/voluntary-insurance' => [
                'statusCode' => 200,
                'body' => self::getGenericData(),
            ],
            // Direct client endpoints (nicht unter employees)
            'GET:/datev/api/hr/v3/clients/*/working-hours' => [
                'statusCode' => 200,
                'body' => self::getGenericList(),
            ],
            'GET:/datev/api/hr/v3/clients/*/activity' => [
                'statusCode' => 200,
                'body' => self::getGenericList(),
            ],
            'GET:/datev/api/hr/v3/clients/*/address' => [
                'statusCode' => 200,
                'body' => self::getGenericList(),
            ],
            'GET:/datev/api/hr/v3/clients/*/disability' => [
                'statusCode' => 200,
                'body' => self::getGenericList(),
            ],
            'GET:/datev/api/hr/v3/clients/*/employee-group' => [
                'statusCode' => 200,
                'body' => self::getGenericList(),
            ],
            'GET:/datev/api/hr/v3/clients/*/employee-group-accounting' => [
                'statusCode' => 200,
                'body' => self::getGenericList(),
            ],
            'GET:/datev/api/hr/v3/clients/*/employment-periods' => [
                'statusCode' => 200,
                'body' => self::getGenericList(),
            ],
            'GET:/datev/api/hr/v3/clients/*/financial-accounting' => [
                'statusCode' => 200,
                'body' => self::getGenericList(),
            ],
            'GET:/datev/api/hr/v3/clients/*/gross-payments' => [
                'statusCode' => 200,
                'body' => self::getGenericList(),
            ],
            'GET:/datev/api/hr/v3/clients/*/hourly-wages' => [
                'statusCode' => 200,
                'body' => self::getGenericList(),
            ],
            'GET:/datev/api/hr/v3/clients/*/individual-data' => [
                'statusCode' => 200,
                'body' => self::getGenericList(),
            ],
            'GET:/datev/api/hr/v3/clients/*/initial-activities' => [
                'statusCode' => 200,
                'body' => self::getGenericList(),
            ],
            'GET:/datev/api/hr/v3/clients/*/month-records' => [
                'statusCode' => 200,
                'body' => self::getGenericList(),
            ],
            'GET:/datev/api/hr/v3/clients/*/personal-data' => [
                'statusCode' => 200,
                'body' => self::getGenericList(),
            ],
            'GET:/datev/api/hr/v3/clients/*/private-insurance' => [
                'statusCode' => 200,
                'body' => self::getGenericList(),
            ],
            'GET:/datev/api/hr/v3/clients/*/salaries' => [
                'statusCode' => 200,
                'body' => self::getGenericList(),
            ],
            'GET:/datev/api/hr/v3/clients/*/taxation' => [
                'statusCode' => 200,
                'body' => self::getGenericList(),
            ],
            'GET:/datev/api/hr/v3/clients/*/tax-card' => [
                'statusCode' => 200,
                'body' => self::getGenericList(),
            ],
            'GET:/datev/api/hr/v3/clients/*/vacation-entitlement' => [
                'statusCode' => 200,
                'body' => self::getGenericList(),
            ],
            'GET:/datev/api/hr/v3/clients/*/vocational-trainings' => [
                'statusCode' => 200,
                'body' => self::getGenericList(),
            ],
            'GET:/datev/api/hr/v3/clients/*/voluntary-insurance' => [
                'statusCode' => 200,
                'body' => self::getGenericList(),
            ],
            'GET:/datev/api/hr/v3/clients/*/social-insurance' => [
                'statusCode' => 200,
                'body' => self::getGenericList(),
            ],
            'GET:/datev/api/hr/v3/clients/*/account' => [
                'statusCode' => 200,
                'body' => self::getGenericList(),
            ],
            // Employees mit Sub-Endpoints (ohne zusätzlichen Client-Pfad)
            'GET:/datev/api/hr/v3/clients/*/employees/*/initial-activities' => [
                'statusCode' => 200,
                'body' => self::getGenericList(),
            ],
        ];
    }
}
