<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 1️⃣ Faker bilen 10 sany awtomatik user döretmek
        User::factory()->count(10)->create();

        // 2️⃣ Öz bellik user (admin) döretmek
        User::create([
            'name' => 'Abdyrahman',                  // Ady
            'username' => 'Abdyrahman94',                   // Login ady
            'email' => 'abdyrahmanrejepow78@gmail.com',          // Email
            'password' => bcrypt('Abdy_525215'), // Parol (hash edilen)
        ]);
    }
}
