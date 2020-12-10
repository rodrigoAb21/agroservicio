<?php

namespace App\Http\Controllers;

use App\Trabajador;
use Illuminate\Http\Request;

class TrabajadorController extends Controller
{
    public function index()
    {
        return view('vistas.trabajadores.index',
            [
                'trabajadores' => Trabajador::paginate(10),
            ]);
    }

    public function create()
    {

        return view('vistas.trabajadores.create');
    }


    public function store(Request $request)
    {
        $trabajador = new Trabajador();
        $trabajador->nombre = $request['nombre'];
        $trabajador->telefono = $request['telefono'];
        $trabajador->save();

        return redirect('trabajadores');
    }

    public function edit($id)
    {
        return view('vistas.trabajadores.edit',
            [
                'trabajador' => Trabajador::findOrFail($id),
            ]);
    }


    public function update(Request $request, $id)
    {
        $trabajador = Trabajador::findOrFail($id);
        $trabajador->nombre = $request['nombre'];
        $trabajador->telefono = $request['telefono'];
        $trabajador->update();

        return redirect('trabajadores');
    }


    public function destroy($id)
    {
        $trabajador = Trabajador::findOrFail($id);
        $trabajador->delete();

        return redirect('trabajadores');
    }
}
