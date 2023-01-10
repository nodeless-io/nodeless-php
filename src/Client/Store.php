<?php

declare(strict_types=1);

namespace NodelessIO\Client;

use NodelessIO\Result\Store as ResultStore;

class Store extends AbstractClient
{
    public function getStore($storeId): ResultStore
    {
        $url = $this->getApiUrl() . 'store/' . urlencode($storeId);
        $headers = $this->getRequestHeaders();
        $method = 'GET';
        $response = $this->getHttpClient()->request($method, $url, $headers);

        if ($response->getStatus() === 200) {
            return new ResultStore(json_decode($response->getBody(), true, 512, JSON_THROW_ON_ERROR));
        } else {
            throw $this->getExceptionByStatusCode($method, $url, $response);
        }
    }

    /**
     * @return \NodelessIO\Result\Store[]
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
                $item = new ResultStore(['data' => $item]);
                $r[] = $item;
            }
            return $r;
        } else {
            throw $this->getExceptionByStatusCode($method, $url, $response);
        }
    }
}
