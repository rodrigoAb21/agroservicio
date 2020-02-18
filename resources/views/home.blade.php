@extends('layouts.index')

@section('contenido')
    <div class="row">
        <div class="col-12 m-t-30">
            <div class="card-columns">

                <div class="card text-center p-3" >
                    <div class="card-body">
                        <h4 class="card-title">Usuarios</h4>
                        <p class="card-text"><i class="fa fa-user-tie fa-3x"></i></p>
                        <a class="btn btn-info btn-block" href="{{url('administrador/usuarios')}}"> Ver </a>
                    </div>
                </div>

                <div class="card text-center p-3" >
                    <div class="card-body">
                        <h4 class="card-title">Juzgados</h4>
                        <p class="card-text"><i class="fa fa-gavel fa-3x"></i></p>
                        <a class="btn btn-info btn-block" href="{{url('administrador/juzgados')}}"> Ver </a>
                    </div>
                </div>

                <div class="card text-center p-3" >
                    <div class="card-body">
                        <h4 class="card-title">Tipos de procesos</h4>
                        <p class="card-text"><i class="fa fa-window-restore fa-3x"></i></p>
                        <a class="btn btn-info btn-block" href="{{url('administrador/tipos')}}"> Ver </a>
                    </div>
                </div>
                <div class="card text-center p-3" >
                    <div class="card-body">
                        <h4 class="card-title">Expedientes</h4>
                        <p class="card-text"><i class="fa fa-archive fa-3x"></i></p>
                        <a class="btn btn-info btn-block" href="{{url('administrador/expedientes')}}"> Ver </a>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
