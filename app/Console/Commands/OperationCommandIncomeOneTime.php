<?php

namespace App\Console\Commands;
use App\Models\Operation;
use App\Services\CommandFinalOperationIncomeOneTime;
use Illuminate\Console\Command;

class OperationCommandIncomeOneTime extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'operation:final-income-onetime';

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

    public function handle(CommandFinalOperationIncomeOneTime $commandFinalOperation)
    {
//        $userId = $operation->author->id;
        $operationsOneTime = $commandFinalOperation->getOneTimeOperations();
        $commandFinalOperation->deleteOldIncomesOneTime();
        $commandFinalOperation->insertFinalOperationsIncomeOneTime($operationsOneTime);
    }
}
