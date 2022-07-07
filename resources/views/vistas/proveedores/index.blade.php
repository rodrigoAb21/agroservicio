@extends('layouts.index')
@section('contenido')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h2 class="pb-2">
                        <i class="fa fa-industry"></i> Proveedores
                        <div class="float-right">
                            <a class="btn btn-success" href="{{url('proveedores/create')}}">
                                <i class="fa fa-plus"></i>  Nuevo
                            </a>
                        </div>
                    </h2>

                    <div class="table-responsive">
                        <table class="table table-hover table-bordered color-table info-table">
                            <thead>
                            <tr>
                                <th class="text-center">TECNICO</th>
                                <th class="text-center">TELF 1</th>
                                <th class="text-center">TELF 2</th>
                                <th class="text-center">EMPRESA</th>

                                <th class="text-center">OPC</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($proveedores as $proveedor)
                                <tr>
                                    <td>{{$proveedor->tecnico}}</td>
                                    <td>{{$proveedor->telf1}}</td>
                                    <td>{{$proveedor->telf2}}</td>
                                    <td>{{$proveedor->empresa}}</td>

                                    <td class="text-center">
                                        <a href="{{url('proveedores/'.$proveedor->id.'/edit')}}">
                                            <button class="btn btn-warning">
                                                <i class="fa fa-pen"></i>
                                            </button>
                                        </a>
                                        <button type="button" class="btn btn-danger" onclick="modalEliminar('{{$proveedor -> tecnico}}', '{{url('proveedores/'.$proveedor -> id)}}')">
                                            <i class="fa fa-times"></i>
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        {{$proveedores->links('pagination.default')}}
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
                $('#modalEliminarEnunciado').html("Realmente desea eliminar al proveedor: " + nombre + "?");
                $('#modalEliminar').modal('show');
            }

        </script>

    @endpush()
@endsection
