@extends('layouts.index')

@section('contenido')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h2 class="pb-2"><i class="fa fa-dolly"></i> Ingresos de Insumos
                        <div class="float-right">
                            <a class="btn btn-success" href="{{url('ingresos/create')}}">
                                <i class="fa fa-plus"></i> Nuevo
                            </a>
                        </div>
                    </h2>
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered color-table info-table">
                            <thead>
                            <tr>
                                <th class="text-center">ID</th>
                                <th class="text-center">FECHA</th>
                                <th class="text-center">PROVEEDOR</th>
                                <th class="text-center">TOTAL $US</th>
                                <th class="text-right">OPCIONES</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($ingresos as $ingreso)
                                <tr class="text-center">
                                    <td>{{$ingreso -> id}}</td>
                                    <td>{{date_format(date_create($ingreso->fecha), 'd-M-Y')}}</td>
                                    <td>{{$ingreso-> proveedor->empresa.': '.$ingreso->proveedor->tecnico}}  </td>
                                    <td>{{$ingreso -> total}}</td>
                                    <td class="text-right ">
                                        <a href="{{url('ingresos/'.$ingreso->id.'/edit')}}">
                                            <button class="btn btn-warning">
                                                <i class="fa fa-pen"></i>
                                            </button>
                                        </a>
                                        <a href="{{url('ingresos/'.$ingreso->id)}}">
                                            <button class="btn btn-outline-info">
                                                <i class="fa fa-eye"></i>
                                            </button>
                                        </a>
                                        <button type="button" class="btn btn-danger" onclick="modalEliminar('{{$ingreso -> id}}', '{{url('ingresos/'.$ingreso -> id)}}')">
                                            <i class="fa fa-times"></i>
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        {{$ingresos->links('pagination.default')}}
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
                $('#modalEliminarTitulo').html("Eliminar Ingreso de Insumos");
                $('#modalEliminarEnunciado').html("Realmente desea eliminar el ingreso: " + nombre + "?");
                $('#modalEliminar').modal('show');
            }

        </script>

    @endpush()
@endsection
