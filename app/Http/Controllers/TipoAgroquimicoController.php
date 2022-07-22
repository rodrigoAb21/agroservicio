<?php

namespace App\Http\Controllers;

use App\Http\Requests\TipoAgroquimicoRequest;
use App\Subtipo;
use Illuminate\Http\Request;

class TipoAgroquimicoController extends Controller
{
    public function index()
    {
        return view('vistas.config.tipoAgroquimicos.index',
            [
                'tipos' => Subtipo::where('tipo', '=', 'Agroquimico')->paginate(10),
            ]);
    }

    public function create()
    {
        return view('vistas.config.tipoAgroquimicos.create');
    }


    public function store(TipoAgroquimicoRequest $request)
    {
        $tipo = new Subtipo();
        $tipo->nombre = $request['nombre'];
        $tipo->tipo = 'TipoAgroquimico';
        $tipo->save();

        return redirect('config/tipoAgroquimicos');
    }

    public function edit($id)
    {
        return view('vistas.config.tipoAgroquimicos.edit',
            [
                'tipo' => Subtipo::findOrFail($id),
            ]);
    }


    public function update(TipoAgroquimicoRequest $request, $id)
    {
        $tipo = Subtipo::findOrFail($id);
        $tipo->nombre = $request['nombre'];
        $tipo->update();

        return redirect('config/tipoAgroquimicos');
    }


    public function destroy($id)
    {
        $tipo = Subtipo::findOrFail($id);
        $tipo->delete();

        return redirect('config/tipoAgroquimicos');
    }
}
