<?php

namespace App\Http\Controllers;

use App\DetalleIngreso;
use App\Ingreso;
use App\Insumo;
use App\Proveedor;
use Illuminate\Http\Request;

class IngresoController extends Controller
{
    public function index()
    {
        return view('vistas.ingresos.index',
            [
                'ingresos' => Ingreso::paginate(10),
            ]);
    }

    public function create()
    {
        return view('vistas.ingresos.create',
            [
                'insumos' => Insumo::all(),
                'proveedores' => Proveedor::all(),
            ]);
    }


    public function store(Request $request)
    {

        try {
            DB::beginTransaction();

            $ingreso = new Ingreso();
            $ingreso->fecha = $request['fecha'];
            $ingreso->total = $request['total'];
            $ingreso->proveedor_id = $request['proveedor_id'];
            $ingreso->save();

            $insumo = $request->get('insumoT');
            $cant = $request->get('cantT');
            $precio_unitario = $request->get('precioT');
            $cont = 0;

            while ($cont < count($insumo)) {
                $detalle = new DetalleIngreso();
                $detalle->cantidad = $cant[$cont];
                $detalle->precio_unitario = $precio_unitario[$cont];
                $detalle->insumo_id = $insumo[$cont];
                $detalle->ingreso_id = $ingreso->id;
                $detalle->save();

                $insumoAct = Insumo::findOrfail($detalle->insumo_id);
                $insumoAct->existencias = $insumoAct->existencias + $detalle->cantidad;
                $insumoAct->update();

                $cont = $cont + 1;
            }

            DB::commit();

        } catch (Exception $e) {

            DB::rollback();

        }

        return redirect('ingresos');

    }

    public function destroy($id)
    {
        $detalles = DetalleIngreso::where('ingreso_id', '=', $id)->get();
        foreach ($detalles as $detalle){
            $insumoAct = Insumo::findOrfail($detalle->insumo_id);
            $insumoAct->existencias = $insumoAct->existencias - $detalle->cantidad;
            $insumoAct->update();
        }
        $ingreso = Ingreso::findOrFail($id);
        $ingreso->delete();

        return redirect('ingresos');
    }
}
