<?php

namespace App\Models;


class Table extends Base
{
    protected $appends = ['status'];

    public function getStatusAttribute()
    {
        $status = $this->invoices()->wherePivot('status', 'busy')->first();
        return $status ? 'busy' : 'unoccupied';
    }
    /**
     * The invoices that belong to the Table
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function invoices()
    {
        return $this->belongsToMany(Invoice::class)
            ->withPivot('status');
    }
}
