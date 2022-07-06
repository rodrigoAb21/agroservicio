@extends('layouts.index')

@section('contenido')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h2 class="pb-2"><i class="fa fa-dolly"></i> Salida de Insumos
                        <div class="float-right">
                            <a class="btn btn-success" href="{{url('salidas/create')}}">
                                <i class="fa fa-plus"></i> Nueva
                            </a>
                        </div>
                    </h2>
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered color-table info-table">
                            <thead>
                            <tr>
                                <th class="text-center">ID</th>
                                <th class="text-center">FECHA</th>
                                <th class="text-center">DESTINATARIO</th>
                                <th class="text-center">TOTAL $us</th>
                                <th class="text-right">OPCIONES</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($salidas as $salida)
                                <tr class="text-center">
                                    <td>{{$salida->id}}</td>
                                    <td>{{$salida->fecha}}</td>
                                    <td>{{$salida->destinatario->nombre.': '.$salida->destinatario->nucleo}}</td>
                                    <td>{{$salida-> total}}</td>
                                    <td class="text-right ">
                                        <a href="{{url('salidas/'.$salida->id)}}">
                                            <button class="btn btn-outline-info">
                                                <i class="fa fa-eye"></i>
                                            </button>
                                        </a>
                                        <button type="button" class="btn btn-danger" onclick="modalEliminar('{{$salida -> id}}', '{{url('salidas/'.$salida -> id)}}')">
                                            <i class="fa fa-times"></i>
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        {{$salidas->links('pagination.default')}}
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
                $('#modalEliminarTitulo').html("Eliminar Salida de Insumos");
                $('#modalEliminarEnunciado').html("Realmente desea eliminar el salida: " + nombre + "?");
                $('#modalEliminar').modal('show');
            }

        </script>

    @endpush()
@endsection
