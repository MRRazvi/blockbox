<?php

namespace App\Http\Controllers;

use App\Models\Block;
use App\Models\Box;
use App\Models\Node;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        return view('pages.app.dashboard', [
            'total_blocks' => Block::count(),
            'total_boxes' => Box::count(),
            'total_users' => User::count(),
            'total_nodes' => Node::count(),
        ]);
    }
}
