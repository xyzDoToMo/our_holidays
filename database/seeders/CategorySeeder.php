<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    public function run()
    {
        $categories = [
            ['name' => 'Tech', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Health', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Sports', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Education', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Entertainment', 'created_at' => now(), 'updated_at' => now()],
        ];

        DB::table('categories')->insert($categories);
    }
}
