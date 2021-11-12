<?php

namespace App\Http\Controllers;

use App\Models\Expenditure;
use App\Models\Income;
use App\Models\Operation;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard', [
            'operations' => Operation::query()
                ->where("type", "=", 'income')
                ->get(),
            'incomes' => Income::query()
                ->groupBy('user_id')
                ->selectRaw('SUM(sum) as sum, user_id as user_id')
                ->get(),
            'expenditures' => Expenditure::query()
                ->groupBy('user_id')
                ->selectRaw('SUM(sum) as sum, user_id as user_id')
                ->get(),
        ]);
    }

    public function create()
    {
        return view('dashboard.create');
    }
}
