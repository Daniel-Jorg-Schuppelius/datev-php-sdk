<?php
/*
 * Created on   : Wed Nov 11 2026
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : OpenApiPathTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\API;

use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;
use Tests\Support\OpenApiProbe;

/**
 * Jeder Pfad, den ein Endpunkt baut, muss in der mitgelieferten Spec stehen und
 * den deklarierten endpointSuffix enthalten.
 */
final class OpenApiPathTest extends TestCase {
    /**
     * Methoden, deren Operation die Spec nicht kennt; sie sind @deprecated und bleiben
     * aus Kompatibilitätsgründen. Ein Eintrag ohne Wirkung lässt den Test scheitern.
     */
    private const WITHOUT_SPEC_OPERATION = [
        'Accounting\CostAccountingRecordsEndpoint::get' => 'Spec kennt nur Liste und POST.',
        'Accounting\CostAccountingRecordsEndpoint::getById' => 'Spec kennt nur Liste und POST.',
        'ClientMasterData\ClientCategoriesEndpoint::get' => 'Spec kennt keinen Einzelabruf.',
        'Law\CausesEndpoint::get' => 'Spec kennt nur die Liste.',
        'Law\CustomFieldsEndpoint::get' => 'Spec kennt nur die Liste.',
        'Law\LevelsOfJurisdictionEndpoint::get' => 'Spec kennt nur die Liste.',
        'Law\SecurityZonesEndpoint::get' => 'Spec kennt nur die Liste.',
        'OrderManagement\ChargeRatesEndpoint::get' => 'Spec kennt nur die Liste.',
        'OrderManagement\ChargeRatesEndpoint::getForEmployee' => 'Spec kennt nur die Liste.',
        'OrderManagement\ClientsEndpoint::get' => 'Spec kennt nur die Liste.',
        'OrderManagement\ClientsEndpoint::getByGuid' => 'Spec kennt nur die Liste.',
        'OrderManagement\CostCentersEndpoint::get' => 'Spec kennt nur die Liste.',
        'OrderManagement\EmployeeCapacitiesEndpoint::get' => 'Spec kennt nur die Liste.',
        'OrderManagement\EmployeesCostRateEndpoint::get' => 'Spec kennt nur die Liste.',
        'OrderManagement\EmployeesEndpoint::get' => 'Ressource fehlt in Order Management 1.4.8.',
        'OrderManagement\EmployeesEndpoint::search' => 'Ressource fehlt in Order Management 1.4.8.',
        'OrderManagement\EmployeesQualificationEndpoint::get' => 'Spec kennt nur die Liste.',
        'OrderManagement\EmployeesWithGroupEndpoint::get' => 'Spec kennt nur die Liste.',
        'OrderManagement\ExpensePostingsEndpoint::get' => 'Spec kennt nur die Liste.',
        'OrderManagement\FeePlansEndpoint::get' => 'Spec kennt nur die Liste.',
        'OrderManagement\FeesEndpoint::get' => 'Spec kennt nur die Liste.',
        'OrderManagement\MonthlyValuesEndpoint::get' => 'Spec kennt nur die Liste.',
        'OrderManagement\OrderTypesEndpoint::get' => 'Spec kennt nur die Liste.',
        'OrderManagement\SelfClientsEndpoint::get' => 'Spec kennt nur die Liste.',
        'OrderManagement\SubordersEndpoint::getByOrderIdAndSuborderId' => 'Spec kennt für Teilaufträge nur PUT.',
        'Payroll\GrossPaymentsEndpoint::get' => 'Einzelabruf gibt es nur je Mitarbeiter.',
        'Payroll\HourlyWagesEndpoint::get' => 'Einzelabruf gibt es nur je Mitarbeiter.',
        'Payroll\VocationalTrainingsEndpoint::get' => 'Einzelabruf gibt es nur je Mitarbeiter.',
        'PublicSector\ConsumptionsEndpoint::get' => 'Spec kennt nur die Liste.',
        'PublicSector\ConsumptionsEndpoint::getById' => 'Spec kennt nur die Liste.',
        'PublicSector\DuesEndpoint::get' => 'Spec kennt nur die Liste.',
        'PublicSector\MeterReadingsEndpoint::create' => 'Spec kennt für meterreadings nur GET.',
    ];

    /**
     * @return array<string, array{0: string}>
     */
    public static function kinds(): array {
        return ['Desktop' => ['Desktop'], 'Online' => ['Online']];
    }

    #[DataProvider('kinds')]
    public function test_every_request_path_exists_in_the_openapi_spec(string $kind): void {
        $calls = OpenApiProbe::calls($kind);
        $this->assertNotEmpty($calls);

        $violations = [];
        foreach ($calls as $call) {
            if ($call['template'] === null && !isset(self::WITHOUT_SPEC_OPERATION[$call['operation']])) {
                $violations[] = "{$call['operation']}: {$call['method']} {$call['path']}";
            }
        }

        $this->assertSame([], array_values(array_unique($violations)), "Pfade ohne Gegenstück in docs/OpenAPI/{$kind}.");
    }

    /**
     * Nur Desktop: dort hängt jeder Endpunkt den Suffix selbst an, die Online-Basis tut es immer.
     */
    public function test_declared_suffix_is_part_of_every_request_path(): void {
        $violations = [];
        foreach (OpenApiProbe::calls('Desktop') as $call) {
            if ($call['suffix'] === '' || isset(self::WITHOUT_SPEC_OPERATION[$call['operation']])) {
                continue;
            }

            if (!str_contains('/' . $call['path'] . '/', "/{$call['suffix']}/")) {
                $violations[] = "{$call['operation']}: {$call['method']} {$call['path']} (Suffix '{$call['suffix']}')";
            }
        }

        $this->assertSame([], array_values(array_unique($violations)), 'Der deklarierte endpointSuffix fehlt im Pfad.');
    }

    public function test_exceptions_still_apply(): void {
        $offSpec = [];
        foreach (OpenApiProbe::calls('Desktop') as $call) {
            if ($call['template'] === null) {
                $offSpec[$call['operation']] = true;
            }
        }

        $this->assertSame([], array_keys(array_diff_key(self::WITHOUT_SPEC_OPERATION, $offSpec)), 'Ausnahmen ohne Wirkung: Eintrag entfernen.');
    }
}
