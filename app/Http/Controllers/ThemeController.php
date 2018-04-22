<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Theme;
use App\Save;
use auth;



class ThemeController extends Controller
{
    public function show(Request $request)
    {
        $user = Auth::user();
        $save = new Save();

        $user->saves()->save($save);

        $themes = Theme::whereHas('triggers', function ($query) use ($request) {
            $query->whereIn('id', $request->triggers);
        })->get();

        $save->themes()->attach($themes->id);

        return view('themes.show', compact('themes'));
    }
}
