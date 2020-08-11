@extends('layouts.index')
@section('contenido')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">


                    <h2 class="pb-2">
                        <i class="fa fa-vector-square"></i> Terrenos
                        <div class="float-right">
                            <a class="btn btn-success" href="{{url('terrenos/create')}}">
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
                            @foreach($terrenos as $terreno)
                                <tr>
                                    <td>{{$terreno->id}}</td>
                                    <td>{{$terreno->nombre}}</td>
                                    <td>{{$terreno->superficie}}</td>
                                    <td class="text-right ">
                                        <a href="{{url('terrenos/'.$terreno->id.'/edit')}}">
                                            <button class="btn btn-warning">
                                                <i class="fa fa-pen"></i>
                                            </button>
                                        </a>
                                        <button type="button" class="btn btn-danger" onclick="modalEliminar('{{$terreno -> nombre}}', '{{url('terrenos/'.$terreno -> id)}}')">
                                            <i class="fa fa-times"></i>
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        {{$terrenos->links('pagination.default')}}
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
                $('#modalEliminarTitulo').html("Eliminar Terreno");
                $('#modalEliminarEnunciado').html("Realmente desea eliminar el terreno: " + nombre + "?");
                $('#modalEliminar').modal('show');
            }

        </script>

    @endpush()
@endsection
