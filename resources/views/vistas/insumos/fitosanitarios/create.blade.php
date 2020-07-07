@extends('layouts.index')

@section('contenido')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h3 class="pb-2">
                    Nuevo Fitosanitario
                </h3>

                <form method="POST" action="{{url('insumos/fitosanitarios')}}" autocomplete="off">
                    {{csrf_field()}}
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label>Nombre</label>
                                <input required type="text" class="form-control" value="{{old('nombre')}}" name="nombre">
                            </div>
                        </div>

                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label>Ingrediente Activo</label>
                                <input type="text" class="form-control" value="{{old('ingrediente_activo')}}" name="ingrediente_activo">
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label>Contenido Total</label>
                                <input type="number" class="form-control" value="{{old('contenido_total')}}" name="contenido_total">
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label>Tipo de Fitosanitario</label>
                                <select class="form-control" name="tipoFitosanitario_id">
                                    @foreach($tipos as $tipo)
                                    <option value="{{$tipo->id}}">{{$tipo->nombre}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label>Unidad Medida</label>
                                <select class="form-control" name="unidad_medida_id">
                                    @foreach($unidades as $unidad)
                                    <option value="{{$unidad->id}}">{{$unidad->nombre}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label>Info</label>
                                <textarea class="form-control" name="info" rows="3"></textarea>
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