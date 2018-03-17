<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Theme;

class AdminThemesController extends Controller
{
    public function show(Theme $theme)
    {
        return view('adminThemes\show', compact('theme'));
    }

    public function create()
    {
        return view('adminThemes\create');
    }

    public function store(Request $request)
    {
        $new = new Theme();

        $new->addTheme($request);

        return redirect()->route('adminThemes.show')->with('flash_message', 'Theme created');
    }

}
