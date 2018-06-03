<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use App\Option;
use App\Link;
use App\User;

class AdminLinksController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create(Option $option)
    {

        if (Gate::denies('admin-access', User::class)) {
            return 'Access denied';
        }

        return view('adminLinks.create', compact('option'));
    }

    public function edit(Option $option, Link $link)
    {
        if (Gate::denies('admin-access', User::class)) {
            return 'Access denied';
        }

        return view('adminLinks.edit', compact('link', 'option'));

    }

    public function store(Request $request, Option $option)
    {
        if (Gate::denies('admin-access', User::class)) {
            return 'Access denied';
        }
        
        $new = new Link();
        $new = $option->addLink($request);
        return redirect()->route('admin.options.edit', [$option])->with('flash_message', 'Link created');

    }

    public function update(Request $request, Link $link)
    {
        if (Gate::denies('admin-access', User::class)) {
            return 'Access denied';
        }

        $link->update($request->all());
        return redirect()->route('admin.options.edit', [$link->options->id])->with('flash_message', 'Link updated');

    }

    public function destroy(Request $request, Link $link)
    {
        if (Gate::denies('admin-access', User::class)) {
            return 'Access denied';
        }

        $link->delete();

        session()->flash('flash_message', 'Link deleted');

        return back();

    }
}
