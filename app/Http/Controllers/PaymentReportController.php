<?php

namespace App\Http\Controllers;

use App\Models\InvoicePayment;
use Illuminate\Http\Request;

class PaymentReportController extends Controller
{
    public function getPaymentTotals(Request $request)
    {
        $payments = InvoicePayment::selectRaw('payment_methods.id,payment_methods.name,SUM(invoice_payments.amount) as paymentTotal, coins.name as coin_name, coins.symbol as coin_symbol')
            ->join('payment_methods', 'payment_methods.id', 'invoice_payments.payment_method_id')
            ->join('coins', 'coins.id', 'invoice_payments.coin_id')
            ->whereDate('invoice_payments.created_at', '>=', $request->from)
			->whereDate('invoice_payments.created_at', '<=', $request->to)
            ->groupBy('payment_method_id', 'coin_id', 'payment_methods.name', 'coins.name', 'coins.symbol', 'payment_methods.id')
            ->get();

       return response()->json($payments, 200);
    }
}
