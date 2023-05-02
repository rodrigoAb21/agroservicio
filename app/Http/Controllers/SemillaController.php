<?php

namespace App\Http\Controllers;

use App\Http\Requests\SemillaRequest;
use App\Models\Insumo;
use App\Models\Subtipo;
use App\Models\UnidadMedida;

class SemillaController extends Controller
{
    public function index()
    {
        return view('vistas.insumos.semillas.index',
            [
                'insumos' => Insumo::where('insumo.tipo','=', 'Semilla')->get(),
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



    public function store(SemillaRequest $request)
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


    public function update(SemillaRequest $request, $id)
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
