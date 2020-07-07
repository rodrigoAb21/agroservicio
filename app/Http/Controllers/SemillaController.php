<?php

namespace App\Http\Controllers;

use App\Insumo;
use App\TipoInsumo;
use App\UnidadMedida;
use Illuminate\Http\Request;

class SemillaController extends Controller
{
    public function index()
    {
        return view('vistas.insumos.semillas.index',
            [
                'insumos' => Insumo::where('tipo','=', 'Semilla')->paginate(10),
            ]);
    }

    public function create()
    {
        return view('vistas.insumos.semillas.create',
            [
                'unidades' => UnidadMedida::all(),
            ]);
    }


    public function store(Request $request)
    {
        
        $insumo = new Insumo();
        $insumo->nombre = $request['nombre'];
        $insumo->contenido_total = $request['contenido_total'];
        $insumo->info = $request['info'];
        $insumo->existencias = 0;
        $insumo->tipo = 'Semilla';
        $insumo->unidad_medida_id = $request['unidad_medida_id'];
        $insumo->save();

        return redirect('insumos/semillas');
    }

    public function edit($id)
    {
        return view('vistas.insumos.semillas.edit',
            [
                'insumo' => Insumo::findOrFail($id),
                'unidades' => UnidadMedida::all(),
            ]);
    }


    public function update(Request $request, $id)
    {
    
        $insumo = Insumo::findOrFail($id);
        $insumo->nombre = $request['nombre'];
        $insumo->contenido_total = $request['contenido_total'];
        $insumo->info = $request['info'];
        $insumo->unidad_medida_id = $request['unidad_medida_id'];
        $insumo->save();

        return redirect('insumos/semillas');
    }


    public function destroy($id)
    {
        $insumo = Insumo::findOrFail($id);
        $insumo->delete();

        return redirect('insumos/semillas');
    }
}
