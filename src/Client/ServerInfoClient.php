<?php

declare(strict_types=1);

namespace NodelessIO\Client;

use NodelessIO\Response\ServerInfoApiStatusResponse;

class ServerInfoClient extends AbstractClient
{
    public function getApiStatus(): ServerInfoApiStatusResponse
    {
        $url = $this->getApiUrl() . 'status';
        $headers = $this->getRequestHeaders();
        $method = 'GET';
        $response = $this->getHttpClient()->request($method, $url, $headers);

        if ($response->getStatus() === 200) {
            return new ServerInfoApiStatusResponse(json_decode($response->getBody(), true, 512, JSON_THROW_ON_ERROR));
        } else {
            throw $this->getExceptionByStatusCode($method, $url, $response);
        }
    }
}
