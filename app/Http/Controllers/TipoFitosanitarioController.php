<?php    //

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TipoFitosanitarioController extends Controller
{
    public function index()
    {
        return view('vistas.tipos.index',
            [
                'tipos' => TipoFitosanitario::paginate(10),
            ]);
    }

    public function create()
    {
        return view('vistas.tipos.create');
    }


    public function store(Request $request)
    {
        $tipo = new TipoFitosanitario();
        $tipo->nombre = $request['nombre'];
        $tipo->save();

        return redirect('tipos');
    }

    public function edit($id)
    {
        return view('vistas.tipos.edit',
            [
                'tipo' => TipoFitosanitario::findOrFail($id),
            ]);
    }


    public function update(Request $request, $id)
    {
        $tipo = TipoFitosanitario::findOrFail($id);
        $tipo->nombre = $request['nombre'];
        $tipo->update();

        return redirect('tipos');
    }


    public function destroy($id)
    {
        $tipo = TipoFitosanitario::findOrFail($id);
        $tipo->delete();

        return redirect('tipos');
    }
}
