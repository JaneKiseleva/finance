<?php

namespace App\Jobs;

use App\Models\Operation;
use App\Models\Target;
use App\Services\CommandCashflow;
use App\Services\CommandFinalOperationExpenditureMonthly;
use App\Services\CommandFinalOperationIncomeMonthly;
use App\Services\CommandTarget;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class JobOperationUpdated implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private Operation $operation;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Operation $operation)
    {
        $this->operation = $operation;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {

        $userId = $this->operation->user_id;
        $commandFinalOperationIncomeMonthly = resolve(CommandFinalOperationIncomeMonthly::class);
        $commandFinalOperationExpenditureMonthly = resolve(CommandFinalOperationExpenditureMonthly::class);
        $commandCashflow = resolve(CommandCashflow::class);
        $commandTarget = resolve(CommandTarget::class);


        if ($this->operation['type'] == 'income') {
            $operationsMonthly = $commandFinalOperationIncomeMonthly->getMonthlyOperations($userId);
            $operationsOneTime = $commandFinalOperationIncomeMonthly->getOneTimeOperations($userId);
            $date = $commandFinalOperationIncomeMonthly->getFinalArrayOneTimeOperationsIncome($operationsOneTime);
            $finalArrayOperationsMonthly = $commandFinalOperationIncomeMonthly->getFinalArrayMonthlyOperationsIncome($operationsMonthly, $userId);
            $commandFinalOperationIncomeMonthly->deleteOldIncomesMonthly($userId);
            $commandFinalOperationIncomeMonthly->insertFinalOperationsIncomes($finalArrayOperationsMonthly, $operationsOneTime, $date, $userId);
        }

        if ($this->operation['type'] == 'expenditure') {
            $operationsMonthly = $commandFinalOperationExpenditureMonthly->getMonthlyOperations($userId);
            $operationsOneTime = $commandFinalOperationExpenditureMonthly->getOneTimeOperations($userId);
            $date = $commandFinalOperationExpenditureMonthly->getFinalArrayOneTimeOperationsExpenditure($operationsOneTime);
            $finalArrayOperationsMonthly = $commandFinalOperationExpenditureMonthly->getFinalArrayOperationsExpenditure($operationsMonthly, $userId);
            $commandFinalOperationExpenditureMonthly->deleteOldExpenditureMonthly($userId);
            $commandFinalOperationExpenditureMonthly->insertFinalOperationsExpenditure($finalArrayOperationsMonthly, $operationsOneTime, $date, $userId);
        }

        $collectionsIncomes = $commandCashflow->getIncomes($userId);
        $collectionsExpenditures = $commandCashflow->getExpenditures($userId);
        $cashflow = $commandCashflow->getEmptyCashflowArray();
        $cashflow = $commandCashflow->getCashflowOnMonths($cashflow, $collectionsIncomes, $collectionsExpenditures);
        $allSumIncomes = $commandCashflow->sumAllIncomes($collectionsIncomes);
        $allSumExpenditures = $commandCashflow->sumAllExpenditures($collectionsExpenditures);
        $commandCashflow->deleteOldBalance($userId);
        $commandCashflow->insertBalance($cashflow, $allSumIncomes, $allSumExpenditures, $userId);

        $targets = $commandTarget->getTargets($userId);
        if( $targets != null ) {
            $collectionsBalance = $commandTarget->getBalance($userId);
            $resultDate = $commandTarget->getBalanceOnlySum($collectionsBalance, $targets);
            $commandTarget->insertEstimatedTimeToReach($targets, $resultDate);
        }
    }
}
