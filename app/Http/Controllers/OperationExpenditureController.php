<?php

namespace App\Http\Controllers;

use App\Models\Operation;
use Illuminate\Http\Request;

class OperationExpenditureController extends Controller
{
    public function index()
    {
        return view('operations.expenditure.index', [
            'operations' => Operation::query()
                ->where("type", "=", 'expenditure')
            ->get()
        ]);
    }

    public function create()
    {
        return view('operations.expenditure.create');
    }

    public function store()
    {
        $operation = new Operation();
        $operation->user_id = request()->user()->id;
        $operation->name = request('name');
        $operation->type = 'expenditure';
        $operation->period = request('period');
        $operation->sum = request('sum');
        $operation->description = request('description');

        $operation->save();

        return redirect('/operations/expenditure')->with('success', 'Expenditure Create!');
    }

    public function edit(Operation $operation) {
        return view('operations.expenditure.edit', [
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

        return redirect('/operations/expenditure')->with('success', 'Expenditure Update!');
    }

    public function destroy(Operation $operation) {
        $operation->delete();
        return back()->with('success', 'Expenditure Deleted!');
    }
}
