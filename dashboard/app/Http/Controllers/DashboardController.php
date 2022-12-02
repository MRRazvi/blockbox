<?php

namespace App\Http\Controllers;

use App\Models\Box;
use App\Models\User;
use Illuminate\Support\Facades\Http;

class DashboardController extends Controller
{
    public function index()
    {
        $boxes = Http::withHeaders([
            'x-key' => 'blockbox'
        ])->get(sprintf('%s/boxes', env('API_PATH')))->json();

        return view('pages.app.dashboard', [
            'total_boxes' => count($boxes),
            'total_users' => User::count(),
        ]);
    }
}
