<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class InvoiceProduct extends Pivot
{
    protected $fillable = [
        'invoice_id',
        'product_id',
        'amount',
        'price',
        'igv'
    ];
}
