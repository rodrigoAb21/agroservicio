@extends('layouts.index')

@section('contenido')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h3 class="pb-2">
                        Ver insumo: {{$insumo->id}}
                    </h3>
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label>Nombre</label>
                                    <input readonly
                                           type="text"
                                           class="form-control"
                                           value="{{$insumo->nombre}}"
                                           name="nombre">
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label>Envase</label>
                                    <input readonly

                                            class="form-control"
                                           value="{{$insumo->envase}}"
                                            name="envase">
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label>Tipo</label>
                                    <input readonly

                                           class="form-control"
                                           value="{{$insumo->subtipo->nombre}}"
                                           name="precio">
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label>Existencias</label>
                                    <input readonly
                                           class="form-control"
                                           value="{{$insumo->existencias}} {{$insumo->unidad->nombre}}"
                                           name="precio">
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label>Info</label>
                                    <textarea readonly class="form-control" name="info" rows="3">{{$insumo->info}}</textarea>
                                </div>
                            </div>
                        </div>
                        <a href="{{url('insumos/semillas')}}" class="btn btn-warning">Atras</a>
                </div>
            </div>
        </div>
    </div>
@endsection
