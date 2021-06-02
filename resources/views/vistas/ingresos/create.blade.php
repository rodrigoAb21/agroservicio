@extends('layouts.index')

@section('contenido')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h3 class="pb-2">
                        NUEVO INGRESO
                    </h3>

                    <form method="POST" action="{{url('ingresos')}}" autocomplete="off">
                        {{csrf_field()}}
                        <div class="row">
                            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label>Fecha</label>
                                    <input required
                                           type="date"
                                           class="form-control"
                                           value="{{\Carbon\Carbon::now('America/La_Paz')->toDateString()}}"
                                           name="fecha">
                                </div>
                            </div>


                            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label>Nro Nota</label>
                                    <input name="nro_nota" class="form-control" type="text">
                                </div>
                            </div>


                            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label>Tipo</label>
                                    <select class="form-control" name="tipo">
                                        @foreach($tipos as $tipo)
                                            <option value="{{$tipo}}">{{$tipo}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>


                            <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label>Proveedor</label>
                                    <select class="form-control selectpicker" data-live-search="true" name="proveedor_id">
                                        @foreach($proveedores as $proveedor)
                                            <option value="{{$proveedor->id}}">{{$proveedor->tecnico}} - {{$proveedor->empresa}}</option>
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
                                            <option value="{{$insumo->id}}">{{$insumo->nombre}}</option>
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
                                    <th class="text-center">P. UNITARIO $us</th>
                                    <th class="text-center">SUBTOTAL $us</th>
                                </tr>
                                </thead>
                                <tbody id="detalle">
                                </tbody>
                            </table>

                        </div>

                        <a href="{{url('ingresos')}}" class="btn btn-warning">Atras</a>
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
                    evaluar();
                }
            );

            var cont = 0;
            var cantidad = [];
            var precio = [];
            var subTotal = [];
            var total = 0;

            function agregar() {

                idInsumo = $('#selectorInsumo').val();
                nombreInsumo = $('#selectorInsumo option:selected').text();
                cantidad[cont] = $('#cantidad').val();
                precio[cont] = $('#precio').val();

                if (idInsumo != "" && idInsumo > 0 && cantidad[cont] != ""
                    && cantidad[cont] > 0 && precio[cont] != "" && precio[cont] > 0){

                    subTotal[cont] = cantidad[cont] * precio[cont];



                    var fila=
                        '<tr id="fila'+cont+'">' +
                        '<td>' +
                        '<button type="button" class="btn btn-danger btn-sm" onclick="quitar('+cont+');">' +
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

            function quitar(index){
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
