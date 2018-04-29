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

    }

    public function create(Snap $snap, Option $option)
    {
        return view('options.create', compact('snap', 'option'));

    }
}
