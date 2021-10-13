<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OptionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('option')->insert([
            'id' => 1,
            'name' => 'Producto',
            'route' => '/general/producto',
            'module_id' => 1,
        ]);

        DB::table('option')->insert([
            'id' => 2,
            'name' => 'Realizar pedido',
            'route' => '/transacciones/pedido',
            'module_id' => 2,
        ]);

        DB::table('option')->insert([
            'id' => 3,
            'name' => 'Consultar órdenes',
            'route' => '/transacciones/consultarordenes',
            'module_id' => 3,
        ]);

        DB::table('option')->insert([
            'id' => 4,
            'name' => 'Órdenes',
            'route' => '/transacciones/ordenes',
            'module_id' => 3,
        ]);

        DB::table('option')->insert([
            'id' => 5,
            'name' => 'Rol',
            'route' => '/seguridad/rol',
            'module_id' => 4,
        ]);
        
        DB::table('option')->insert([
            'id' => 6,
            'name' => 'Usuarios',
            'route' => '/seguridad/usuarios',
            'module_id' => 4,
        ]);

        DB::table('option')->insert([
            'id' => 7,
            'name' => 'Paquete',
            'route' => '/seguridad/paquete',
            'module_id' => 4,
        ]);

        DB::table('option')->insert([
            'id' => 8,
            'name' => 'Módulo',
            'route' => '/seguridad/modulo',
            'module_id' => 4,
        ]);

        DB::table('option')->insert([
            'id' => 9,
            'name' => 'Opción',
            'route' => '/seguridad/opcion',
            'module_id' => 4,
        ]);
    }
}
