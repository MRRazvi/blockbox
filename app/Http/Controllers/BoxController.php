<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BoxController extends Controller
{
    public function index()
    {
        return view('pages.app.boxes.index');
    }

    public function create()
    {
        return view('pages.app.boxes.create');
    }
}
