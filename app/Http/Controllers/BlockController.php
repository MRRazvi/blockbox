<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BlockController extends Controller
{
    public function index()
    {
        return view('pages.app.blocks.index');
    }

    public function integrity()
    {
        return view('pages.app.blocks.integrity');
    }

    public function key()
    {
        return view('pages.app.blocks.key');
    }
}
