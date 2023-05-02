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




        /********************************************************
         *               Proveedores
         ********************************************************/

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




        /********************************************************
         *               Insumos - Semilla
         ********************************************************/

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


        /********************************************************
         *          Insumos - Agroquimico - Composicion
         ********************************************************/

        DB::table('insumo')->insert([
            'nombre' => 'SENTINEL PLUS',
            'tipo' => 'Agroquimico',
            'composicion' => 'LUFENURON.',
            'existencias' => 0,
            'info' => null,
            'unidad_medida_id' => 4,
            'subtipo_id' => 2,
            'envase' => null
        ]);

        DB::table('composicion')->insert([
            'ingrediente_activo' => 'LUFENURON',
            'concentracion' => '50-60cc/ha',
            'insumo_id' => 6,
        ]);

        DB::table('insumo')->insert([
            'nombre' => 'SPHERE MAX',
            'tipo' => 'Agroquimico',
            'composicion' => 'TRIFLOXYSTROBIN.',
            'existencias' => 0,
            'info' => null,
            'unidad_medida_id' => 4,
            'subtipo_id' => 3,
            'envase' => null
        ]);

        DB::table('composicion')->insert([
            'ingrediente_activo' => 'TRIFLOXYSTROBIN',
            'concentracion' => '0',
            'insumo_id' => 7,
        ]);

        DB::table('insumo')->insert([
            'nombre' => 'THIAMETOXAN P',
            'tipo' => 'Agroquimico',
            'composicion' => 'THIAMETOXAM.',
            'existencias' => 0,
            'info' => null,
            'unidad_medida_id' => 1,
            'subtipo_id' => 2,
            'envase' => null
        ]);

        DB::table('composicion')->insert([
            'ingrediente_activo' => 'THIAMETOXAM',
            'concentracion' => '100-120gr/ha',
            'insumo_id' => 8,
        ]);

        DB::table('insumo')->insert([
            'nombre' => 'COMPLESAL',
            'tipo' => 'Agroquimico',
            'composicion' => 'NPK.',
            'existencias' => 0,
            'info' => null,
            'unidad_medida_id' => 4,
            'subtipo_id' => 4,
            'envase' => null
        ]);

        DB::table('composicion')->insert([
            'ingrediente_activo' => 'NPK',
            'concentracion' => '1-1,5 LT/HA',
            'insumo_id' => 9,
        ]);

        DB::table('insumo')->insert([
            'nombre' => 'ACAROL PLUS',
            'tipo' => 'Agroquimico',
            'composicion' => 'ABAMECTIN.',
            'existencias' => 0,
            'info' => null,
            'unidad_medida_id' => 4,
            'subtipo_id' => 2,
            'envase' => null
        ]);

        DB::table('composicion')->insert([
            'ingrediente_activo' => 'ABAMECTIN',
            'concentracion' => '125CC/HA',
            'insumo_id' => 10,
        ]);

        DB::table('insumo')->insert([
            'nombre' => 'FOLITOTAL LLENADO',
            'tipo' => 'Agroquimico',
            'composicion' => 'POTASIO.',
            'existencias' => 0,
            'info' => null,
            'unidad_medida_id' => 4,
            'subtipo_id' => 4,
            'envase' => null
        ]);

        DB::table('composicion')->insert([
            'ingrediente_activo' => 'POTASIO',
            'concentracion' => '0,5-1lt/ha',
            'insumo_id' => 11,
        ]);

        DB::table('insumo')->insert([
            'nombre' => 'SUMO',
            'tipo' => 'Agroquimico',
            'composicion' => 'CHLORANTRANILIPROLE.',
            'existencias' => 0,
            'info' => null,
            'unidad_medida_id' => 4,
            'subtipo_id' => 2,
            'envase' => null
        ]);

        DB::table('composicion')->insert([
            'ingrediente_activo' => 'CHLORANTRANILIPROLE',
            'concentracion' => 'soya 20-30cc/ha',
            'insumo_id' => 12,
        ]);

        DB::table('insumo')->insert([
            'nombre' => 'ACTISOL',
            'tipo' => 'Agroquimico',
            'composicion' => 'ACTISOL.',
            'existencias' => 0,
            'info' => null,
            'unidad_medida_id' => 4,
            'subtipo_id' => 4,
            'envase' => null
        ]);

        DB::table('composicion')->insert([
            'ingrediente_activo' => 'ACTISOL',
            'concentracion' => 'NPK',
            'insumo_id' => 13,
        ]);

        DB::table('insumo')->insert([
            'nombre' => 'ACETOPLUS',
            'tipo' => 'Agroquimico',
            'composicion' => 'ACETOCLOR.',
            'existencias' => 0,
            'info' => null,
            'unidad_medida_id' => 4,
            'subtipo_id' => 1,
            'envase' => null
        ]);

        DB::table('composicion')->insert([
            'ingrediente_activo' => 'ACETOCLOR',
            'concentracion' => '1,5-2lt/ha',
            'insumo_id' => 14,
        ]);

        DB::table('insumo')->insert([
            'nombre' => 'AWARD',
            'tipo' => 'Agroquimico',
            'composicion' => 'BISPIRIBAC.',
            'existencias' => 0,
            'info' => null,
            'unidad_medida_id' => 4,
            'subtipo_id' => 1,
            'envase' => null
        ]);

        DB::table('composicion')->insert([
            'ingrediente_activo' => 'BISPIRIBAC',
            'concentracion' => '250-300ml/ha',
            'insumo_id' => 15,
        ]);

        DB::table('insumo')->insert([
            'nombre' => 'DIUREX',
            'tipo' => 'Agroquimico',
            'composicion' => 'DIURON.',
            'existencias' => 0,
            'info' => null,
            'unidad_medida_id' => 1,
            'subtipo_id' => 1,
            'envase' => null
        ]);

        DB::table('composicion')->insert([
            'ingrediente_activo' => 'DIURON',
            'concentracion' => '2,5-3 kg/ha',
            'insumo_id' => 16,
        ]);

        DB::table('insumo')->insert([
            'nombre' => 'DRAXX',
            'tipo' => 'Agroquimico',
            'composicion' => 'CYANTRANILIPROLE.',
            'existencias' => 0,
            'info' => null,
            'unidad_medida_id' => 1,
            'subtipo_id' => 2,
            'envase' => null
        ]);

        DB::table('composicion')->insert([
            'ingrediente_activo' => 'CYANTRANILIPROLE',
            'concentracion' => 'soya60gr/ha maiz 60gr/100kg',
            'insumo_id' => 17,
        ]);

        DB::table('insumo')->insert([
            'nombre' => 'GLIFOSATO CALIGRAN',
            'tipo' => 'Agroquimico',
            'composicion' => 'GLYPHOSATE.',
            'existencias' => 0,
            'info' => null,
            'unidad_medida_id' => 4,
            'subtipo_id' => 1,
            'envase' => null
        ]);

        DB::table('composicion')->insert([
            'ingrediente_activo' => 'GLYPHOSATE',
            'concentracion' => '2-2,5 lt/ha',
            'insumo_id' => 18,
        ]);

        DB::table('insumo')->insert([
            'nombre' => 'HERBAMEX 72',
            'tipo' => 'Agroquimico',
            'composicion' => '2-4D.',
            'existencias' => 0,
            'info' => null,
            'unidad_medida_id' => 4,
            'subtipo_id' => 1,
            'envase' => null
        ]);

        DB::table('composicion')->insert([
            'ingrediente_activo' => '2-4D',
            'concentracion' => '0,5-1 lt/ha',
            'insumo_id' => 19,
        ]);

        DB::table('insumo')->insert([
            'nombre' => 'INDOX 300',
            'tipo' => 'Agroquimico',
            'composicion' => 'INDOXACARB.',
            'existencias' => 0,
            'info' => null,
            'unidad_medida_id' => 1,
            'subtipo_id' => 2,
            'envase' => null
        ]);

        DB::table('composicion')->insert([
            'ingrediente_activo' => 'INDOXACARB',
            'concentracion' => '300-350gr/ha',
            'insumo_id' => 20,
        ]);

        DB::table('insumo')->insert([
            'nombre' => 'LARVIN',
            'tipo' => 'Agroquimico',
            'composicion' => 'THIODICARB.',
            'existencias' => 0,
            'info' => null,
            'unidad_medida_id' => 1,
            'subtipo_id' => 2,
            'envase' => null
        ]);

        DB::table('composicion')->insert([
            'ingrediente_activo' => 'THIODICARB',
            'concentracion' => '80-160 gr/ha',
            'insumo_id' => 21,
        ]);

        DB::table('insumo')->insert([
            'nombre' => 'MAESTRO 96',
            'tipo' => 'Agroquimico',
            'composicion' => 'METOLACHLOR.',
            'existencias' => 0,
            'info' => null,
            'unidad_medida_id' => 4,
            'subtipo_id' => 1,
            'envase' => null
        ]);

        DB::table('composicion')->insert([
            'ingrediente_activo' => 'METOLACHLOR',
            'concentracion' => '0',
            'insumo_id' => 22,
        ]);

        DB::table('insumo')->insert([
            'nombre' => 'MITER TOP',
            'tipo' => 'Agroquimico',
            'composicion' => 'ABAMECTIN.',
            'existencias' => 0,
            'info' => null,
            'unidad_medida_id' => 4,
            'subtipo_id' => 2,
            'envase' => null
        ]);

        DB::table('composicion')->insert([
            'ingrediente_activo' => 'ABAMECTIN',
            'concentracion' => '150-200ml/ha',
            'insumo_id' => 23,
        ]);

        DB::table('insumo')->insert([
            'nombre' => 'TITULO',
            'tipo' => 'Agroquimico',
            'composicion' => 'SULFENTRAZONE.',
            'existencias' => 0,
            'info' => null,
            'unidad_medida_id' => 4,
            'subtipo_id' => 1,
            'envase' => null
        ]);

        DB::table('composicion')->insert([
            'ingrediente_activo' => 'SULFENTRAZONE',
            'concentracion' => '0,9 lt/ha',
            'insumo_id' => 24,
        ]);

        DB::table('insumo')->insert([
            'nombre' => 'TOTALPIRIFOS',
            'tipo' => 'Agroquimico',
            'composicion' => 'CHLORPYRIFOS.',
            'existencias' => 0,
            'info' => null,
            'unidad_medida_id' => 4,
            'subtipo_id' => 2,
            'envase' => null
        ]);

        DB::table('composicion')->insert([
            'ingrediente_activo' => 'CHLORPYRIFOS',
            'concentracion' => '0,8-1,2 l/ha',
            'insumo_id' => 25,
        ]);

        DB::table('insumo')->insert([
            'nombre' => 'TRIPLEX',
            'tipo' => 'Agroquimico',
            'composicion' => 'METALAXYL.',
            'existencias' => 0,
            'info' => null,
            'unidad_medida_id' => 4,
            'subtipo_id' => 3,
            'envase' => null
        ]);

        DB::table('composicion')->insert([
            'ingrediente_activo' => 'METALAXYL',
            'concentracion' => '100-125cc/100kg semilla',
            'insumo_id' => 26,
        ]);

        DB::table('insumo')->insert([
            'nombre' => 'TRIUNFO NEUTRO',
            'tipo' => 'Agroquimico',
            'composicion' => 'NPK.',
            'existencias' => 0,
            'info' => null,
            'unidad_medida_id' => 4,
            'subtipo_id' => 4,
            'envase' => null
        ]);

        DB::table('composicion')->insert([
            'ingrediente_activo' => 'NPK',
            'concentracion' => '0,5 ml/lt agua',
            'insumo_id' => 27,
        ]);

        DB::table('insumo')->insert([
            'nombre' => 'ULTIMATUN 200',
            'tipo' => 'Agroquimico',
            'composicion' => 'EMABECTIN BENZOATE.',
            'existencias' => 0,
            'info' => null,
            'unidad_medida_id' => 1,
            'subtipo_id' => 2,
            'envase' => null
        ]);

        DB::table('composicion')->insert([
            'ingrediente_activo' => 'EMABECTIN BENZOATE',
            'concentracion' => '50gr/ha',
            'insumo_id' => 28,
        ]);

        DB::table('insumo')->insert([
            'nombre' => 'VERNO',
            'tipo' => 'Agroquimico',
            'composicion' => 'COBRE/ZINC.',
            'existencias' => 0,
            'info' => null,
            'unidad_medida_id' => 1,
            'subtipo_id' => 3,
            'envase' => null
        ]);

        DB::table('composicion')->insert([
            'ingrediente_activo' => 'COBRE/ZINC',
            'concentracion' => 'soya 300-500gr/ha maiz 250gr/ha',
            'insumo_id' => 29,
        ]);

        DB::table('insumo')->insert([
            'nombre' => 'X-CITE',
            'tipo' => 'Agroquimico',
            'composicion' => 'REGULADOR DE CRECIMIENTO.',
            'existencias' => 0,
            'info' => null,
            'unidad_medida_id' => 4,
            'subtipo_id' => 4,
            'envase' => null
        ]);

        DB::table('composicion')->insert([
            'ingrediente_activo' => 'REGULADOR DE CRECIMIENTO',
            'concentracion' => '1-2lt/ha',
            'insumo_id' => 30,
        ]);

        DB::table('insumo')->insert([
            'nombre' => 'NITRO 30',
            'tipo' => 'Agroquimico',
            'composicion' => 'NPK.',
            'existencias' => 0,
            'info' => null,
            'unidad_medida_id' => 4,
            'subtipo_id' => 4,
            'envase' => null
        ]);

        DB::table('composicion')->insert([
            'ingrediente_activo' => 'NPK',
            'concentracion' => '0',
            'insumo_id' => 31,
        ]);

        DB::table('insumo')->insert([
            'nombre' => 'UREA',
            'tipo' => 'Agroquimico',
            'composicion' => '',
            'existencias' => 0,
            'info' => null,
            'unidad_medida_id' => 1,
            'subtipo_id' => 4,
            'envase' => null
        ]);


        DB::table('insumo')->insert([
            'nombre' => 'HAWKER',
            'tipo' => 'Agroquimico',
            'composicion' => 'ZETA-CYPERMETHRIN.',
            'existencias' => 0,
            'info' => null,
            'unidad_medida_id' => 4,
            'subtipo_id' => 2,
            'envase' => null
        ]);

        DB::table('composicion')->insert([
            'ingrediente_activo' => 'ZETA-CYPERMETHRIN',
            'concentracion' => '40-55,75-100 cc/ha',
            'insumo_id' => 33,
        ]);

        DB::table('insumo')->insert([
            'nombre' => 'TOTLDIM',
            'tipo' => 'Agroquimico',
            'composicion' => 'CLETHODIM.',
            'existencias' => 0,
            'info' => null,
            'unidad_medida_id' => 4,
            'subtipo_id' => 1,
            'envase' => null
        ]);

        DB::table('composicion')->insert([
            'ingrediente_activo' => 'CLETHODIM',
            'concentracion' => '0,3-0,4 lt/ha',
            'insumo_id' => 34,
        ]);

        DB::table('insumo')->insert([
            'nombre' => 'NICO 75',
            'tipo' => 'Agroquimico',
            'composicion' => 'NICOSULFURON.',
            'existencias' => 0,
            'info' => null,
            'unidad_medida_id' => 2,
            'subtipo_id' => 1,
            'envase' => null
        ]);

        DB::table('composicion')->insert([
            'ingrediente_activo' => 'NICOSULFURON',
            'concentracion' => '35-40-80gr/ha',
            'insumo_id' => 35,
        ]);

        DB::table('insumo')->insert([
            'nombre' => 'NOVOMECTIN',
            'tipo' => 'Agroquimico',
            'composicion' => 'EMABECTIN BENZOATE.',
            'existencias' => 0,
            'info' => null,
            'unidad_medida_id' => 4,
            'subtipo_id' => 2,
            'envase' => null
        ]);

        DB::table('composicion')->insert([
            'ingrediente_activo' => 'EMABECTIN BENZOATE',
            'concentracion' => '40-50 ml/ha',
            'insumo_id' => 36,
        ]);

        DB::table('insumo')->insert([
            'nombre' => 'BRABECK',
            'tipo' => 'Agroquimico',
            'composicion' => 'FLUROXYPYR.',
            'existencias' => 0,
            'info' => null,
            'unidad_medida_id' => 4,
            'subtipo_id' => 1,
            'envase' => null
        ]);

        DB::table('composicion')->insert([
            'ingrediente_activo' => 'FLUROXYPYR',
            'concentracion' => '0,2-0,5 lt/ha',
            'insumo_id' => 37,
        ]);

        DB::table('insumo')->insert([
            'nombre' => 'CALBPORZINC',
            'tipo' => 'Agroquimico',
            'composicion' => 'CALCIO ZINC.',
            'existencias' => 0,
            'info' => null,
            'unidad_medida_id' => 4,
            'subtipo_id' => 4,
            'envase' => null
        ]);

        DB::table('composicion')->insert([
            'ingrediente_activo' => 'CALCIO ZINC',
            'concentracion' => '1,5lt/ha',
            'insumo_id' => 38,
        ]);

        DB::table('insumo')->insert([
            'nombre' => 'CIFEX TR',
            'tipo' => 'Agroquimico',
            'composicion' => 'FENOXAPROP.',
            'existencias' => 0,
            'info' => null,
            'unidad_medida_id' => 4,
            'subtipo_id' => 1,
            'envase' => null
        ]);

        DB::table('composicion')->insert([
            'ingrediente_activo' => 'FENOXAPROP',
            'concentracion' => '0,75lt/ha',
            'insumo_id' => 39,
        ]);

        DB::table('insumo')->insert([
            'nombre' => 'CIGAM',
            'tipo' => 'Agroquimico',
            'composicion' => 'CLOMAZONE.',
            'existencias' => 0,
            'info' => null,
            'unidad_medida_id' => 4,
            'subtipo_id' => 1,
            'envase' => null
        ]);

        DB::table('composicion')->insert([
            'ingrediente_activo' => 'CLOMAZONE',
            'concentracion' => '1 lt/ha',
            'insumo_id' => 40,
        ]);

        DB::table('insumo')->insert([
            'nombre' => 'CIQUAT',
            'tipo' => 'Agroquimico',
            'composicion' => 'PARAQUAT.',
            'existencias' => 0,
            'info' => null,
            'unidad_medida_id' => 4,
            'subtipo_id' => 1,
            'envase' => null
        ]);

        DB::table('composicion')->insert([
            'ingrediente_activo' => 'PARAQUAT',
            'concentracion' => '2-2,5lt/ha',
            'insumo_id' => 41,
        ]);

        DB::table('insumo')->insert([
            'nombre' => 'CIROXIPYR',
            'tipo' => 'Agroquimico',
            'composicion' => 'FLUROXYPYR.',
            'existencias' => 0,
            'info' => null,
            'unidad_medida_id' => 4,
            'subtipo_id' => 1,
            'envase' => null
        ]);

        DB::table('composicion')->insert([
            'ingrediente_activo' => 'FLUROXYPYR',
            'concentracion' => '0,35-1 lt/ha',
            'insumo_id' => 42,
        ]);

        DB::table('insumo')->insert([
            'nombre' => 'CLORIN',
            'tipo' => 'Agroquimico',
            'composicion' => 'CHLORIMURON.',
            'existencias' => 0,
            'info' => null,
            'unidad_medida_id' => 4,
            'subtipo_id' => 1,
            'envase' => null
        ]);

        DB::table('composicion')->insert([
            'ingrediente_activo' => 'CHLORIMURON',
            'concentracion' => '40gr/ha',
            'insumo_id' => 43,
        ]);

        DB::table('insumo')->insert([
            'nombre' => 'DINNO',
            'tipo' => 'Agroquimico',
            'composicion' => 'DINOTEFURAN.',
            'existencias' => 0,
            'info' => null,
            'unidad_medida_id' => 1,
            'subtipo_id' => 2,
            'envase' => null
        ]);

        DB::table('composicion')->insert([
            'ingrediente_activo' => 'DINOTEFURAN',
            'concentracion' => '95gr/ha',
            'insumo_id' => 44,
        ]);

        DB::table('insumo')->insert([
            'nombre' => 'NUCLEOS',
            'tipo' => 'Agroquimico',
            'composicion' => 'NPK.',
            'existencias' => 0,
            'info' => null,
            'unidad_medida_id' => 4,
            'subtipo_id' => 4,
            'envase' => null
        ]);

        DB::table('composicion')->insert([
            'ingrediente_activo' => 'NPK',
            'concentracion' => '0',
            'insumo_id' => 45,
        ]);

        DB::table('insumo')->insert([
            'nombre' => 'OIL EXTRA',
            'tipo' => 'Agroquimico',
            'composicion' => 'ACEITE VEGETAL.',
            'existencias' => 0,
            'info' => null,
            'unidad_medida_id' => 4,
            'subtipo_id' => 4,
            'envase' => null
        ]);

        DB::table('composicion')->insert([
            'ingrediente_activo' => 'ACEITE VEGETAL',
            'concentracion' => '300-500ml/ha',
            'insumo_id' => 46,
        ]);

        DB::table('insumo')->insert([
            'nombre' => 'PARSEED',
            'tipo' => 'Agroquimico',
            'composicion' => 'THIODICARB.',
            'existencias' => 0,
            'info' => null,
            'unidad_medida_id' => 4,
            'subtipo_id' => 2,
            'envase' => null
        ]);

        DB::table('composicion')->insert([
            'ingrediente_activo' => 'THIODICARB',
            'concentracion' => 'soya 0,5-0,5lt/100kg maiz 1-1,5 lt/100kg',
            'insumo_id' => 47,
        ]);

        DB::table('insumo')->insert([
            'nombre' => 'PH MAX',
            'tipo' => 'Agroquimico',
            'composicion' => 'REGULADOR PH.',
            'existencias' => 0,
            'info' => null,
            'unidad_medida_id' => 4,
            'subtipo_id' => 4,
            'envase' => null
        ]);

        DB::table('composicion')->insert([
            'ingrediente_activo' => 'REGULADOR PH',
            'concentracion' => '50-100cc/00lt agua',
            'insumo_id' => 48,
        ]);

        DB::table('insumo')->insert([
            'nombre' => 'PLOW 42',
            'tipo' => 'Agroquimico',
            'composicion' => 'DICLOSULAM.',
            'existencias' => 0,
            'info' => null,
            'unidad_medida_id' => 4,
            'subtipo_id' => 1,
            'envase' => null
        ]);

        DB::table('composicion')->insert([
            'ingrediente_activo' => 'DICLOSULAM',
            'concentracion' => '80-100cc/ha',
            'insumo_id' => 49,
        ]);

        DB::table('insumo')->insert([
            'nombre' => 'PORSELENXTRA',
            'tipo' => 'Agroquimico',
            'composicion' => 'EMABECTIN BENZOATE.',
            'existencias' => 0,
            'info' => null,
            'unidad_medida_id' => 1,
            'subtipo_id' => 2,
            'envase' => null
        ]);

        DB::table('composicion')->insert([
            'ingrediente_activo' => 'EMABECTIN BENZOATE',
            'concentracion' => '150gr/ha',
            'insumo_id' => 50,
        ]);

        DB::table('insumo')->insert([
            'nombre' => 'PQM DOMINO SC',
            'tipo' => 'Agroquimico',
            'composicion' => 'PYRACLOSTROBIN/EPOXICONAZOLE.',
            'existencias' => 0,
            'info' => null,
            'unidad_medida_id' => 4,
            'subtipo_id' => 3,
            'envase' => null
        ]);

        DB::table('composicion')->insert([
            'ingrediente_activo' => 'PYRACLOSTROBIN/EPOXICONAZOLE',
            'concentracion' => '700cc/ha',
            'insumo_id' => 51,
        ]);

        DB::table('insumo')->insert([
            'nombre' => 'PRADEL 90',
            'tipo' => 'Agroquimico',
            'composicion' => 'ATRAZINE.',
            'existencias' => 0,
            'info' => null,
            'unidad_medida_id' => 1,
            'subtipo_id' => 1,
            'envase' => null
        ]);

        DB::table('composicion')->insert([
            'ingrediente_activo' => 'ATRAZINE',
            'concentracion' => '1,75-2 kg/ha',
            'insumo_id' => 52,
        ]);

        DB::table('insumo')->insert([
            'nombre' => 'PREROOT',
            'tipo' => 'Agroquimico',
            'composicion' => 'INOCULANTE.',
            'existencias' => 0,
            'info' => null,
            'unidad_medida_id' => 4,
            'subtipo_id' => 4,
            'envase' => null
        ]);

        DB::table('composicion')->insert([
            'ingrediente_activo' => 'INOCULANTE',
            'concentracion' => 'soya 100ml/100kg maiz 400ml/100kg',
            'insumo_id' => 53,
        ]);

        DB::table('insumo')->insert([
            'nombre' => 'PROUD',
            'tipo' => 'Agroquimico',
            'composicion' => 'IMAZETHAPYR.',
            'existencias' => 0,
            'info' => null,
            'unidad_medida_id' => 4,
            'subtipo_id' => 1,
            'envase' => null
        ]);

        DB::table('composicion')->insert([
            'ingrediente_activo' => 'IMAZETHAPYR',
            'concentracion' => '1-1,2l/ha',
            'insumo_id' => 54,
        ]);

        DB::table('insumo')->insert([
            'nombre' => 'RACING',
            'tipo' => 'Agroquimico',
            'composicion' => 'BENTAZONE.',
            'existencias' => 0,
            'info' => null,
            'unidad_medida_id' => 4,
            'subtipo_id' => 1,
            'envase' => null
        ]);

        DB::table('composicion')->insert([
            'ingrediente_activo' => 'BENTAZONE',
            'concentracion' => '1-1,2lt/ha',
            'insumo_id' => 55,
        ]);

        DB::table('insumo')->insert([
            'nombre' => 'REDSHIELD',
            'tipo' => 'Agroquimico',
            'composicion' => 'OXIDO CUPROSO.',
            'existencias' => 0,
            'info' => null,
            'unidad_medida_id' => 1,
            'subtipo_id' => 3,
            'envase' => null
        ]);

        DB::table('composicion')->insert([
            'ingrediente_activo' => 'OXIDO CUPROSO',
            'concentracion' => '25-50gr/10ltagua',
            'insumo_id' => 56,
        ]);

        DB::table('insumo')->insert([
            'nombre' => 'ROUNDUPFULL2',
            'tipo' => 'Agroquimico',
            'composicion' => 'GLYPHOSATE.',
            'existencias' => 0,
            'info' => null,
            'unidad_medida_id' => 4,
            'subtipo_id' => 1,
            'envase' => null
        ]);

        DB::table('composicion')->insert([
            'ingrediente_activo' => 'GLYPHOSATE',
            'concentracion' => '2,5-3,5 lt/',
            'insumo_id' => 57,
        ]);


    }
}
