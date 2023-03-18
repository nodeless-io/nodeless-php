<?php

declare(strict_types=1);

namespace NodelessIO\Response;

class ServerInfoApiStatusResponse extends AbstractResponse
{
    public function getCode(): string
    {
        return $this->getData()['code'];
    }

    public function getStatus(): string
    {
        return $this->getData()['status'];
    }

    public function getNode(): string
    {
        return $this->getData()['node'];
    }
}
