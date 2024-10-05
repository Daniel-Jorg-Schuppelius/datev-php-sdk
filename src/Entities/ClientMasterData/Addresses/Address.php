<?php

declare(strict_types=1);

namespace Datev\Entities\ClientMasterData\Addresses;

use DateTime;
use Datev\Entities\ClientMasterData\CountryCodes\Code\CountryCode;
use Datev\Entities\Common\Addresses\Address as CommonAddress;
use Datev\Enums\AddressType;
use Psr\Log\LoggerInterface;

class Address extends CommonAddress {
    protected AddressType $type;
    protected ?CountryCode $country_code;
    protected ?string $post_office_box;
    protected ?string $additional_correspondence_title;
    protected ?string $additional_delivery_text1;
    protected ?string $additional_delivery_text2;
    protected ?string $additional_shipping_information;
    protected ?string $address_appendix;
    protected ?string $address_manually_edited;
    protected ?bool $is_address_manually_edited;
    protected ?string $note;
    protected ?DateTime $valid_from;
    protected ?DateTime $valid_to;
    protected ?bool $currently_valid;
    protected ?bool $is_correspondence_address;
    protected ?bool $is_debitor_address;
    protected ?bool $is_main_post_office_box_address;
    protected ?bool $is_main_street_address;
    protected ?bool $is_management_address;

    public function __construct($data = null, ?LoggerInterface $logger = null) {
        parent::__construct($data, $logger);
    }

    public function getType(): AddressType {
        return $this->type;
    }

    public function getCountryCode(): ?CountryCode {
        return $this->country_code ?? null;
    }

    public function getPostOfficeBox(): ?string {
        return $this->post_office_box ?? null;
    }

    public function getAdditionalCorrespondenceTitle(): ?string {
        return $this->additional_correspondence_title ?? null;
    }

    public function getAdditionalDeliveryText1(): ?string {
        return $this->additional_delivery_text1 ?? null;
    }

    public function getAdditionalDeliveryText2(): ?string {
        return $this->additional_delivery_text2 ?? null;
    }

    public function getAdditionalShippingInformation(): ?string {
        return $this->additional_shipping_information ?? null;
    }

    public function getAddressAppendix(): ?string {
        return $this->address_appendix ?? null;
    }

    public function getAddressManuallyEdited(): ?string {
        return $this->address_manually_edited ?? null;
    }

    public function isAddressManuallyEdited(): bool {
        return $this->is_address_manually_edited ?? false;
    }

    public function getNote(): ?string {
        return $this->note ?? null;
    }

    public function getValidFrom(): ?DateTime {
        return $this->valid_from ?? null;
    }

    public function getValidTo(): ?DateTime {
        return $this->valid_to ?? null;
    }

    public function isCurrentlyValid(): bool {
        return $this->currently_valid ?? false;
    }

    public function isCorrespondenceAddress(): bool {
        return $this->is_correspondence_address ?? false;
    }

    public function isDebitorAddress(): bool {
        return $this->is_debitor_address ?? false;
    }

    public function isMainPostOfficeBoxAddress(): bool {
        return $this->is_main_post_office_box_address ?? false;
    }

    public function isMainStreetAddress(): bool {
        return $this->is_main_street_address ?? false;
    }

    public function isManagementAddress(): bool {
        return $this->is_management_address ?? false;
    }
}
