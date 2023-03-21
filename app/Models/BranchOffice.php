<?php

namespace App\Models;

class BranchOffice extends Base
{
    /**
     * Get the company that owns the BranchOffice
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}
