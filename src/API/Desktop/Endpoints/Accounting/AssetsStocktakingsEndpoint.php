<?php
/*
 * Created on   : Sat Dec 28 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : AssetsStocktakingsEndpoint.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\API\Desktop\Endpoints\Accounting;

use APIToolkit\Contracts\Interfaces\API\EndpointInterfaces\SearchableEndpointInterface;
use APIToolkit\Entities\ID;
use Datev\Contracts\Abstracts\API\Desktop\EndpointAbstract;
use Datev\Entities\Accounting\Stocktakings\StocktakingRecord;
use Datev\Entities\Accounting\Stocktakings\StocktakingRecords;
use InvalidArgumentException;

class AssetsStocktakingsEndpoint extends EndpointAbstract implements SearchableEndpointInterface {
    protected string $endpointPrefix = 'accounting/v1';
    protected string $endpoint = 'clients';

    protected ID $clientId;
    protected ID $fiscalYearId;

    public function get(?ID $id = null): ?StocktakingRecord {
        if (is_null($id)) {
            return null;
        }
        return $this->getByAssetId($id->toString());
    }

    public function setClientId(ID $clientId): void {
        $this->clientId = $clientId;
    }

    public function setFiscalYearId(ID $fiscalYearId): void {
        $this->fiscalYearId = $fiscalYearId;
    }

    protected function getBaseUrl(): string {
        if (!isset($this->clientId)) {
            $this->logError('Client ID is required (Class:' . static::class . ')');
            throw new InvalidArgumentException('Client ID is required');
        }

        if (!isset($this->fiscalYearId)) {
            $this->logError('Fiscal Year ID is required (Class:' . static::class . ')');
            throw new InvalidArgumentException('Fiscal Year ID is required');
        }

        return "{$this->getEndpointUrl()}/{$this->clientId->toString()}/fiscal-years/{$this->fiscalYearId->toString()}/assets/stocktakings";
    }

    public function getByAssetId(?string $assetId = null): ?StocktakingRecord {
        if (is_null($assetId)) {
            $this->logError('Asset ID is required (Class:' . static::class . ')');
            throw new InvalidArgumentException('Asset ID is required');
        }

        $url = "{$this->getEndpointUrl()}/{$this->clientId->toString()}/fiscal-years/{$this->fiscalYearId->toString()}/assets/{$assetId}/stocktaking/";
        $response = parent::getContents([], [], $url);

        if (empty($response) || $response === '[]') {
            return null;
        }

        return StocktakingRecord::fromJson($response, self::$logger);
    }

    public function search(array $queryParams = [], array $options = []): ?StocktakingRecords {
        $response = parent::getContents($queryParams, $options, $this->getBaseUrl());

        if (empty($response) || $response === '[]') {
            return null;
        }

        return StocktakingRecords::fromJson($response, self::$logger);
    }
}
