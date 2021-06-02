<?php

namespace App\Http\Controllers;

use App\Composicion;
use App\Insumo;
use App\Subtipo;
use App\UnidadMedida;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AgroquimicoController extends Controller
{
    public function index(Request $request)
    {
        $busqueda = trim($request['busqueda']);
        $agroquimicos = Insumo::where('insumo.tipo','=', 'Agroquimico')
            ->join('subtipo', 'insumo.subtipo_id', '=', 'subtipo.id')
            ->join('unidad_medida', 'insumo.unidad_medida_id', '=', 'unidad_medida.id')
            ->where(function ($query) use ($busqueda) {
                $query->where('insumo.nombre', 'like', '%'.$busqueda.'%')
                    ->orWhere('subtipo.nombre', 'like', '%'.$busqueda.'%')
                    ->orWhere('insumo.composicion', 'like', '%'.$busqueda.'%')
                ;}
            )
            ->orderBy('insumo.nombre')
            ->select(
                'insumo.nombre',
                'insumo.id',
                'insumo.existencias',
                'insumo.composicion',
                'subtipo.nombre as tipo',
                'unidad_medida.nombre as unidad')
            ->paginate(10);
        return view('vistas.insumos.agroquimicos.index',
            [
                'insumos' => $agroquimicos,
                'busqueda' => $busqueda,
            ]);
    }

    public function getComposicion($nombres){
        $composicion = '';


    }

    public function create()
    {
        return view('vistas.insumos.agroquimicos.create',
            [
                'unidades' => UnidadMedida::all(),
                'tipos' => Subtipo::where('tipo', '=', 'Agroquimico')->get(),
            ]);
    }


    public function store(Request $request)
    {

        try {
            DB::beginTransaction();

            $insumo = new Insumo();
            $insumo->nombre = $request['nombre'];
            $insumo->tipo = 'Agroquimico';
            $insumo->existencias = 0;
            $insumo->precio = $request['precio'];
            $insumo->info = $request['info'];
            $insumo->subtipo_id = $request['subtipo_id'];
            $insumo->unidad_medida_id = $request['unidad_medida_id'];
            $insumo->save();

            $nombre = $request->get('nombreT');


            $composicionNombres = '';
            if($nombre){
                $concentracion = $request->get('concentracionT');
                $cont = 0;

                while ($cont < count($nombre)) {
                    $composicion = new Composicion();
                    $composicionNombres = $composicionNombres . $nombre[$cont] . ", ";
                    $composicion->nombre = $nombre[$cont];
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

        } catch (Exception $e) {

            DB::rollback();

        }



        return redirect('insumos/agroquimicos');
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


    public function update(Request $request, $id)
    {
        try {
            DB::beginTransaction();
            $insumo = Insumo::findOrFail($id);
            $insumo->nombre = $request['nombre'];
            $insumo->precio = $request['precio'];
            $insumo->info = $request['info'];
            $insumo->subtipo_id = $request['subtipo_id'];
            $insumo->unidad_medida_id = $request['unidad_medida_id'];

            if ($insumo->update()){
                DB::table('composicion')->where('insumo_id', '=', $id)->delete();
                $nombre = $request->get('nombreT');
                $composicionNombres = '';
                if($nombre){
                    $concentracion = $request->get('concentracionT');
                    $cont = 0;

                    while ($cont < count($nombre)) {
                        $composicion = new Composicion();
                        $composicionNombres = $composicionNombres . $nombre[$cont] . ", ";
                        $composicion->nombre = $nombre[$cont];
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

        } catch (Exception $e) {

            DB::rollback();

        }



        return redirect('insumos/agroquimicos');
    }


    public function destroy($id)
    {
        $insumo = Insumo::findOrFail($id);
        $insumo->delete();

        return redirect('insumos/agroquimicos');
    }
}
