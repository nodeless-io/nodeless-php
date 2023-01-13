<?php

declare(strict_types=1);

namespace NodelessIO\Response;

class StoreInvoiceResponse extends AbstractResponse
{
    public const STATUS_NEW = 'new';

    public const STATUS_INVALID = 'invalid';

    public const STATUS_SETTLED = 'settled';

    public const STATUS_EXPIRED = 'expired';

    public const STATUS_PROCESSING = 'processing';

    public function getId(): string
    {
        return $this->getData()['id'];
    }

    public function getCheckoutLink()
    {
        return $this->getData()['checkoutLink'];
    }

    public function getSatsAmount(): float
    {
        return $this->getData()['satsAmount'];
    }

    public function getStatus(): string
    {
        return $this->getData()['status'];
    }

    public function getBuyerEmail(): string
    {
        return $this->getData()['buyerEmail'];
    }
    public function getRedirectUrl(): string
    {
        return $this->getData()['redirectUrl'];
    }

    public function getMetadata(): array
    {
        return $this->getData()['metadata'];
    }

    public function getCreatedAt(): string
    {
        return $this->getData()['createdAt'];
    }

    public function getPaidAt(): string
    {
        return $this->getData()['paidAt'];
    }

    public function getOnchainAddress(): string
    {
        return $this->getData()['onchainAddress'];
    }
    public function getLightningInvoice(): string
    {
        return $this->getData()['lightningInvoice'];
    }

    public function getStore(): StoreResponse
    {
        return new StoreResponse(['data' => $this->getData()['store']]);
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

    public function isNew(): bool
    {
        return $this->getData()['status'] === self::STATUS_NEW;
    }

    public function isInvalid(): bool
    {
        return $this->getData()['status'] === self::STATUS_INVALID;
    }

    public function isSettled(): bool
    {
        return $this->getData()['status'] === self::STATUS_SETTLED;
    }

    public function isExpired(): bool
    {
        return $this->getData()['status'] === self::STATUS_EXPIRED;
    }

    public function isProcessing(): bool
    {
        return $this->getData()['status'] === self::STATUS_PROCESSING;
    }
}
