<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Encryption\Encrypter;
use Illuminate\Support\Facades\Http;

class BoxController extends Controller
{
    public function index()
    {
        $boxes = Http::withHeaders([
            'x-key' => 'blockbox'
        ])->get(sprintf('%s/boxes', env('API_PATH')))->json();

        return view('pages.app.boxes.index', [
            'boxes' => $boxes
        ]);
    }

    public function show(Request $request)
    {
        $box = Http::withHeaders([
            'x-key' => 'blockbox'
        ])->get(sprintf('%s/boxes/%s', env('API_PATH'), $request->box))->json();

        return view('pages.app.boxes.show', [
            'box' => $box
        ]);
    }

    public function create()
    {
        return view('pages.app.boxes.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'data' => 'required',
            'metadata' => 'required'
        ]);

        $box = Http::withHeaders([
            'x-key' => 'blockbox'
        ])->post(sprintf('%s/boxes', env('API_PATH')), [
            'data' => $request->data,
            'metadata' => $request->metadata
        ])->json();

        dd($box);
    }
}
