<?php

declare(strict_types=1);

namespace NodelessIO\Response;

class StoreInvoiceList extends AbstractListResponse
{
    /**
     * @return \NodelessIO\Response\StoreInvoiceResponse[]
     */
    public function all(): array
    {
        $invoices = [];
        foreach ($this->getData() as $invoice) {
            $invoices[] = new \NodelessIO\Response\StoreInvoiceResponse($invoice);
        }
        return $invoices;
    }

    /**
     * @return \NodelessIO\Response\StoreInvoiceResponse[]
     */
    public function getInvoicesByStatus(string $status): array
    {
        $r = array_filter(
            $this->all(),
            function (\NodelessIO\Response\StoreInvoiceResponse $invoice) use ($status) {
                return $invoice->getStatus() === $status;
            }
        );

        // Renumber results
        return array_values($r);
    }
}
