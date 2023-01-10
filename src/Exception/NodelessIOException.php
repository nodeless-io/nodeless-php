<?php

declare(strict_types=1);

namespace NodelessIO\Exception;

class NodelessIOException extends \RuntimeException
{
    public function __construct(string $message, int $code, \Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}
