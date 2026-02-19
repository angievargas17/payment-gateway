<?php

namespace App\Services\Payments\Clients;


use Illuminate\Support\Facades\Http;
use App\Config\PaymentConfig;
use Illuminate\Support\Facades\Log;


class CreditCardApiClient
{
        protected string $baseUrl;
        protected string $clientId;
        protected string $clientSecret;
        protected ?string $token = null;

        public function __construct(){
            $config = PaymentConfig::getInstance();

            // supuesta configuración para credit_card 
            $this->baseUrl = $config->providers['credit_card']['url'];
            $this->clientId = $config->providers['credit_card']['client_id'];
            $this->clientSecret = $config->providers['credit_card']['client_secret'];  
            $this->timeout = $config->timeout;
        }

        /**
         * Metodo para autenticase en el servicio de Tarjeta Credito y obtener un token de acceso
         */
        public function authenticate(): void
        {
            try {
                $response = Http::asForm()
                ->withBasicAuth($this->clientId, $this->clientSecret)
                ->post($this->baseUrl . '/oauth2/token', [
                    'grant_type' => 'client_credentials',
                ]);

                // Generamos un token simulado para las pruebas
                $tokenG = bin2hex(random_bytes(16));
                
                // En caso real esperamos la respuesta de la autenticación y obtenemos el token
                //$this->token = $response->json('access_token');
                $this->token = $tokenG;
            } catch (\Throwable $th) {
                throw $th;
            }
            
        }

        /**
         * Metodo para crear un pago en Tarjeta Credito utilizando el token de acceso obtenido
         */
        public function createPayment($payload): array
        {
            try {

                if (!$this->token) {
                    $this->authenticate();
                }
                // Se realiza la petición al servicio de Tarjeta Credito para crear el pago utilizando el token de acceso obtenido
                $response = Http::withToken($this->token)
                    ->post($this->baseUrl . '/payments/payment', $payload)
                    ->json();
                
                // Simulamos una respuesta exitosa de Tarjeta Credito
                return [
                    'id' => 'PAY-' . uniqid(),
                    'status' => 'COMPLETED'
                ];

            } catch (\Throwable $th) {
                throw $th;
            }
            
        }

        /**
         * Metodo para obtener el estado de un pago en Tarjeta Credito utilizando el token de acceso obtenido
         */
         public function getPayment(string $paymentId): array
        {
            try {
                if (!$this->token) {
                    $this->authenticate();
                }

                $response = Http::withToken($this->token)
                ->get($this->baseUrl . "/payments/payment/{$paymentId}")
                ->json();

                // return $response;
                
                // Simulamos una respuesta de Tarjeta Credito con el estado del pago
                return [
                    'id' => $paymentId,
                    'status' => 'COMPLETED',
                    'amount' => 100.00,
                    'currency' => 'COP'
                ];
            } catch (\Throwable $th) {
                throw $th;
            }
            
        }
}
