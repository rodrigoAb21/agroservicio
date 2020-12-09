@extends('layouts.index')
@section('contenido')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">


                    <h2 class="pb-2">
                        <i class="fa fa-map-marked-alt"></i> Campos
                        <div class="float-right">
                            <a class="btn btn-success" href="{{url('campos/create')}}">
                                <i class="fa fa-plus"></i>  Nueva
                            </a>
                        </div>
                    </h2>

                    <div class="table-responsive">
                        <table class="table table-hover table-bordered color-table info-table">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th class="w-75">NOMBRE</th>
                                <th>SUPERFICIE</th>
                                <th>OPCIONES</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($campos as $campo)
                                <tr>
                                    <td>{{$campo->id}}</td>
                                    <td>{{$campo->nombre}}</td>
                                    <td>{{$campo->superficie}}</td>
                                    <td class="text-right ">
                                        <a href="{{url('campos/'.$campo->id.'/edit')}}">
                                            <button class="btn btn-warning">
                                                <i class="fa fa-pen"></i>
                                            </button>
                                        </a>
                                        <button type="button" class="btn btn-danger" onclick="modalEliminar('{{$campo -> nombre}}', '{{url('campos/'.$campo -> id)}}')">
                                            <i class="fa fa-times"></i>
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        {{$campos->links('pagination.default')}}
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
                $('#modalEliminarTitulo').html("Eliminar Campo");
                $('#modalEliminarEnunciado').html("Realmente desea eliminar el campo: " + nombre + "?");
                $('#modalEliminar').modal('show');
            }

        </script>

    @endpush()
@endsection
