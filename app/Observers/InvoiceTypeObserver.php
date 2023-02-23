<?php

namespace App\Observers;

use App\Models\InvoiceType;
use App\Services\InvoiceTypeService;

class InvoiceTypeObserver
{
    /**
     * Handle the InvoiceType "created" event.
     *
     * @param  \App\Models\InvoiceType  $invoiceType
     * @return void
     */
    public function created(InvoiceType $invoiceType)
    {
        $service = new InvoiceTypeService();
        $service->saveProducts($invoiceType, request()->taxes);
    }

    /**
     * Handle the InvoiceType "updated" event.
     *
     * @param  \App\Models\InvoiceType  $invoiceType
     * @return void
     */
    public function updated(InvoiceType $invoiceType)
    {
        //
    }

    /**
     * Handle the InvoiceType "deleted" event.
     *
     * @param  \App\Models\InvoiceType  $invoiceType
     * @return void
     */
    public function deleted(InvoiceType $invoiceType)
    {
        //
    }

    /**
     * Handle the InvoiceType "restored" event.
     *
     * @param  \App\Models\InvoiceType  $invoiceType
     * @return void
     */
    public function restored(InvoiceType $invoiceType)
    {
        //
    }

    /**
     * Handle the InvoiceType "force deleted" event.
     *
     * @param  \App\Models\InvoiceType  $invoiceType
     * @return void
     */
    public function forceDeleted(InvoiceType $invoiceType)
    {
        //
    }
}
