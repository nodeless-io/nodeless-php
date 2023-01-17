<?php

declare(strict_types=1);

namespace NodelessIO\Response;

class StoreInvoiceResponse extends AbstractResponse
{
    public const STATUS_NEW = 'new';
    public const STATUS_PENDING_CONFIRMATION = 'pending_confirmation';
    public const STATUS_PAID = 'paid';
    public const STATUS_EXPIRED = 'expired';
    public const STATUS_CANCELLED = 'cancelled';
    public const STATUS_UNDERPAID = 'underpaid';
    public const STATUS_OVERPAID = 'overpaid';
    public const STATUS_IN_FLIGHT = 'in_flight';

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

    public function isPendingConfirmation(): bool
    {
        return $this->getData()['status'] === self::STATUS_PENDING_CONFIRMATION;
    }

    public function isPaid(): bool
    {
        return $this->getData()['status'] === self::STATUS_PAID;
    }

    public function isExpired(): bool
    {
        return $this->getData()['status'] === self::STATUS_EXPIRED;
    }

    public function isCancelled(): bool
    {
        return $this->getData()['status'] === self::STATUS_CANCELLED;
    }

    public function isUnderpaid(): bool
    {
        return $this->getData()['status'] === self::STATUS_UNDERPAID;
    }

    public function isOverpaid(): bool
    {
        return $this->getData()['status'] === self::STATUS_OVERPAID;
    }

    public function isInFlight(): bool
    {
        return $this->getData()['status'] === self::STATUS_IN_FLIGHT;
    }
}
