<?php

namespace Database\Seeders;

use App\DataKeeper\UserRoleKeeper;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\{DB, Hash};

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $query = [];
        $now = now();
        $roles = UserRoleKeeper::list();

        for ($i = 1; $i <= 4; $i++) {
            $query[] = [
                'name' => "user $i",
                'email' => "email_user_$i@mail.ru",
                'password' => Hash::make('qwerty'),
                'role' => $roles[$i - 1],
                'created_at' => $now,
                'updated_at' => $now,
            ];
        }

        DB::table('users')->upsert($query, 'id');
    }
}
