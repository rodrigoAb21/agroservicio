<?php

namespace App\Http\Controllers;

use App\Http\Requests\TipoSemillaRequest;
use App\Subtipo;
use Illuminate\Http\Request;

class TipoSemillaController extends Controller
{
    public function index()
    {
        return view('vistas.config.tipoSemillas.index',
            [
                'tipos' => Subtipo::where('tipo', '=', 'Semilla')->paginate(10),
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
        $tipo->tipo = 'TipoSemilla';
        $tipo->save();

        return redirect('config/tipoSemillas');
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

        return redirect('config/tipoSemillas');
    }


    public function destroy($id)
    {
        $tipo = Subtipo::findOrFail($id);
        $tipo->delete();

        return redirect('config/tipoSemillas');
    }
}
