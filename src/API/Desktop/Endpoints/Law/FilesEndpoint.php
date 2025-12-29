<?php
/*
 * Created on   : Sat Dec 27 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : FilesEndpoint.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\API\Desktop\Endpoints\Law;

use APIToolkit\Contracts\Interfaces\API\EndpointInterfaces\SearchableEndpointInterface;
use APIToolkit\Entities\ID;
use Datev\Contracts\Abstracts\API\Desktop\EndpointAbstract;
use Datev\Entities\Law\Budgets\Budget;
use Datev\Entities\Law\CustomFields\CustomFields;
use Datev\Entities\Law\Files\LawFile;
use Datev\Entities\Law\Files\LawFiles;
use Datev\Entities\Law\LevelsOfJurisdiction\LevelsOfJurisdiction;
use Datev\Entities\Law\Parties\Parties;
use Datev\Entities\Law\Parties\PartyID;
use InvalidArgumentException;

class FilesEndpoint extends EndpointAbstract implements SearchableEndpointInterface {
    protected string $endpointPrefix = 'law/v1';
    protected string $endpoint = 'files';

    public function get(?ID $id = null): ?LawFile {
        if (is_null($id)) {
            $this->logError('ID is required (Class:' . static::class . ')');
            throw new InvalidArgumentException('ID is required');
        }

        $response = parent::getContents([], [], "{$this->getEndpointUrl()}/{$id->toString()}");

        if (empty($response) || $response === '[]') {
            return null;
        }

        return LawFile::fromJson($response, self::$logger);
    }

    public function search(array $queryParams = [], array $options = []): ?LawFiles {
        $response = parent::getContents($queryParams, $options);

        if (empty($response) || $response === '[]') {
            return null;
        }

        return LawFiles::fromJson($response, self::$logger);
    }

    public function getReferenceSheet(ID $id, array $queryParams = []): ?string {
        $response = parent::getContents($queryParams, [], "{$this->getEndpointUrl()}/{$id->toString()}/reference-sheet");

        if (empty($response)) {
            return null;
        }

        return $response;
    }

    public function getLevelsOfJurisdiction(ID $id): ?LevelsOfJurisdiction {
        $response = parent::getContents([], [], "{$this->getEndpointUrl()}/{$id->toString()}/levels-of-jurisdiction");

        if (empty($response) || $response === '[]') {
            return null;
        }

        return LevelsOfJurisdiction::fromJson($response, self::$logger);
    }

    public function getCustomFields(ID $id): ?CustomFields {
        $response = parent::getContents([], [], "{$this->getEndpointUrl()}/{$id->toString()}/custom-fields");

        if (empty($response) || $response === '[]') {
            return null;
        }

        return CustomFields::fromJson($response, self::$logger);
    }

    public function getParties(ID $id): ?Parties {
        $response = parent::getContents([], [], "{$this->getEndpointUrl()}/{$id->toString()}/parties");

        if (empty($response) || $response === '[]') {
            return null;
        }

        return Parties::fromJson($response, self::$logger);
    }

    public function getPartyCustomFields(ID $fileId, PartyID $partyId): ?CustomFields {
        $response = parent::getContents([], [], "{$this->getEndpointUrl()}/{$fileId->toString()}/parties/{$partyId->toString()}/custom-fields");

        if (empty($response) || $response === '[]') {
            return null;
        }

        return CustomFields::fromJson($response, self::$logger);
    }

    public function getBudget(ID $id): ?Budget {
        $response = parent::getContents([], [], "{$this->getEndpointUrl()}/{$id->toString()}/budget");

        if (empty($response) || $response === '[]') {
            return null;
        }

        return Budget::fromJson($response, self::$logger);
    }
}
