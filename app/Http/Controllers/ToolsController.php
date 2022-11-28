<?php

namespace App\Http\Controllers;

use Illuminate\Encryption\Encrypter;
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

    public function keyVerify(Request $request)
    {
        $request->validate([
            'key' => 'required|string|min:32|max:32',
            'encryption' => 'required|string'
        ]);

        try {
            $encrypter = new Encrypter($request->key, 'aes-256-cbc');
            $decrypted = $encrypter->decryptString(json_decode($request->encryption));

            return back()
                ->withInput($request->input())
                ->with('data', $decrypted)
                ->with('success', __('app.boxes.decrypt.success'));
        } catch (\Exception $e) {
            return back()
                ->withInput($request->input())
                ->with('error', __('app.boxes.decrypt.error'));
        }
    }
}
