<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Events\PaymentSucceeded;


class DispatchNotification implements ShouldQueue
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(PaymentSucceeded $event): void
    {
        Log::info('Notificación de pago enviada', [
            'method' => $event->method,
            'transaction_id' => $event->transactionId,
            'amount' => $event->amount,
        ]);
    }
} 


