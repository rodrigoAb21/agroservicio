<?php

namespace App\Http\Controllers;

use App\Models\Destinatario;
use App\Http\Requests\DestinatarioRequest;


class DestinatarioController extends Controller
{
    public function index()
    {
        return view('vistas.destinatarios.index',
            [
                'destinatarios' => Destinatario::all(),
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

        return redirect('destinatarios')->with(['message' => 'Destinatario creado exitosamente.']);;
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

        return redirect('destinatarios')->with(['message' => 'Destinatario editado exitosamente.']);;
    }


    public function destroy($id)
    {
        $destinatario = Destinatario::findOrFail($id);
        $destinatario->delete();

        return redirect('destinatarios')->with(['message' => 'Destinatario eliminado exitosamente.']);;
    }
}
