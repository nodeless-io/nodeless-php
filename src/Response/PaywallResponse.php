<?php

declare(strict_types=1);

namespace NodelessIO\Response;

class PaywallResponse extends AbstractResponse
{
    public function getId(): string
    {
        return $this->getData()['id'];
    }

    public function getType(): string
    {
        return $this->getData()['type'];
    }

    public function getName(): string
    {
        return $this->getData()['name'];
    }

    public function getPrice(): int
    {
        return $this->getData()['price'];
    }

    public function getSettings(): array
    {
        return $this->getData()['settings'];
    }
}
