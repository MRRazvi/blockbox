<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ToolsController extends Controller
{
    public function keyGenerate()
    {
        $keys = [];
        for ($i=0; $i<9; $i++)
            $keys[] = Str::random(32);

        return view('pages.app.tools.key_generate', [
            'keys' => $keys
        ]);
    }

    public function keyVerifyIndex()
    {
        return view('pages.app.tools.key_verify');
    }

    public function keyVerify()
    {

    }
}
