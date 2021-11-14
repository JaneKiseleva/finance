<?php

namespace App\Console\Commands;
use App\Models\Operation;
use App\Services\CommandFinalOperationIncomeMonthly;
use App\Services\CommandFinalOperationIncomeMonthlyCreated;
use Illuminate\Console\Command;

class OperationCommandIncomeMonthlyCreated extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'operation:final-income-created';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create final table of Operation';

    /**
     * Execute the console command.
     *
     * @return int
     */

//    public function handle(CommandFinalOperationIncomeMonthly $commandFinalOperation)
//    {
////        $operationsMonthly = $commandFinalOperation->getMonthlyOperations();
////        $operationsOneTime = $commandFinalOperation->getOneTimeOperations();
////        $date = $commandFinalOperation->getFinalArrayOneTimeOperationsIncome($operationsOneTime);
////        $finalArrayOperationsMonthly = $commandFinalOperation->getFinalArrayMonthlyOperationsIncome($operationsMonthly);
////        $commandFinalOperation->deleteOldIncomesMonthly();
////        $commandFinalOperation->insertFinalOperationsIncomes($finalArrayOperationsMonthly, $operationsOneTime, $date);
////
////    }

    public function handle(CommandFinalOperationIncomeMonthlyCreated $commandFinalOperation, Operation $operation)
    {
        $userId = $operation->user_id;
        $operationsMonthly = $commandFinalOperation->getMonthlyOperations($userId);
        $operationsOneTime = $commandFinalOperation->getOneTimeOperations($userId);
        $date = $commandFinalOperation->getFinalArrayOneTimeOperationsIncome($operationsOneTime);
        $finalArrayOperationsMonthly = $commandFinalOperation->getFinalArrayMonthlyOperationsIncome($operationsMonthly, $userId);
        $commandFinalOperation->deleteOldIncomesMonthly($userId);
        $commandFinalOperation->insertFinalOperationsIncomes($finalArrayOperationsMonthly, $operationsOneTime, $date, $userId);

    }
}
