<?php

namespace App\Observers;


use App\Models\Operation;
use App\Models\User;
use App\Services\CommandCashflow;
use App\Services\CommandFinalOperationExpenditureMonthly;
use App\Services\CommandFinalOperationExpenditureOneTime;
use App\Services\CommandFinalOperationIncomeMonthly;
use App\Services\CommandFinalOperationIncomeOneTime;
use App\Services\CommandTarget;

class OperationObserver
{
    /**
     * Handle the Operation "created" event.
     *
     * @param  \App\Models\Operation  $operation
     * @return void
     */
    public function created()
    {

    }

    /**
     * Handle the Operation "updated" event.
     *
     * @param  \App\Models\Operation  $operation
     * @return void
     */
    public function updated(Operation $operation)
    {

        dispatch(new \App\Jobs\Job($operation));

//        $userId = $operation->user_id;
//        $commandFinalOperationIncomeMonthly = resolve(CommandFinalOperationIncomeMonthly::class);
//        $commandFinalOperationExpenditureMonthly = resolve(CommandFinalOperationExpenditureMonthly::class);
//        $commandCashflow = resolve(CommandCashflow::class);
//        $commandTarget = resolve(CommandTarget::class);


//        if ($operation['type'] == 'income') {
//            $operationsMonthly = $commandFinalOperationIncomeMonthly->getMonthlyOperations($userId);
//            $operationsOneTime = $commandFinalOperationIncomeMonthly->getOneTimeOperations($userId);
//            $date = $commandFinalOperationIncomeMonthly->getFinalArrayOneTimeOperationsIncome($operationsOneTime);
//            $finalArrayOperationsMonthly = $commandFinalOperationIncomeMonthly->getFinalArrayMonthlyOperationsIncome($operationsMonthly, $userId);
//            $commandFinalOperationIncomeMonthly->deleteOldIncomesMonthly($userId);
//            $commandFinalOperationIncomeMonthly->insertFinalOperationsIncomes($finalArrayOperationsMonthly, $operationsOneTime, $date, $userId);
//        }
//
//        if ($operation['type'] == 'expenditure') {
//            $operationsMonthly = $commandFinalOperationExpenditureMonthly->getMonthlyOperations($userId);
//            $operationsOneTime = $commandFinalOperationExpenditureMonthly->getOneTimeOperations($userId);
//            $date = $commandFinalOperationExpenditureMonthly->getFinalArrayOneTimeOperationsExpenditure($operationsOneTime);
//            $finalArrayOperationsMonthly = $commandFinalOperationExpenditureMonthly->getFinalArrayOperationsExpenditure($operationsMonthly, $userId);
//            $commandFinalOperationExpenditureMonthly->deleteOldExpenditureMonthly($userId);
//            $commandFinalOperationExpenditureMonthly->insertFinalOperationsExpenditure($finalArrayOperationsMonthly, $operationsOneTime, $date, $userId);
//        }
//
//            $collectionsIncomes = $commandCashflow->getIncomes($userId);
//            $collectionsExpenditures = $commandCashflow->getExpenditures($userId);
//            $cashflow = $commandCashflow->getEmptyCashflowArray();
//            $cashflow = $commandCashflow->getCashflowOnMonths($cashflow, $collectionsIncomes, $collectionsExpenditures);
//            $allSumIncomes = $commandCashflow->sumAllIncomes($collectionsIncomes);
//            $allSumExpenditures = $commandCashflow->sumAllExpenditures($collectionsExpenditures);
//            $commandCashflow->deleteOldBalance($userId);
//            $commandCashflow->insertBalance($cashflow, $allSumIncomes, $allSumExpenditures, $userId);
//
//            $allTargets = $commandTarget->getTargets($userId);
//            $collectionsBalance = $commandTarget->getBalance($userId);
//            $resultDate = $commandTarget->getBalanceOnlySum($collectionsBalance, $allTargets);
//            $commandTarget->deleteTarget($userId);
//            $commandTarget->insertEstimatedTimeToReach($allTargets, $resultDate, $userId);

    }

