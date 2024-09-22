<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $query = [];
        $now = now();

        for ($i = 1; $i <= 12; $i++) {
            $query[] = [
                'name' => "product $i",
                'description' => "description product $i",
                'category_id' => random_int(1, 4),
                'price' => random_int(100, 1000),
                'created_at' => $now,
                'updated_at' => $now,
            ];
        }

        DB::table('products')->upsert($query, 'id');
    }
}
