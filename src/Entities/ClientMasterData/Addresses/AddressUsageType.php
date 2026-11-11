<?php
/*
 * Created on   : Wed Nov 11 2026
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : AddressUsageType.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\Entities\ClientMasterData\Addresses;

use APIToolkit\Contracts\Abstracts\NamedEntity;
use Psr\Log\LoggerInterface;

class AddressUsageType extends NamedEntity {
    protected ?bool $is_correspondence_address;
    protected ?bool $is_default_delivery_address;
    protected ?bool $is_default_payment_address;
    protected ?bool $is_delivery_address;
    protected ?bool $is_main_post_office_box_address;
    protected ?bool $is_main_street_address;
    protected ?bool $is_management_address;

    /**
     * @param array<string, mixed>|object|null $data
     */
    public function __construct($data = null, ?LoggerInterface $logger = null) {
        parent::__construct($data, $logger);
    }

    public function isCorrespondenceAddress(): ?bool {
        return $this->is_correspondence_address ?? null;
    }

    public function isDefaultDeliveryAddress(): ?bool {
        return $this->is_default_delivery_address ?? null;
    }

    public function isDefaultPaymentAddress(): ?bool {
        return $this->is_default_payment_address ?? null;
    }

    public function isDeliveryAddress(): ?bool {
        return $this->is_delivery_address ?? null;
    }

    public function isMainPostOfficeBoxAddress(): ?bool {
        return $this->is_main_post_office_box_address ?? null;
    }

    public function isMainStreetAddress(): ?bool {
        return $this->is_main_street_address ?? null;
    }

    public function isManagementAddress(): ?bool {
        return $this->is_management_address ?? null;
    }
}
