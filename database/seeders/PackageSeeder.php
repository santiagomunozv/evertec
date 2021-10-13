<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PackageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('package')->insert([
            'id' => 1,
            'order' => '1',
            'name' => 'Maestros',
        ]);

        DB::table('package')->insert([
            'id' => 2,
            'order' => '2',
            'name' => 'Transacciones',
        ]);

        DB::table('package')->insert([
            'id' => 3,
            'order' => '3',
            'name' => 'Seguridad',
        ]);
    }
}
