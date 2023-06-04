<?php

namespace App\Services;

use App\Models\Invoice;

class InvoiceService
{
    public function saveProducts(Invoice $invoice, $products)
    {
        collect($products)
            ->each(function ($product) use ($invoice) {
                $invoice->products()->attach(
                    $product['id'],
                    [
                        'amount' => $product['amount'],
                        'price' => $product['price']
                    ]
                );
            });
    }

    public function savePayments(Invoice $invoice, $payments)
    {
        $invoice->invoicePayments()->createMany($payments);
    }

    public function saveTables(Invoice $invoice, $tables)
    {
        $invoice->tables()->attach($tables);
    }
    public function saveTaxes(Invoice $invoice, $taxes)
    {
        info($taxes);
        $invoice->taxes()->attach($taxes);
    }
}
