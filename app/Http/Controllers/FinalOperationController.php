<?php

namespace App\Http\Controllers;

use App\Models\Cashflow;
use Illuminate\Http\Request;

class FinalOperationController extends Controller
{

    public function showIncomes() {
        return view('operations.income.show', [
            'incomes' => Cashflow::query()
                ->selectRaw('SUM(incomes) as sum, count(id) AS data, YEAR(date) AS year')
                ->where('user_id', '=', 1)
                ->groupBy('year')
                ->get()
        ]);
    }

    public function showExpenditures() {
        return view('operations.expenditure.show', [
            'expenditures' => Cashflow::query()
                ->selectRaw('SUM(expenditures) as sum, count(id) AS data, YEAR(date) AS year')
                ->where('user_id', '=', 1)
                ->groupBy('year')
                ->get()
        ]);
    }
}

