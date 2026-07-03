<?php
/*
 * Created on   : Fri Jul 03 2026
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : ClientsEndpoint.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\API\Online\Endpoints\AccountingDocuments;

use APIToolkit\Contracts\Interfaces\API\EndpointInterfaces\SearchableEndpointInterface;
use Datev\Contracts\Abstracts\API\Online\AccountingClientsEndpointAbstract;

/**
 * accounting:documents v2: Mandantenliste und Buchführungs-Grunddaten.
 */
class ClientsEndpoint extends AccountingClientsEndpointAbstract implements SearchableEndpointInterface {}
