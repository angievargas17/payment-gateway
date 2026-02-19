<?php 

namespace App\Services\Payments\Strategies;

use App\Services\Payments\Contracts\PaymentStrategy;

use App\Services\Payments\DTOs\PaymentDataDTO;
use App\Services\Payments\DTOs\PaymentResultDTO;  
use App\Services\Payments\Clients\PaypalApiClient;
 

class PaypalPayment implements PaymentStrategy
{
    public function processPayment(PaymentDataDTO $data) : PaymentResultDTO
    {

        //Simulamos supuestos estados de respuesta de PayPal
        if($data->status != 'OK'){
            return new PaymentResultDTO(
                false,
                "ERROR_" . uniqid(),
                ['message' => 'Monto inválido para PayPal']
            );
        }
       
        $client = new PaypalApiClient();
        $result = $client->createPayment($data);

        if(!$result || $result['status'] != 'COMPLETED'){
            return new PaymentResultDTO(
                false,
                "ERROR_" . uniqid(),
                ['message' => 'Error al procesar el pago con PayPal']
            );
        }
       
        
        return new PaymentResultDTO(
            true,
            $result['id'],
            [
                'message' => 'Pago procesado correctamente con PayPal',
                'status' => $result['status']
            ]
        );
    }
}