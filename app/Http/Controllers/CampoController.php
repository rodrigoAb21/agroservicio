<?php

namespace App\Http\Controllers;

use App\Campo;
use Illuminate\Http\Request;

class CampoController extends Controller
{
    public function index()
    {
        return view('vistas.campos.index',
            [
                'campos' => Campo::paginate(10),
            ]);
    }

    public function create()
    {
        return view('vistas.campos.create');
    }


    public function store(Request $request)
    {
        $campo = new Campo();
        $campo->nombre = $request['nombre'];
        $campo->superficie = $request['superficie'];
        $campo->save();

        return redirect('campos');
    }

    public function edit($id)
    {
        return view('vistas.campos.edit',
            [
                'campo' => Campo::findOrFail($id),
            ]);
    }


    public function update(Request $request, $id)
    {
        $campo = Campo::findOrFail($id);
        $campo->nombre = $request['nombre'];
        $campo->superficie = $request['superficie'];
        $campo->update();

        return redirect('campos');
    }


    public function destroy($id)
    {
        $campo = Campo::findOrFail($id);
        $campo->delete();

        return redirect('campos');
    }
}
