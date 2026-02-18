<?php 

namespace App\Services\Payments\Strategies;
use App\Services\Payments\Contracts\PaymentStrategy;

class BankTransferPayment implements PaymentStrategy
{
    public function processPayment($data)
    {
        // Lógica para procesar el pago con transferencia bancaria
        return "Procesando pago de $data con transferencia bancaria.";
    }
}