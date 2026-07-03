<?php
/*
 * Created on   : Fri Jul 03 2026
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : InfoEndpoint.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\API\Online\Endpoints\MasterClientsHealth;

use Datev\Contracts\Abstracts\API\Online\EndpointAbstract;

/**
 * master-data:master-clients-health v3: Spring-Boot-Actuator-Info.
 * Die Antwortstruktur ist in der Spezifikation nicht definiert (freies Objekt),
 * daher wird das dekodierte JSON als Array geliefert.
 */
class InfoEndpoint extends EndpointAbstract {
    protected string $endpoint = 'info';

    /**
     * @return array<string, mixed>
     */
    public function getInfo(): array {
        return $this->logDebugWithTimer(function () {
            $response = parent::getContents();

            if (empty($response)) {
                return [];
            }

            $data = json_decode($response, true);

            return is_array($data) ? $data : [];
        }, 'Fetching Info');
    }
}
