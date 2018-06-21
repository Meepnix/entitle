<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminImagesController extends Controller
{
    public function create()
    {
        return view('adminImages.create');

    }

    public function store(Request $request)
    {
        if ($request->hasFile('image')) {
            $request->image->store('img', 'public');

            return redirect()->route('admin.images.create')->with('flash_message', 'Image uploaded');

        }

        return redirect()->route('admin.images.create')->with('flash_message', 'Error');

    }

    public function show()
    {
        $images = Storage::disk('public')->files('img');
        return view('adminImages.show', compact('images'));
    }

    public function destroy(Request $request)
    {
        Storage::disk('public')->delete($request->image);

        return back();

    }
}
