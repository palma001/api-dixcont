<?php

namespace App\Models;

class InvoiceType extends Base
{
    /**
     * Get all of the invoices for the InvoiceType
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function invoices()
    {
        return $this->hasMany(Invoice::class);
    }
}
