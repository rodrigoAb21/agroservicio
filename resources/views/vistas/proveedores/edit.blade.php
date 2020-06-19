@extends('layouts.index')

@section('contenido')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h3 class="pb-2">
                        Editar tipo: {{$proveedor->id}}
                    </h3>

                    <form method="POST" action="{{url('proveedores/'.$proveedor->id)}}" autocomplete="off">
                        {{csrf_field()}}
                        {{method_field('PATCH')}}
                        <div class="row">
                            <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label>Contacto</label>
                                    <input required
                                           type="text"
                                           class="form-control"
                                           value="{{$proveedor->contacto}}"
                                           name="contacto">
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label>Celular</label>
                                    <input
                                           type="number"
                                           class="form-control"
                                           value="{{$proveedor->celular}}"
                                           name="celular">
                                </div>
                            </div>
                            <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label>Empresa</label>
                                    <input required
                                           type="text"
                                           class="form-control"
                                           value="{{$proveedor->empresa}}"
                                           name="empresa">
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label>Telefono empresa</label>
                                    <input
                                           type="text"
                                           class="form-control"
                                           value="{{$proveedor->tel_empresa}}"
                                           name="tel_empresa">
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label>Direccion empresa</label>
                                    <input
                                           type="text"
                                           class="form-control"
                                           value="{{$proveedor->dir_empresa}}"
                                           name="dir_empresa">
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
