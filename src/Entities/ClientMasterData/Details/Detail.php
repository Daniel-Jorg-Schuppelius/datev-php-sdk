<?php

declare(strict_types=1);

namespace Datev\Entities\ClientMasterData\Details;

use APIToolkit\Contracts\Abstracts\NamedEntity;
use DateTime;
use Datev\Entities\ClientMasterData\CodesOfClassificationOfEconomicActivities2003\CodesOfClassificationOfEconomicActivities2003;
use Datev\Entities\ClientMasterData\CodesOfClassificationOfEconomicActivities2008\CodesOfClassificationOfEconomicActivities2008;
use Datev\Entities\ClientMasterData\CompanyNames\FirstLine\CompanyName as FirstLineCompanyName;
use Datev\Entities\ClientMasterData\CompanyNames\FirstLine\CompanyNames as FirstLineCompanyNames;
use Datev\Entities\ClientMasterData\CompanyNames\SecondLine\CompanyName as SecondLineCompanyName;
use Datev\Entities\ClientMasterData\CompanyNames\SecondLine\CompanyNames as SecondLineCompanyNames;
use Datev\Entities\ClientMasterData\CompanyNames\ThirdLine\CompanyName as ThirdLineCompanyName;
use Datev\Entities\ClientMasterData\CompanyNames\ThirdLine\CompanyNames as ThirdLineCompanyNames;
use Datev\Entities\ClientMasterData\Considerations\Considerations;
use Datev\Entities\ClientMasterData\CountriesOfHeadOffice\CountriesOfHeadOffice;
use Datev\Entities\ClientMasterData\Denominations\Denominations;
use Datev\Entities\ClientMasterData\DescriptionsOfClassificationOfEconomicActivities2003\DescriptionsOfClassificationOfEconomicActivities2003;
use Datev\Entities\ClientMasterData\DescriptionsOfClassificationOfEconomicActivities2008\DescriptionsOfClassificationOfEconomicActivities2008;
use Datev\Entities\ClientMasterData\DistributionsOfProfit\DistributionsOfProfit;
use Datev\Entities\ClientMasterData\EnterprisePurposes\EnterprisePurposes;
use Datev\Entities\ClientMasterData\FederalStates\FederalStates;
use Datev\Entities\ClientMasterData\FiscalYears\FiscalYears;
use Datev\Entities\ClientMasterData\JobTitles\JobTitles;
use Datev\Entities\ClientMasterData\KindOfRegisterCourts\KindOfRegisterCourts;
use Datev\Entities\ClientMasterData\LocationsOfHeadOffice\LocationsOfHeadOffice;
use Datev\Entities\ClientMasterData\MADCodesOfClassificationOfEconomicActivities2003\MADCodesOfClassificationOfEconomicActivities2003;
use Datev\Entities\ClientMasterData\MADCodesOfClassificationOfEconomicActivities2008\MADCodesOfClassificationOfEconomicActivities2008;
use Datev\Entities\ClientMasterData\MaritalStatuses\MaritalStatuses;
use Datev\Entities\ClientMasterData\NamesOfRegisterCourt\NamesOfRegisterCourt;
use Datev\Entities\ClientMasterData\RegisteredCompanyNames\RegisteredCompanyNames;
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
    protected ?string $current_consideration;
    protected ?Country $country_of_birth;
    protected ?DateTime $date_of_death;
    protected ?DateTime $date_of_expiry;
    protected ?DateTime $date_of_issue;
    protected ?string $degree;
    protected ?Denominations $denominations;
    protected ?string $current_denomination;
    protected ?FederalStates $federal_states_of_natural_person;
    protected ?string $current_federal_state_of_natural_person;
    protected ?string $identification_number;
    protected ?string $issuing_authority;
    protected ?JobTitles $job_titles;
    protected ?string $current_job_title;
    protected ?MaritalStatuses $marital_statuses;
    protected ?string $current_marital_status;
    protected ?Preposition $name_prefix;
    protected ?Nationality $nationality;
    protected ?MeansOfIdentification $paper_of_identity;
    protected ?string $place_of_birth;
    protected ?string $register_of_births_number;
    protected ?string $register_office_of_birth;
    protected ?string $social_security_number;
    protected ?string $title_of_nobility;
    protected ?CodesOfClassificationOfEconomicActivities2008 $codes_of_classification_of_economic_activities_2008;
    protected ?string $current_code_of_classification_of_economic_activities_2008;
    protected ?DescriptionsOfClassificationOfEconomicActivities2008 $descriptions_of_classification_of_economic_activities_2008;
    protected ?string $current_description_of_classification_of_economic_activities_2008;
    protected ?MADCodesOfClassificationOfEconomicActivities2008 $mad_codes_of_classification_of_economic_activities_2008;
    protected ?string $current_mad_code_of_classification_of_economic_activities_2008;
    protected ?CodesOfClassificationOfEconomicActivities2003 $codes_of_classification_of_economic_activities_2003;
    protected ?string $current_code_of_classification_of_economic_activities_2003;
    protected ?DescriptionsOfClassificationOfEconomicActivities2003 $descriptions_of_classification_of_economic_activities_2003;
    protected ?string $current_description_of_classification_of_economic_activities_2003;
    protected ?MADCodesOfClassificationOfEconomicActivities2003 $mad_codes_of_classification_of_economic_activities_2003;
    protected ?string $current_mad_code_of_classification_of_economic_activities_2003;
    protected ?CountriesOfHeadOffice $countries_of_head_office;
    protected ?string $current_country_of_head_office;
    protected ?DateTime $date_of_memorandum_of_association;
    protected ?DistributionsOfProfit $distributions_of_profit;
    protected ?string $current_distribution_of_profit;
    protected ?EnterprisePurposes $enterprise_purposes;
    protected ?string $current_enterprise_purpose;
    protected ?FederalStates $federal_states_of_legal_person;
    protected ?string $current_federal_state_of_legal_person;
    protected ?FiscalYears $fiscal_years;
    protected ?string $current_fiscal_year;
    protected ?KindOfRegisterCourts $kind_of_register_courts;
    protected ?string $current_kind_of_register_court;
    protected ?LocationsOfHeadOffice $locations_of_head_offices;
    protected ?string $current_location_of_head_office;
    protected ?NamesOfRegisterCourt $names_of_register_court;
    protected ?string $current_name_of_register_court;
    protected ?RegisteredCompanyNames $registered_company_names;
    protected ?string $current_registered_company_name;
    protected ?DateTime $registration_date;
    protected ?RegistrationNumbers $registration_numbers;
    protected ?string $current_registration_number;
    protected ?FirstLineCompanyNames $three_lined_company_names_first_line;
    protected ?FirstLineCompanyName $current_three_lined_company_name_first_line;
    protected ?SecondLineCompanyNames $three_lined_company_names_second_line;
    protected ?SecondLineCompanyName $current_three_lined_company_name_second_line;
    protected ?ThirdLineCompanyNames $three_lined_company_names_third_line;
    protected ?ThirdLineCompanyName $current_three_lined_company_name_third_line;
    protected ?DateTime $winding_up_date;
    protected ?WindingUpStatus $winding_up_proceedings;

    public function __construct($data = null, ?LoggerInterface $logger = null) {
        parent::__construct($data, $logger);
    }
}
