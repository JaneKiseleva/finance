<?php

namespace App\Observers;


use App\Models\Operation;
use App\Models\Target;

class OperationObserver
{
    /**
     * Handle the Operation "created" event.
     *
     * @param  \App\Models\Operation  $operation
     * @return void
     */
    public function created(Operation $operation)
    {
//        dispatch(new \App\Jobs\JobOperationCreated($operation));
    }

    /**
     * Handle the Operation "updated" event.
     *
     * @param  \App\Models\Operation  $operation
     * @return void
     */
    public function updated(Operation $operation)
    {
        dispatch(new \App\Jobs\JobOperationUpdated($operation));
    }

    /**
     * Handle the Operation "deleted" event.
     *
     * @param  \App\Models\Operation  $operation
     * @return void
     */
    public function deleted(Operation $operation)
    {
        //
    }

    /**
     * Handle the Operation "restored" event.
     *
     * @param  \App\Models\Operation  $operation
     * @return void
     */
    public function restored(Operation $operation)
    {
        //
    }

    /**
     * Handle the Operation "force deleted" event.
     *
     * @param  \App\Models\Operation  $operation
     * @return void
     */
    public function forceDeleted(Operation $operation)
    {

    }
}
