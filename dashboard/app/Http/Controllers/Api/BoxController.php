<?php

namespace App\Http\Controllers\Api;

use App\Models\Box;
use App\Http\Requests\BoxRequest;
use App\Http\Resources\BoxResource;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Encryption\Encrypter;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Str;

class BoxController extends Controller
{
    public function index() {
        return BoxResource::collection(Box::paginate(10));
    }

    public function show($uuid) {
        $box = Box::where('uuid', $uuid)->first();

        return new BoxResource($box);
    }

    public function store(BoxRequest $request) {
        $encrypter = new Encrypter($request->key, 'aes-256-cbc');
        $encrypted = $encrypter->encryptString(json_encode($request->data));

        $box = Auth::user()->boxes()->create([
            'uuid' => Str::uuid(),
            'data' => $encrypted
        ]);

        return new BoxResource($box);
    }

    public function update() {}

    public function destroy() {}


}
