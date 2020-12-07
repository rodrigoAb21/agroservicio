<?php

namespace App\Http\Controllers;

use App\Maquinaria;
use Illuminate\Http\Request;

class MaquinariaController extends Controller
{
    public function index()
    {
        return view('vistas.maquinarias.index',
            [
                'maquinarias' => Maquinaria::paginate(10),
            ]);
    }

    public function create()
    {
        $tipos=['Vehiculo', 'Implemento'];
        return view('vistas.maquinarias.create', ['tipos' => $tipos]);
    }


    public function store(Request $request)
    {
        $maquinaria = new Maquinaria();
        $maquinaria->nombre = $request['nombre'];
        $maquinaria->color = $request['color'];
        $maquinaria->tipo = $request['tipo'];
        $maquinaria->save();

        return redirect('maquinarias');
    }

    public function edit($id)
    {
        $tipos=['Vehiculo', 'Implemento'];
        return view('vistas.maquinarias.edit',
            [
                'maquinaria' => Maquinaria::findOrFail($id),
                'tipos' => $tipos,
            ]);
    }


    public function update(Request $request, $id)
    {
        $maquinaria = Maquinaria::findOrFail($id);
        $maquinaria->nombre = $request['nombre'];
        $maquinaria->color = $request['color'];
        $maquinaria->tipo = $request['tipo'];
        $maquinaria->update();

        return redirect('maquinarias');
    }


    public function destroy($id)
    {
        $maquinaria = Maquinaria::findOrFail($id);
        $maquinaria->delete();

        return redirect('maquinarias');
    }
}
