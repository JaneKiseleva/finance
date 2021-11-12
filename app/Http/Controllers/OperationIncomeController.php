<?php

namespace App\Http\Controllers;

use App\Models\Operation;
use Illuminate\Http\Request;

class OperationIncomeController extends Controller
{
    public function index()
    {
        return view('operations.income.index', [
            'operations' => Operation::query()
                ->where("type", "=", 'income')
                ->get()

        ]);
    }

    public function create()
    {
        return view('operations.income.create');
    }

    public function store()
    {
        $operation = new Operation();
        $operation->user_id = request()->user()->id;
        $operation->name = request('name');
        $operation->type = 'income';
        $operation->period = request('period');
        $operation->sum = request('sum');
        $operation->description = request('description');

        $operation->save();

        return redirect('/operations/income')->with('success', 'Income Create!');
    }

    public function edit(Operation $operation) {
        return view('operations.income.edit', [
            'operation' => $operation
        ]);
    }

    public function update(Operation $operation)
    {
        $operation->name = request('name');
        $operation->period = request('period');
        $operation->sum = request('sum');
        $operation->description = request('description');

        $operation->save();

        return redirect('/operations/income')->with('success', 'Income Update!');
    }

    public function destroy(Operation $operation) {
        $operation->delete();
        return back()->with('success', 'Income Deleted!');
    }

}
