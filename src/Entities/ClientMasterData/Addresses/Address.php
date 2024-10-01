<?php

declare(strict_types=1);

namespace Datev\Entities\ClientMasterData\Addresses;

use Datev\Entities\Common\Addresses\Address as CommonAddress;
use Psr\Log\LoggerInterface;

class Address extends CommonAddress {
    protected string $type;
    protected ?string $country_code;
    protected ?string $post_office_box;
    protected ?string $additional_correspondence_title;
    protected ?string $additional_delivery_text1;
    protected ?string $additional_delivery_text2;
    protected ?string $additional_shipping_information;
    protected ?string $address_appendix;
    protected ?string $address_manually_edited;
    protected ?bool $is_address_manually_edited;
    protected ?string $note;
    protected ?string $valid_from;
    protected ?string $valid_to;
    protected ?bool $currently_valid;
    protected ?bool $is_correspondence_address;
    protected ?bool $is_debitor_address;
    protected ?bool $is_main_post_office_box_address;
    protected ?bool $is_main_street_address;
    protected ?bool $is_management_address;

    public function __construct($data = null, ?LoggerInterface $logger = null) {
        parent::__construct($data, $logger);
    }
}
