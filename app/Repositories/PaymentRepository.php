<?php

namespace App\Repositories;

use App\Models\Payment;

class PaymentRepository{

    /**
     * Method to create a new payment record
     */
    public function createPayment($data){
        return Payment::create($data);
    }

    /**
     * Method to retrieve a payment record by ID
     */
    public function getPaymentById($id){
        return Payment::find($id);
    }

    /**
     * Method to update the status of a payment record
     */
    public function updatePaymentStatus($id, $status){
        $payment = Payment::find($id);
        if($payment){
            $payment->status = $status;
            $payment->save();
            return $payment;
        }
        return null;
    }

    /**
     * Method to delete a payment record
     */
    public function deletePayment($id){
        $payment = Payment::find($id);
        if($payment){
            $payment->delete();
            return true;
        }
        return false;
    }
}