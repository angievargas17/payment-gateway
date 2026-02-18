<?php 

namespace App\Services\Payments\Strategies;

use App\Services\Payments\Contracts\PaymentStrategy;

class CreditCardPayment implements PaymentStrategy
{
    public function processPayment($data)
    {
        // Lógica para procesar el pago con tarjeta de crédito
        return "Procesando pago de $data con tarjeta de crédito.";
    }
}