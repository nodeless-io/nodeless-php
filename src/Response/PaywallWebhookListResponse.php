<?php

declare(strict_types=1);

namespace NodelessIO\Response;

class PaywallWebhookListResponse extends AbstractListResponse
{
    /**
     * @return PaywallWebhookResponse[]
     */
    public function all(): array
    {
        $webhooks = [];
        foreach ($this->getData() as $webhook) {
            $webhooks[] = new PaywallWebhookResponse(['data' => $webhook]);
        }
        return $webhooks;
    }

    /**
     * @return PaywallWebhookResponse[]
     */
    public function getWebhooksByStatus(string $status): array
    {
        $r = array_filter(
            $this->all(),
            function (PaywallWebhookResponse $webhook) use ($status) {
                return $webhook->getStatus() === $status;
            }
        );

        // Renumber results
        return array_values($r);
    }
}
