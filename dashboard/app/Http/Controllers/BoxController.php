<?php

namespace App\Http\Controllers;

use App\Models\Box;
use App\Models\Node;
use Illuminate\Encryption\Encrypter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

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

    public function show(Box $box)
    {
        return view('pages.app.boxes.show', [
            'box' => $box
        ]);
    }

    public function showDecryptBox(Box $box, Request $request)
    {
        $request->validate([
            'key' => 'required|string|min:32|max:32'
        ]);

        try {
            $encrypter = new Encrypter($request->key, 'aes-256-cbc');
            $decrypted = $encrypter->decryptString($box->data);

            return back()
                ->withInput($request->input())
                ->with('decrypted', $decrypted)
                ->with('success', __('app.boxes.decrypt.success'));
        } catch (\Exception $e) {
            return back()
                ->withInput($request->input())
                ->with('error', __('app.boxes.decrypt.error'));
        }
    }

    public function create()
    {
        return view('pages.app.boxes.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'key' => 'required|string|min:32|max:32',
            'data' => 'required'
        ]);

        try {
            $encrypter = new Encrypter($request->key, 'aes-256-cbc');
            $encrypted = $encrypter->encryptString($request->data);
            $uuid = Str::uuid();

            // store to main database
            $user = auth()->user();
            $user->boxes()->create([
                'uuid' => $uuid,
                'data' => $encrypted
            ]);

            $blocks = $user->blocks;
            foreach ($blocks as $block) {
                $data = json_decode($block->data);
                $node = Node::where('id', $data->node)->first();
                $con = mysqli_connect(
                    $node->host,
                    $node->username,
                    $node->password,
                    $data->database
                );

                mysqli_query($con, "INSERT INTO boxes(uuid, user_id, data) VALUES('{$uuid}', {$user->id}, '{$encrypted}')");
            }

            return back()
                ->withInput($request->input())
                ->with('encrypted', $encrypted)
                ->with('success', __('app.boxes.encrypt.success'));
        } catch (\Exception $e) {
            return back()
                ->withInput($request->input())
                ->with('error', __('app.boxes.encrypt.error'));
        }
    }
}