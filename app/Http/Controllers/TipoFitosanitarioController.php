<?php

namespace App\Http\Controllers;

use App\TipoFitosanitario;
use Illuminate\Http\Request;

class TipoFitosanitarioController extends Controller
{
    public function index()
    {
        return view('vistas.config.tipoFitosanitarios.index',
            [
                'tipos' => TipoFitosanitario::paginate(10),
            ]);
    }

    public function create()
    {
        return view('vistas.config.tipoFitosanitarios.create');
    }


    public function store(Request $request)
    {
        $tipo = new TipoFitosanitario();
        $tipo->nombre = $request['nombre'];
        $tipo->save();

        return redirect('config/tipoFitosanitarios');
    }

    public function edit($id)
    {
        return view('vistas.config.tipoFitosanitarios.edit',
            [
                'tipo' => TipoFitosanitario::findOrFail($id),
            ]);
    }


    public function update(Request $request, $id)
    {
        $tipo = TipoFitosanitario::findOrFail($id);
        $tipo->nombre = $request['nombre'];
        $tipo->update();

        return redirect('config/tipoFitosanitarios');
    }


    public function destroy($id)
    {
        $tipo = TipoFitosanitario::findOrFail($id);
        $tipo->delete();

        return redirect('config/tipoFitosanitarios');
    }
}
