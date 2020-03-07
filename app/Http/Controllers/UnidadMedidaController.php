<?php

namespace App\Http\Controllers;

use App\UnidadMedida;
use Illuminate\Http\Request;

class UnidadMedidaController extends Controller
{
    public function index()
    {
        return view('vistas.unidades.index',
            [
                'unidades' => UnidadMedida::paginate(10),
            ]);
    }

    public function create()
    {
        return view('vistas.unidades.create');
    }


    public function store(Request $request)
    {
        $unidad = new UnidadMedida();
        $unidad->nombre = $request['nombre'];
        $unidad->save();

        return redirect('unidades');
    }

    public function edit($id)
    {
        return view('vistas.unidades.edit',
            [
                'unidad' => UnidadMedida::findOrFail($id),
            ]);
    }


    public function update(Request $request, $id)
    {
        $unidad = UnidadMedida::findOrFail($id);
        $unidad->nombre = $request['nombre'];
        $unidad->update();

        return redirect('unidades');
    }


    public function destroy($id)
    {
        $unidad = UnidadMedida::findOrFail($id);
        $unidad->delete();

        return redirect('unidades');
    }
}
