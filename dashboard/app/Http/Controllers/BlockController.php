<?php

namespace App\Http\Controllers;

use App\Models\Block;
use App\Models\Node;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BlockController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        if ($user->role == 'admin') {
            $blocks = Block::all();
        } else {
            $blocks = $user->blocks;
        }

        return view('pages.app.blocks.index', [
            'blocks' => $blocks
        ]);
    }

    public function create()
    {
        $users = User::all('username')->pluck('username')->toArray();

        return view('pages.app.blocks.create', [
            'users' => $users
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'user' => 'required|string',
            'number' => 'required|integer|min:2',
        ]);

        try {
            $user = User::where('username', $request->user)->first();

            for($i=0; $i<$request->number; $i++) {
                while (true) {
                    $node = Node::all()->random();

                    $con = mysqli_connect(
                        hostname: $node->host,
                        username: $node->username,
                        password: $node->password,
                        port: $node->port
                    );

                    if (!$con) throw new \Exception($con->error);

                    $database = sprintf("blockbox_%s_%s_%s", $user->id, time(), fake()->numberBetween(000, 999));

                    if (mysqli_query($con, "CREATE DATABASE " . $database)) {
                        $con = mysqli_connect(
                            hostname: $node->host,
                            username: $node->username,
                            password: $node->password,
                            database: $database,
                            port: $node->port
                        );

                        if (!$con) throw new \Exception($con->error);

                        $query = "CREATE TABLE `boxes` (
                          `id` bigint unsigned NOT NULL AUTO_INCREMENT,
                          `uuid` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
                          `user_id` int unsigned NOT NULL,
                          `data` text COLLATE utf8mb4_unicode_ci NOT NULL,
                          `deleted_at` timestamp NULL DEFAULT NULL,
                          `created_at` timestamp NULL DEFAULT NULL,
                          `updated_at` timestamp NULL DEFAULT NULL,
                          PRIMARY KEY (`id`),
                          UNIQUE KEY `boxes_uuid_unique` (`uuid`)
                        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;";

                        if (mysqli_query($con, $query)) {
                            $user->blocks()->create([
                                'uuid' => Str::uuid(),
                                'data' => json_encode([
                                    'node' => $node->id,
                                    'database' => $database
                                ])
                            ]);

                            break;
                        }
                    }
                }
            }
        } catch (\Exception $e) {
            return back()
                ->withInput($request->input())
                ->with('error', __('app.error'));
        }

        return back()
            ->with('success', __('app.blocks.create.success'));
    }

    public function integrityIndex()
    {
        $user = auth()->user();

        $users = [];

        if ($user->role == 'admin') {
            $users = User::all('username')->pluck('username');
        }

        return view('pages.app.blocks.integrity', [
            'users' => $users
        ]);
    }

    public function integrity(Request $request)
    {
        $results = [];

        $user = auth()->user();

        if ($user->role == 'admin') {
            $user = User::where('username', $request->user)->first();
        }

        $blocks = $user->blocks;
        $boxes = $user->boxes;

        foreach ($blocks as $block) {
            $data = json_decode($block->data);
            $node = Node::where('id', $data->node)->first();
            $con = mysqli_connect(
                $node->host,
                $node->username,
                $node->password,
                $data->database
            );

            $size = 0.00;
            $status = 'not-working';

            if ($con) {
                $query = "SELECT table_schema AS 'database', ROUND(SUM(data_length + index_length) / 1024 / 1024, 2) AS 'size' FROM information_schema.TABLES GROUP BY table_schema;";
                $run = mysqli_query($con, $query);
                while ($row = mysqli_fetch_assoc($run)) {
                    if ($row['database'] == $data->database) {
                        $size = $row['size'];
                        $status = 'working';
                        break;
                    }
                }
            }

            $results[] = [
                'node' => $node->id,
                'host' => $node->host,
                'database' => $data->database,
                'size' => $size,
                'status' => $status
            ];
        }

        return back()
            ->withInput()
            ->with('results', $results);
    }
}
