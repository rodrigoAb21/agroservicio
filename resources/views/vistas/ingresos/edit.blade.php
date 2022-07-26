@extends('layouts.index')

@section('contenido')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h3 class="pb-2">
                        Editar ingreso
                    </h3>

                    @if ($errors->any())
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>

                        </div>
                    @endif
                    <form method="POST" action="{{url('ingresos/'.$ingreso->id)}}" autocomplete="off">
                        {{csrf_field()}}
                        {{method_field('PATCH')}}
                        <div class="row">
                            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label>Fecha</label>
                                    <input required
                                           type="date"
                                           class="form-control"
                                           value="{{$ingreso->fecha}}"
                                           name="fecha">
                                </div>
                            </div>


                            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label>Nro Nota</label>
                                    <input
                                            name="nro_nota"
                                            class="form-control"
                                            value="{{$ingreso->nro_nota}}"
                                            type="text">
                                </div>
                            </div>


                            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label>Tipo de pago</label>
                                    <select class="form-control" name="tipo">
                                        @foreach($tipos as $tipo)
                                            @if($ingreso->tipo == $tipo)
                                                <option selected value="{{$tipo}}">{{$tipo}}</option>
                                            @else
                                                <option value="{{$tipo}}">{{$tipo}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>


                            <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label>Proveedor</label>
                                    <select class="form-control selectpicker" data-live-search="true" name="proveedor_id">
                                        @foreach($proveedores as $proveedor)
                                            @if($ingreso->proveedor_id == $proveedor->id)
                                                <option selected value="{{$proveedor->id}}">
                                                    {{$proveedor->tecnico}} - {{$proveedor->empresa}}
                                                </option>
                                            @else
                                                <option value="{{$proveedor->id}}">
                                                    {{$proveedor->tecnico}} - {{$proveedor->empresa}}
                                                </option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label>Costo Total</label>
                                    <input id="totalIngreso1" class="form-control" type="text" readonly value="0">
                                    <input id="totalIngreso2" type="hidden" required name="total" value="0">
                                </div>
                            </div>


                        </div>

                        <hr>

                        <h3>Insumos</h3>
                        <div class="row">
                            <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <select class="form-control selectpicker" data-live-search="true" id="selectorInsumo">
                                        @foreach($insumos as $insumo)
                                            <option
                                                    value="{{$insumo->id}}_{{$insumo->nombre.' - '.$insumo->envase.$insumo->unidad->nombre}}">
                                                {{$insumo->nombre.' - '.$insumo->envase.$insumo->unidad->nombre}}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-lg-2 col-md-12 col-sm-12 col-xs-12">
                                <div class="form-group">

                                    <input type="number" class="form-control" id="cantidad" min="1"  placeholder="Cantidad">
                                </div>
                            </div>

                            <div class="col-lg-2 col-md-12 col-sm-12 col-xs-12">
                                <div class="form-group">

                                    <input type="number" class="form-control" id="precio" min="1" placeholder="P. Unitario  $us">
                                </div>
                            </div>


                            <div class="col-lg-2 col-md-12 col-sm-12 col-xs-12">
                                <div class="form-group">

                                    <button id="btn_agregar" type="button" onclick="agregar()"  class="btn btn-success btn-sm btn-block">
                                        <span class="fa fa-plus fa-2x"></span>
                                    </button>
                                </div>
                            </div>
                        </div>

                        <div class="table-responsive">
                            <table class="table table-hover table-bordered color-table info-table">
                                <thead>
                                <tr>
                                    <th class="text-right">OPC</th>
                                    <th class="text-center">INSUMO</th>
                                    <th class="text-center">CANT</th>
                                    <th class="text-center">P. UNITARIO $US</th>
                                    <th class="text-center">SUBTOTAL $US</th>
                                </tr>
                                </thead>
                                <tbody id="detalle">
                                </tbody>
                            </table>

                        </div>

                        <a href="{{url('ingresos')}}" class="btn btn-warning">Atrás</a>
                        <button type="submit" id="guardar" class="btn btn-info">Guardar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @push('arriba')
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/css/bootstrap-select.min.css">
    @endpush
    @push('scripts')
        <script>
            $(document).ready(
                function () {
                    @foreach($detalles as $detalle)
                    cargar(
                        '{{$detalle->insumo_id}}',
                        '{{$detalle->insumo}}',
                        '{{$detalle->envase}}',
                        '{{$detalle->unidad}}',
                        '{{$detalle->cantidad}}',
                        '{{$detalle->precio_unitario}}',
                    )
                    @endforeach

                    evaluar();
                }
            );

            var cont = 0;
            var cantidad = [];
            var precio = [];
            var subTotal = [];
            var total = 0;
            var agregados = [];
            var datosInsumo;

            function cargar(insumo_id, insumo, envase, unidad, cant, precio_unitario ) {

                idInsumo = insumo_id;
                nombreInsumo = insumo + ' - ' + envase + unidad;
                cantidad[cont] = cant;
                precio[cont] = precio_unitario;


                if (!agregados.includes(idInsumo) && idInsumo != "" && idInsumo > 0 && cantidad[cont] != ""
                    && cantidad[cont] > 0 && precio[cont] != "" && precio[cont] > 0){

                    agregados.push(idInsumo);
                    subTotal[cont] = cantidad[cont] * precio[cont];

                    var fila2=
                        '<tr id="fila'+cont+'">' +
                        '<td>' +
                        '<button type="button" class="btn btn-danger btn-sm" onclick="quitar('+cont+','+idInsumo+');">' +
                        '<i class="fa fa-times" aria-hidden="true"></i>' +
                        '</button>' +
                        '</td>' +
                        '<td>' +
                        '   <input type="hidden" class"form-control "  name="idInsumoT[]" value="'+idInsumo+'">'
                        +nombreInsumo+
                        '</td>' +
                        '<td>' +
                        '<input type="hidden" class"form-control "  name="cantidadT[]" value="'+cantidad[cont]+'">'
                        +cantidad[cont]+
                        '</td>' +
                        '<td>' +
                        '<input type="hidden" class"form-control "  name="precioT[]" value="'+precio[cont]+'">'
                        +precio[cont]+
                        '</td>' +
                        '<td>'
                        +subTotal[cont].toFixed(1)+
                        '</td> ' +
                        '</tr>';

                    total = total + subTotal[cont];
                    $('#totalIngreso1').val(total);
                    $('#totalIngreso2').val(total);

                    cont++;
                    limpiar();

                    $("#detalle").append(fila2); // sirve para anhadir una fila a los detalles

                    evaluar();

                }

            }


            function agregar() {
                datosInsumo = document.getElementById('selectorInsumo').value.split('_');

                idInsumo = datosInsumo[0];
                nombreInsumo = datosInsumo[1];
                cantidad[cont] = parseFloat($('#cantidad').val());
                precio[cont] = parseFloat($('#precio').val());

                if (!agregados.includes(idInsumo) && idInsumo != "" && parseInt(idInsumo) > 0 && cantidad[cont] != ""
                    && cantidad[cont] > 0 && precio[cont] != "" && precio[cont] > 0){

                    agregados.push(idInsumo);
                    subTotal[cont] = cantidad[cont] * precio[cont];

                    var fila=
                        '<tr id="fila'+cont+'">' +
                        '<td>' +
                        '<button type="button" class="btn btn-danger btn-sm" onclick="quitar('+cont+','+idInsumo+');">' +
                        '<i class="fa fa-times" aria-hidden="true"></i>' +
                        '</button>' +
                        '</td>' +
                        '<td>' +
                        '   <input type="hidden" class"form-control "  name="idInsumoT[]" value="'+idInsumo+'">'
                        +nombreInsumo+
                        '</td>' +
                        '<td>' +
                        '<input type="hidden" class"form-control "  name="cantidadT[]" value="'+cantidad[cont]+'">'
                        +cantidad[cont]+
                        '</td>' +
                        '<td>' +
                        '<input type="hidden" class"form-control "  name="precioT[]" value="'+precio[cont]+'">'
                        +precio[cont]+
                        '</td>' +
                        '<td>'
                        +subTotal[cont].toFixed(1)+
                        '</td> ' +
                        '</tr>';

                    total = total + subTotal[cont];
                    $('#totalIngreso1').val(total);
                    $('#totalIngreso2').val(total);

                    cont++;
                    limpiar();

                    $("#detalle").append(fila); // sirve para anhadir una fila a los detalles

                    evaluar();

                }

            }

            function quitar(index, id){
                let i = agregados.indexOf(String(id));
                if (i > -1) {
                    agregados.splice(i, 1);
                }
                total = total - subTotal[index];
                cont--;

                $("#fila" + index).remove();
                $('#totalIngreso1').val(total);
                $('#totalIngreso2').val(total);
                evaluar();
            }

            function limpiar(){
                $("#cantidad").val("");
                $("#precio").val("");
            }

            function evaluar(){
                if (cont > 0) {
                    $("#guardar").show();
                }else{
                    $("#guardar").hide();
                }
            }


        </script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/js/bootstrap-select.min.js"></script>
    @endpush
@endsection
