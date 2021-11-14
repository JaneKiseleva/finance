<?php

namespace App\Jobs;

use App\Models\Target;
use App\Services\CommandTarget;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class JobTargetUpdated implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private Target $target;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Target $target)
    {
        $this->target = $target;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $userId = $this->target->user_id;
        $commandTarget = resolve(CommandTarget::class);

        $allTargets = $commandTarget->getTargets($userId);
        $collectionsBalance = $commandTarget->getBalance($userId);
        $resultDate = $commandTarget->getBalanceOnlySum($collectionsBalance, $allTargets);
        $commandTarget->deleteTarget($userId);
        $commandTarget->insertEstimatedTimeToReach($allTargets, $resultDate, $userId);
    }
}
