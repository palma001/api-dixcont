<?php

namespace App\Http\Controllers;

use App\Models\InvoicePayment;
use Illuminate\Http\Request;

class PaymentReportController extends Controller
{
    public function getPaymentTotals()
    {
        $payments = InvoicePayment::selectRaw('payment_methods.name, SUM(payment_methods.amount)')
            ->join('payment_methods', 'payment_methods.id', 'invoice_payments.payment_method_id')
            ->groupBy('payment_method_id')
            ->get();

       return response()->json($payments, 200);
    }
}
