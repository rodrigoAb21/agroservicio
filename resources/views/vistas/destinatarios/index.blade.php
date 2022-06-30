@extends('layouts.index')
@section('contenido')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">


                    <h2 class="pb-2">
                        <i class="fa fa-map-signs"></i> Destinatarios
                        <div class="float-right">
                            <a class="btn btn-success" href="{{url('destinatarios/create')}}">
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
                                <th>NUCLEO</th>
                                <th>OPCIONES</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($destinatarios as $destinatario)
                                <tr>
                                    <td>{{$destinatario->id}}</td>
                                    <td>{{$destinatario->nombre}}</td>
                                    <td>{{$destinatario->nucleo}}</td>
                                    <td class="text-right ">
                                        <a href="{{url('destinatarios/'.$destinatario->id.'/edit')}}">
                                            <button class="btn btn-warning">
                                                <i class="fa fa-pen"></i>
                                            </button>
                                        </a>
                                        <button type="button" class="btn btn-danger" onclick="modalEliminar('{{$destinatario -> nombre}}', '{{url('destinatarios/'.$destinatario -> id)}}')">
                                            <i class="fa fa-times"></i>
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        {{$destinatarios->links('pagination.default')}}
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
                $('#modalEliminarTitulo').html("Eliminar Destinatario");
                $('#modalEliminarEnunciado').html("Realmente desea eliminar el destinatario: " + nombre + "?");
                $('#modalEliminar').modal('show');
            }

        </script>

    @endpush()
@endsection
