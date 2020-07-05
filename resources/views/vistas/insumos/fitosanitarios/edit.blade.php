@extends('layouts.index')

@section('contenido')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h3 class="pb-2">
                        Editar Fitosanitario: {{$insumo->id}}
                    </h3>

                    <form method="POST" action="{{url('insumos/fitosanitarios/'.$insumo->id)}}" autocomplete="off">
                        {{csrf_field()}}
                        {{method_field('PATCH')}}
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label>Nombre</label>
                                    <input required
                                           type="text"
                                           class="form-control"
                                           value="{{$insumo->nombre}}"
                                           name="nombre">
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label>Ingrediente Activo</label>
                                    <input
                                            type="text"
                                            class="form-control"
                                            value="{{$insumo->ingrediente_activo}}"
                                            name="ingrediente_activo">
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label>Tipo de Insumo</label>
                                    <select class="form-control" name="tipoFitosanitario_id">
                                        @foreach($tipos as $tipo)
                                            @if($insumo->tipoFitosanitario_id == $tipo->id)
                                                <option selected value="{{$tipo->id}}">{{$tipo->nombre}}</option>
                                            @else
                                                <option value="{{$tipo->id}}">{{$tipo->nombre}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label>Unidad de Medida</label>
                                    <select class="form-control" name="unidad_medida_id">
                                        @foreach($unidades as $unidad)
                                            @if($insumo->unidad_medida_id == $unidad->id)
                                                <option selected value="{{$unidad->id}}">{{$unidad->nombre}}</option>
                                            @else
                                                <option value="{{$unidad->id}}">{{$unidad->nombre}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label>Info</label>
                                    <textarea class="form-control" name="info" rows="3">{{$insumo->info}}</textarea>
                                </div>
                            </div>

                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <button id="btn_agregar" type="button" onclick="agregar()" class="btn btn-success btn-block">
                                        <i class="fa fa-plus"></i> Agregar
                                    </button>
                                </div>
                                <div class="table-responsive">
                                    <table class="table table-hover table-bordered color-table info-table">
                                        <thead>
                                        <tr>
                                            <th class="text-center">OPC</th>
                                            <th class="text-center">CULTIVO</th>
                                            <th class="text-center">PLAGA</th>
                                            <th class="text-center">DOSIS</th>
                                        </tr>
                                        </thead>
                                        <tbody id="detalle">
                                        </tbody>
                                    </table>
                                </div>
                            </div>


                        </div>
                        <a href="{{url('insumos/fitosanitarios')}}" class="btn btn-warning">Atras</a>
                        <button type="submit" class="btn btn-info">Guardar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @push('scripts')
        <script>
            var cont = 0;
            $( document ).ready(function() {
            
                @foreach($detalles as $detalle)
                        cargar('{{$detalle->cultivo}}','{{$detalle->plaga}}','{{$detalle->dosis}}')
                @endforeach
                

            });

            function cargar(cultivo, plaga, dosis) {
                var fila2 =
                    '<tr id="fila' + cont + '">' +
                    '<td class="text-center">' +
                    '<button type="button" class="btn btn-danger btn-sm" onclick="quitar(' + cont + ');">' +
                    '<i class="fa fa-times" aria-hidden="true"></i>' +
                    '</button>' +
                    '</td>' +
                    '<td class="text-center">' +
                    '<input class="form-control" value="'+cultivo+'"  name="cultivoT[]" required></td>' +
                    '<td class="text-center">' +
                    '<input class="form-control" value="'+plaga+'"  name="plagaT[]" required></td>' +
                    '<td class="text-center">' +
                    '<input class="form-control" value="'+dosis+'"  name="dosisT[]" required></td>' +
                    '</tr>';


                cont++;
                $("#detalle").append(fila2);
            }

            function agregar() {

                var fila =
                    '<tr id="fila' + cont + '">' +
                    '<td class="text-center">' +
                    '<button type="button" class="btn btn-danger btn-sm" onclick="quitar(' + cont + ');">' +
                    '<i class="fa fa-times" aria-hidden="true"></i>' +
                    '</button>' +
                    '</td>' +
                    '<td class="text-center">' +
                    '<input class="form-control"  name="cultivoT[]" required></td>' +
                    '<td class="text-center">' +
                    '<input class="form-control"  name="plagaT[]" required></td>' +
                    '<td class="text-center">' +
                    '<input class="form-control"  name="dosisT[]" required></td>' +
                    '</tr>';


                cont++;
                $("#detalle").append(fila); // sirve para anhadir una fila a los detalles

            }

            function quitar(index) {
                cont--;
                $("#fila" + index).remove();
            }
        </script>
    @endpush
@endsection
