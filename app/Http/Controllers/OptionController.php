<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Theme;

class OptionController extends Controller
{
    public function show(Theme $theme)
    {
        return view('options.show', compact('theme'));
    }
}
