<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleOptionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('role_option')->insert([
            'id' => 1,
            'create' => 0,
            'update' => 1,
            'delete' => 0,
            'read' => 0,
            'inactive' => 0,
            'role_id' => 1,
            'option_id' => 1,
        ]);

        DB::table('role_option')->insert([
            'id' => 2,
            'create' => 1,
            'update' => 1,
            'delete' => 1,
            'read' => 1,
            'inactive' => 1,
            'role_id' => 1,
            'option_id' => 2,
        ]);

        DB::table('role_option')->insert([
            'id' => 3,
            'create' => 1,
            'update' => 1,
            'delete' => 1,
            'read' => 1,
            'inactive' => 1,
            'role_id' => 1,
            'option_id' => 3,
        ]);

        DB::table('role_option')->insert([
            'id' => 4,
            'create' => 1,
            'update' => 1,
            'delete' => 1,
            'read' => 1,
            'inactive' => 1,
            'role_id' => 1,
            'option_id' => 4,
        ]);
        
        DB::table('role_option')->insert([
            'id' => 5,
            'create' => 1,
            'update' => 1,
            'delete' => 1,
            'read' => 1,
            'inactive' => 1,
            'role_id' => 1,
            'option_id' => 5,
        ]);

        DB::table('role_option')->insert([
            'id' => 6,
            'create' => 1,
            'update' => 1,
            'delete' => 1,
            'read' => 1,
            'inactive' => 1,
            'role_id' => 1,
            'option_id' => 6,
        ]);

        DB::table('role_option')->insert([
            'id' => 7,
            'create' => 1,
            'update' => 1,
            'delete' => 1,
            'read' => 1,
            'inactive' => 1,
            'role_id' => 1,
            'option_id' => 7,
        ]);

        DB::table('role_option')->insert([
            'id' => 8,
            'create' => 1,
            'update' => 1,
            'delete' => 1,
            'read' => 1,
            'inactive' => 1,
            'role_id' => 1,
            'option_id' => 8,
        ]);

        DB::table('role_option')->insert([
            'id' => 9,
            'create' => 1,
            'update' => 1,
            'delete' => 1,
            'read' => 1,
            'inactive' => 1,
            'role_id' => 1,
            'option_id' => 9,
        ]);
    }
}
