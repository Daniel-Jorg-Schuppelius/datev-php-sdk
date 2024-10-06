<?php
/*
 * Created on   : Sun Oct 06 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : Detail.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\Entities\ClientMasterData\Details;

use APIToolkit\Contracts\Abstracts\NamedEntity;
use DateTime;
use Datev\Entities\ClientMasterData\CodesOfClassificationOfEconomicActivities2003\CodeOfClassificationOfEconomicActivities2003;
use Datev\Entities\ClientMasterData\CodesOfClassificationOfEconomicActivities2003\CodesOfClassificationOfEconomicActivities2003;
use Datev\Entities\ClientMasterData\CodesOfClassificationOfEconomicActivities2008\CodeOfClassificationOfEconomicActivities2008;
use Datev\Entities\ClientMasterData\CodesOfClassificationOfEconomicActivities2008\CodesOfClassificationOfEconomicActivities2008;
use Datev\Entities\ClientMasterData\CompanyNames\ThreeLined\FirstLine\CompanyName as ThreeLinedFirstLineCompanyName;
use Datev\Entities\ClientMasterData\CompanyNames\ThreeLined\FirstLine\CompanyNames as ThreeLinedFirstLineCompanyNames;
use Datev\Entities\ClientMasterData\CompanyNames\ThreeLined\SecondLine\CompanyName as ThreeLinedSecondLineCompanyName;
use Datev\Entities\ClientMasterData\CompanyNames\ThreeLined\SecondLine\CompanyNames as ThreeLinedSecondLineCompanyNames;
use Datev\Entities\ClientMasterData\CompanyNames\ThreeLined\ThirdLine\CompanyName as ThreeLinedThirdLineCompanyName;
use Datev\Entities\ClientMasterData\CompanyNames\ThreeLined\ThirdLine\CompanyNames as ThreeLinedThirdLineCompanyNames;
use Datev\Entities\ClientMasterData\CompanyNames\TwoLined\FirstLine\CompanyName as TwoLinedFirstLineCompanyName;
use Datev\Entities\ClientMasterData\CompanyNames\TwoLined\FirstLine\CompanyNames as TwoLinedFirstLineCompanyNames;
use Datev\Entities\ClientMasterData\CompanyNames\TwoLined\SecondLine\CompanyName as TwoLinedSecondLineCompanyName;
use Datev\Entities\ClientMasterData\CompanyNames\TwoLined\SecondLine\CompanyNames as TwoLinedSecondLineCompanyNames;
use Datev\Entities\ClientMasterData\Considerations\Consideration;
use Datev\Entities\ClientMasterData\Considerations\Considerations;
use Datev\Entities\ClientMasterData\CountriesOfHeadOffice\CountriesOfHeadOffice;
use Datev\Entities\ClientMasterData\CountriesOfHeadOffice\CountryOfHeadOffice;
use Datev\Entities\ClientMasterData\Denominations\Denomination;
use Datev\Entities\ClientMasterData\Denominations\Denominations;
use Datev\Entities\ClientMasterData\DescriptionsOfClassificationOfEconomicActivities2003\DescriptionOfClassificationOfEconomicActivities2003;
use Datev\Entities\ClientMasterData\DescriptionsOfClassificationOfEconomicActivities2003\DescriptionsOfClassificationOfEconomicActivities2003;
use Datev\Entities\ClientMasterData\DescriptionsOfClassificationOfEconomicActivities2008\DescriptionOfClassificationOfEconomicActivities2008;
use Datev\Entities\ClientMasterData\DescriptionsOfClassificationOfEconomicActivities2008\DescriptionsOfClassificationOfEconomicActivities2008;
use Datev\Entities\ClientMasterData\DistributionsOfProfit\DistributionOfProfit;
use Datev\Entities\ClientMasterData\DistributionsOfProfit\DistributionsOfProfit;
use Datev\Entities\ClientMasterData\EnterprisePurposes\EnterprisePurpose;
use Datev\Entities\ClientMasterData\EnterprisePurposes\EnterprisePurposes;
use Datev\Entities\ClientMasterData\FederalStates\FederalStateOfLegalPerson;
use Datev\Entities\ClientMasterData\FederalStates\FederalStateOfNaturalPerson;
use Datev\Entities\ClientMasterData\FederalStates\FederalStates;
use Datev\Entities\ClientMasterData\FederalStatesMAD\FederalStateMADOfLegalPerson;
use Datev\Entities\ClientMasterData\FederalStatesMAD\FederalStatesMAD;
use Datev\Entities\ClientMasterData\FiscalYears\FiscalYear;
use Datev\Entities\ClientMasterData\FiscalYears\FiscalYears;
use Datev\Entities\ClientMasterData\JobTitles\JobTitle;
use Datev\Entities\ClientMasterData\JobTitles\JobTitles;
use Datev\Entities\ClientMasterData\KindOfRegisterCourts\KindOfRegisterCourt;
use Datev\Entities\ClientMasterData\KindOfRegisterCourts\KindOfRegisterCourts;
use Datev\Entities\ClientMasterData\LocationsOfHeadOffice\LocationOfHeadOffice;
use Datev\Entities\ClientMasterData\LocationsOfHeadOffice\LocationsOfHeadOffice;
use Datev\Entities\ClientMasterData\MADCodesOfClassificationOfEconomicActivities2003\MADCodeOfClassificationOfEconomicActivities2003;
use Datev\Entities\ClientMasterData\MADCodesOfClassificationOfEconomicActivities2003\MADCodesOfClassificationOfEconomicActivities2003;
use Datev\Entities\ClientMasterData\MADCodesOfClassificationOfEconomicActivities2008\MADCodeOfClassificationOfEconomicActivities2008;
use Datev\Entities\ClientMasterData\MADCodesOfClassificationOfEconomicActivities2008\MADCodesOfClassificationOfEconomicActivities2008;
use Datev\Entities\ClientMasterData\MaritalStatuses\MaritalStatus;
use Datev\Entities\ClientMasterData\MaritalStatuses\MaritalStatuses;
use Datev\Entities\ClientMasterData\NamesOfRegisterCourt\NameOfRegisterCourt;
use Datev\Entities\ClientMasterData\NamesOfRegisterCourt\NamesOfRegisterCourt;
use Datev\Entities\ClientMasterData\RegisteredCompanyNames\RegisteredCompanyName;
use Datev\Entities\ClientMasterData\RegisteredCompanyNames\RegisteredCompanyNames;
use Datev\Entities\ClientMasterData\RegistrationNumbers\RegistrationNumber;
use Datev\Entities\ClientMasterData\RegistrationNumbers\RegistrationNumbers;
use Datev\Enums\Country;
use Datev\Enums\MeansOfIdentification;
use Datev\Enums\Nationality;
use Datev\Enums\NationalLawType;
use Datev\Enums\Preposition;
use Datev\Enums\WindingUpStatus;
use Psr\Log\LoggerInterface;

class Detail extends NamedEntity {
    protected ?string $complimentary_close;
    protected ?string $correspondence_title;
    protected ?NationalLawType $national_right;
    protected ?string $note;
    protected ?string $salutation;
    protected ?string $all_first_names;
    protected ?string $birth_name;
    protected ?Considerations $considerations;
    protected ?Consideration $current_consideration;
    protected ?Country $country_of_birth;
    protected ?DateTime $date_of_death;
    protected ?DateTime $date_of_expiry;
    protected ?DateTime $date_of_issue;
    protected ?string $degree;
    protected ?Denominations $denominations;
    protected ?Denomination $current_denomination;
    protected ?FederalStates $federal_states_of_natural_person;
    protected ?FederalStateOfNaturalPerson $current_federal_state_of_natural_person;
    protected ?string $identification_number;
    protected ?string $issuing_authority;
    protected ?JobTitles $job_titles;
    protected ?JobTitle $current_job_title;
    protected ?MaritalStatuses $marital_statuses;
    protected ?MaritalStatus $current_marital_status;
    protected ?Preposition $name_prefix;
    protected ?Nationality $nationality;
    protected ?MeansOfIdentification $paper_of_identity;
    protected ?string $pension_insurance_institute;
    protected ?string $place_of_birth;
    protected ?string $register_of_births_number;
    protected ?string $register_office_of_birth;
    protected ?string $social_security_number;
    protected ?string $title_of_nobility;
    protected ?CodesOfClassificationOfEconomicActivities2008 $codes_of_classification_of_economic_activities_2008;
    protected ?CodeOfClassificationOfEconomicActivities2008 $current_code_of_classification_of_economic_activities_2008;
    protected ?DescriptionsOfClassificationOfEconomicActivities2008 $descriptions_of_classification_of_economic_activities_2008;
    protected ?DescriptionOfClassificationOfEconomicActivities2008 $current_description_of_classification_of_economic_activities_2008;
    protected ?MADCodesOfClassificationOfEconomicActivities2008 $mad_codes_of_classification_of_economic_activities_2008;
    protected ?MADCodeOfClassificationOfEconomicActivities2008 $current_mad_code_of_classification_of_economic_activities_2008;
    protected ?CodesOfClassificationOfEconomicActivities2003 $codes_of_classification_of_economic_activities_2003;
    protected ?CodeOfClassificationOfEconomicActivities2003 $current_code_of_classification_of_economic_activities_2003;
    protected ?DescriptionsOfClassificationOfEconomicActivities2003 $descriptions_of_classification_of_economic_activities_2003;
    protected ?DescriptionOfClassificationOfEconomicActivities2003 $current_description_of_classification_of_economic_activities_2003;
    protected ?MADCodesOfClassificationOfEconomicActivities2003 $mad_codes_of_classification_of_economic_activities_2003;
    protected ?MADCodeOfClassificationOfEconomicActivities2003 $current_mad_code_of_classification_of_economic_activities_2003;
    protected ?CountriesOfHeadOffice $countries_of_head_office;
    protected ?CountryOfHeadOffice $current_country_of_head_office;
    protected ?DateTime $date_of_memorandum_of_association;
    protected ?DistributionsOfProfit $distributions_of_profit;
    protected ?DistributionOfProfit $current_distribution_of_profit;
    protected ?EnterprisePurposes $enterprise_purposes;
    protected ?EnterprisePurpose $current_enterprise_purpose;
    protected ?FederalStatesMAD $federal_states_mad_of_legal_person;
    protected ?FederalStateMADOfLegalPerson $current_federal_state_mad_of_legal_person;
    protected ?FederalStates $federal_states_of_legal_person;
    protected ?FederalStateOfLegalPerson $current_federal_state_of_legal_person;
    protected ?FiscalYears $fiscal_years;
    protected ?FiscalYear $current_fiscal_year;
    protected ?KindOfRegisterCourts $kind_of_register_courts;
    protected ?KindOfRegisterCourt $current_kind_of_register_court;
    protected ?LocationsOfHeadOffice $locations_of_head_office;
    protected ?LocationOfHeadOffice $current_location_of_head_office;
    protected ?NamesOfRegisterCourt $names_of_register_court;
    protected ?NameOfRegisterCourt $current_name_of_register_court;
    protected ?RegisteredCompanyNames $registered_company_names;
    protected ?RegisteredCompanyName $current_registered_company_name;
    protected ?DateTime $registration_date;
    protected ?RegistrationNumbers $registration_numbers;
    protected ?RegistrationNumber $current_registration_number;
    protected ?ThreeLinedFirstLineCompanyNames $three_lined_company_names_first_line;
    protected ?ThreeLinedFirstLineCompanyName $current_three_lined_company_name_first_line;
    protected ?ThreeLinedSecondLineCompanyNames $three_lined_company_names_second_line;
    protected ?ThreeLinedSecondLineCompanyName $current_three_lined_company_name_second_line;
    protected ?ThreeLinedThirdLineCompanyNames $three_lined_company_names_third_line;
    protected ?ThreeLinedThirdLineCompanyName $current_three_lined_company_name_third_line;
    protected ?TwoLinedFirstLineCompanyNames $two_lined_company_names_first_line;
    protected ?TwoLinedFirstLineCompanyName $current_two_lined_company_name_first_line;
    protected ?TwoLinedSecondLineCompanyNames $two_lined_company_names_second_line;
    protected ?TwoLinedSecondLineCompanyName $current_two_lined_company_name_second_line;
    protected ?DateTime $winding_up_date;
    protected ?WindingUpStatus $winding_up_proceedings;

    public function __construct($data = null, ?LoggerInterface $logger = null) {
        parent::__construct($data, $logger);
    }

    public function getComplimentaryClose(): ?string {
        return $this->complimentary_close ?? null;
    }

    public function getCorrespondenceTitle(): ?string {
        return $this->correspondence_title ?? null;
    }

    public function getNationalRight(): ?NationalLawType {
        return $this->national_right ?? null;
    }

    public function getNote(): ?string {
        return $this->note ?? null;
    }

    public function getSalutation(): ?string {
        return $this->salutation ?? null;
    }

    public function getAllFirstNames(): ?string {
        return $this->all_first_names ?? null;
    }

    public function getBirthName(): ?string {
        return $this->birth_name ?? null;
    }

    public function getConsiderations(): ?Considerations {
        return $this->considerations ?? null;
    }

    public function getCurrentConsideration(): ?Consideration {
        return $this->current_consideration ?? null;
    }

    public function getCountryOfBirth(): ?Country {
        return $this->country_of_birth ?? null;
    }

    public function getDateOfDeath(): ?DateTime {
        return $this->date_of_death ?? null;
    }

    public function getDateOfExpiry(): ?DateTime {
        return $this->date_of_expiry ?? null;
    }

    public function getDateOfIssue(): ?DateTime {
        return $this->date_of_issue ?? null;
    }

    public function getDegree(): ?string {
        return $this->degree ?? null;
    }

    public function getDenominations(): ?Denominations {
        return $this->denominations ?? null;
    }

    public function getCurrentDenomination(): ?Denomination {
        return $this->current_denomination ?? null;
    }

    public function getFederalStatesOfNaturalPerson(): ?FederalStates {
        return $this->federal_states_of_natural_person ?? null;
    }

    public function getCurrentFederalStateOfNaturalPerson(): ?FederalStateOfNaturalPerson {
        return $this->current_federal_state_of_natural_person ?? null;
    }

    public function getIdentificationNumber(): ?string {
        return $this->identification_number ?? null;
    }

    public function getIssuingAuthority(): ?string {
        return $this->issuing_authority ?? null;
    }

    public function getJobTitles(): ?JobTitles {
        return $this->job_titles ?? null;
    }

    public function getCurrentJobTitle(): ?JobTitle {
        return $this->current_job_title ?? null;
    }

    public function getMaritalStatuses(): ?MaritalStatuses {
        return $this->marital_statuses ?? null;
    }

    public function getCurrentMaritalStatus(): ?MaritalStatus {
        return $this->current_marital_status ?? null;
    }

    public function getNamePrefix(): ?Preposition {
        return $this->name_prefix ?? null;
    }

    public function getNationality(): Nationality {
        return $this->nationality ?? null;
    }

    public function getPaperOfIdentity(): ?MeansOfIdentification {
        return $this->paper_of_identity ?? null;
    }

    public function getPlaceOfBirth(): ?string {
        return $this->place_of_birth ?? null;
    }

    public function getRegisterOfBirthsNumber(): ?string {
        return $this->register_of_births_number ?? null;
    }

    public function getRegisterOfficeOfBirth(): ?string {
        return $this->register_office_of_birth ?? null;
    }

    public function getSocialSecurityNumber(): ?string {
        return $this->social_security_number ?? null;
    }

    public function getTitleOfNobility(): ?string {
        return $this->title_of_nobility ?? null;
    }

    public function getCodesOfClassificationOfEconomicActivities2008(): ?CodesOfClassificationOfEconomicActivities2008 {
        return $this->codes_of_classification_of_economic_activities_2008 ?? null;
    }

    public function getCurrentCodeOfClassificationOfEconomicActivities2008(): ?CodeOfClassificationOfEconomicActivities2008 {
        return $this->current_code_of_classification_of_economic_activities_2008 ?? null;
    }

    public function getDescriptionsOfClassificationOfEconomicActivities2008(): ?DescriptionsOfClassificationOfEconomicActivities2008 {
        return $this->descriptions_of_classification_of_economic_activities_2008 ?? null;
    }

    public function getCurrentDescriptionOfClassificationOfEconomicActivities2008(): ?DescriptionOfClassificationOfEconomicActivities2008 {
        return $this->current_description_of_classification_of_economic_activities_2008 ?? null;
    }

    public function getMADCodesOfClassificationOfEconomicActivities2008(): ?MADCodesOfClassificationOfEconomicActivities2008 {
        return $this->mad_codes_of_classification_of_economic_activities_2008 ?? null;
    }

    public function getCurrentMADCodeOfClassificationOfEconomicActivities2008(): ?MADCodeOfClassificationOfEconomicActivities2008 {
        return $this->current_mad_code_of_classification_of_economic_activities_2008 ?? null;
    }

    public function getCodesOfClassificationOfEconomicActivities2003(): ?CodesOfClassificationOfEconomicActivities2003 {
        return $this->codes_of_classification_of_economic_activities_2003 ?? null;
    }

    public function getCurrentCodeOfClassificationOfEconomicActivities2003(): ?CodeOfClassificationOfEconomicActivities2003 {
        return $this->current_code_of_classification_of_economic_activities_2003 ?? null;
    }

    public function getDescriptionsOfClassificationOfEconomicActivities2003(): ?DescriptionsOfClassificationOfEconomicActivities2003 {
        return $this->descriptions_of_classification_of_economic_activities_2003 ?? null;
    }

    public function getCurrentDescriptionOfClassificationOfEconomicActivities2003(): ?DescriptionOfClassificationOfEconomicActivities2003 {
        return $this->current_description_of_classification_of_economic_activities_2003 ?? null;
    }

    public function getMADCodesOfClassificationOfEconomicActivities2003(): ?MADCodesOfClassificationOfEconomicActivities2003 {
        return $this->mad_codes_of_classification_of_economic_activities_2003 ?? null;
    }

    public function getCurrentMADCodeOfClassificationOfEconomicActivities2003(): ?MADCodeOfClassificationOfEconomicActivities2003 {
        return $this->current_mad_code_of_classification_of_economic_activities_2003 ?? null;
    }

    public function getCountriesOfHeadOffice(): ?CountriesOfHeadOffice {
        return $this->countries_of_head_office ?? null;
    }

    public function getCurrentCountryOfHeadOffice(): ?CountryOfHeadOffice {
        return $this->current_country_of_head_office ?? null;
    }

    public function getDateOfMemorandumOfAssociation(): ?DateTime {
        return $this->date_of_memorandum_of_association ?? null;
    }

    public function getDistributionsOfProfit(): ?DistributionsOfProfit {
        return $this->distributions_of_profit ?? null;
    }

    public function getCurrentDistributionOfProfit(): ?DistributionOfProfit {
        return $this->current_distribution_of_profit ?? null;
    }

    public function getEnterprisePurposes(): ?EnterprisePurposes {
        return $this->enterprise_purposes ?? null;
    }

    public function getCurrentEnterprisePurpose(): ?EnterprisePurpose {
        return $this->current_enterprise_purpose ?? null;
    }

    public function getFederalStatesOfLegalPerson(): ?FederalStates {
        return $this->federal_states_of_legal_person ?? null;
    }

    public function getCurrentFederalStateOfLegalPerson(): ?FederalStateOfLegalPerson {
        return $this->current_federal_state_of_legal_person ?? null;
    }

    public function getFiscalYears(): ?FiscalYears {
        return $this->fiscal_years ?? null;
    }

    public function getCurrentFiscalYear(): ?FiscalYear {
        return $this->current_fiscal_year ?? null;
    }

    public function getKindOfRegisterCourts(): ?KindOfRegisterCourts {
        return $this->kind_of_register_courts ?? null;
    }

    public function getCurrentKindOfRegisterCourt(): ?KindOfRegisterCourt {
        return $this->current_kind_of_register_court ?? null;
    }

    public function getLocationsOfHeadOffices(): ?LocationsOfHeadOffice {
        return $this->locations_of_head_offices ?? null;
    }

    public function getCurrentLocationOfHeadOffice(): ?LocationOfHeadOffice {
        return $this->current_location_of_head_office ?? null;
    }

    public function getNamesOfRegisterCourt(): ?NamesOfRegisterCourt {
        return $this->names_of_register_court ?? null;
    }

    public function getCurrentNameOfRegisterCourt(): ?NameOfRegisterCourt {
        return $this->current_name_of_register_court ?? null;
    }

    public function getRegisteredCompanyNames(): ?RegisteredCompanyNames {
        return $this->registered_company_names ?? null;
    }

    public function getCurrentRegisteredCompanyName(): ?RegisteredCompanyName {
        return $this->current_registered_company_name ?? null;
    }

    public function getRegistrationDate(): ?DateTime {
        return $this->registration_date ?? null;
    }

    public function getRegistrationNumbers(): ?RegistrationNumbers {
        return $this->registration_numbers ?? null;
    }

    public function getCurrentRegistrationNumber(): ?RegistrationNumber {
        return $this->current_registration_number ?? null;
    }

    public function getThreeLinedCompanyNamesFirstLine(): ?ThreeLinedFirstLineCompanyNames {
        return $this->three_lined_company_names_first_line ?? null;
    }

    public function getCurrentThreeLinedCompanyNameFirstLine(): ?ThreeLinedFirstLineCompanyName {
        return $this->current_three_lined_company_name_first_line ?? null;
    }

    public function getThreeLinedCompanyNamesSecondLine(): ?ThreeLinedSecondLineCompanyNames {
        return $this->three_lined_company_names_second_line ?? null;
    }

    public function getCurrentThreeLinedCompanyNameSecondLine(): ?ThreeLinedSecondLineCompanyName {
        return $this->current_three_lined_company_name_second_line ?? null;
    }

    public function getThreeLinedCompanyNamesThirdLine(): ?ThreeLinedThirdLineCompanyNames {
        return $this->three_lined_company_names_third_line ?? null;
    }

    public function getCurrentThreeLinedCompanyNameThirdLine(): ?ThreeLinedThirdLineCompanyName {
        return $this->current_three_lined_company_name_third_line ?? null;
    }

    public function getTwoLinedCompanyNamesFirstLine(): ?TwoLinedFirstLineCompanyNames {
        return $this->three_lined_company_names_first_line ?? null;
    }

    public function getCurrentTwoLinedCompanyNameFirstLine(): ?TwoLinedFirstLineCompanyName {
        return $this->current_three_lined_company_name_first_line ?? null;
    }

    public function getTwoLinedCompanyNamesSecondLine(): ?TwoLinedSecondLineCompanyNames {
        return $this->three_lined_company_names_second_line ?? null;
    }

    public function getCurrentTwoLinedCompanyNameSecondLine(): ?TwoLinedSecondLineCompanyName {
        return $this->current_three_lined_company_name_second_line ?? null;
    }

    public function getWindingUpDate(): ?DateTime {
        return $this->winding_up_date ?? null;
    }

    public function getWindingUpProceedings(): ?WindingUpStatus {
        return $this->winding_up_proceedings ?? null;
    }
}
