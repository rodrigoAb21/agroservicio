<?php

namespace App\Http\Controllers;

use App\DetalleIngreso;
use App\Http\Requests\IngresoRequest;
use App\Ingreso;
use App\Insumo;
use App\Proveedor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IngresoController extends Controller
{
    public function index()
    {
        return view('vistas.ingresos.index',
            [
                'ingresos' => Ingreso::paginate(10),
            ]);
    }

    public function show($id){

        return view('vistas.ingresos.show',
            [
                'ingreso' => Ingreso::findOrFail($id),
            ]);
    }

    public function create()
    {
        return view('vistas.ingresos.create',
            [
                'insumos' => Insumo::all(),
                'tipos' => ['Contado', 'Credito'],
                'proveedores' => Proveedor::all(),
            ]);
    }

    public function store(IngresoRequest $request)
    {
        $mensaje = '';
        try {
            DB::beginTransaction();

            $ingreso = new Ingreso();
            $ingreso->fecha = $request['fecha'];
            $ingreso->nro_nota = $request['nro_nota'];
            $ingreso->total = $request['total'];
            $ingreso->tipo = $request['tipo'];
            $ingreso->proveedor_id = $request['proveedor_id'];
            $ingreso->save();

            $insumo = $request->get('idInsumoT');
            $cant = $request->get('cantidadT');
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
            $mensaje = 'Ingreso creado exitosamente.';

        } catch (Exception $e) {

            DB::rollback();
            $mensaje = 'No se ha podido crear el ingreso.';
        }

        return redirect('ingresos')->with(['message' => $mensaje]);

    }

    public function edit($id){

        return view('vistas.ingresos.edit',
            [
                'ingreso' => Ingreso::findOrFail($id),
                'insumos' => Insumo::all(),
                'tipos' => ['Contado', 'Credito'],
                'proveedores' => Proveedor::all(),
                'detalles' => DB::table('detalle_ingreso')
                    ->join('insumo', 'detalle_ingreso.insumo_id', 'insumo.id')
                    ->join('unidad_medida','insumo.unidad_medida_id', 'unidad_medida.id')
                    ->where('detalle_ingreso.ingreso_id', '=', $id)
                    ->select(
                        'detalle_ingreso.id',
                        'detalle_ingreso.insumo_id',
                        'detalle_ingreso.cantidad',
                        'detalle_ingreso.precio_unitario',
                        'insumo.nombre as insumo',
                        'insumo.envase',
                        'unidad_medida.nombre as unidad'
                    )
                    ->get(),

            ]);
    }


    public function update(IngresoRequest $request, $id)
    {
        $mensaje = '';
        try {
            DB::beginTransaction();

            $ingreso = Ingreso::findOrFail($id);
            $ingreso->fecha = $request['fecha'];
            $ingreso->nro_nota = $request['nro_nota'];
            $ingreso->total = $request['total'];
            $ingreso->tipo = $request['tipo'];
            $ingreso->proveedor_id = $request['proveedor_id'];
            $ingreso->update();


            // eliminar el detalle anterior y restar a las existencias
            $deta = DetalleIngreso::where('ingreso_id', '=', $id)->get();
            foreach ($deta as $det){
                $insa = Insumo::findOrFail($det->insumo_id);
                $insa->existencias = $insa->existencias - $det->cantidad;
                $insa->update();

                $det->delete();
            }

            $insumo = $request->get('idInsumoT');
            $cant = $request->get('cantidadT');
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
            $mensaje = 'Ingreso editado exitosamente.';

        } catch (Exception $e) {

            DB::rollback();
            $mensaje = 'No se pudo editar el ingreso.';
        }

        return redirect('ingresos')->with(['message' => $mensaje]);

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

        return redirect('ingresos')->with(['message' => 'Ingreso eliminado exitosamente.']);
    }
}
