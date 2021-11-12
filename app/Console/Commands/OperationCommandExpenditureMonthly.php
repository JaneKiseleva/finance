<?php

namespace App\Console\Commands;
use App\Models\Operation;
use App\Services\CommandFinalOperationExpenditureMonthly;
use Illuminate\Console\Command;

class OperationCommandExpenditureMonthly extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'operation:final-expenditure';

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

    public function handle(CommandFinalOperationExpenditureMonthly $commandFinalOperation, Operation $operation)
    {
        $userId = $operation->user_id;
        $operationsMonthly = $commandFinalOperation->getMonthlyOperations($userId);
        $operationsOneTime = $commandFinalOperation->getOneTimeOperations($userId);
        $date = $commandFinalOperation->getFinalArrayOneTimeOperationsExpenditure($operationsOneTime);
        $finalArrayOperationsMonthly = $commandFinalOperation->getFinalArrayOperationsExpenditure($operationsMonthly, $userId);
        $commandFinalOperation->deleteOldExpenditureMonthly($userId);
        $commandFinalOperation->insertFinalOperationsExpenditure($finalArrayOperationsMonthly, $operationsOneTime, $date, $userId);

    }

//    public function handle(CommandFinalOperationExpenditureMonthly $commandFinalOperation)
//    {
//        $operationsMonthly = $commandFinalOperation->getMonthlyOperations();
//        $operationsOneTime = $commandFinalOperation->getOneTimeOperations();
//        $date = $commandFinalOperation->getFinalArrayOneTimeOperationsExpenditure($operationsOneTime);
//        $finalArrayOperationsMonthly = $commandFinalOperation->getFinalArrayOperationsExpenditure($operationsMonthly);
//        $commandFinalOperation->deleteOldExpenditureMonthly();
//        $commandFinalOperation->insertFinalOperationsExpenditure($finalArrayOperationsMonthly, $operationsOneTime, $date);
//
//    }
}
