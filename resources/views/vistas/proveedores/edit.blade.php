@extends('layouts.index')

@section('contenido')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h3 class="pb-2">
                        Editar proveedor: {{$proveedor->id}}
                    </h3>

                    <form method="POST" action="{{url('proveedores/'.$proveedor->id)}}" autocomplete="off">
                        {{csrf_field()}}
                        {{method_field('PATCH')}}
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label>Tecnico</label>
                                    <input required
                                           type="text"
                                           class="form-control"
                                           value="{{$proveedor->tecnico}}"
                                           name="tecnico">
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label>Telefono 1</label>
                                    <input
                                           type="text"
                                           class="form-control"
                                           value="{{$proveedor->telf1}}"
                                           name="telf1">
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">

                                <div class="form-group">
                                    <label>Telefono 2</label>
                                    <input required
                                           type="text"
                                           class="form-control"
                                           value="{{$proveedor->telf2}}"
                                           name="telf2">
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label>Empresa</label>
                                    <input
                                           type="text"
                                           class="form-control"
                                           value="{{$proveedor->empresa}}"
                                           name="empresa">
                                </div>
                            </div>
                        </div>
                        <a href="{{url('proveedores')}}" class="btn btn-warning">Atras</a>
                        <button type="submit" class="btn btn-info">Guardar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
