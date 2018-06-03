<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use App\Trigger;

class AdminTriggersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function show()
    {
        if (Gate::denies('admin-access', User::class)) {
            return 'Access denied';
        }

        $triggers = Trigger::all();
        return view('adminTriggers.show', compact('triggers'));
    }

    public function create()
    {
        if (Gate::denies('admin-access', User::class)) {
            return 'Access denied';
        }

        return view('adminTriggers.create');
    }

    public function store(Request $request)
    {
        if (Gate::denies('admin-access', User::class)) {
            return 'Access denied';
        }

        $new = new Trigger();

        $new->addTrigger($request);

        return redirect()->route('admin.triggers.show')->with('flash_message', 'Trigger created');
    }

    public function edit(Trigger $trigger)
    {
        if (Gate::denies('admin-access', User::class)) {
            return 'Access denied';
        }

        return view('adminTriggers.edit', compact('trigger'));

    }

    public function update(Request $request, Trigger $trigger)
    {
        if (Gate::denies('admin-access', User::class)) {
            return 'Access denied';
        }
        
        $trigger->update($request->all());

        return redirect()->route('admin.triggers.show')->with('flash message', 'Filter updated');

    }
}
