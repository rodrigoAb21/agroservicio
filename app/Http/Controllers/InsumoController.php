<?php

namespace App\Http\Controllers;

use App\Insumo;
use App\TipoInsumo;
use App\UnidadMedida;
use App\DetalleInsumo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InsumoController extends Controller
{
    public function index()
    {
        return view('vistas.insumos.index',
            [
                'insumos' => Insumo::paginate(10),
            ]);
    }

    public function create()
    {
        return view('vistas.insumos.create',
            [
                'unidades' => UnidadMedida::all(),
                'tipos' => TipoInsumo::all(),
            ]);
    }


    public function store(Request $request)
    {

        try {
            DB::beginTransaction();

            $insumo = new Insumo();
            $insumo->nombre = $request['nombre'];
            $insumo->ingrediente_reactivo = $request['ingrediente_reactivo'];
            $insumo->info = $request['info'];
            $insumo->existencias = 0;
            $insumo->tipo_id = $request['tipo_id'];
            $insumo->unidad_medida_id = $request['unidad_medida_id'];
            $insumo->save();

            $cultivo = $request->get('cultivoT');


            if($cultivo){
                $plaga = $request->get('plagaT');
                $dosis = $request->get('dosisT');
                $cont = 0;

                while ($cont < count($cultivo)) {
                    $detalle = new DetalleInsumo();
                    $detalle->cultivo = $cultivo[$cont];
                    $detalle->plaga = $plaga[$cont];
                    $detalle->dosis = $dosis[$cont];
                    $detalle->insumo_id = $insumo->id;
                    $detalle->save();

                    $cont = $cont + 1;
                }
            }

            DB::commit();

        } catch (Exception $e) {

            DB::rollback();

        }
        
    

        return redirect('insumos');
    }

    public function edit($id)
    {
        return view('vistas.insumos.edit',
            [
                'insumo' => Insumo::findOrFail($id),
                'unidades' => UnidadMedida::all(),
                'tipos' => TipoInsumo::all(),
                'detalles' => DetalleInsumo::where('insumo_id','=', $id)->get(),
            ]);
    }


    public function update(Request $request, $id)
    {
        try {
            DB::beginTransaction();
            $insumo = Insumo::findOrFail($id);
            $insumo->nombre = $request['nombre'];
            $insumo->ingrediente_reactivo = $request['ingrediente_reactivo'];
            $insumo->info = $request['info'];
            $insumo->existencias = 0;
            $insumo->tipo_id = $request['tipo_id'];
            $insumo->unidad_medida_id = $request['unidad_medida_id'];
            if ($insumo->update()){
                DB::table('detalle_insumo')->where('insumo_id', '=', $id)->delete();
            }
            $cultivo = $request->get('cultivoT');
            $plaga = $request->get('plagaT');
            $dosis = $request->get('dosisT');
            $cont = 0;

            while ($cont < count($cultivo)) {
                $detalle = new DetalleInsumo();
                $detalle->cultivo = $cultivo[$cont];
                $detalle->plaga = $plaga[$cont];
                $detalle->dosis = $dosis[$cont];
                $detalle->insumo_id = $insumo->id;
                $detalle->save();

                $cont = $cont + 1;
            }

            DB::commit();

        } catch (Exception $e) {

            DB::rollback();

        }



        return redirect('insumos');
    }


    public function destroy($id)
    {
        $insumo = Insumo::findOrFail($id);
        $insumo->delete();

        return redirect('insumos');
    }
}
