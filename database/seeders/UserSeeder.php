<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Abdyrahman',
            'username' => 'Abdyrahman94',
            'email' => 'abdyrahmanrejepow78@gmail.com',
            'password' => bcrypt('mmmmmmmm'),
        ]);

        Admin::Create([
                'email' => 'admin@example.com',
                'name' => 'Admin',
                'username' => 'admin',
                'password' => Hash::make('password'),
            ]
        );
    }
}
