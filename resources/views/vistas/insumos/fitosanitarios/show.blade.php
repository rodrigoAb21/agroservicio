@extends('layouts.index')

@section('contenido')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h3 class="pb-2">
                        Ver Fitosanitario: {{$insumo->nombre}}
                    </h3>
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <h5><b>Nombre</b></h5>
                                <p>
                                    {{$insumo->nombre}}
                                </p>
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <h5><b>Ingrediente Activo</b></h5>
                                <p>{{$insumo->ingrediente_activo}}</p>
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <h5><b>Tipo de Insumo</b></h5>
                                <p>{{$insumo->tipoFitosanitario->nombre}}</p>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <h5><b>Unidad de Medida</b></h5>
                                <p>{{$insumo->unidad->nombre}}</p>
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <h5><b>Info</b></h5>
                                <p>{{$insumo->info}}</p>
                            </div>
                        </div>

                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="table-responsive">
                                <table class="table table-hover table-bordered color-table info-table">
                                    <thead>
                                    <tr>
                                        <th class="text-center">CULTIVO</th>
                                        <th class="text-center">PLAGA</th>
                                        <th class="text-center">DOSIS</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($detalles as $detalle)
                                        <tr class="text-center">

                                            <td>{{$detalle -> cultivo}}</td>
                                            <td>{{$detalle -> plaga}}</td>
                                            <td>{{$detalle -> dosis}}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>


                    </div>
                    <a href="{{url('insumos/fitosanitarios')}}" class="btn btn-warning">Atras</a>


                </div>
            </div>
        </div>
    </div>
@endsection
