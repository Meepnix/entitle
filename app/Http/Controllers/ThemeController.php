<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Theme;

class ThemeController extends Controller
{
    public function show()
    {
        $themes = Theme::all();
        return view('themes.show', compact('themes'));
    }
}
