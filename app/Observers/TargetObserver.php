<?php

namespace App\Observers;

use App\Models\Cashflow;
use App\Models\Target;

class TargetObserver
{
    /**
     * Handle the Operation "created" event.
     *
     * @param  \App\Models\Target $target
     * @return void
     */
    public function created(Target $target)
    {
        dispatch(new \App\Jobs\JobTarget($target->user_id));
    }

    /**
     * Handle the Operation "updated" event.
     *
     * @param  \App\Models\Target $target
     * @return void
     */
    public function updated(Target $target)
    {
        dispatch(new \App\Jobs\JobTarget($target->user_id));
    }

    /**
     * Handle the Operation "deleted" event.
     *
     * @param  \App\Models\Target $target
     * @return void
     */
    public function deleted(Target $target)
    {

    }

    /**
     * Handle the Operation "restored" event.
     *
     * @param  \App\Models\Target $target
     * @return void
     */
    public function restored(Target $target)
    {
        //
    }

    /**
     * Handle the Operation "force deleted" event.
     *
     * @param  \App\Models\Target $target
     * @return void
     */
    public function forceDeleted(Target $target)
    {

    }
}

