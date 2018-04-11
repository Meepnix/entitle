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
        return view('adminTrigger.show', compact('triggers'));
    }

    public function create()
    {
        return view('adminTrigger.create');
    }

    public function store(Request $request)
    {
        $new = new Trigger();

        $new->addTheme($request);

        return redirect()->route('admin.triggers.show')->with('flash_message', 'Trigger created');
    }
}
