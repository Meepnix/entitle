<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Theme;
use App\Snap;

class OptionController extends Controller
{
    public function show(Snap $snap, Theme $theme)
    {
        return view('options.show', compact('theme'));
    }

    public function store(Request $request)
    {
        
    }
}
