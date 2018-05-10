<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Option;
use App\Link;

class AdminLinksController extends Controller
{
    public function create(Option $option)
    {


    }

    public function edit(Request $request, Link $link)
    {

    }

    public function store(Request $request, Option $option)
    {
        $option->links->update($request->all());
        
    }
}
