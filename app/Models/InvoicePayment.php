<?php

namespace App\Models;

class InvoicePayment extends Base
{
    /**
     * Get the invoice that owns the InvoicePayment
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function invoices()
    {
        return $this->belongsTo(Invoice::class);
    }
    /**
     * Get the paymentMethod that owns the InvoicePayment
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function paymentMethod()
    {
        return $this->belongsTo(PaymentMethod::class);
    }
}
