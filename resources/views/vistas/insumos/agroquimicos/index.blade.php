@extends('layouts.index')

@section('contenido')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h2 class="pb-2">
                            <i class="fa fa-biohazard"></i> Agroquímico
                        <div class="float-right">
                            <a class="btn btn-success" href="{{url('insumos/agroquimicos/create')}}">
                                <i class="fa fa-plus"></i> Nuevo
                            </a>
                        </div>
                    </h2>
                    @if(session()->has('message'))
                        <div class="alert alert-info alert-dismissible fade show" role="alert">
                            {{ session('message') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                    <form method="GET" action="{{url('insumos/agroquimicos')}}" autocomplete="off">
                        <input type="text" class="form-control mb-2 mr-sm-2"  value="{{$busqueda}}" id="busqueda" name="busqueda" placeholder="Buscar">
                    </form>
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered color-table info-table">
                            <thead>
                            <tr>
                                <th class="text-center">NOMBRE</th>
                                <th class="text-center">PRESENTACION</th>
                                <th class="text-center">TIPO</th>
                                <th class="text-center">INGREDIENTE ACTIVO</th>
                                <th class="text-center">EXISTENCIAS</th>
                                <th class="text-center">OPCIONES</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($insumos as $insumo)
                                <tr class="text-center">
                                    <td>{{$insumo -> nombre}}</td>
                                    <td>{{$insumo -> envase}} {{$insumo -> unidad}}</td>
                                    <td>{{$insumo -> tipo}}</td>
                                    <td>{{$insumo -> composicion}}</td>
                                    <td>{{$insumo -> existencias}}</td>
                                    <td class="text-center " style="white-space: nowrap">
                                        <a href="{{url('insumos/agroquimicos/'.$insumo->id)}}">
                                            <button class="btn btn-outline-info">
                                                <i class="fa fa-eye"></i>
                                            </button>
                                        </a>
                                        <a href="{{url('insumos/agroquimicos/'.$insumo->id.'/edit')}}">
                                            <button class="btn btn-warning">
                                                <i class="fa fa-pen"></i>
                                            </button>
                                        </a>
                                        <button type="button" class="btn btn-danger" onclick="modalEliminar('{{$insumo -> nombre}}', '{{url('insumos/agroquimicos/'.$insumo -> id)}}');">
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
                $('#modalEliminarTitulo').html("Eliminar Agroquímico");
                $('#modalEliminarEnunciado').html("Realmente desea eliminar el agroquímico: " + nombre + "?");
                $('#modalEliminar').modal('show');
            }

        </script>

    @endpush()
@endsection
