<?php

declare(strict_types=1);

namespace NodelessIO\Client;

use NodelessIO\Response\StoreInvoiceResponse;

class StoreInvoiceClient extends AbstractClient
{
    public function createInvoice(
        string $storeId,
        string $amount,
        string $currency,
        ?string $buyerEmail = null,
        ?string $redirectUrl = null,
        ?array $metaData = null,
    ): StoreInvoiceResponse {
        $url = $this->getApiUrl() . 'store/' . urlencode(
            $storeId
        ) . '/invoice';
        $headers = $this->getRequestHeaders();
        $method = 'POST';

        $body = json_encode(
            [
                'amount' => $amount,
                'currency' => $currency,
                'buyerEmail' => $buyerEmail,
                'redirectUrl' => $redirectUrl,
                'metadata' => !empty($metaData) ? $metaData : null,
            ],
            JSON_THROW_ON_ERROR
        );

        $response = $this->getHttpClient()->request($method, $url, $headers, $body);

        if ($response->getStatus() === 201) {
            return new StoreInvoiceResponse(
                json_decode($response->getBody(), true, 512, JSON_THROW_ON_ERROR)
            );
        } else {
            throw $this->getExceptionByStatusCode($method, $url, $response);
        }
    }

    public function getInvoice(
        string $storeId,
        string $invoiceId
    ): StoreInvoiceResponse {
        $url = $this->getApiUrl() . 'store/' . urlencode($storeId) . '/invoice/' . urlencode($invoiceId);
        $headers = $this->getRequestHeaders();
        $method = 'GET';
        $response = $this->getHttpClient()->request($method, $url, $headers);

        if ($response->getStatus() === 200) {
            return new StoreInvoiceResponse(json_decode($response->getBody(), true, 512, JSON_THROW_ON_ERROR));
        } else {
            throw $this->getExceptionByStatusCode($method, $url, $response);
        }
    }

    public function getInvoiceStatus(
        string $storeId,
        string $invoiceId
    ): string {
        $url = $this->getApiUrl() . 'store/' . urlencode($storeId) . '/invoice/' . urlencode($invoiceId) . '/status';
        $headers = $this->getRequestHeaders();
        $method = 'GET';
        $response = $this->getHttpClient()->request($method, $url, $headers);

        if ($response->getStatus() === 200) {
            $data = json_decode($response->getBody(), true, 512, JSON_THROW_ON_ERROR);
            return $data['status'];
        } else {
            throw $this->getExceptionByStatusCode($method, $url, $response);
        }
    }
}
