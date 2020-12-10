@extends('layouts.index')
@section('contenido')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">


                    <h2 class="pb-2">
                        <i class="fa fa-toolbox"></i> Tipos de actividad
                        <div class="float-right">
                            <a class="btn btn-success" href="{{url('config/tiposactividad/create')}}">
                                <i class="fa fa-plus"></i>  Nuevo
                            </a>
                        </div>
                    </h2>

                    <div class="table-responsive">
                        <table class="table table-hover table-bordered color-table info-table">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>NOMBRE</th>
                                <th>PRECIO BASE</th>
                                <th>OPCIONES</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($tiposactividad as $tipoactividad)
                                <tr>
                                    <td>{{$tipoactividad->id}}</td>
                                    <td>{{$tipoactividad->nombre}}</td>
                                    <td>{{$tipoactividad->precio_base}}</td>
                                    <td class="text-right ">
                                        <a href="{{url('config/tiposactividad/'.$tipoactividad->id.'/edit')}}">
                                            <button class="btn btn-warning">
                                                <i class="fa fa-pen"></i>
                                            </button>
                                        </a>
                                        <button type="button" class="btn btn-danger" onclick="modalEliminar('{{$tipoactividad -> nombre}}', '{{url('config/tiposactividad/'.$tipoactividad -> id)}}')">
                                            <i class="fa fa-times"></i>
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        {{$tiposactividad->links('pagination.default')}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('vistas.modal')
    @push('scripts')
        <script>

            function modalEliminar(nombre, url) {
                $('#modalEliminarForm').attr("action", url);
                $('#metodo').val("delete");
                $('#modalEliminarTitulo').html("Eliminar Tipo Actividad");
                $('#modalEliminarEnunciado').html("Realmente desea eliminar el tipo: " + nombre + "?");
                $('#modalEliminar').modal('show');
            }

        </script>

    @endpush()
@endsection
