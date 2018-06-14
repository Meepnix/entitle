<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Snap;

class StepfController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function show(Snap $snap)
    {
        return view('userStepF.show', compact('snap'));
    }

    public function printAdviser(Snap $snap)
    {
        $options = $snap->adviserOptions;
        return view('userStepF.printA', compact('options'));
    }

    public function printClient(Snap $snap)
    {
        $options = $snap->clientOptions;
        return view('userStepF.printC', compact('options'));
    }



}
