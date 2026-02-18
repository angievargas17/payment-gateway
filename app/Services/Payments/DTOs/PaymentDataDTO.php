<?php

namespace App\Services\Payments\DTOs;

class PaymentDataDTO
{
    public function __construct(
        public readonly int $userId,
        public readonly float $amount,
        public readonly string $currency,
        public readonly string $status,
    ) {}
}
