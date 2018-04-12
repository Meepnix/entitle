<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Theme;
use App\Trigger;

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
        $triggersCRF = Trigger::where('type', 'CRF')->pluck('trigger', 'id');
        $triggersYRBC = Trigger::where('type', 'YRBC')->pluck('trigger', 'id');
        return view('adminThemes.create', compact('triggersCRF', 'triggersYRBC'));
    }

    public function store(Request $request)
    {
        $new = new Theme();

        $theme = $new->addTheme($request);

        $theme->triggers()->attach($request->input('triggers'));

        return redirect()->route('admin.themes.show')->with('flash_message', 'Theme created');
    }

}
