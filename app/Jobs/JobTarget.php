<?php

namespace App\Jobs;

use App\Services\CommandTarget;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class JobTarget implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private int $userId;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(int $userId)
    {
        $this->userId = $userId;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $commandTarget = resolve(CommandTarget::class);

            $targets = $commandTarget->getTargets($this->userId);
            $collectionsBalance = $commandTarget->getBalance($this->userId);
            $resultDate = $commandTarget->getBalanceOnlySum($collectionsBalance, $targets);
            $commandTarget->insertEstimatedTimeToReach($targets, $resultDate);

    }
}
