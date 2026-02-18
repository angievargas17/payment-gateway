<?php 

namespace App\Services\Payments\DTOs;

class PaymentResultDTO
{
    public function __construct(
        public readonly bool $success,
        public readonly string $message,
        public readonly array $details = []
    ) {}
}