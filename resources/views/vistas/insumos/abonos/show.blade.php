@extends('layouts.index')

@section('contenido')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h3 class="pb-2">
                        INGRESO DE SUMINISTROS: {{$ingreso->id}}
                    </h3>

                        {{csrf_field()}}
                        <div class="row">
                            <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <h5>Fecha</h5>
                                    <p>{{$ingreso->fecha}}</p>
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <h5>Proveedor</h5>
                                    <p>{{$ingreso->proveedor->nombre}}</p>
                                </div>
                            </div>

                            <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <h5>Total</h5>
                                    <p>{{$ingreso->total}}</p>
                                </div>
                            </div>

                        </div>
                        <hr>
                    <h4>Detalle</h4>

                        <div class="table-responsive">
                            <table class="table table-hover table-bordered color-table info-table">
                                <thead>
                                <tr>
                                    <th class="text-center w-50">INSUMO</th>
                                    <th class="text-center">CANT</th>
                                    <th class="text-center">P. UNITARIO</th>
                                    <th class="text-center w-25">SUB-TOTAL</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($ingreso->detalles as $detalle)
                                    <tr class="text-center">
                                        <td>{{$detalle->insumo->nombre}}</td>
                                        <td>{{$detalle->cantidad}}</td>
                                        <td>{{$detalle->precio_unitario}}</td>
                                        <td>{{$detalle->precio_unitario * $detalle->cantidad}}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>

                        </div>

                        <a href="{{url('ingresos')}}" class="btn btn-warning">Atras</a>
                </div>
            </div>
        </div>
    </div>
@endsection
