<?php 

namespace App\Services\Payments\Strategies;

use App\Services\Payments\Contracts\PaymentStrategy;
use App\Config\PaymentConfig;
use App\Services\Payments\DTOs\PaymentDataDTO;
use App\Services\Payments\DTOs\PaymentResultDTO;    

class PaypalPayment implements PaymentStrategy
{
    public function processPayment(PaymentDataDTO $data) : PaymentResultDTO
    {


        $config = PaymentConfig::getInstance();

        // supuesta configuración para PayPal 
        $url = $config->providers['paypal']['url'];
        $clientId = $config->providers['paypal']['client_id'];
        $clientSecret = $config->providers['paypal']['client_secret'];  
        $timeout = $config->timeout;

        //Simulamos supuestos estados de respuesta de PayPal
        if($data->status != 'OK'){
            return new PaymentResultDTO(
                false,
                "ERROR_" . uniqid(),
                ['message' => 'Monto inválido para PayPal']
            );
        }

        $transactionId = 'PAYPAL_' . uniqid();

        return new PaymentResultDTO(
            true,
            $transactionId,
            ['message' => 'Pago procesado correctamente con PayPal']
        );
    }
}