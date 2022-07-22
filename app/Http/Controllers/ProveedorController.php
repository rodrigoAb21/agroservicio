<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProveedorRequest;
use App\Proveedor;
use Illuminate\Http\Request;

class ProveedorController extends Controller
{
    public function index()
    {
        return view('vistas.proveedores.index',
            [
                'proveedores' => Proveedor::paginate(10),
            ]);
    }

    public function create()
    {
        return view('vistas.proveedores.create');
    }


    public function store(ProveedorRequest $request)
    {
        $proveedor = new Proveedor();
        $proveedor->tecnico = $request['tecnico'];
        $proveedor->telf1 = $request['telf1'];
        $proveedor->telf2 = $request['telf2'];
        $proveedor->empresa = $request['empresa'];
        $proveedor->save();

        return redirect('proveedores');
    }

    public function edit($id)
    {
        return view('vistas.proveedores.edit',
            [
                'proveedor' => Proveedor::findOrFail($id),
            ]);
    }

    public function show($id)
    {
        return view('vistas.proveedores.show',
            [
                'proveedor' => Proveedor::findOrFail($id),
            ]);
    }


    public function update(ProveedorRequest $request, $id)
    {
        $proveedor = Proveedor::findOrFail($id);
        $proveedor->tecnico = $request['tecnico'];
        $proveedor->empresa = $request['empresa'];
        $proveedor->telf1 = $request['telf1'];
        $proveedor->telf2 = $request['telf2'];
        $proveedor->update();

        return redirect('proveedores');
    }


    public function destroy($id)
    {
        $proveedor = Proveedor::findOrFail($id);
        $proveedor->delete();

        return redirect('proveedores');
    }
}
