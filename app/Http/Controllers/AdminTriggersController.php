<?php

namespace App\Http\Controllers;

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
        $triggers = Trigger::all();
        return view('adminTriggers.show', compact('triggers'));
    }

    public function create()
    {
        return view('adminTriggers.create');
    }

    public function store(Request $request)
    {
        $new = new Trigger();

        $new->addTrigger($request);

        return redirect()->route('admin.triggers.show')->with('flash_message', 'Trigger created');
    }
}
