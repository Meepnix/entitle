<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Trigger;

class StepdController extends Controller
{
    public function show()
    {
        $triggersCRF = Trigger::where('type', 'CRF')->get();
        $triggersYRBC = Trigger::where('type', 'YRBC')->get();

        return view('userStepD.show', compact('triggersCRF', 'triggersYRBC'));

    }
}
