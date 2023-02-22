<?php

declare(strict_types=1);

namespace NodelessIO\Response;

class PaywallWebhookResponse extends AbstractResponse
{
    public function getId(): string
    {
        return $this->getData()['id'];
    }

    public function getUrl()
    {
        return $this->getData()['url'];
    }

    public function getSecret(): string
    {
        return $this->getData()['secret'];
    }

    public function getStatus(): string
    {
        return $this->getData()['status'];
    }

    public function getCreatedAt(): string
    {
        return $this->getData()['createdAt'];
    }

    public function getLastDeliveryAt(): string
    {
        return $this->getData()['lastDeliveryAt'];
    }
}
