<?php
/*
 * Created on   : Sun Jan 12 2025
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : TransactionAddressData.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\Entities\PublicSector\TransactionAddresses;

use APIToolkit\Contracts\Abstracts\NamedEntity;
use DateTime;
use Psr\Log\LoggerInterface;

class TransactionAddressData extends NamedEntity {
    protected ?string $id;
    protected ?string $street;
    protected ?string $postal_code;
    protected ?string $city;
    protected ?string $additional_correspendence_title;
    protected ?string $additional_delivery_text1;
    protected ?string $additional_delivery_text2;
    protected ?string $address_appendix;
    protected ?string $address_manually_edited;
    protected ?string $address_type;
    protected ?AddressUsageType $address_usage_type;
    protected ?string $country_code;
    protected ?string $individual_shipping_information;
    protected ?bool $is_address_manually_edited;
    protected ?string $post_office_box;
    protected ?DateTime $valid_from;
    protected ?DateTime $valid_to;

    /**
     * @param array<string, mixed>|object|null $data
     */
    public function __construct($data = null, ?LoggerInterface $logger = null) {
        parent::__construct($data, $logger);
    }

    public function getID(): ?string {
        return $this->id ?? null;
    }

    public function getStreet(): ?string {
        return $this->street ?? null;
    }

    public function getPostalCode(): ?string {
        return $this->postal_code ?? null;
    }

    public function getCity(): ?string {
        return $this->city ?? null;
    }

    public function getAdditionalCorrespendenceTitle(): ?string {
        return $this->additional_correspendence_title ?? null;
    }

    public function getAdditionalDeliveryText1(): ?string {
        return $this->additional_delivery_text1 ?? null;
    }

    public function getAdditionalDeliveryText2(): ?string {
        return $this->additional_delivery_text2 ?? null;
    }

    public function getAddressAppendix(): ?string {
        return $this->address_appendix ?? null;
    }

    public function getAddressManuallyEdited(): ?string {
        return $this->address_manually_edited ?? null;
    }

    public function getAddressType(): ?string {
        return $this->address_type ?? null;
    }

    public function getAddressUsageType(): ?AddressUsageType {
        return $this->address_usage_type ?? null;
    }

    public function getCountryCode(): ?string {
        return $this->country_code ?? null;
    }

    public function getIndividualShippingInformation(): ?string {
        return $this->individual_shipping_information ?? null;
    }

    public function isAddressManuallyEdited(): ?bool {
        return $this->is_address_manually_edited ?? null;
    }

    public function getPostOfficeBox(): ?string {
        return $this->post_office_box ?? null;
    }

    public function getValidFrom(): ?DateTime {
        return $this->valid_from ?? null;
    }

    public function getValidTo(): ?DateTime {
        return $this->valid_to ?? null;
    }
}
