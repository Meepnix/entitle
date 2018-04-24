<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Theme;
use App\Snap;
use auth;

class SnapController extends Controller
{
  public function store(Request $request)
  {
      $user = Auth::user();
      $snap = new Snap();

      $user->snaps()->save($snap);

      $themes = Theme::whereHas('triggers', function ($query) use ($request) {
          $query->whereIn('id', $request->triggers);
      })->get();

      $snap->themes()->attach($themes->pluck('id')->all());

      return redirect()->route('profile', [$snap]);
  }
}
