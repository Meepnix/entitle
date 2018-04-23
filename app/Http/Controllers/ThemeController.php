<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Theme;
use App\Snap;
use auth;



class ThemeController extends Controller
{
    public function show(Request $request)
    {
        $user = Auth::user();
        $snap = new Snap();

        $user->snaps()->save($snap);

        $themes = Theme::whereHas('triggers', function ($query) use ($request) {
            $query->whereIn('id', $request->triggers);
        })->get();

        $snap->themes()->attach($themes->pluck('id')->all());

        return view('themes.show', compact('themes'));
    }
}
