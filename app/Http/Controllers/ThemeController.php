<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Theme;
use App\Snap;
use auth;



class ThemeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function show(Snap $snap)
    {
      $themes = $snap->themes;

      return view('themes.show', compact('themes', 'snap'));
    }
}
