<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);


        // $this->call([
        //     UserSeeder::class,       // 👤 Userler (login üçin)
        //     CategorySeeder::class,   // 📦 Kategoriýalar (fix: Içgiler, Snack, Miweler)
        //     CountrySeeder::class,    // 🌍 Ýurtlar (fix: Türkmenistan, Türkiye, ABŞ...)
        //     ProductSeeder::class,    // 🏷️ Önümler (fix: Pepsi, Coca Cola, Lays...)
        // ]);
    }
}
