<?php

declare(strict_types=1);

namespace NodelessIO\Response;

class PaywallRequestResponse extends AbstractResponse
{
    public function getId(): string
    {
        return $this->getData()['id'];
    }

    public function getSatsAmount(): int
    {
        return $this->getData()['satsAmount'];
    }

    public function getStatus(): string
    {
        return $this->getData()['status'];
    }

    public function getCreatedAt(): string
    {
        return $this->getData()['createdAt'];
    }

    public function getPaidAt(): string
    {
        return $this->getData()['paidAt'];
    }
    public function getonchainAddress(): string
    {
        return $this->getData()['onchainAddress'];
    }

    public function getLightningInvoice(): string
    {
        return $this->getData()['lightningInvoice'];
    }

    public function getPaywall(): PaywallResponse
    {
        return new PaywallResponse(['data' => $this->getData()['paywall']]);
    }

    public function getQrCodes(): array
    {
        return $this->getData()['qrCodes'];
    }

    public function getQrCodeUnified(): string
    {
        return $this->getData()['qrCodes']['unified'];
    }

    public function getQrCodeOnchain(): string
    {
        return $this->getData()['qrCodes']['onchain'];
    }

    public function getQrCodeLightning(): string
    {
        return $this->getData()['qrCodes']['lightning'];
    }
}
