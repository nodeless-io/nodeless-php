<?php

declare(strict_types=1);

namespace NodelessIO\Response;

class PaywallListResponse extends AbstractListResponse
{
    /**
     * @return PaywallResponse[]
     */
    public function all(): array
    {
        $paywalls = [];
        foreach ($this->getData() as $paywall) {
            $paywalls[] = new PaywallResponse($paywall);
        }
        return $paywalls;
    }

    /**
     * @return PaywallResponse[]
     */
    public function getPaywallsByType(string $type): array
    {
        $r = array_filter(
            $this->all(),
            function (PaywallResponse $paywall) use ($type) {
                return $paywall->getType() === $type;
            }
        );

        // Renumber results
        return array_values($r);
    }
}
