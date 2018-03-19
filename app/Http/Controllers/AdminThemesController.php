<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Theme;

class AdminThemesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function show()
    {
        $themes = Theme::all();
        return view('adminThemes.show', compact('themes'));
    }

    public function create()
    {
        return view('adminThemes.create');
    }

    public function store(Request $request)
    {
        $new = new Theme();

        $new->addTheme($request);

        return redirect()->route('admin.themes.show')->with('flash_message', 'Theme created');
    }

}
