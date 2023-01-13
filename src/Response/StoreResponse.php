<?php

declare(strict_types=1);

namespace NodelessIO\Response;

class StoreResponse extends AbstractResponse
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
