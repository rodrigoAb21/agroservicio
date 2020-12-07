@extends('layouts.index')

@section('contenido')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h3 class="pb-2">
                        Editar maquinaria: {{$maquinaria->id}}
                    </h3>

                    <form method="POST" action="{{url('maquinarias/'.$maquinaria->id)}}" autocomplete="off">
                        {{csrf_field()}}
                        {{method_field('PATCH')}}
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label>Nombre</label>
                                    <input required
                                           type="text"
                                           class="form-control"
                                           value="{{$maquinaria->nombre}}"
                                           name="nombre">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label>Tipo</label>
                                    <select name="tipo" id="" class="form-control">
                                        @foreach($tipos as $tipo)
                                            @if($tipo == $maquinaria->tipo)
                                                <option selected value="{{$tipo}}">{{$tipo}}</option>
                                            @else
                                                <option value="{{$tipo}}">{{$tipo}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label>Color</label>
                                    <input
                                            type="text"
                                            class="form-control"
                                            value="{{$maquinaria->color}}"
                                            name="color">
                                </div>
                            </div>
                        </div>
                        <a href="{{url('maquinarias')}}" class="btn btn-warning">Atras</a>
                        <button type="submit" class="btn btn-info">Guardar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
