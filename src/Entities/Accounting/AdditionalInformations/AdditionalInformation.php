<?php
/*
 * Created on   : Sun Nov 03 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : AdditionalInformation.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\Entities\Accounting\AdditionalInformations;

use APIToolkit\Contracts\Abstracts\NamedEntity;
use Psr\Log\LoggerInterface;

class AdditionalInformation extends NamedEntity {
    protected ?string $additional_information_type;
    protected ?string $additional_information_content;

    public function __construct($data = null, ?LoggerInterface $logger = null) {
        parent::__construct($data, $logger);
    }
}
