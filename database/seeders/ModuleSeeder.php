<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ModuleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('module')->insert([
            'id' => 1,
            'name' => 'Generales',
            'package_id' => 1,
        ]);

        DB::table('module')->insert([
            'id' => 2,
            'name' => 'Pedido',
            'package_id' => 2,
        ]);

        DB::table('module')->insert([
            'id' => 3,
            'name' => 'Órdenes',
            'package_id' => 2,
        ]);

        DB::table('module')->insert([
            'id' => 4,
            'name' => 'Menu',
            'package_id' => 3,
        ]);
    }
}
