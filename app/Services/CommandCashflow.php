<?php

namespace App\Services;


use App\Models\Cashflow;
use App\Models\Expenditure;
use App\Models\Income;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;

class CommandCashflow
{
    //получаем массив доходов со всеми данными
    public function getIncomes(int $userId): Collection
    {
        //вынимаем все доходы, суммируем их по дате, получаем, что одних и тех же дат у нас нет.
        $incomes = Income::query()
            ->where('user_id', '=', $userId)
            ->groupBy('date')
            ->selectRaw('SUM(sum) as sum, date as date')
            ->get();

        //группируем значения по ключу, где ключ дата, а значения вся информация о доходе.
        $collectionsIncomes = $incomes->keyBy('date');

        return $collectionsIncomes;
    }

    //получаем массив расходов со всеми данными по месяцам
    public function getExpenditures(int $userId): Collection
    {
        //вынимаем все расходы, суммируем их по дате, получаем, что одних и тех же дат у нас нет.
        $expenditures = Expenditure::query()
            ->where('user_id', '=', $userId)
            ->groupBy('date')
            ->selectRaw('SUM(sum) as sum, date as date')
            ->get();

        //группируем значения по ключу, где ключ дата, а значения вся информация о доходе.
        $collectionsExpenditures = $expenditures->keyBy('date');

        return $collectionsExpenditures;
    }

    //делаю пустой массив с датой на 5 лет. Ключом является дата, значение нули.
    public function getEmptyCashflowArray(): array
    {
        $cashflow = [];
        $firstDateCashFlow = Carbon::now()->firstOfMonth();
        $lastDateCashFlow = Carbon::now()->firstOfMonth()->addYears(5);

        while ($firstDateCashFlow->lessThan($lastDateCashFlow)) {
            $cashflow[$firstDateCashFlow->format('Y-m-d')] = 0;
            $firstDateCashFlow->addMonth();
        }

        return $cashflow;
    }

    //получаем cashflow по месяцам
    public function getCashflowOnMonths(array $cashflow, Collection $collectionsIncomes, Collection $collectionsExpenditures): array
    {
        $result = [];

        foreach ($cashflow as $date => $value) {
            $sumIncome = $collectionsIncomes[$date]['sum'] ?? 0;
            $sumExpenditure = $collectionsExpenditures[$date]['sum'] ?? 0;
            $result[$date] = $sumIncome - $sumExpenditure;
        }

        return $result;
    }

    //получением суммы всех доходов
    public function sumAllIncomes(Collection $collectionsIncomes): array
    {
        $allSumIncomes = [];
        foreach ($collectionsIncomes as $date => $value) {
            $allSumIncomes[$date] = $value['sum'];
        }

        return $allSumIncomes;
    }

    //получением суммы всех расходов
    public function sumAllExpenditures(Collection $collectionsExpenditures): array
    {
        $allSumExpenditures = [];
        foreach ($collectionsExpenditures as $date => $value) {
            $allSumExpenditures[$date] = $value['sum'];
        }
        return $allSumExpenditures;
    }

    //удалим предыдущие записи из БД для пользователя
    public function deleteOldBalance(int $userId): void
    {
        Cashflow::query()
            ->where('user_id', $userId)
            ->delete();
    }

    //вставим новые записи для пользователя
    public function insertBalance(array $cashflow, array $allSumIncomes, array $allSumExpenditures, int $userId): void
    {
        foreach ($cashflow as $key => $value) {
            Cashflow::query()
                ->insert([
                    'user_id' => $userId,
                    'date' => $key,
                    'balance' => $value,
                    'incomes' => $allSumIncomes[$key] ?? 0,
                    'expenditures' => $allSumExpenditures[$key] ?? 0
                ]);
        }
    }
}


