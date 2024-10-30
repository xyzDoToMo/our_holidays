<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // 一括でシーダーを実行する
        $this->call([
            UserSeeder::class,
            CategorySeeder::class,
            PostSeeder::class,
        ]);
    }
}