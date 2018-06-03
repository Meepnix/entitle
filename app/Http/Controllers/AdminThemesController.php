<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Gate;
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
        if (Gate::denies('admin-access', User::class)) {
            return 'Access denied';
        }

        $themes = Theme::all();
        return view('adminThemes.show', compact('themes'));
    }

    public function create()
    {
        if (Gate::denies('admin-access', User::class)) {
            return 'Access denied';
        }

        $triggersCRF = Trigger::where('type', 'CRF')->pluck('trigger', 'id');
        $triggersYRBC = Trigger::where('type', 'YRBC')->pluck('trigger', 'id');
        return view('adminThemes.create', compact('triggersCRF', 'triggersYRBC'));
    }

    public function edit(Theme $theme)
    {
        if (Gate::denies('admin-access', User::class)) {
            return 'Access denied';
        }


        $triggersCRF = Trigger::where('type', 'CRF')->pluck('trigger', 'id');
        $triggersYRBC = Trigger::where('type', 'YRBC')->pluck('trigger', 'id');
        $resultsCRF = $theme->triggers->where('type', 'CRF')->pluck('id');
        $resultsYRBC = $theme->triggers->where('type', 'YRBC')->pluck('id');
        return view('adminThemes.edit', compact('theme', 'triggersCRF',
                    'triggersYRBC', 'resultsCRF', 'resultsYRBC'));

    }

    public function update(Request $request, Theme $theme)
    {
        if (Gate::denies('admin-access', User::class)) {
            return 'Access denied';
        }

        $request->validate([
            'title' => 'required|max:191',
            'img_link' => 'max:191',
            'scope' => 'max:65535',
        ]);

        $theme->update($request->all());
        $theme->triggers()->sync($request->input('triggers'));

        return redirect()->route('admin.themes.show')->with('flash message', 'Theme updated');

    }

    public function store(Request $request)
    {
        if (Gate::denies('admin-access', User::class)) {
            return 'Access denied';
        }

        $request->validate([
            'title' => 'required|max:191',
            'img_link' => 'max:191',
            'scope' => 'max:65535',
        ]);


        $new = new Theme();

        $theme = $new->addTheme($request);

        $theme->triggers()->attach($request->input('triggers'));

        return redirect()->route('admin.themes.show')->with('flash_message', 'Theme created');
    }

    public function destroy(Request $request, Theme $theme)
    {
        if (Gate::denies('admin-access', User::class)) {
            return 'Access denied';
        }

        $theme->delete();

        session()->flash('flash_message', 'Option deleted');

        return back();

    }

}
