<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         $categories = [
            ['name' => 'Drinks', 'name_tm' => 'Içgiler', 'name_ru' => 'Напитки'],
            ['name' => 'Snacks', 'name_tm' => 'Çerezler', 'name_ru' => 'Закуски'],
            ['name' => 'Sweets', 'name_tm' => 'Suyjiler', 'name_ru' => 'Сладости'],
            ['name' => 'Fruits', 'name_tm' => 'Miweler', 'name_ru' => 'Фрукты'],
        ];

         foreach ($categories as $category) {
            Category::create([
                'name' => $category['name'],
                'name_tm' => $category['name_tm'],
                'name_ru' => $category['name_ru'],
                'slug' => Str::slug($category['name']),
            ]);
        }
    }
}
