<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index()
    {
        return view('pages.app.profile.index');
    }

    public function createToken(Request $request)
    {
        $token = $request->user()->createToken($request->token_name);
        return $token->plainTextToken;

        return view('pages.app.profile.index');
    }
}
