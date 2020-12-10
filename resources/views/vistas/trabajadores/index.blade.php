@extends('layouts.index')
@section('contenido')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">


                    <h2 class="pb-2">
                        <i class="fa fa-user-tie"></i> Trabajadores
                        <div class="float-right">
                            <a class="btn btn-success" href="{{url('trabajadores/create')}}">
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
                                <th>TELEFONO</th>
                                <th>OPCIONES</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($trabajadores as $trabajador)
                                <tr>
                                    <td>{{$trabajador->id}}</td>
                                    <td>{{$trabajador->nombre}}</td>
                                    <td>{{$trabajador->telefono}}</td>
                                    <td class="text-right ">
                                        <a href="{{url('trabajadores/'.$trabajador->id.'/edit')}}">
                                            <button class="btn btn-warning">
                                                <i class="fa fa-pen"></i>
                                            </button>
                                        </a>
                                        <button type="button" class="btn btn-danger" onclick="modalEliminar('{{$trabajador -> nombre}}', '{{url('trabajadores/'.$trabajador -> id)}}')">
                                            <i class="fa fa-times"></i>
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        {{$trabajadores->links('pagination.default')}}
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
                $('#modalEliminarTitulo').html("Eliminar Trabajador");
                $('#modalEliminarEnunciado').html("Realmente desea eliminar el trabajador: " + nombre + "?");
                $('#modalEliminar').modal('show');
            }

        </script>

    @endpush()
@endsection
