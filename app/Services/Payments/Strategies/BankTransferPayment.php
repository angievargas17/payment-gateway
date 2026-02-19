<?php 

namespace App\Services\Payments\Strategies;

use App\Services\Payments\Contracts\PaymentStrategy;
use App\Config\PaymentConfig;
use App\Services\Payments\DTOs\PaymentDataDTO;
use App\Services\Payments\DTOs\PaymentResultDTO;
use App\Services\Payments\Clients\BankTransferApiClient;

class BankTransferPayment implements PaymentStrategy
{
    public function processPayment(PaymentDataDTO $data) : PaymentResultDTO
    {

        //Simulamos supuestos estados de respuesta de Bank Transfer
        if($data->status != 'OK'){
            return new PaymentResultDTO(
                false,
                "ERROR_" . uniqid(),
                ['message' => 'Monto inválido para Bank Transfer']
            );
        }
       
        $client = new BankTransferApiClient();
        $result = $client->createPayment($data);

        if(!$result || $result['status'] != 'COMPLETED'){
            return new PaymentResultDTO(
                false,
                "ERROR_" . uniqid(),
                ['message' => 'Error al procesar el pago con Bank Transfer']
            );
        }
       
        
        return new PaymentResultDTO(
            true,
            $result['id'],
            [
                'message' => 'Pago procesado correctamente con Bank Transfer',
                'status' => $result['status']
            ]
        );
    }
}