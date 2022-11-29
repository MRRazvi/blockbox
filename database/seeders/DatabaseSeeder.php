<?php

namespace Database\Seeders;

use App\Models\Block;
use App\Models\BlockMeta;
use App\Models\Box;
use App\Models\BoxMeta;
use App\Models\Node;
use App\Models\User;
use App\Models\UserMeta;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $admins = [
            [
                'uuid' => fake()->uuid(),
                'name' => 'Mubashir Rasool Razvi',
                'username' => 'mubashir',
                'email' => 'sp19-bse-006@cuilahore.edu.pk',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
                'status' => 'active',
                'role' => 'admin',
                'email_verified_at' => now(),
                'remember_token' => Str::random(10)
            ],
            [
                'uuid' => fake()->uuid(),
                'name' => 'Saad Shafiq',
                'username' => 'saad',
                'email' => 'sp19-bse-120@cuilahore.edu.pk',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
                'status' => 'active',
                'role' => 'admin',
                'email_verified_at' => now(),
                'remember_token' => Str::random(10)
            ],
            [
                'uuid' => fake()->uuid(),
                'name' => 'Hassan Abbas',
                'username' => 'hassan',
                'email' => 'sp19-bse-003@cuilahore.edu.pk',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
                'status' => 'active',
                'role' => 'admin',
                'email_verified_at' => now(),
                'remember_token' => Str::random(10)
            ]
        ];

        foreach ($admins as $admin) {
            User::factory()
                ->create($admin);
        }

        $nodes = [
            [
                'connection' => 'mysql',
                'host' => '127.0.0.1',
                'port' => '3306',
                'username' => 'root',
                'password' => ''
            ],
            [
                'connection' => 'mysql',
                'host' => '127.0.0.1',
                'port' => '3306',
                'username' => 'root',
                'password' => ''
            ],
            [
                'connection' => 'mysql',
                'host' => '127.0.0.1',
                'port' => '3306',
                'username' => 'root',
                'password' => ''
            ]
        ];

        foreach ($nodes as $node) {
            Node::create($node);
        }
    }
}
