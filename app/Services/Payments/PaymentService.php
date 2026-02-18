<?php

namespace App\Services\Payments;

use App\Services\Payments\Strategies\CreditCardPayment;
use App\Services\Payments\Strategies\BankTransferPayment;
use App\Services\Payments\Strategies\PaypalPayment;

class PaymentService {

    const METHODS = [
        "credit_card" => CreditCardPayment::class,
        "bank_transfer" => BankTransferPayment::class,
        "paypal" => PaypalPayment::class
    ];
}