<?php

namespace App\Console\Commands;

use App\Models\Operation;
use App\Services\CommandTarget;
use Illuminate\Console\Command;

class TargetCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'get:target';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Get target and get real date';

    /**
     * Execute the console command.
     *
     * @return int
     */


    public function handle(CommandTarget $commandTarget, Operation $operation)
    {
        $userId = $operation->user_id;
        $allTargets = $commandTarget->getTargets($userId);
        $collectionsBalance = $commandTarget->getBalance($userId);
        $resultDate = $commandTarget->getBalanceOnlySum($collectionsBalance, $allTargets);
        $commandTarget->deleteTarget($userId);
        $commandTarget->insertEstimatedTimeToReach($allTargets, $resultDate, $userId);
    }
}
