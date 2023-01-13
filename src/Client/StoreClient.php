<?php

declare(strict_types=1);

namespace NodelessIO\Client;

use NodelessIO\Response\StoreResponse;

class StoreClient extends AbstractClient
{
    public function getStore($storeId): StoreResponse
    {
        $url = $this->getApiUrl() . 'store/' . urlencode($storeId);
        $headers = $this->getRequestHeaders();
        $method = 'GET';
        $response = $this->getHttpClient()->request($method, $url, $headers);

        if ($response->getStatus() === 200) {
            return new StoreResponse(json_decode($response->getBody(), true, 512, JSON_THROW_ON_ERROR));
        } else {
            throw $this->getExceptionByStatusCode($method, $url, $response);
        }
    }

    /**
     * @return \NodelessIO\Response\StoreResponse[]
     */
    public function allStores(): array
    {
        // TODO: return StoreList with pagination (hidden or usable)?
        $url = $this->getApiUrl() . 'store';
        $headers = $this->getRequestHeaders();
        $method = 'GET';
        $response = $this->getHttpClient()->request($method, $url, $headers);

        if ($response->getStatus() === 200) {
            $r = [];
            $result = json_decode($response->getBody(), true);
            foreach ($result['data'] as $item) {
                $item = new StoreResponse(['data' => $item]);
                $r[] = $item;
            }
            return $r;
        } else {
            throw $this->getExceptionByStatusCode($method, $url, $response);
        }
    }
}
