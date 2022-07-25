<?php

namespace App\Http\Controllers;

use App\DetalleSalida;
use App\Http\Requests\SalidaRequest;
use App\Salida;
use App\Insumo;
use App\Destinatario;
use Illuminate\Support\Facades\DB;
use Exception;

class SalidaController extends Controller
{
    public function index()
    {
        return view('vistas.salidas.index',
            [
                'salidas' => Salida::all(),
            ]);
    }

    public function create()
    {
        return view('vistas.salidas.create',
            [
                'insumos' => Insumo::all(),
                'tipos' => ['Contado', 'Credito'],
                'destinatarios' => Destinatario::all(),
            ]);
    }

    public function show($id){
        //dd(Salida::with('destinatario', 'detalles', 'detalles.insumo')->get());
        return view('vistas.salidas.show',
            [
                'salida' => Salida::findOrFail($id),
            ]);
    }


    public function store(SalidaRequest $request)
    {
        $mensaje = '';
        try {
            DB::beginTransaction();

            $salida = new Salida();
            $salida->fecha = $request['fecha'];
            $salida->nro_nota = $request['nro_nota'];
            $salida->total = $request['total'];
            $salida->tipo = $request['tipo'];
            $salida->destinatario_id = $request['destinatario_id'];
            $salida->save();

            $insumo = $request->get('idInsumoT');
            $cant = $request->get('cantidadT');
            $precio_unitario = $request->get('precioT');
            $cont = 0;

            while ($cont < count($insumo)) {
                $detalle = new DetalleSalida();
                $detalle->cantidad = $cant[$cont];
                $detalle->precio_unitario = $precio_unitario[$cont];
                $detalle->insumo_id = $insumo[$cont];
                $detalle->salida_id = $salida->id;
                $detalle->save();

                $insumoAct = Insumo::findOrfail($detalle->insumo_id);
                if ($insumoAct->existencias < $detalle->cantidad) throw new  \Exception("");
                $insumoAct->existencias = $insumoAct->existencias - $detalle->cantidad;
                $insumoAct->update();

                $cont = $cont + 1;
            }

            DB::commit();
            $mensaje = 'Salida creada exitosamente.';

        } catch (Exception $e) {

            DB::rollback();
            $mensaje = 'No se pudo crear la salida.';

        }

        return redirect('salidas')->with(['message' => $mensaje]);

    }


    public function edit($id){

        return view('vistas.salidas.edit',
            [
                'salida' => Salida::findOrFail($id),
                'insumos' => Insumo::all(),
                'tipos' => ['Contado', 'Credito'],
                'destinatarios' => Destinatario::all(),
                'detalles' => DB::table('detalle_salida')
                    ->join('insumo', 'detalle_salida.insumo_id', 'insumo.id')
                    ->join('unidad_medida','insumo.unidad_medida_id', 'unidad_medida.id')
                    ->where('detalle_salida.salida_id', '=', $id)
                    ->select(
                        'detalle_salida.id',
                        'detalle_salida.insumo_id',
                        'detalle_salida.cantidad',
                        'detalle_salida.precio_unitario',
                        'insumo.nombre as insumo',
                        'insumo.envase',
                        'unidad_medida.nombre as unidad'
                    )
                    ->get(),

            ]);
    }

    public function update(SalidaRequest $request, $id)
    {
        $mensaje = '';
        try {
            DB::beginTransaction();

            $salida = Salida::findOrFail($id);
            $salida->fecha = $request['fecha'];
            $salida->nro_nota = $request['nro_nota'];
            $salida->total = $request['total'];
            $salida->tipo = $request['tipo'];
            $salida->destinatario_id = $request['destinatario_id'];
            $salida->update();


            // eliminar el detalle anterior y restar a las existencias
            $deta = DetalleSalida::where('salida_id', '=', $id)->get();
            foreach ($deta as $det){
                $insa = Insumo::findOrFail($det->insumo_id);
                $insa->existencias = $insa->existencias + $det->cantidad;
                $insa->update();

                $det->delete();
            }

            $insumo = $request->get('idInsumoT');
            $cant = $request->get('cantidadT');
            $precio_unitario = $request->get('precioT');
            $cont = 0;

            while ($cont < count($insumo)) {
                $detalle = new DetalleSalida();
                $detalle->cantidad = $cant[$cont];
                $detalle->precio_unitario = $precio_unitario[$cont];
                $detalle->insumo_id = $insumo[$cont];
                $detalle->salida_id = $salida->id;
                $detalle->save();

                $insumoAct = Insumo::findOrfail($detalle->insumo_id);
                if ($insumoAct->existencias < $detalle->cantidad) throw new \Exception("failed");
                $insumoAct->existencias = $insumoAct->existencias - $detalle->cantidad;
                $insumoAct->update();

                $cont = $cont + 1;
            }

            DB::commit();
            $mensaje = 'Salida editada exitosamente.';

        } catch (Exception $e) {

            DB::rollback();
            $mensaje = 'No se pudo editar la salida.';

        }

        return redirect('salidas')->with(['message' => $mensaje]);

    }

    public function destroy($id)
    {
        $detalles = DetalleSalida::where('salida_id', '=', $id)->get();
        foreach ($detalles as $detalle){
            $insumoAct = Insumo::findOrfail($detalle->insumo_id);
            $insumoAct->existencias = $insumoAct->existencias + $detalle->cantidad;
            $insumoAct->update();
        }
        $salida = Salida::findOrFail($id);
        $salida->delete();

        return redirect('salidas')->with(['message' => 'Salida eliminada exitosamente.']);
    }
}
