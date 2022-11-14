<?php

namespace App\Models;

class PaymentMethod extends Base
{
    /**
     * Get the invoicePayments that owns the PaymentMethod
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function invoicePayments()
    {
        return $this->hasMany(InvoicePayment::class,);
    }
}
