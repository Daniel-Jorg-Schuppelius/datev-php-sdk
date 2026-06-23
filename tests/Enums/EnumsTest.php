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

use Datev\Enums\{AccountingReason, AccountingRecordType, AddressType, AdvancePaymentRecordType, BVVPosition, CashDiscountType, CommunicationType, Country, DebitCredit, Entitlement, InspectionStatus, LegalFormType, MeansOfIdentification, NationalLawType, Nationality, PaymentMethod, PersonType, Preposition, Status, StructureItemType, TaxationMethod, WindingUpStatus};
use PHPUnit\Framework\TestCase;

class EnumsTest extends TestCase {
    public function test_accounting_reason_enum(): void {
        $this->assertEquals("commercial_law", AccountingReason::CommercialLaw->value);
        $this->assertEquals("tax_law", AccountingReason::TaxLaw->value);
        $this->assertInstanceOf(AccountingReason::class, AccountingReason::from("commercial_law"));
    }

    public function test_accounting_record_type_enum(): void {
        $this->assertEquals("financial_accounting", AccountingRecordType::FinancialAccounting->value);
        $this->assertEquals("annual_financial_statements", AccountingRecordType::AnnualFinancialStatements->value);
        $this->assertInstanceOf(AccountingRecordType::class, AccountingRecordType::from("financial_accounting"));
    }

    public function test_address_type_enum(): void {
        $addressType = AddressType::cases();
        $this->assertNotEmpty($addressType);
    }

    public function test_advance_payment_record_type_enum(): void {
        $recordType = AdvancePaymentRecordType::cases();
        $this->assertNotEmpty($recordType);
    }

    public function test_bvv_position_enum(): void {
        $bvvPosition = BVVPosition::cases();
        $this->assertNotEmpty($bvvPosition);
    }

    public function test_cash_discount_type_enum(): void {
        $cashDiscountType = CashDiscountType::cases();
        $this->assertNotEmpty($cashDiscountType);
    }

    public function test_communication_type_enum(): void {
        $communicationType = CommunicationType::cases();
        $this->assertNotEmpty($communicationType);
    }

    public function test_country_enum(): void {
        $this->assertEquals("DE", Country::Deutschland->value);
        $this->assertEquals("AT", Country::Österreich->value);
        $this->assertEquals("CH", Country::Schweiz->value);
        $this->assertInstanceOf(Country::class, Country::from("DE"));
    }

    public function test_debit_credit_enum(): void {
        $debitCredit = DebitCredit::cases();
        $this->assertNotEmpty($debitCredit);
    }

    public function test_entitlement_enum(): void {
        $entitlement = Entitlement::cases();
        $this->assertNotEmpty($entitlement);
    }

    public function test_inspection_status_enum(): void {
        $inspectionStatus = InspectionStatus::cases();
        $this->assertNotEmpty($inspectionStatus);
    }

    public function test_legal_form_type_enum(): void {
        $legalFormType = LegalFormType::cases();
        $this->assertNotEmpty($legalFormType);
    }

    public function test_means_of_identification_enum(): void {
        $meansOfIdentification = MeansOfIdentification::cases();
        $this->assertNotEmpty($meansOfIdentification);
    }

    public function test_nationality_enum(): void {
        $nationality = Nationality::cases();
        $this->assertNotEmpty($nationality);
    }

    public function test_national_law_type_enum(): void {
        $nationalLawType = NationalLawType::cases();
        $this->assertNotEmpty($nationalLawType);
    }

    public function test_payment_method_enum(): void {
        $paymentMethod = PaymentMethod::cases();
        $this->assertNotEmpty($paymentMethod);
    }

    public function test_person_type_enum(): void {
        $personType = PersonType::cases();
        $this->assertNotEmpty($personType);
    }

    public function test_preposition_enum(): void {
        $preposition = Preposition::cases();
        $this->assertNotEmpty($preposition);
    }

    public function test_status_enum(): void {
        $status = Status::cases();
        $this->assertNotEmpty($status);
    }

    public function test_structure_item_type_enum(): void {
        $structureItemType = StructureItemType::cases();
        $this->assertNotEmpty($structureItemType);
    }

    public function test_taxation_method_enum(): void {
        $taxationMethod = TaxationMethod::cases();
        $this->assertNotEmpty($taxationMethod);
    }

    public function test_winding_up_status_enum(): void {
        $windingUpStatus = WindingUpStatus::cases();
        $this->assertNotEmpty($windingUpStatus);
    }
}
