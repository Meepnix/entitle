<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Theme;


class ThemeController extends Controller
{
    public function show(Request $request)
    {

        $themes = Theme::whereHas('triggers', function ($query) use ($request) {
            $query->where('id', $request->triggers);
        })->get();

        return view('themes.show', compact('themes'));
    }
}
