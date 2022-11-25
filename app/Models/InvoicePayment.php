<?php

namespace App\Models;

class InvoicePayment extends Base
{
    protected $fillable = [
        'payment_method_id',
        'coin_id', 'exchange',
        'amount',
        'user_created_id',
        'user_updated_id'
    ];
    /**
     * Get the invoice that owns the InvoicePayment
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function invoice()
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
