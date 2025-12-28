<?php
/*
 * Created on   : Sun Oct 06 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : EnumsTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Enums;

use Datev\Enums\AccountingReason;
use Datev\Enums\AccountingRecordType;
use Datev\Enums\AddressType;
use Datev\Enums\AdvancePaymentRecordType;
use Datev\Enums\BVVPosition;
use Datev\Enums\CashDiscountType;
use Datev\Enums\CommunicationType;
use Datev\Enums\Country;
use Datev\Enums\DebitCredit;
use Datev\Enums\Entitlement;
use Datev\Enums\InspectionStatus;
use Datev\Enums\LegalFormType;
use Datev\Enums\MeansOfIdentification;
use Datev\Enums\Nationality;
use Datev\Enums\NationalLawType;
use Datev\Enums\PaymentMethod;
use Datev\Enums\PersonType;
use Datev\Enums\Preposition;
use Datev\Enums\Status;
use Datev\Enums\StructureItemType;
use Datev\Enums\TaxationMethod;
use Datev\Enums\WindingUpStatus;
use PHPUnit\Framework\TestCase;

class EnumsTest extends TestCase {
    public function testAccountingReasonEnum(): void {
        $this->assertEquals("commercial_law", AccountingReason::CommercialLaw->value);
        $this->assertEquals("tax_law", AccountingReason::TaxLaw->value);
        $this->assertInstanceOf(AccountingReason::class, AccountingReason::from("commercial_law"));
    }

    public function testAccountingRecordTypeEnum(): void {
        $this->assertEquals("financial_accounting", AccountingRecordType::FinancialAccounting->value);
        $this->assertEquals("annual_financial_statements", AccountingRecordType::AnnualFinancialStatements->value);
        $this->assertInstanceOf(AccountingRecordType::class, AccountingRecordType::from("financial_accounting"));
    }

    public function testAddressTypeEnum(): void {
        $addressType = AddressType::cases();
        $this->assertNotEmpty($addressType);
    }

    public function testAdvancePaymentRecordTypeEnum(): void {
        $recordType = AdvancePaymentRecordType::cases();
        $this->assertNotEmpty($recordType);
    }

    public function testBVVPositionEnum(): void {
        $bvvPosition = BVVPosition::cases();
        $this->assertNotEmpty($bvvPosition);
    }

    public function testCashDiscountTypeEnum(): void {
        $cashDiscountType = CashDiscountType::cases();
        $this->assertNotEmpty($cashDiscountType);
    }

    public function testCommunicationTypeEnum(): void {
        $communicationType = CommunicationType::cases();
        $this->assertNotEmpty($communicationType);
    }

    public function testCountryEnum(): void {
        $this->assertEquals("DE", Country::Deutschland->value);
        $this->assertEquals("AT", Country::Österreich->value);
        $this->assertEquals("CH", Country::Schweiz->value);
        $this->assertInstanceOf(Country::class, Country::from("DE"));
    }

    public function testDebitCreditEnum(): void {
        $debitCredit = DebitCredit::cases();
        $this->assertNotEmpty($debitCredit);
    }

    public function testEntitlementEnum(): void {
        $entitlement = Entitlement::cases();
        $this->assertNotEmpty($entitlement);
    }

    public function testInspectionStatusEnum(): void {
        $inspectionStatus = InspectionStatus::cases();
        $this->assertNotEmpty($inspectionStatus);
    }

    public function testLegalFormTypeEnum(): void {
        $legalFormType = LegalFormType::cases();
        $this->assertNotEmpty($legalFormType);
    }

    public function testMeansOfIdentificationEnum(): void {
        $meansOfIdentification = MeansOfIdentification::cases();
        $this->assertNotEmpty($meansOfIdentification);
    }

    public function testNationalityEnum(): void {
        $nationality = Nationality::cases();
        $this->assertNotEmpty($nationality);
    }

    public function testNationalLawTypeEnum(): void {
        $nationalLawType = NationalLawType::cases();
        $this->assertNotEmpty($nationalLawType);
    }

    public function testPaymentMethodEnum(): void {
        $paymentMethod = PaymentMethod::cases();
        $this->assertNotEmpty($paymentMethod);
    }

    public function testPersonTypeEnum(): void {
        $personType = PersonType::cases();
        $this->assertNotEmpty($personType);
    }

    public function testPrepositionEnum(): void {
        $preposition = Preposition::cases();
        $this->assertNotEmpty($preposition);
    }

    public function testStatusEnum(): void {
        $status = Status::cases();
        $this->assertNotEmpty($status);
    }

    public function testStructureItemTypeEnum(): void {
        $structureItemType = StructureItemType::cases();
        $this->assertNotEmpty($structureItemType);
    }

    public function testTaxationMethodEnum(): void {
        $taxationMethod = TaxationMethod::cases();
        $this->assertNotEmpty($taxationMethod);
    }

    public function testWindingUpStatusEnum(): void {
        $windingUpStatus = WindingUpStatus::cases();
        $this->assertNotEmpty($windingUpStatus);
    }
}
