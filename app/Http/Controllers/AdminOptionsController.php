<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Theme;
use App\Option;

class AdminOptionsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create(Theme $theme)
    {
        return view('adminOptions.create', compact('theme'));
    }

    public function store(Request $request, Theme $theme)
    {
        $theme->addOption($request);
        return redirect()->route('admin.themes.show')->with('flash_message', 'New option created');
    }

    public function edit(Option $option)
    {
        return view('adminOptions.edit', compact('option'));
    }

    public function update(Request $request, Option $option)
    {
        $option->update($request->all());
        return redirect()->route('admin.themes.show')->with('flash_message', 'Option updated');

    }

    public function destroy(Request $request, Option $option)
    {
        $option->delete();

        session()->flash('flash_message', 'Option deleted');

        return back();

    }
}
