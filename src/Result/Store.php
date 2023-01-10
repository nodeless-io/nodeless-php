<?php

declare(strict_types=1);

namespace NodelessIO\Result;

class Store extends AbstractResult
{
    public function getId(): string
    {
        return $this->getData()['id'];
    }

    public function getName(): string
    {
        return $this->getData()['name'];
    }

    public function getUrl(): string
    {
        return $this->getData()['url'];
    }

    public function getEmail(): string
    {
        return $this->getData()['email'];
    }

    public function getCreatedAt(): string
    {
        return $this->getData()['createdAt'];
    }
}
