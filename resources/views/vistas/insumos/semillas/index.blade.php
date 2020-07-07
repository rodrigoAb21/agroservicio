@extends('layouts.index')

@section('contenido')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h2 class="pb-2"><i class="fa fa-leaf"></i> Semillas
                        <div class="float-right">
                            <a class="btn btn-success" href="{{url('insumos/semillas/create')}}">
                                <i class="fa fa-plus"></i> Nueva
                            </a>
                        </div>
                    </h2>
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered color-table info-table">
                            <thead>
                            <tr>
                                <th class="text-center">ID</th>
                                <th class="text-center">NOMBRE</th>
                                <th class="text-center">CONT TOTAL</th>
                                <th class="text-center">EXISTENCIAS</th>
                                <th class="text-right">OPCIONES</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($insumos as $insumo)
                                <tr class="text-center">
                                    <td>{{$insumo -> id}}</td>
                                    <td>{{$insumo -> nombre}}</td>
                                    <td>{{$insumo -> contenido_total}} {{$insumo -> unidad->nombre}}</td>
                                    <td>{{$insumo -> existencias}}</td>
                                    <td class="text-right ">
                                        <a href="{{url('insumos/semillas/'.$insumo->id.'/edit')}}">
                                            <button class="btn btn-warning">
                                                <i class="fa fa-pen"></i>
                                            </button>
                                        </a>
                                        <button type="button" class="btn btn-danger" onclick="modalEliminar('{{$insumo -> nombre}}', '{{url('insumos/semillas/'.$insumo -> id)}}');">
                                            <i class="fa fa-times"></i>
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        {{$insumos->links('pagination.default')}}
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
                $('#modalEliminarTitulo').html("Eliminar Semilla");
                $('#modalEliminarEnunciado').html("Realmente desea eliminar la semilla: " + nombre + "?");
                $('#modalEliminar').modal('show');
            }

        </script>

    @endpush()
@endsection
