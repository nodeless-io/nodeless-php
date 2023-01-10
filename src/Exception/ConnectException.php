<?php

declare(strict_types=1);

namespace NodelessIO\Exception;

class ConnectException extends NodelessIOException
{
    public function __construct(string $curlErrorMessage, int $curlErrorCode)
    {
        parent::__construct($curlErrorMessage, $curlErrorCode);
    }
}
