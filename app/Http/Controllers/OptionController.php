<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Theme;
use App\Snap;
use App\Option;


class OptionController extends Controller
{
    public function show(Snap $snap, Theme $theme)
    {
        $snoption = $snap->options;
        return view('options.show', compact('theme', 'snoption', 'snap'));
    }

    public function store(Request $request, Snap $snap, Option $option)
    {
        $snap->options()->attach($option->id, ["worker" => $request->input('worker'),
        "client" => $request->input('client')]);

        $theme = $option->themes;

        return redirect()->route('options.show', [$snap, $theme ])
        ->with('flash_message', 'Option Saved');

    }

    public function edit(Snap $snap, Option $option)
    {
        $pvoption = $snap->options()->find($option->id);
        return view('options.edit', compact('snap', 'option', 'pvoption'));
    }

    public function update(Request $request, Snap $snap, Option $option)
    {

        $snap->options()->updateExistingPivot($option->id,
        ["worker" => $request->input('worker'), "client" => $request->input('client')]);

        $theme = $option->themes;

        return redirect()->route('options.show', [$snap, $theme ])
        ->with('flash_message', 'Option Saved');
    }

    public function create(Snap $snap, Option $option)
    {
        return view('options.create', compact('snap', 'option'));

    }


}
