<?php

namespace App\Http\Controllers;

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


    public function store(Request $request)
    {
        $proveedor = new Proveedor();
        $proveedor->nombre = $request['nombre'];
        $proveedor->direccion = $request['direccion'];
        $proveedor->telefono = $request['telefono'];
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


    public function update(Request $request, $id)
    {
        $proveedor = Proveedor::findOrFail($id);
        $proveedor->nombre = $request['nombre'];
        $proveedor->direccion = $request['direccion'];
        $proveedor->telefono = $request['telefono'];
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
