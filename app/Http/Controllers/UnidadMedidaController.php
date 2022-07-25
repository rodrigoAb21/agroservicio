<?php

namespace App\Http\Controllers;

use App\Http\Requests\UnidadMedidaRequest;
use App\UnidadMedida;


class UnidadMedidaController extends Controller
{
    public function index()
    {
        return view('vistas.config.unidades.index',
            [
                'unidades' => UnidadMedida::all(),
            ]);
    }

    public function create()
    {
        return view('vistas.config.unidades.create');
    }


    public function store(UnidadMedidaRequest $request)
    {
        $unidad = new UnidadMedida();
        $unidad->nombre = $request['nombre'];
        $unidad->save();

        return redirect('config/unidades')->with(['message' => 'Unidad de medida creada exitosamente.']);
    }

    public function edit($id)
    {
        return view('vistas.config.unidades.edit',
            [
                'unidad' => UnidadMedida::findOrFail($id),
            ]);
    }


    public function update(UnidadMedidaRequest $request, $id)
    {
        $unidad = UnidadMedida::findOrFail($id);
        $unidad->nombre = $request['nombre'];
        $unidad->update();

        return redirect('config/unidades')->with(['message' => 'Unidad de medida editada exitosamente.']);
    }


    public function destroy($id)
    {
        $unidad = UnidadMedida::findOrFail($id);
        $unidad->delete();

        return redirect('config/unidades')->with(['message' => 'Unidad de medida eliminada exitosamente.']);
    }
}
