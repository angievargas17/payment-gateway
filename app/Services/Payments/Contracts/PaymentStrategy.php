<?php

namespace App\Services\Payments\Contracts;

interface PaymentStrategy
{
    public function processPayment($data) : PaymentResult;
}