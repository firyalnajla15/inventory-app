<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    public function run(): void
    {
        // Seeder user admin & user
        $this->call(UserSeeder::class);

        // Seeder kategori
        $this->call(CategorySeeder::class);

        // Tambahkan 50 produk acuan
        \App\Models\Product::factory(50)->create();
    }
}