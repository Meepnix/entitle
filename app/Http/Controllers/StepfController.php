<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StepfController extends Controller
{
    public function show(Snap $snap)
    {

        return view('userStepF.show', compact('snap'));

    }
}
