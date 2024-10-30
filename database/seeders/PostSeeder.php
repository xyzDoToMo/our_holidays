<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use DateTime;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('reviews')->insert([
            'user_id'=> '1',
            'category_id'=> '1',
            'title' => 'SportsDay',
            'body' => 'In TokyoDome watching MLB Game',
            'event_title' => 'MLB game tour',
            'event_body' => 'Admission fee is free',
            'event_time' => new DateTime('2024-12-09 00:00:00'),
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ]);
    
    }
}
