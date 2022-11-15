<?php

namespace App\Services;

use App\Models\Invoice;

class InvoiceService
{
    public function saveProducts(Invoice $invoice, $products)
    {
        $invoice->products()->attach($products);
    }

    public function savePayments(Invoice $invoice, $payments)
    {
        $invoice->invoicePayments()->createMany($payments);
    }
}
