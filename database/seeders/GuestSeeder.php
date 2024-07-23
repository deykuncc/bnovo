<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GuestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')
            ->insert([
                [
                    'name' => 'pidoras',
                    'email' => 'pidoras@gmail.com',
                    'password' => bcrypt('pidoras'),
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'name' => 'loh',
                    'email' => 'loh@gmail.com',
                    'password' => bcrypt('pidoras'),
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'name' => 'top',
                    'email' => 'top@gmail.com',
                    'password' => bcrypt('ne_pidoras'),
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
            ]);
    }
}
