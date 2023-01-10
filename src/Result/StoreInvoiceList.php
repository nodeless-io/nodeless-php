<?php

declare(strict_types=1);

namespace NodelessIO\Result;

class StoreInvoiceList extends AbstractListResult
{
    /**
     * @return \NodelessIO\Result\StoreInvoice[]
     */
    public function all(): array
    {
        $invoices = [];
        foreach ($this->getData() as $invoice) {
            $invoices[] = new \NodelessIO\Result\StoreInvoice($invoice);
        }
        return $invoices;
    }

    /**
     * @return \NodelessIO\Result\StoreInvoice[]
     */
    public function getInvoicesByStatus(string $status): array
    {
        $r = array_filter(
            $this->all(),
            function (\NodelessIO\Result\StoreInvoice $invoice) use ($status) {
                return $invoice->getStatus() === $status;
            }
        );

        // Renumber results
        return array_values($r);
    }
}
