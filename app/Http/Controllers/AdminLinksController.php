<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Option;
use App\Link;

class AdminLinksController extends Controller
{
    public function create(Option $option)
    {
        return view('adminLinks.create', compact('option'));
    }

    public function edit(Option $option, Link $link)
    {

        return view('adminLinks.edit', compact('link', 'option'));

    }

    public function store(Request $request, Option $option)
    {
        $new = new Link();
        $new = $option->addLink($request);
        return redirect()->route('admin.options.edit', [$option])->with('flash_message', 'Link created');

    }

    public function update(Request $request, Link $link)
    {
        $link->update($request->all());
        return redirect()->route('admin.options.edit', [$link->options->id])->with('flash_message', 'Link updated');

    }
}
