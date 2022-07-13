@extends('layouts.index')

@section('contenido')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h3 class="pb-2">
                        INGRESO DE INSUMOS: {{$salida->id}}
                    </h3>
                    <div class="row">
                        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label><b>Fecha</b></label>
                                <input id="totalIngreso1" class="form-control" type="date" readonly value="{{$salida->fecha}}">
                            </div>
                        </div>


                        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label><b>Nro Nota</b></label>
                                <input name="nro_nota" class="form-control" type="text" value="{{$salida->nro_nota}}">
                            </div>
                        </div>


                        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label><b>Tipo</b></label>
                                <input id="totalIngreso1" class="form-control" type="text" readonly value="{{$salida->tipo}}">
                            </div>
                        </div>


                        <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label><b>Destinatario</b></label>
                                <input id="totalIngreso1" class="form-control" type="text" readonly value="{{$salida->destinatario->nombre.'- Núcleo: '.$salida->destinatario->nucleo}}">
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label><b>Costo Total $us</b></label>
                                <input id="totalIngreso1" class="form-control" type="text" readonly value="{{$salida->total}}">
                            </div>
                        </div>
                    </div>

                        <hr>
                    <h4>Detalle</h4>

                        <div class="table-responsive">
                            <table class="table table-hover table-bordered color-table info-table">
                                <thead>
                                <tr>
                                    <th class="text-center ">INSUMO</th>
                                    <th class="text-center">CANT</th>
                                    <th class="text-center">P. UNITARIO $us</th>
                                    <th class="text-center ">SUB-TOTAL $us</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($salida->detalles as $detalle)
                                    <tr class="text-center">
                                        <td>{{$detalle->insumo->nombre.' de '.$detalle->insumo->envase.$detalle->insumo->unidad->nombre}}</td>
                                        <td>{{$detalle->cantidad}}</td>
                                        <td>{{$detalle->precio_unitario}}</td>
                                        <td>{{$detalle->precio_unitario * $detalle->cantidad}}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>

                        </div>

                        <a href="{{url('salidas')}}" class="btn btn-warning">Atras</a>
                </div>
            </div>
        </div>
    </div>
@endsection
