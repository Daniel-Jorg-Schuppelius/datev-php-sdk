<?php
/*
 * Created on   : Wed Nov 11 2026
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : CorrespondenceInformation.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\Entities\Accounting\VariousAddresses;

use APIToolkit\Contracts\Abstracts\NamedEntity;
use Psr\Log\LoggerInterface;

class CorrespondenceInformation extends NamedEntity {
    protected ?string $alternative_contact_person;
    protected ?string $clerk;
    protected ?string $complimentary_close;
    protected ?string $contact_person;
    protected ?string $language;
    protected ?string $output_destination;
    protected ?string $salutation;
    protected ?string $third_party_number;

    /**
     * @param array<string, mixed>|object|null $data
     */
    public function __construct($data = null, ?LoggerInterface $logger = null) {
        parent::__construct($data, $logger);
    }

    public function getAlternativeContactPerson(): ?string {
        return $this->alternative_contact_person ?? null;
    }

    public function getClerk(): ?string {
        return $this->clerk ?? null;
    }

    public function getComplimentaryClose(): ?string {
        return $this->complimentary_close ?? null;
    }

    public function getContactPerson(): ?string {
        return $this->contact_person ?? null;
    }

    public function getLanguage(): ?string {
        return $this->language ?? null;
    }

    public function getOutputDestination(): ?string {
        return $this->output_destination ?? null;
    }

    public function getSalutation(): ?string {
        return $this->salutation ?? null;
    }

    public function getThirdPartyNumber(): ?string {
        return $this->third_party_number ?? null;
    }
}
