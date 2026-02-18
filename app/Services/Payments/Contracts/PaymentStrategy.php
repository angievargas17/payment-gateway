<?php

namespace App\Services\Payments\Contracts;

use App\Services\Payments\DTOs\PaymentDataDTO;
use App\Services\Payments\DTOs\PaymentResultDTO;

interface PaymentStrategy
{
    public function processPayment(PaymentDataDTO $data) : PaymentResultDTO;
}