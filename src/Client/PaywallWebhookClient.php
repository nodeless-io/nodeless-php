<?php

declare(strict_types=1);

namespace NodelessIO\Client;

use NodelessIO\Response\PaywallWebhookListResponse;
use NodelessIO\Response\PaywallWebhookResponse;

class PaywallWebhookClient extends AbstractClient
{
    public function allWebhooks(
        string $paywallId
    ): PaywallWebhookListResponse {
        $url = $this->getApiUrl() . 'paywall/' . urlencode($paywallId) . '/webhook';
        $headers = $this->getRequestHeaders();
        $method = 'GET';
        $response = $this->getHttpClient()->request($method, $url, $headers);

        if ($response->getStatus() === 200) {
            return new PaywallWebhookListResponse(json_decode($response->getBody(), true, 512, JSON_THROW_ON_ERROR));
        } else {
            throw $this->getExceptionByStatusCode($method, $url, $response);
        }
    }

    public function getWebhook(
        string $paywallId,
        string $webhookId
    ): PaywallWebhookResponse {
        $url = $this->getApiUrl() . 'paywall/' . urlencode($paywallId) . '/webhook/' . urlencode($webhookId);
        $headers = $this->getRequestHeaders();
        $method = 'GET';
        $response = $this->getHttpClient()->request($method, $url, $headers);

        if ($response->getStatus() === 200) {
            return new PaywallWebhookResponse(json_decode($response->getBody(), true, 512, JSON_THROW_ON_ERROR));
        } else {
            throw $this->getExceptionByStatusCode($method, $url, $response);
        }
    }
    public function createWebhook(
        string $paywallId,
        string $type,
        string $url,
        array $events,
        string $secret,
        string $status
    ): PaywallWebhookResponse {
        $apiUrl = $this->getApiUrl() . 'paywall/' . urlencode(
            $paywallId
        ) . '/webhook';
        $headers = $this->getRequestHeaders();
        $method = 'POST';

        $body = json_encode(
            [
                'type' => $type,
                'url' => $url,
                'events' => $events,
                'secret' => $secret,
                'status' => $status,
            ],
            JSON_THROW_ON_ERROR
        );

        $response = $this->getHttpClient()->request($method, $apiUrl, $headers, $body);

        if ($response->getStatus() === 201) {
            return new PaywallWebhookResponse(
                json_decode($response->getBody(), true, 512, JSON_THROW_ON_ERROR)
            );
        } else {
            throw $this->getExceptionByStatusCode($method, $apiUrl, $response);
        }
    }

    public function updateWebhook(
        string $paywallId,
        string $webhookId,
        string $url,
        array $events,
        string $status
    ): PaywallWebhookResponse {
        $apiUrl = $this->getApiUrl() . 'paywall/' . urlencode($paywallId) . '/webhook/' . urlencode($webhookId);
        $headers = $this->getRequestHeaders();
        $method = 'PUT';

        $body = json_encode(
            [
              'url' => $url,
              'events' => $events,
              'status' => $status,
            ],
            JSON_THROW_ON_ERROR
        );

        $response = $this->getHttpClient()->request($method, $apiUrl, $headers, $body);

        if ($response->getStatus() === 200) {
            return new PaywallWebhookResponse(json_decode($response->getBody(), true, 512, JSON_THROW_ON_ERROR));
        } else {
            throw $this->getExceptionByStatusCode($method, $apiUrl, $response);
        }
    }

    public function deleteWebhook(
        string $paywallId,
        string $webhookId
    ): bool {
        $url = $this->getApiUrl() . 'paywall/' . urlencode($paywallId) . '/webhook/' . urlencode($webhookId);
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
