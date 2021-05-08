@extends('layouts.index')

@section('contenido')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h3 class="pb-2">
                        Ver Agroquimico: {{$insumo->nombre}}
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
                                <h5><b>Distribuidor</b></h5>
                                <p>{{$insumo->distribuidor}}</p>
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <h5><b>Tipo de Insumo</b></h5>
                                <p>{{$insumo->subtipo->nombre}}</p>
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <h5><b>Contenido Total</b></h5>
                                <p>{{$insumo->contenido}} {{$insumo->unidad->nombre}}</p>
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
                                        <th class="text-center">NOMBRE</th>
                                        <th class="text-center">CONCENTRACION</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($detalles as $detalle)
                                        <tr class="text-center">
                                            <td>{{$detalle->nombre}}</td>
                                            <td>{{$detalle->concentracion}}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>


                    </div>
                    <a href="{{url('insumos/agroquimicos')}}" class="btn btn-warning">Atras</a>


                </div>
            </div>
        </div>
    </div>
@endsection
