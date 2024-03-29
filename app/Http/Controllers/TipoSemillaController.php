<?php

namespace App\Http\Controllers;

use App\Http\Requests\TipoSemillaRequest;
use App\Models\Subtipo;


class TipoSemillaController extends Controller
{
    public function index()
    {
        return view('vistas.config.tipoSemillas.index',
            [
                'tipos' => Subtipo::where('tipo', '=', 'Semilla')->get(),
            ]);
    }

    public function create()
    {
        return view('vistas.config.tipoSemillas.create');
    }


    public function store(TipoSemillaRequest $request)
    {
        $tipo = new Subtipo();
        $tipo->nombre = $request['nombre'];
        $tipo->tipo = 'Semilla';
        $tipo->save();

        return redirect('config/tipoSemillas')->with(['message' => 'Tipo de Semilla creada exitosamente.']);
    }

    public function edit($id)
    {
        return view('vistas.config.tipoSemillas.edit',
            [
                'tipo' => Subtipo::findOrFail($id),
            ]);
    }


    public function update(TipoSemillaRequest $request, $id)
    {
        $tipo = Subtipo::findOrFail($id);
        $tipo->nombre = $request['nombre'];
        $tipo->update();

        return redirect('config/tipoSemillas')->with(['message' => 'Tipo de Semilla editada exitosamente.']);
    }


    public function destroy($id)
    {
        $tipo = Subtipo::findOrFail($id);
        $tipo->delete();

        return redirect('config/tipoSemillas')->with(['message' => 'Tipo de Semilla eliminada exitosamente.']);
    }
}
