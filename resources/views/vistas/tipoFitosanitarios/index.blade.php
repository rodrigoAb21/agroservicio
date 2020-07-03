@extends('layouts.index')
@section('contenido')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">


                    <h2 class="pb-2">
                        <i class="fa fa-object-group"></i> Tipos de Fitosanitarios
                        <div class="float-right">
                            <a class="btn btn-success" href="{{url('tipoFitosanitarios/create')}}">
                                <i class="fa fa-plus"></i>  Nuevo
                            </a>
                        </div>
                    </h2>

                    <div class="table-responsive">
                        <table class="table table-hover table-bordered color-table info-table">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th class="w-75">NOMBRE</th>
                                <th>OPCIONES</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($tipos as $tipo)
                                <tr>
                                    <td>{{$tipo->id}}</td>
                                    <td>{{$tipo->nombre}}</td>
                                    <td class="text-right ">
                                        <a href="{{url('tipoFitosanitarios/'.$tipo->id.'/edit')}}">
                                            <button class="btn btn-warning">
                                                <i class="fa fa-pen"></i>
                                            </button>
                                        </a>
                                        <button type="button" class="btn btn-danger" onclick="modalEliminar('{{$tipo -> nombre}}', '{{url('tipoFitosanitarios/'.$tipo -> id)}}')">
                                            <i class="fa fa-times"></i>
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        {{$tipos->links('pagination.default')}}
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
                $('#modalEliminarTitulo').html("Eliminar Tipo");
                $('#modalEliminarEnunciado').html("Realmente desea eliminar al tipo: " + nombre + "?");
                $('#modalEliminar').modal('show');
            }

        </script>

    @endpush()
@endsection
