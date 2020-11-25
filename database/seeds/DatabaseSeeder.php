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
            'nombre' => 'Herbicida',
            'tipo' => 'TipoFitosanitario',
        ]);
        DB::table('subtipo')->insert([
            'nombre' => 'Insecticida',
            'tipo' => 'TipoFitosanitario',
        ]);
        DB::table('subtipo')->insert([
            'nombre' => 'Acaricida',
            'tipo' => 'TipoFitosanitario',
        ]);
        DB::table('subtipo')->insert([
            'nombre' => 'Bactericida',
            'tipo' => 'TipoFitosanitario',
        ]);
        DB::table('subtipo')->insert([
            'nombre' => 'Fungicida',
            'tipo' => 'TipoFitosanitario',
        ]);



        // Tipo Semilla
        DB::table('subtipo')->insert([
            'nombre' => 'Maíz',
            'tipo' => 'TipoSemilla',
        ]);
        DB::table('subtipo')->insert([
            'nombre' => 'Soya',
            'tipo' => 'TipoSemilla',
        ]);
        DB::table('subtipo')->insert([
            'nombre' => 'Girasol',
            'tipo' => 'TipoSemilla',
        ]);
        DB::table('subtipo')->insert([
            'nombre' => 'Chía',
            'tipo' => 'TipoSemilla',
        ]);
        DB::table('subtipo')->insert([
            'nombre' => 'Sésamo',
            'tipo' => 'TipoSemilla',
        ]);

        DB::table('subtipo')->insert([
            'nombre' => 'Sorgo',
            'tipo' => 'TipoSemilla',
        ]);

        DB::table('subtipo')->insert([
            'nombre' => 'Arroz',
            'tipo' => 'TipoSemilla',
        ]);



        // Proveedor

        factory(\App\Proveedor::class,30)->create();



    }
}
