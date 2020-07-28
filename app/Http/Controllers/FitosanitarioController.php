<?php

namespace App\Http\Controllers;

use App\DetalleFitosanitario;
use App\Insumo;
use App\TipoFitosanitario;
use App\UnidadMedida;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FitosanitarioController extends Controller
{
    public function index(Request $request)
    {
        $busqueda = trim($request['busqueda']);
        $fitosanitarios = Insumo::where('insumo.tipo','=', 'Fitosanitario')
            ->join('tipoFitosanitario', 'insumo.tipoFitosanitario_id', '=', 'tipoFitosanitario.id')
            ->join('unidad_medida', 'insumo.unidad_medida_id', '=', 'unidad_medida.id')
            ->where(function ($query) use ($busqueda) {
                $query->where('insumo.nombre', 'like', '%'.$busqueda.'%')
                    ->orWhere('tipoFitosanitario.nombre', 'like', '%'.$busqueda.'%')
                    ->orWhere('insumo.ingrediente_activo', 'like', '%'.$busqueda.'%')
                ;}
            )
            ->orderBy('insumo.nombre')
            ->select('insumo.nombre', 'insumo.contenido_total', 'insumo.ingrediente_activo',
                'insumo.existencias','tipoFitosanitario.nombre as tipo','unidad_medida.nombre as unidad')
            ->paginate(10);
        return view('vistas.insumos.fitosanitarios.index',
            [
                'insumos' => $fitosanitarios,
                'busqueda' => $busqueda,
            ]);
    }

    public function create()
    {
        return view('vistas.insumos.fitosanitarios.create',
            [
                'unidades' => UnidadMedida::all(),
                'tipos' => TipoFitosanitario::all(),
            ]);
    }


    public function store(Request $request)
    {

        try {
            DB::beginTransaction();

            $insumo = new Insumo();
            $insumo->nombre = $request['nombre'];
            $insumo->ingrediente_activo = $request['ingrediente_activo'];
            $insumo->contenido_total = $request['contenido_total'];
            $insumo->info = $request['info'];
            $insumo->existencias = 0;
            $insumo->tipo = 'Fitosanitario';
            $insumo->tipoFitosanitario_id = $request['tipoFitosanitario_id'];
            $insumo->unidad_medida_id = $request['unidad_medida_id'];
            $insumo->save();

            $cultivo = $request->get('cultivoT');


            if($cultivo){
                $plaga = $request->get('plagaT');
                $dosis = $request->get('dosisT');
                $cont = 0;

                while ($cont < count($cultivo)) {
                    $detalle = new DetalleFitosanitario();
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



        return redirect('insumos/fitosanitarios');
    }

    public function edit($id)
    {
        return view('vistas.insumos.fitosanitarios.edit',
            [
                'insumo' => Insumo::findOrFail($id),
                'unidades' => UnidadMedida::all(),
                'tipos' => TipoFitosanitario::all(),
                'detalles' => DetalleFitosanitario::where('insumo_id','=', $id)->get(),
            ]);
    }

    public function show($id)
    {
        return view('vistas.insumos.fitosanitarios.show',
            [
                'insumo' => Insumo::findOrFail($id),
                'detalles' => DetalleFitosanitario::where('insumo_id','=', $id)->get(),
            ]);
    }


    public function update(Request $request, $id)
    {
        try {
            DB::beginTransaction();
            $insumo = Insumo::findOrFail($id);
            $insumo->nombre = $request['nombre'];
            $insumo->ingrediente_activo = $request['ingrediente_activo'];
            $insumo->contenido_total = $request['contenido_total'];
            $insumo->info = $request['info'];
            $insumo->tipoFitosanitario_id = $request['tipoFitosanitario_id'];
            $insumo->unidad_medida_id = $request['unidad_medida_id'];

            if ($insumo->update()){
                DB::table('detalle_fitosanitario')->where('insumo_id', '=', $id)->delete();
                $cultivo = $request->get('cultivoT');
                if ($cultivo){
                    $plaga = $request->get('plagaT');
                    $dosis = $request->get('dosisT');
                    $cont = 0;
                    while ($cont < count($cultivo)) {
                        $detalle = new DetalleFitosanitario();
                        $detalle->cultivo = $cultivo[$cont];
                        $detalle->plaga = $plaga[$cont];
                        $detalle->dosis = $dosis[$cont];
                        $detalle->insumo_id = $insumo->id;
                        $detalle->save();

                        $cont = $cont + 1;
                    }
                }
            }


            DB::commit();

        } catch (Exception $e) {

            DB::rollback();

        }



        return redirect('insumos/fitosanitarios');
    }


    public function destroy($id)
    {
        $insumo = Insumo::findOrFail($id);
        $insumo->delete();

        return redirect('insumos/fitosanitarios');
    }
}
