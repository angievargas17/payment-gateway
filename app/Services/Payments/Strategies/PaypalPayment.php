<?php 

namespace App\Services\Payments\Strategies;

use App\Services\Payments\Contracts\PaymentStrategy;

class PaypalPayment implements PaymentStrategy
{
    public function processPayment($data)
    {
        // Lógica para procesar el pago con PayPal
        return "Procesando pago de $data con PayPal.";
    }
}