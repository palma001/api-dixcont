<?php

namespace App\Models;

use Carbon\Carbon;

class InvoicePayment extends Base
{
    protected $fillable = [
        'payment_method_id',
        'coin_id',
        'exchange',
        'amount',
        'reference',
        'user_created_id',
        'user_updated_id'
    ];

    protected $appends = ['date', 'hour'];

    /**
     * Get invoice igv
     * @return float
     */
    public function getDateAttribute()
    {
        return Carbon::parse($this->created_at)->format('d-m-Y');
    }
    /**
     * Get invoice igv
     * @return float
     */
    public function getHourAttribute()
    {
        return Carbon::parse($this->created_at)->format('H:m:s');
    }

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
    /**
     * Get the coin that owns the InvoicePayment
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function coin()
    {
        return $this->belongsTo(Coin::class);
    }
}
