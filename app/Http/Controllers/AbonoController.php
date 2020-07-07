<?php

namespace App\Http\Controllers;

use App\DetalleAbono;
use App\Insumo;
use App\UnidadMedida;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AbonoController extends Controller
{
    public function index()
    {
        return view('vistas.insumos.abonos.index',
            [
                'insumos' => Insumo::where('tipo', '=', 'Abono')->paginate(10),
            ]);
    }

    public function create()
    {
        return view('vistas.insumos.abonos.create',
            [
                'unidades' => UnidadMedida::all(),
            ]);
    }


    public function store(Request $request)
    {

        try {
            DB::beginTransaction();

            $insumo = new Insumo();
            $insumo->nombre = $request['nombre'];
            $insumo->ingrediente_activo = $request['ingrediente_activo'];
            $insumo->info = $request['info'];
            $insumo->existencias = 0;
            $insumo->tipo = 'Abono';
            $insumo->unidad_medida_id = $request['unidad_medida_id'];
            $insumo->save();

            $cultivo = $request->get('cultivoT');


            if($cultivo){
                $dosis = $request->get('dosisT');
                $cont = 0;

                while ($cont < count($cultivo)) {
                    $detalle = new DetalleAbono();
                    $detalle->cultivo = $cultivo[$cont];
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



        return redirect('insumos/abonos');
    }

    public function edit($id)
    {
        return view('vistas.insumos.abonos.edit',
            [
                'insumo' => Insumo::findOrFail($id),
                'unidades' => UnidadMedida::all(),
                'detalles' => DetalleAbono::where('insumo_id','=', $id)->get(),
            ]);
    }


    public function update(Request $request, $id)
    {
        try {
            DB::beginTransaction();
            $insumo = Insumo::findOrFail($id);
            $insumo->nombre = $request['nombre'];
            $insumo->ingrediente_activo = $request['ingrediente_activo'];
            $insumo->info = $request['info'];
            $insumo->unidad_medida_id = $request['unidad_medida_id'];
            if ($insumo->update()){
                DB::table('detalle_fitosanitario')->where('insumo_id', '=', $id)->delete();
            }
            $cultivo = $request->get('cultivoT');
            $dosis = $request->get('dosisT');
            $cont = 0;

            while ($cont < count($cultivo)) {
                $detalle = new DetalleAbono();
                $detalle->cultivo = $cultivo[$cont];
                $detalle->dosis = $dosis[$cont];
                $detalle->insumo_id = $insumo->id;
                $detalle->save();

                $cont = $cont + 1;
            }

            DB::commit();

        } catch (Exception $e) {

            DB::rollback();

        }



        return redirect('insumos/abonos');
    }


    public function destroy($id)
    {
        $insumo = Insumo::findOrFail($id);
        $insumo->delete();

        return redirect('insumos/abonos');
    }
}