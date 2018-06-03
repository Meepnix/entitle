<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Gate;
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
        if (Gate::denies('admin-access', User::class)) {
            return 'Access denied';
        }

        return view('adminOptions.create', compact('theme'));
    }

    public function store(Request $request, Theme $theme)
    {
        if (Gate::denies('admin-access', User::class)) {
            return 'Access denied';
        }

        $request->validate([
            'title' => 'required|max:191',
            'advice' => 'max:191',
            'aic' => 'max:191',
            'advice' => 'max:65535',
            'outcome' => 'max:191',
        ]);

        $theme->addOption($request);
        return redirect()->route('admin.themes.show')->with('flash_message', 'New option created');
    }

    public function edit(Option $option)
    {
        if (Gate::denies('admin-access', User::class)) {
            return 'Access denied';
        }

        return view('adminOptions.edit', compact('option'));
    }

    public function update(Request $request, Option $option)
    {
        if (Gate::denies('admin-access', User::class)) {
            return 'Access denied';
        }

        $request->validate([
            'title' => 'required|max:191',
            'advice' => 'max:191',
            'aic' => 'max:191',
            'advice' => 'max:65535',
            'outcome' => 'max:191',
        ]);

        $option->update($request->all());
        return redirect()->route('admin.themes.show')->with('flash_message', 'Option updated');

    }

    public function destroy(Request $request, Option $option)
    {
        if (Gate::denies('admin-access', User::class)) {
            return 'Access denied';
        }

        $option->delete();
        session()->flash('flash_message', 'Option deleted');
        return back();

    }
}
