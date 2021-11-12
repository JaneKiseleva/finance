<?php

namespace App\Console\Commands;
use App\Models\Operation;
use App\Services\CommandCashflow;
use Illuminate\Console\Command;

class CashflowCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'get:cashflow';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Get cashflow';

    /**
     * Execute the console command.
     *
     * @return int
     */

//    public function handle(CommandCashflow $commandCashflow, Operation $operation)
//    {
//        $userId = $operation->user_id;
//
//        $collectionsIncomes = $commandCashflow->getIncomes($userId);
//        $collectionsExpenditures = $commandCashflow->getExpenditures($userId);
//        $cashflow = $commandCashflow->getEmptyCashflowArray();
//        $cashflow = $commandCashflow->getCashflowOnMonths($cashflow, $collectionsIncomes, $collectionsExpenditures);
//        $commandCashflow->deleteOldBalance($userId);
//        $commandCashflow->insertBalance($cashflow, $userId);
//
//    }

    public function handle(CommandCashflow $commandCashflow, Operation $operation)
    {
        $userId = $operation->user_id;
        $collectionsIncomes = $commandCashflow->getIncomes($userId);
        $collectionsExpenditures = $commandCashflow->getExpenditures($userId);
        $cashflow = $commandCashflow->getEmptyCashflowArray();
        $cashflow = $commandCashflow->getCashflowOnMonths($cashflow, $collectionsIncomes, $collectionsExpenditures);
        $allSumIncomes = $commandCashflow->sumAllIncomes($collectionsIncomes);
        $allSumExpenditures = $commandCashflow->sumAllExpenditures($collectionsExpenditures);
        $commandCashflow->deleteOldBalance($userId);
        $commandCashflow->insertBalance($cashflow, $allSumIncomes, $allSumExpenditures, $userId);

    }
}
















//
//        $differenceOnMonthsNoFormat = $commandCashflow->getOperationsDifferenceOnMonths($arrayIncomes, $arrayExpenditures);
//        $balanceOnMonths = $commandCashflow->getDifferenceOnMonthArrayFormat($differenceOnMonthsNoFormat);
//        $differenceOnYearsNoFormat = $commandCashflow->getOperationsDifferenceOnYears($balanceOnMonths);
//        $balanceOnYears = $commandCashflow->getDifferenceOnYearArrayFormat($differenceOnYearsNoFormat);
////        $commandCashflow->deleteOldBalance($userId);
//        $commandCashflow->insertBalance($balanceOnYears, $userId);



