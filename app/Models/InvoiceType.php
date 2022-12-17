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

    /**
     * The taxes that belong to the InvoiceType
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function taxes()
    {
        return $this->belongsToMany(Taxe::class)
            ->withPivot('amount', 'type_taxe');
    }
}
