<?php

namespace App\Http\Controllers;

use App\Destinatario;
use App\Http\Requests\DestinatarioRequest;
use Illuminate\Http\Request;

class DestinatarioController extends Controller
{
    public function index()
    {
        return view('vistas.destinatarios.index',
            [
                'destinatarios' => Destinatario::paginate(10),
            ]);
    }

    public function create()
    {
        return view('vistas.destinatarios.create');
    }


    public function store(DestinatarioRequest $request)
    {
        $destinatario = new Destinatario();
        $destinatario->nombre = $request['nombre'];
        $destinatario->nucleo = $request['nucleo'];
        $destinatario->save();

        return redirect('destinatarios');
    }

    public function edit($id)
    {
        return view('vistas.destinatarios.edit',
            [
                'destinatario' => Destinatario::findOrFail($id),
            ]);
    }


    public function update(DestinatarioRequest $request, $id)
    {
        $destinatario = Destinatario::findOrFail($id);
        $destinatario->nombre = $request['nombre'];
        $destinatario->nucleo = $request['nucleo'];
        $destinatario->update();

        return redirect('destinatarios');
    }


    public function destroy($id)
    {
        $destinatario = Destinatario::findOrFail($id);
        $destinatario->delete();

        return redirect('destinatarios');
    }
}
