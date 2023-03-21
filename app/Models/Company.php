<?php

namespace App\Models;

class Company extends Base
{
    /**
     * Get all of the branchOffices for the Company
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function branchOffices()
    {
        return $this->hasMany(BranchOffice::class);
    }
}
