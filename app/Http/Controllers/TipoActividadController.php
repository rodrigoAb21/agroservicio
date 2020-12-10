<?php

namespace App\Http\Controllers;

use App\TipoActividad;
use Illuminate\Http\Request;

class TipoActividadController extends Controller
{
    public function index()
    {
        return view('vistas.config.tiposactividad.index',
            [
                'tiposactividad' => TipoActividad::paginate(10),
            ]);
    }

    public function create()
    {
        return view('vistas.config.tiposactividad.create');
    }


    public function store(Request $request)
    {
        $tipoactividad = new TipoActividad();
        $tipoactividad->nombre = $request['nombre'];
        $tipoactividad->precio_base = $request['precio_base'];
        $tipoactividad->save();

        return redirect('config/tiposactividad');
    }

    public function edit($id)
    {
        return view('vistas.config.tiposactividad.edit',
            [
                'tipoactividad' => TipoActividad::findOrFail($id),
            ]);
    }


    public function update(Request $request, $id)
    {
        $tipoactividad = TipoActividad::findOrFail($id);
        $tipoactividad->nombre = $request['nombre'];
        $tipoactividad->precio_base = $request['precio_base'];
        $tipoactividad->update();

        return redirect('config/tiposactividad');
    }


    public function destroy($id)
    {
        $tipoactividad = TipoActividad::findOrFail($id);
        $tipoactividad->delete();

        return redirect('config/tiposactividad');
    }
}
