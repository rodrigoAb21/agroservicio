<?php

namespace App\Http\Controllers;

use App\Http\Requests\AgroquimicoRequest;
use App\Models\Composicion;
use App\Models\Insumo;
use App\Models\Subtipo;
use App\Models\UnidadMedida;
use Illuminate\Support\Facades\DB;
use Exception;

class AgroquimicoController extends Controller
{
    public function index()
    {
        return view('vistas.insumos.agroquimicos.index',
            [
                'insumos' => Insumo::where('insumo.tipo','=', 'Agroquimico')->get(),
            ]);
    }

    public function create()
    {
        return view('vistas.insumos.agroquimicos.create',
            [
                'unidades' => UnidadMedida::all(),
                'tipos' => Subtipo::where('tipo', '=', 'Agroquimico')->get(),
            ]);
    }


    public function store(AgroquimicoRequest $request)
    {
        $mensaje = '';
        try {
            DB::beginTransaction();

            $insumo = new Insumo();
            $insumo->nombre = $request['nombre'];
            $insumo->tipo = 'Agroquimico';
            $insumo->existencias = 0;
            $insumo->envase = $request['envase'];
            $insumo->info = $request['info'];
            $insumo->subtipo_id = $request['subtipo_id'];
            $insumo->unidad_medida_id = $request['unidad_medida_id'];
            $insumo->save();

            $ingrediente_activo = $request->get('ingrediente_activoT');


            $composicionNombres = '';
            if($ingrediente_activo){
                $concentracion = $request->get('concentracionT');
                $cont = 0;

                while ($cont < count($ingrediente_activo)) {
                    $composicion = new Composicion();
                    $composicionNombres = $composicionNombres . $ingrediente_activo[$cont] . ", ";
                    $composicion->ingrediente_activo = $ingrediente_activo[$cont];
                    $composicion->concentracion = $concentracion[$cont];
                    $composicion->insumo_id = $insumo->id;
                    $composicion->save();

                    $cont = $cont + 1;
                }
                $composicionNombres= trim($composicionNombres, ', ') . '.';
            }
            $insumo->composicion = $composicionNombres;
            $insumo->update();

            DB::commit();
            $mensaje = 'Agroquímico creado exitosamente.';

        } catch (Exception $e) {

            DB::rollback();
            $mensaje = 'No se pudo crear el agroquímico.';


        }

        return redirect('insumos/agroquimicos')->with(['message' => $mensaje]);
    }

    public function edit($id)
    {
        return view('vistas.insumos.agroquimicos.edit',
            [
                'insumo' => Insumo::findOrFail($id),
                'unidades' => UnidadMedida::all(),
                'tipos' => Subtipo::where('tipo', '=', 'Agroquimico')->get(),
                'detalles' => Composicion::where('insumo_id','=', $id)->get(),
            ]);
    }

    public function show($id)
    {
        return view('vistas.insumos.agroquimicos.show',
            [
                'insumo' => Insumo::findOrFail($id),
                'detalles' => Composicion::where('insumo_id','=', $id)->get(),
            ]);
    }


    public function update(AgroquimicoRequest $request, $id)
    {
        $mensaje = '';
        try {
            DB::beginTransaction();
            $insumo = Insumo::findOrFail($id);
            $insumo->nombre = $request['nombre'];
            $insumo->envase = $request['envase'];
            $insumo->info = $request['info'];
            $insumo->subtipo_id = $request['subtipo_id'];
            $insumo->unidad_medida_id = $request['unidad_medida_id'];

            if ($insumo->update()){
                DB::table('composicion')->where('insumo_id', '=', $id)->delete();
                $ingrediente_activo = $request->get('ingrediente_activoT');
                $composicionNombres = '';
                if($ingrediente_activo){
                    $concentracion = $request->get('concentracionT');
                    $cont = 0;

                    while ($cont < count($ingrediente_activo)) {
                        $composicion = new Composicion();
                        $composicionNombres = $composicionNombres . $ingrediente_activo[$cont] . ", ";
                        $composicion->ingrediente_activo = $ingrediente_activo[$cont];
                        $composicion->concentracion = $concentracion[$cont];
                        $composicion->insumo_id = $insumo->id;
                        $composicion->save();

                        $cont = $cont + 1;
                    }
                    $composicionNombres= trim($composicionNombres, ', ') . '.';
                }
                $insumo->composicion = $composicionNombres;
                $insumo->update();
            }

            DB::commit();
            $mensaje = 'Agroquímico editado exitosamente.';
        } catch (Exception $e) {

            DB::rollback();
            $mensaje = 'No se pudo editar el agroquímico.';
        }

        return redirect('insumos/agroquimicos')->with(['message' => $mensaje]);
    }


    public function destroy($id)
    {
        $insumo = Insumo::findOrFail($id);
        $insumo->delete();

        return redirect('insumos/agroquimicos')->with(['message' => 'Agroquímico eliminado exitosamente.']);
    }
}
