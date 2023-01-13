<?php

declare(strict_types=1);

namespace NodelessIO\Response;

abstract class AbstractListResponse extends AbstractResponse implements \Countable
{
    public function count()
    {
        return count($this->getData());
    }
}