    /**
     * Handle the Operation "deleted" event.
     *
     * @param  \App\Models\Operation  $operation
     * @return void
     */
    public function deleted(Operation $operation)
    {
//        $userId = $operation->user_id;
//        $commandFinalOperationIncomeOneTime = resolve(CommandFinalOperationIncomeOneTime::class);
//        $commandFinalOperationIncomeMonthly = resolve(CommandFinalOperationIncomeMonthly::class);
//        $commandFinalOperationExpenditureOneTime = resolve(CommandFinalOperationExpenditureOneTime::class);
//        $commandFinalOperationExpenditureMonthly = resolve(CommandFinalOperationExpenditureMonthly::class);
//        $commandCashflow = resolve(CommandCashflow::class);
//
//        if ($operation['type'] == 'income' && $operation['period'] == 'one-time') {
//            $operationsOneTime = $commandFinalOperationIncomeOneTime->getOneTimeOperations($userId);
//            $commandFinalOperationIncomeOneTime->deleteOldIncomesOneTime($userId);
//            $commandFinalOperationIncomeOneTime->insertFinalOperationsIncomeOneTime($operationsOneTime, $userId);
//        }
//        if ($operation['type'] == 'income' && $operation['period'] == 'monthly') {
//            $operationsMonthly = $commandFinalOperationIncomeMonthly->getMonthlyOperations($userId);
//            $allDate = $commandFinalOperationIncomeMonthly->getDateOfFiveYear($operationsMonthly);
//            $operationsFinal = $commandFinalOperationIncomeMonthly->getFinalArrayOperationsIncome($operationsMonthly, $allDate, $userId);
//            $commandFinalOperationIncomeMonthly->deleteOldIncomesMonthly($userId);
//            $commandFinalOperationIncomeMonthly->insertFinalOperationsIncomesMonthly($operationsFinal, $userId);
//        }
//        if ($operation['type'] == 'expenditure' && $operation['period'] == 'one-time') {
//            $operationsOneTime = $commandFinalOperationExpenditureOneTime->getOneTimeOperations($userId);
//            $commandFinalOperationExpenditureOneTime->deleteOldExpenditureOneTime($userId);
//            $commandFinalOperationExpenditureOneTime->insertFinalOperationsExpenditureOneTime($operationsOneTime, $userId);
//        }
//        if ($operation['type'] == 'expenditure' && $operation['period'] == 'monthly') {
//            $operationsMonthly = $commandFinalOperationExpenditureMonthly->getMonthlyOperations($userId);
//            $allDate = $commandFinalOperationExpenditureMonthly->getDateOfFiveYear($operationsMonthly);
//            $operationsFinal = $commandFinalOperationExpenditureMonthly->getFinalArrayOperationsExpenditure($operationsMonthly, $allDate, $userId);
//            $commandFinalOperationExpenditureMonthly->deleteOldExpenditureMonthly($userId);
//            $commandFinalOperationExpenditureMonthly->insertFinalOperationsExpenditureMonthly($operationsFinal, $userId);
//        }
//
//        $arrayIncomes = $commandCashflow->getIncomes($userId);
//        $sumArrayIncomes = $commandCashflow->getSumArrayIncomes($arrayIncomes);
//        $arrayExpenditures = $commandCashflow->getExpenditures($userId);
//        $sumArrayExpenditures = $commandCashflow->getSumArrayExpenditures($arrayExpenditures);
//        $differenceOnMonthsNoFormat = $commandCashflow->getOperationsDifferenceOnMonths($sumArrayIncomes, $sumArrayExpenditures);
//        $balanceOnMonths = $commandCashflow->getDifferenceOnMonthArrayFormat($differenceOnMonthsNoFormat, $userId);
//        $differenceOnYearsNoFormat = $commandCashflow->getOperationsDifferenceOnYears($balanceOnMonths);
//        $balanceOnYears = $commandCashflow->getDifferenceOnYearArrayFormat($differenceOnYearsNoFormat, $userId);
//        $commandCashflow->insertBalance($balanceOnYears, $userId);
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
        //
    }
}
