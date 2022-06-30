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
            'nombre' => 'FUNGICIDA',
            'tipo' => 'Agroquimico',
        ]);
        DB::table('subtipo')->insert([
            'nombre' => 'FERTILIZANTE',
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
            'nombre' => 'SORGO',
            'tipo' => 'Semilla',
        ]);

        DB::table('subtipo')->insert([
            'nombre' => 'ARROZ',
            'tipo' => 'Semilla',
        ]);

        // Proveedores

        DB::table('proveedor')->insert([
            'tecnico' => 'Wilfredo',
            'telf1' => '71092756',
            'telf2' => null,
            'empresa' => 'Total Agro',
        ]);
        DB::table('proveedor')->insert([
            'tecnico' => 'Guido',
            'telf1' => '62128098',
            'telf2' => null,
            'empresa' => 'Del Campo',
        ]);
        DB::table('proveedor')->insert([
            'tecnico' => 'Carlos Alfredo',
            'telf1' => '77053848',
            'telf2' => null,
            'empresa' => 'Agroiguazu',
        ]);
        DB::table('proveedor')->insert([
            'tecnico' => 'Gabriel Barea',
            'telf1' => '72144433',
            'telf2' => null,
            'empresa' => 'Nordfield',
        ]);
        DB::table('proveedor')->insert([
            'tecnico' => 'Fidel Copa',
            'telf1' => '72600672',
            'telf2' => null,
            'empresa' => 'Agrocop',
        ]);
        DB::table('proveedor')->insert([
            'tecnico' => 'Reinaldo',
            'telf1' => '67973007',
            'telf2' => null,
            'empresa' => 'Aigroup',
        ]);
        DB::table('proveedor')->insert([
            'tecnico' => 'Ignacio',
            'telf1' => '76349311',
            'telf2' => null,
            'empresa' => 'Mainter',
        ]);
        DB::table('proveedor')->insert([
            'tecnico' => 'Deposito',
            'telf1' => '71336420',
            'telf2' => null,
            'empresa' => 'Deposito',
        ]);
        DB::table('proveedor')->insert([
            'tecnico' => 'Wilfredo',
            'telf1' => '73150863',
            'telf2' => null,
            'empresa' => 'Clean Field',
        ]);


        // Semillas
        DB::table('insumo')->insert([
            'nombre' => 'DEKALB',
            'tipo' => 'Semilla',
            'existencias' => 0,
            'unidad_medida_id' => 1,
            'subtipo_id' => 7,
        ]);
        DB::table('insumo')->insert([
            'nombre' => 'MORGAN',
            'tipo' => 'Semilla',
            'existencias' => 0,
            'unidad_medida_id' => 1,
            'subtipo_id' => 7,
        ]);
        DB::table('insumo')->insert([
            'nombre' => 'NEGRITA M',
            'tipo' => 'Semilla',
            'existencias' => 0,
            'unidad_medida_id' => 1,
            'subtipo_id' => 6,
        ]);
        DB::table('insumo')->insert([
            'nombre' => 'NEGRITA P',
            'tipo' => 'Semilla',
            'existencias' => 0,
            'unidad_medida_id' => 1,
            'subtipo_id' => 6,
        ]);
        DB::table('insumo')->insert([
            'nombre' => 'SW IMOX',
            'tipo' => 'Semilla',
            'existencias' => 0,
            'unidad_medida_id' => 1,
            'subtipo_id' => 6,
        ]);





    }
}
