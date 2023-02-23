<?php

namespace App\Services;

use App\Models\InvoiceType;

class InvoiceTypeService
{
    public function saveProducts(InvoiceType $invoiceType, $taxes)
    {
        collect($taxes)
            ->each(function ($taxe) use ($invoiceType) {
                $invoiceType->taxes()->attach($taxe['id']);
            });
    }
}
