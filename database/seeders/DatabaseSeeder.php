<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        
        /********************************************************
         *               Unidades de Medida
         ********************************************************/

         DB::table('unidad_medida')->insert([
            'nombre' => 'kg',
        ]);
        DB::table('unidad_medida')->insert([
            'nombre' => 'g',
        ]);
        DB::table('unidad_medida')->insert([
            'nombre' => 'mg',
        ]);
        DB::table('unidad_medida')->insert([
            'nombre' => 'L',
        ]);
        DB::table('unidad_medida')->insert([
            'nombre' => 'mL',
        ]);


        /********************************************************
         *               Subtipos - Agroquimico
         ********************************************************/

        DB::table('subtipo')->insert([
            'nombre' => 'HERBICIDA',
            'tipo' => 'Agroquimico',
        ]);
        DB::table('subtipo')->insert([
            'nombre' => 'INSECTICIDA',
            'tipo' => 'Agroquimico',
        ]);

        DB::table('subtipo')->insert([
            'nombre' => 'FUNGICIDA',
            'tipo' => 'Agroquimico',
        ]);
        DB::table('subtipo')->insert([
            'nombre' => 'FERTILIZANTE',
            'tipo' => 'Agroquimico',
        ]);



        /********************************************************
         *               Subtipos - Semilla
         ********************************************************/

        DB::table('subtipo')->insert([
            'nombre' => 'MAIZ',
            'tipo' => 'Semilla',
        ]);
        DB::table('subtipo')->insert([
            'nombre' => 'SOYA',
            'tipo' => 'Semilla',
        ]);
        DB::table('subtipo')->insert([
            'nombre' => 'GIRASOL',
            'tipo' => 'Semilla',
        ]);

        DB::table('subtipo')->insert([
            'nombre' => 'SORGO',
            'tipo' => 'Semilla',
        ]);

        DB::table('subtipo')->insert([
            'nombre' => 'ARROZ',
            'tipo' => 'Semilla',
        ]);

    }
}
