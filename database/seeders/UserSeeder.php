<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'id' => 1,
            'login' => 'admin',
            'password' => bcrypt('admin123'),
            'active' => 1,
            'role_id' => '1',
        ]);
    }
}
