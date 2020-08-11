<?php

namespace App\Http\Controllers;

use App\Terreno;
use Illuminate\Http\Request;

class TerrenoController extends Controller
{
    public function index()
    {
        return view('vistas.terrenos.index',
            [
                'terrenos' => Terreno::paginate(10),
            ]);
    }

    public function create()
    {
        return view('vistas.terrenos.create');
    }


    public function store(Request $request)
    {
        $terreno = new Terreno();
        $terreno->nombre = $request['nombre'];
        $terreno->superficie = $request['superficie'];
        $terreno->save();

        return redirect('terrenos');
    }

    public function edit($id)
    {
        return view('vistas.terrenos.edit',
            [
                'terreno' => Terreno::findOrFail($id),
            ]);
    }


    public function update(Request $request, $id)
    {
        $terreno = Terreno::findOrFail($id);
        $terreno->nombre = $request['nombre'];
        $terreno->superficie = $request['superficie'];
        $terreno->update();

        return redirect('terrenos');
    }


    public function destroy($id)
    {
        $terreno = Terreno::findOrFail($id);
        $terreno->delete();

        return redirect('terrenos');
    }
}
