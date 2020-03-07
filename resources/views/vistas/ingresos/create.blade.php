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
                            <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label>Fecha</label>
                                    <input required
                                           type="date"
                                           class="form-control"
                                           value="{{\Carbon\Carbon::now('America/La_Paz')->toDateString()}}"
                                           name="fecha">
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label>Proveedor</label>
                                    <select class="form-control" name="proveedor_id">
                                        @foreach($proveedores as $proveedor)
                                            <option value="{{$proveedor->id}}">{{$proveedor->nombre}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label>Total</label>
                                    <input id="totalIngreso1" class="form-control" type="text" readonly value="0">
                                    <input id="totalIngreso2" type="hidden" required name="total" value="0">
                                </div>
                            </div>

                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-12">
                                <h4>DETALLE</h4>
                                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <label>Insumo</label>
                                        <select class="form-control" name="insumo_id">
                                            @foreach($insumos as $insumo)
                                                <option value="{{$insumo->id}}">{{$insumo->nombre}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>









                        <a href="{{url('ingresos')}}" class="btn btn-warning">Atras</a>
                        <button type="submit" class="btn btn-info">Guardar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
