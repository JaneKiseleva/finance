<?php

namespace App\Console\Commands;
use App\Models\Operation;
use App\Services\CommandFinalOperationExpenditureOneTime;
use Illuminate\Console\Command;

class OperationCommandExpenditureOneTime extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'operation:final-expenditure-onetime';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create or Update final table of Operation';

    /**
     * Execute the console command.
     *
     * @return int
     */

    public function handle(CommandFinalOperationExpenditureOneTime $commandFinalOperation, Operation $operation)
    {
        $userId = $operation->author->id;
        $operationsOneTime = $commandFinalOperation->getOneTimeOperations($userId);
        $commandFinalOperation->deleteOldExpenditureOneTime($userId);
        $commandFinalOperation->insertFinalOperationsExpenditureOneTime($operationsOneTime, $userId);
    }
}

