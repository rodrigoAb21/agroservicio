<?php

namespace App\Http\Controllers;

use App\Insumo;
use App\TipoInsumo;
use App\UnidadMedida;
use Illuminate\Http\Request;

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
        $insumo = new Insumo();
        $insumo->nombre = $request['nombre'];
        $insumo->ingrediente_reactivo = $request['ingrediente_reactivo'];
        $insumo->existencias = 0;
        $insumo->tipo_id = $request['tipo_id'];
        $insumo->unidad_medida_id = $request['unidad_medida_id'];
        $insumo->save();

        return redirect('insumos');
    }

    public function edit($id)
    {
        return view('vistas.insumos.edit',
            [
                'insumo' => Insumo::findOrFail($id),
                'unidades' => UnidadMedida::all(),
                'tipos' => TipoInsumo::all(),
            ]);
    }


    public function update(Request $request, $id)
    {
        $insumo = Insumo::findOrFail($id);
        $insumo->nombre = $request['nombre'];
        $insumo->ingrediente_reactivo = $request['ingrediente_reactivo'];
        $insumo->tipo_id = $request['tipo_id'];
        $insumo->unidad_medida_id = $request['unidad_medida_id'];
        $insumo->update();

        return redirect('insumos');
    }


    public function destroy($id)
    {
        $insumo = Insumo::findOrFail($id);
        $insumo->delete();

        return redirect('insumos');
    }
}
