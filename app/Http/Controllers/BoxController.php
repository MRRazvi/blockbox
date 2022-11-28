<?php

namespace App\Http\Controllers;

use App\Models\Box;
use Illuminate\Encryption\Encrypter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BoxController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        if ($user->role == 'admin') {
            $boxes = Box::all();
        } else {
            $boxes = $user->boxes()->all();
        }

        return view('pages.app.boxes.index', [
            'boxes' => $boxes
        ]);
    }

    public function create()
    {
        return view('pages.app.boxes.create');
    }

    public function store(Request $request)
    {

    }

    public function show(Box $box)
    {
        return view('pages.app.boxes.show', [
            'box' => $box
        ]);
    }

    public function decrypt(Box $box, Request $request)
    {
        $request->validate([
            'key' => 'required|string|min:32|max:32'
        ]);

        try {
            $encrypter = new Encrypter($request->key, 'aes-256-cbc');
            $decrypted = $encrypter->decryptString(json_decode($box->data));

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
