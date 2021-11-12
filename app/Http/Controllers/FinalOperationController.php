<?php

namespace App\Http\Controllers;

use App\Models\Cashflow;
use App\Models\Expenditure;
use App\Models\Income;
use App\Models\Operation;
use App\Models\User;
use Illuminate\Http\Request;

class FinalOperationController extends Controller
{

    //получаем все доходы
    public function showIncomes() {
        return view('operations.income.show', [
            'incomes' => Cashflow::query()
//                ->where('user_id', '=', $userId)
                ->paginate(10)
        ]);
    }

    //получаем все расходы
    public function showExpenditures() {
        return view('operations.expenditure.show', [
            'expenditures' => Cashflow::query()
//                ->where('user_id', '=', $userId)
                ->paginate(10)
        ]);
    }



//    //получаем все доходы
//    public function showIncomes($userId) {
//        return view('operations.income.show', [
//            'incomes' => Income::query()
//                ->where('user_id', '=', $userId)
//                ->get()
//        ]);
//    }
//
//    //получаем все расходы
//    public function showExpenditures($userId) {
//        return view('operations.expenditure.show', [
//            'expenditures' => Expenditure::query()
//                ->where('user_id', '=', $userId)
//                ->get()
//        ]);
//    }
}



















//public function updateOrCreateCurrency(array $arrayOfQueryCurrency, string $data): void
//{
//    foreach ($arrayOfQueryCurrency as $key => $value) {
//        Currency::updateOrCreate(
//            [
//                'name' => $key
//            ],
//            [
//                'value' => $value,
//                'cb_update_at' => $data
//            ]);
//    }
//}
