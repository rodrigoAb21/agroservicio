<?php

namespace App\Http\Controllers;

use App\TipoMaquinaria;
use Illuminate\Http\Request;

class TipoMaquinariaController extends Controller
{
    public function index()
    {
        return view('vistas.config.tipoMaquinarias.index',
            [
                'tipos' => TipoMaquinaria::paginate(10),
            ]);
    }

    public function create()
    {
        return view('vistas.config.tipoMaquinarias.create');
    }


    public function store(Request $request)
    {
        $tipo = new TipoMaquinaria();
        $tipo->nombre = $request['nombre'];
        $tipo->save();

        return redirect('config/tipoMaquinarias');
    }

    public function edit($id)
    {
        return view('vistas.config.tipoMaquinarias.edit',
            [
                'tipo' => TipoMaquinaria::findOrFail($id),
            ]);
    }


    public function update(Request $request, $id)
    {
        $tipo = TipoMaquinaria::findOrFail($id);
        $tipo->nombre = $request['nombre'];
        $tipo->update();

        return redirect('config/tipoMaquinarias');
    }


    public function destroy($id)
    {
        $tipo = TipoMaquinaria::findOrFail($id);
        $tipo->delete();

        return redirect('config/tipoMaquinarias');
    }
}
