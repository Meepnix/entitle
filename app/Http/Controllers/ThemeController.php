<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Theme;
use App\Snap;
use auth;



class ThemeController extends Controller
{
    public function show(Snap $snap)
    {
      $themes = $snap->themes()->get();

      return view('themes.show', compact('themes'));
    }
}
