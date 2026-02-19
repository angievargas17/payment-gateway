<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Http\Request;
use App\Services\Payments\DTOs\PaymentDataDTO;
use App\Services\Payments\PaymentService;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Metodo que simula el procesamiento de un pago conectado a un servicio
     */
    public function store(Request $request)
    {
        try {
            /**Validacion de tipos de datos y campos requeridos */
            $validated = $request->validate([
                'user_id' => 'required|integer',
                'amount' => 'required|numeric|min:1',
                'currency' => 'required|string',
                'method' => 'required|string',
                'status' => 'required|string'
            ]);

            $PaystrategyClass = PaymentService::METHODS[$validated['method']]
            ?? throw new \Exception("El metodo de pago no es valido");

            $strategy = new $PaystrategyClass();

            $paymentData = new PaymentDataDTO(
                $validated['user_id'],
                $validated['amount'],
                $validated['currency'],
                $validated['status']
            );

            $response = $strategy->processPayment($paymentData);

            return response()->json($response);
        } catch (\Throwable $th) {
            return response()->json([
                'success' => false,
                'message' => $th->getMessage()
            ]);
        }
       
        
    }

    /**
     * Display the specified resource.
     */
    public function show(Payment $payment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Payment $payment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Payment $payment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Payment $payment)
    {
        //
    }
}
