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
            'tipo' => 'TipoFitosanitario',
        ]);
        DB::table('subtipo')->insert([
            'nombre' => 'INSECTICIDA',
            'tipo' => 'TipoFitosanitario',
        ]);
        DB::table('subtipo')->insert([
            'nombre' => 'ACARICIDA',
            'tipo' => 'TipoFitosanitario',
        ]);
        DB::table('subtipo')->insert([
            'nombre' => 'BACTERICIDA',
            'tipo' => 'TipoFitosanitario',
        ]);
        DB::table('subtipo')->insert([
            'nombre' => 'FUNGICIDA',
            'tipo' => 'TipoFitosanitario',
        ]);



        // Tipo Semilla
        DB::table('subtipo')->insert([
            'nombre' => 'MAIZ',
            'tipo' => 'TipoSemilla',
        ]);
        DB::table('subtipo')->insert([
            'nombre' => 'SOYA',
            'tipo' => 'TipoSemilla',
        ]);
        DB::table('subtipo')->insert([
            'nombre' => 'GIRASOL',
            'tipo' => 'TipoSemilla',
        ]);
        DB::table('subtipo')->insert([
            'nombre' => 'CHIA',
            'tipo' => 'TipoSemilla',
        ]);
        DB::table('subtipo')->insert([
            'nombre' => 'SESAMO',
            'tipo' => 'TipoSemilla',
        ]);

        DB::table('subtipo')->insert([
            'nombre' => 'SORGO',
            'tipo' => 'TipoSemilla',
        ]);

        DB::table('subtipo')->insert([
            'nombre' => 'ARROZ',
            'tipo' => 'TipoSemilla',
        ]);



        // Proveedor

        DB::table('proveedor')->insert([
            'contacto' => 'asd',
            'celular' => 'asd',
            'empresa' => 'asd',
            'tel_empresa' => 'asd',
        ]);




    }
}
