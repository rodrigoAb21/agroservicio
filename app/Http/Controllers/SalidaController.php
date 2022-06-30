<?php

namespace App\Http\Controllers;

use App\DetalleSalida;
use App\Salida;
use App\Insumo;
use App\Destinatario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SalidaController extends Controller
{
    public function index()
    {
        return view('vistas.salidas.index',
            [
                'salidas' => Salida::paginate(10),
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


    public function store(Request $request)
    {

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
                $insumoAct->existencias = $insumoAct->existencias + $detalle->cantidad;
                $insumoAct->update();

                $cont = $cont + 1;
            }

            DB::commit();

        } catch (Exception $e) {

            DB::rollback();

        }

        return redirect('salidas');

    }

    public function destroy($id)
    {
        $detalles = DetalleSalida::where('salida_id', '=', $id)->get();
        foreach ($detalles as $detalle){
            $insumoAct = Insumo::findOrfail($detalle->insumo_id);
            $insumoAct->existencias = $insumoAct->existencias - $detalle->cantidad;
            $insumoAct->update();
        }
        $salida = Salida::findOrFail($id);
        $salida->delete();

        return redirect('salidas');
    }
}
