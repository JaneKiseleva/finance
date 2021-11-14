<?php

namespace App\Http\Controllers;

use App\Models\Cashflow;
use App\Models\Target;
use Illuminate\Http\Request;

class CashflowController extends Controller
{
    public function index()
    {
        return view('cashflow.index', [
            'cashflows' => Cashflow::query()
                ->selectRaw('SUM(balance) as balance, count(id) AS data, YEAR(date) AS year')
                ->selectRaw('SUM(incomes) as income, count(id) AS data, YEAR(date) AS year')
                ->selectRaw('SUM(expenditures) as expenditure, count(id) AS data, YEAR(date) AS year')
                ->where('user_id', '=', 1)
                ->groupBy('year')
                ->get(),
            'targets' => Target::query()
                ->get()
        ]);
    }
}
