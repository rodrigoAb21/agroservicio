<?php

namespace App\Http\Controllers;

use App\Insumo;
use App\Subtipo;
use App\TipoInsumo;
use App\UnidadMedida;
use Illuminate\Http\Request;

class SemillaController extends Controller
{
    public function index(Request $request)
    {
        $busqueda = trim($request['busqueda']);
        $semillas = Insumo::where('insumo.tipo','=', 'Semilla')
            ->join('subtipo', 'insumo.subtipo_id', '=', 'subtipo.id')
            ->join('unidad_medida', 'insumo.unidad_medida_id', '=', 'unidad_medida.id')
            ->where(function ($query) use ($busqueda) {
                $query->where('insumo.nombre', 'like', '%'.$busqueda.'%')
                    ->orWhere('subtipo.nombre', 'like', '%'.$busqueda.'%')
                    ->orWhere('insumo.envase', 'like', '%'.$busqueda.'%')
                ;}
            )
            ->select('insumo.nombre', 'insumo.envase','insumo.id', 'unidad_medida.nombre as unidad',
                'insumo.existencias','subtipo.nombre as tipo')
            ->orderBy('insumo.nombre')
            ->paginate(10);
        return view('vistas.insumos.semillas.index',
            [
                'insumos' => $semillas,
                'busqueda' => $busqueda,
            ]);
    }

    public function create()
    {
        return view('vistas.insumos.semillas.create',
            [
                'unidades' => UnidadMedida::all(),
                'tipos' => Subtipo::where('tipo', '=', 'Semilla')->get(),
            ]);
    }



    public function store(Request $request)
    {
        
        $insumo = new Insumo();
        $insumo->nombre = $request['nombre'];
        $insumo->info = $request['info'];
        $insumo->envase = $request['envase'];
        $insumo->existencias = 0;
        $insumo->tipo = 'Semilla';
        $insumo->subtipo_id = $request['subtipo_id'];
        $insumo->unidad_medida_id = $request['unidad_medida_id'];
        $insumo->save();

        return redirect('insumos/semillas')->with(['message' => 'Semilla creada exitosamente.']);
    }

    public function edit($id)
    {
        return view('vistas.insumos.semillas.edit',
            [
                'insumo' => Insumo::findOrFail($id),
                'unidades' => UnidadMedida::all(),
                'tipos' => Subtipo::where('tipo', '=', 'Semilla')->get(),
            ]);
    }

    public function show($id)
    {
        return view('vistas.insumos.semillas.show',
            [
                'insumo' => Insumo::findOrFail($id),
            ]);
    }


    public function update(Request $request, $id)
    {
    
        $insumo = Insumo::findOrFail($id);
        $insumo->nombre = $request['nombre'];
        $insumo->info = $request['info'];
        $insumo->envase = $request['envase'];
        $insumo->unidad_medida_id = $request['unidad_medida_id'];
        $insumo->subtipo_id = $request['subtipo_id'];
        $insumo->save();

        return redirect('insumos/semillas')->with(['message' => 'Semilla editada exitosamente.']);
    }


    public function destroy($id)
    {
        $insumo = Insumo::findOrFail($id);
        $insumo->delete();

        return redirect('insumos/semillas')->with(['message' => 'Semilla eliminada exitosamente.']);
    }
}
