<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $query = [];
        $now = now();

        for ($i = 1; $i <= 4; $i++) {
            $query[] = [
                'name' => "category $i",
                'created_at' => $now,
                'updated_at' => $now,
            ];
        }

        DB::table('categories')->upsert($query, 'id');
    }
}
