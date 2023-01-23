<?php

declare(strict_types=1);

namespace NodelessIO\Client;

use NodelessIO\Response\StoreWebhookResponse;

class StoreWebhookClient extends AbstractClient
{
    public function allWebhooks(
        string $storeId
    ): StoreWebhookResponse {
        $url = $this->getApiUrl() . 'store/' . urlencode($storeId) . '/webhooks';
        $headers = $this->getRequestHeaders();
        $method = 'GET';
        $response = $this->getHttpClient()->request($method, $url, $headers);

        if ($response->getStatus() === 200) {
            return new StoreWebhookResponse(json_decode($response->getBody(), true, 512, JSON_THROW_ON_ERROR));
        } else {
            throw $this->getExceptionByStatusCode($method, $url, $response);
        }
    }

    public function getWebhook(
        string $storeId,
        string $webhookId
    ): StoreWebhookResponse {
        $url = $this->getApiUrl() . 'store/' . urlencode($storeId) . '/webhooks/' . urlencode($webhookId);
        $headers = $this->getRequestHeaders();
        $method = 'GET';
        $response = $this->getHttpClient()->request($method, $url, $headers);

        if ($response->getStatus() === 200) {
            return new StoreWebhookResponse(json_decode($response->getBody(), true, 512, JSON_THROW_ON_ERROR));
        } else {
            throw $this->getExceptionByStatusCode($method, $url, $response);
        }
    }
    public function createWebhook(
        string $storeId,
        string $type,
        string $url,
        array $events,
        string $secret,
        string $status
    ): StoreWebhookResponse {
        $apiUrl = $this->getApiUrl() . 'store/' . urlencode(
            $storeId
        ) . '/webhooks';
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
            return new StoreWebhookResponse(
                json_decode($response->getBody(), true, 512, JSON_THROW_ON_ERROR)
            );
        } else {
            throw $this->getExceptionByStatusCode($method, $url, $response);
        }
    }

    public function updateWebhook(
        string $storeId,
        string $webhookId,
        string $url,
        array $events,
        string $status
    ): StoreWebhookResponse {
        $apiUrl = $this->getApiUrl() . 'store/' . urlencode($storeId) . '/webhooks/' . urlencode($webhookId);
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
            return new StoreWebhookResponse(json_decode($response->getBody(), true, 512, JSON_THROW_ON_ERROR));
        } else {
            throw $this->getExceptionByStatusCode($method, $url, $response);
        }
    }

    public function deleteWebhook(
        string $storeId,
        string $webhookId
    ): bool {
        $url = $this->getApiUrl() . 'store/' . urlencode($storeId) . '/webhooks/' . urlencode($webhookId);
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
