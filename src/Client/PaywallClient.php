<?php

declare(strict_types=1);

namespace NodelessIO\Client;

use NodelessIO\Response\PaywallListResponse;
use NodelessIO\Response\PaywallResponse;

class PaywallClient extends AbstractClient
{
    public function allPaywalls(): PaywallListResponse
    {
        $url = $this->getApiUrl() . 'paywall/';
        $headers = $this->getRequestHeaders();
        $method = 'GET';
        $response = $this->getHttpClient()->request($method, $url, $headers);

        if ($response->getStatus() === 200) {
            return new PaywallListResponse(json_decode($response->getBody(), true, 512, JSON_THROW_ON_ERROR));
        } else {
            throw $this->getExceptionByStatusCode($method, $url, $response);
        }
    }

    public function getPaywall(
        string $paywallId
    ): PaywallResponse {
        $url = $this->getApiUrl() . 'paywall/' . urlencode($paywallId);
        $headers = $this->getRequestHeaders();
        $method = 'GET';
        $response = $this->getHttpClient()->request($method, $url, $headers);

        if ($response->getStatus() === 200) {
            return new PaywallResponse(json_decode($response->getBody(), true, 512, JSON_THROW_ON_ERROR));
        } else {
            throw $this->getExceptionByStatusCode($method, $url, $response);
        }
    }
    public function createPaywall(
        string $name,
        string $type,
        int $price,
        array $settings
    ): PaywallResponse {
        $url = $this->getApiUrl() . 'paywall/';
        $headers = $this->getRequestHeaders();
        $method = 'POST';

        $body = json_encode(
            [
                'name' => $name,
                'type' => $type,
                'price' => $price,
                'settings' => $settings
            ],
            JSON_THROW_ON_ERROR
        );

        $response = $this->getHttpClient()->request($method, $url, $headers, $body);

        if ($response->getStatus() === 201) {
            return new PaywallResponse(
                json_decode($response->getBody(), true, 512, JSON_THROW_ON_ERROR)
            );
        } else {
            throw $this->getExceptionByStatusCode($method, $url, $response);
        }
    }

    public function updatePaywall(
        string $paywallId,
        string $name,
        string $type,
        int $price,
        array $settings
    ): PaywallResponse {
        $url = $this->getApiUrl() . 'paywall/' . urlencode($paywallId);
        $headers = $this->getRequestHeaders();
        $method = 'PUT';

        $body = json_encode(
            [
              'name' => $name,
              'type' => $type,
              'price' => $price,
              'settings' => $settings,
            ],
            JSON_THROW_ON_ERROR
        );

        $response = $this->getHttpClient()->request($method, $url, $headers, $body);

        if ($response->getStatus() === 200) {
            return new PaywallResponse(json_decode($response->getBody(), true, 512, JSON_THROW_ON_ERROR));
        } else {
            throw $this->getExceptionByStatusCode($method, $url, $response);
        }
    }

    public function deletePaywall(
        string $paywallId
    ): bool {
        $url = $this->getApiUrl() . 'paywall/' . urlencode($paywallId);
        $headers = $this->getRequestHeaders();
        $method = 'DELETE';
        $response = $this->getHttpClient()->request($method, $url, $headers);

        if ($response->getStatus() === 200) {
            return true;
        } else {
            throw $this->getExceptionByStatusCode($method, $url, $response);
        }
    }
}
