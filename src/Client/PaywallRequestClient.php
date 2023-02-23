<?php

declare(strict_types=1);

namespace NodelessIO\Client;

use NodelessIO\Response\PaywallRequestResponse;
use NodelessIO\Response\PaywallResponse;

class PaywallRequestClient extends AbstractClient
{
    public function getPaywallRequest(
        string $paywallId,
        string $paywallRequestId
    ): PaywallRequestResponse {
        $url = $this->getApiUrl() . 'paywall/' . urlencode($paywallId) . '/request/' . urlencode($paywallRequestId);
        $headers = $this->getRequestHeaders();
        $method = 'GET';
        $response = $this->getHttpClient()->request($method, $url, $headers);

        if ($response->getStatus() === 200) {
            return new PaywallRequestResponse(json_decode($response->getBody(), true, 512, JSON_THROW_ON_ERROR));
        } else {
            throw $this->getExceptionByStatusCode($method, $url, $response);
        }
    }
    public function createPaywallRequest(
        string $paywallId
    ): PaywallRequestResponse {
        $url = $this->getApiUrl() . 'paywall/' . urlencode($paywallId) . '/request';
        $headers = $this->getRequestHeaders();
        $method = 'POST';

        $response = $this->getHttpClient()->request($method, $url, $headers);

        if ($response->getStatus() === 201) {
            return new PaywallRequestResponse(
                json_decode($response->getBody(), true, 512, JSON_THROW_ON_ERROR)
            );
        } else {
            throw $this->getExceptionByStatusCode($method, $url, $response);
        }
    }

    public function getPaywallRequestStatus(
        string $paywallId,
        string $paywallRequestId
    ): PaywallResponse {
        $url = $this->getApiUrl() . 'paywall/' . urlencode($paywallId) . '/request/' . urlencode($paywallRequestId) . '/status';
        $headers = $this->getRequestHeaders();
        $method = 'GET';

        $response = $this->getHttpClient()->request($method, $url, $headers);

        if ($response->getStatus() === 200) {
            return new PaywallResponse(json_decode($response->getBody(), true, 512, JSON_THROW_ON_ERROR));
        } else {
            throw $this->getExceptionByStatusCode($method, $url, $response);
        }
    }
}
