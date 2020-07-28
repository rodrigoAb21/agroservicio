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
            'nombre' => 'Kg',
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
        DB::table('tipoFitosanitario')->insert([
            'nombre' => 'Herbicida',
        ]);
        DB::table('tipoFitosanitario')->insert([
            'nombre' => 'Insecticida',
        ]);
        DB::table('tipoFitosanitario')->insert([
            'nombre' => 'Acaricida',
        ]);
        DB::table('tipoFitosanitario')->insert([
            'nombre' => 'Bactericida',
        ]);
        DB::table('tipoFitosanitario')->insert([
            'nombre' => 'Fungicida',
        ]);


        // Proveedor

        factory(\App\Proveedor::class,30)->create();



    }
}
