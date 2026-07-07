<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ResourceController extends Controller
{
    public function index()
    {
        $resources = \App\Models\Resource::all();
        return view('resources.index', compact('resources'));
    }
}
