<?php

declare(strict_types=1);

namespace NodelessIO\Client;

use NodelessIO\Result\StoreInvoice as ResultInvoice;

class StoreInvoice extends AbstractClient
{
    public function createInvoice(
        string $storeId,
        ?float $amount = null,
        ?string $buyerEmail = null,
        ?string $redirectUrl = null,
        ?array $metaData = null,
    ): ResultInvoice {
        $url = $this->getApiUrl() . 'store/' . urlencode(
            $storeId
        ) . '/invoice';
        $headers = $this->getRequestHeaders();
        $method = 'POST';

        $body = json_encode(
            [
                'amount' => $amount ?? null,
                'buyer_email' => $buyerEmail,
                'redirect_url' => $redirectUrl,
                'metadata' => !empty($metaData) ? $metaData : null,
            ],
            JSON_THROW_ON_ERROR
        );

        $response = $this->getHttpClient()->request($method, $url, $headers, $body);

        if ($response->getStatus() === 201) {
            return new ResultInvoice(
                json_decode($response->getBody(), true, 512, JSON_THROW_ON_ERROR)
            );
        } else {
            throw $this->getExceptionByStatusCode($method, $url, $response);
        }
    }

    public function getInvoice(
        string $storeId,
        string $invoiceId
    ): ResultInvoice {
        $url = $this->getApiUrl() . 'store/' . urlencode($storeId) . '/invoice/' . urlencode($invoiceId);
        $headers = $this->getRequestHeaders();
        $method = 'GET';
        $response = $this->getHttpClient()->request($method, $url, $headers);

        if ($response->getStatus() === 200) {
            return new ResultInvoice(json_decode($response->getBody(), true, 512, JSON_THROW_ON_ERROR));
        } else {
            throw $this->getExceptionByStatusCode($method, $url, $response);
        }
    }
}
