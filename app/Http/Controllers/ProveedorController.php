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
        $proveedor->contacto = $request['contacto'];
        $proveedor->celular = $request['celular'];
        $proveedor->empresa = $request['empresa'];
        $proveedor->tel_empresa = $request['tel_empresa'];
        $proveedor->dir_empresa = $request['dir_empresa'];
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


    public function update(Request $request, $id)
    {
        $proveedor = Proveedor::findOrFail($id);
        $proveedor->contacto = $request['contacto'];
        $proveedor->celular = $request['celular'];
        $proveedor->empresa = $request['empresa'];
        $proveedor->tel_empresa = $request['tel_empresa'];
        $proveedor->dir_empresa = $request['dir_empresa'];
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
