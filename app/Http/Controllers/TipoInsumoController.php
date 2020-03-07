<?php

namespace App\Http\Controllers;

use App\TipoInsumo;
use Illuminate\Http\Request;

class TipoInsumoController extends Controller
{
    public function index()
    {
        return view('vistas.tipos.index',
            [
                'tipos' => TipoInsumo::paginate(10),
            ]);
    }

    public function create()
    {
        return view('vistas.tipos.create');
    }


    public function store(Request $request)
    {
        $tipo = new TipoInsumo();
        $tipo->nombre = $request['nombre'];
        $tipo->save();

        return redirect('tipos');
    }

    public function edit($id)
    {
        return view('vistas.tipos.edit',
            [
                'tipo' => TipoInsumo::findOrFail($id),
            ]);
    }


    public function update(Request $request, $id)
    {
        $tipo = TipoInsumo::findOrFail($id);
        $tipo->nombre = $request['nombre'];
        $tipo->update();

        return redirect('tipos');
    }


    public function destroy($id)
    {
        $tipo = TipoInsumo::findOrFail($id);
        $tipo->delete();

        return redirect('tipos');
    }
}
