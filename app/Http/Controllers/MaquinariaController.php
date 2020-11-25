<?php

namespace App\Http\Controllers;

use App\Maquinaria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

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
        return view('vistas.maquinarias.create');
    }


    public function store(Request $request)
    {
        $maquinaria = new Maquinaria();
        $maquinaria->nombre = $request['nombre'];
        if (Input::hasFile('foto')) {
            $file = Input::file('foto');
            $file->move(public_path().'/img/maquinarias/', $file->getClientOriginalName());
            $maquinaria->foto = $file->getClientOriginalName();
        }
        $maquinaria->descripcion = $request['descripcion'];
        $maquinaria->propiedad = $request['propiedad'];
        $maquinaria->marca = $request['marca'];
        $maquinaria->modelo = $request['modelo'];
        $maquinaria->color = $request['color'];
        $maquinaria->tipom_id = $request['tipom_id'];
        $maquinaria->save();

        return redirect('maquinarias');
    }

    public function edit($id)
    {
        return view('vistas.maquinarias.edit',
            [
                'maquinaria' => Maquinaria::findOrFail($id),
            ]);
    }


    public function update(Request $request, $id)
    {
        $maquinaria = Maquinaria::findOrFail($id);
        $maquinaria->nombre = $request['nombre'];
        if (Input::hasFile('foto')) {
            $file = Input::file('foto');
            $file->move(public_path().'/img/maquinarias/', $file->getClientOriginalName());
            $maquinaria->foto = $file->getClientOriginalName();
        }
        $maquinaria->descripcion = $request['descripcion'];
        $maquinaria->propiedad = $request['propiedad'];
        $maquinaria->marca = $request['marca'];
        $maquinaria->modelo = $request['modelo'];
        $maquinaria->color = $request['color'];
        $maquinaria->tipom_id = $request['tipom_id'];
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
