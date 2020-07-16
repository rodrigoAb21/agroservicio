@extends('layouts.index')

@section('contenido')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h2 class="pb-2">
                        <a href="{{url('insumos/abonos')}}">
                            <i class="fa fa-bolt"></i> Abonos
                        </a>
                        <div class="float-right">
                            <a class="btn btn-success" href="{{url('insumos/abonos/create')}}">
                                <i class="fa fa-plus"></i> Nuevo
                            </a>
                        </div>
                    </h2>
                    <form method="GET" action="{{url('insumos/abonos')}}" autocomplete="off">
                        <input type="text" class="form-control mb-2 mr-sm-2"  value="{{$busqueda}}" id="busqueda" name="busqueda" placeholder="Buscar">
                    </form>
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered color-table info-table">
                            <thead>
                            <tr>

                                <th class="text-center">NOMBRE</th>
                                <th class="text-center">CONT TOTAL</th>
                                <th class="text-center">INGREDIENTE ACTIVO</th>
                                <th class="text-center">EXISTENCIAS</th>
                                <th class="text-center">OPCIONES</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($insumos as $insumo)
                                <tr class="text-center">
                                    <td>{{$insumo -> nombre}}</td>
                                    <td>{{$insumo -> contenido_total}} {{$insumo -> unidad->nombre}}</td>
                                    <td>{{$insumo -> ingrediente_activo}}</td>
                                    <td>{{$insumo -> existencias}}</td>
                                    <td class="text-center ">
                                        <a href="{{url('insumos/abonos/'.$insumo->id)}}">
                                            <button class="btn btn-outline-info">
                                                <i class="fa fa-eye"></i>
                                            </button>
                                        </a>
                                        <a href="{{url('insumos/abonos/'.$insumo->id.'/edit')}}">
                                            <button class="btn btn-warning">
                                                <i class="fa fa-pen"></i>
                                            </button>
                                        </a>
                                        <button type="button" class="btn btn-danger" onclick="modalEliminar('{{$insumo -> nombre}}', '{{url('insumos/abonos/'.$insumo -> id)}}');">
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
                $('#modalEliminarTitulo').html("Eliminar Abono");
                $('#modalEliminarEnunciado').html("Realmente desea eliminar el abono: " + nombre + "?");
                $('#modalEliminar').modal('show');
            }

        </script>

    @endpush()
@endsection
