<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Unidad de Medida
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


        // Tipo Fitosanitario
        DB::table('subtipo')->insert([
            'nombre' => 'HERBICIDA',
            'tipo' => 'Agroquimico',
        ]);
        DB::table('subtipo')->insert([
            'nombre' => 'INSECTICIDA',
            'tipo' => 'Agroquimico',
        ]);
        DB::table('subtipo')->insert([
            'nombre' => 'ACARICIDA',
            'tipo' => 'Agroquimico',
        ]);
        DB::table('subtipo')->insert([
            'nombre' => 'BACTERICIDA',
            'tipo' => 'Agroquimico',
        ]);
        DB::table('subtipo')->insert([
            'nombre' => 'FUNGICIDA',
            'tipo' => 'Agroquimico',
        ]);



        // Tipo Semilla
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
            'nombre' => 'CHIA',
            'tipo' => 'Semilla',
        ]);
        DB::table('subtipo')->insert([
            'nombre' => 'SESAMO',
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
