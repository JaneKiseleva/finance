<?php

namespace App\Http\Controllers;

use App\Models\Target;
use Illuminate\Http\Request;

class TargetController extends Controller
{
    public function index()
    {
        return view('targets.index', [
            'targets' => Target::all()
        ]);
    }

    public function create()
    {
        return view('targets.create');
    }

    public function store()
    {
        $target = new Target();
        $target->user_id = request()->user()->id;
        $target->name = request('name');
        $target->target_current_cost = request('target_current_cost');
        $target->planned_date = request('planned_date');
        $target->description = request('description');

        $target->save();

        return redirect('target')->with('success', 'Target Create!');
    }

    public function edit(Target $target) {
        return view('targets.edit', [
            'target' => $target
        ]);
    }

    public function show() {
        return view('targets.show', [
            'targets' => Target::query()
                ->get()
        ]);
    }

    public function update(Target $target)
    {
        $target->name = request('name');
        $target->target_current_cost = request('target_current_cost');
        $target->planned_date = request('planned_date');
        $target->description = request('description');

        $target->save();

        return redirect('target')->with('success', 'Target Update!');
    }

    public function destroy(Target $target) {
        $target->delete();
        return back()->with('success', 'Target Deleted!');
    }
}

