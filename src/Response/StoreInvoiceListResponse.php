<?php

declare(strict_types=1);

namespace NodelessIO\Response;

class StoreInvoiceListResponse extends AbstractListResponse
{
    /**
     * @return StoreInvoiceResponse[]
     */
    public function all(): array
    {
        $invoices = [];
        foreach ($this->getData() as $invoice) {
            $invoices[] = new StoreInvoiceResponse($invoice);
        }
        return $invoices;
    }

    /**
     * @return StoreInvoiceResponse[]
     */
    public function getInvoicesByStatus(string $status): array
    {
        $r = array_filter(
            $this->all(),
            function (StoreInvoiceResponse $invoice) use ($status) {
                return $invoice->getStatus() === $status;
            }
        );

        // Renumber results
        return array_values($r);
    }
}
