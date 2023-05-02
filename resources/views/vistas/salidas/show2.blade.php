@extends('layouts.index')

@section('contenido')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h3 class="pb-2">
                        SALIDA AGRUPADA DE INSUMOS
                    </h3>
                    <div class="row">
                        
                        
                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label>Destinatario</label>
                                    <input readonly
                                           type="text"
                                           class="form-control" 
                                           value="{{$detalles[0]->destinatario}}"
                                           name="nombre">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label>Núcleo</label>
                                    <input readonly
                                           type="text"
                                           class="form-control"
                                           value="{{$detalles[0]->nucleo}}"
                                           name="nucleo">
                                </div>
                            </div>
                        
                        {{-- <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label><b>Costo Total $us</b></label>
                                <input id="totalIngreso1" class="form-control" type="text" readonly value="{{$salida->total}}">
                            </div>
                        </div> --}}
                    </div>

                        <hr>
                    <h4>Detalle</h4>

                        <div class="table-responsive">
                            <table id="tabla" class="table table-hover table-bordered color-table info-table">
                                <thead>
                                <tr>
                                    <th class="text-center ">COD SALIDA</th>
                                    <th class="text-center ">FECHA</th>
                                    <th class="text-center ">NOMBRE INSUMO</th>
                                    <th class="text-center">PRESENTACION</th>
                                    <th class="text-center">CANTIDAD</th>
                                    <th class="text-center">PRECIO UNI $US</th>
                                    <th class="text-center ">SUB-TOTAL $US</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($detalles as $detalle)
                                    <tr class="text-center">
                                        <td>{{$detalle->id}}</td>
                                        <td>
                                            {{date_format(date_create($detalle->fecha), 'd-M-Y')}}
                                        </td>

                                        <td>{{$detalle->insumo}}</td>
                                        <td>{{$detalle->envase.$detalle->unidad}}</td>
                                        <td>{{$detalle->cantidad}}</td>
                                        <td>{{$detalle->precio_unitario}}</td>
                                        <td>{{round($detalle->precio_unitario * $detalle->cantidad,2)}}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>

                        </div>

                        <a href="{{url('salidasagrupadas')}}" class="btn btn-warning">Atrás</a>
                </div>
            </div>
        </div>
    </div>
    
    @push('arriba')
        <link href="{{asset('plantilla/assets/plugins/datatables/dataTables.bootstrap4.css')}}" id="theme" rel="stylesheet">
    @endpush
    @push('scripts')
        <script type="text/javascript" charset="utf8" src="{{asset('plantilla/assets/plugins/datatables/datatables.js')}}"></script>
        <script type="text/javascript" charset="utf8" src="{{asset('plantilla/assets/plugins/DataTables2/Buttons-2.2.3/js/dataTables.buttons.js')}}"></script>
        <script type="text/javascript" charset="utf8" src="{{asset('plantilla/assets/plugins/DataTables2/JSZip-2.5.0/jszip.js')}}"></script>
        <script type="text/javascript" charset="utf8" src="{{asset('plantilla/assets/plugins/DataTables2/pdfmake-0.1.36/pdfmake.js')}}"></script>
        <script type="text/javascript" charset="utf8" src="{{asset('plantilla/assets/plugins/DataTables2/pdfmake-0.1.36/vfs_fonts.js')}}"></script>
        <script type="text/javascript" charset="utf8" src="{{asset('plantilla/assets/plugins/DataTables2/Buttons-2.2.3/js/buttons.html5.js')}}"></script>
        <script type="text/javascript">
            $(document).ready(function() {
                const fechaHoraActual = new Date();
                const fechaHoraString = `${fechaHoraActual.getDate()}/${fechaHoraActual.getMonth()+1}/${fechaHoraActual.getFullYear()} ${fechaHoraActual.getHours()}:${fechaHoraActual.getMinutes()}:${fechaHoraActual.getSeconds()}`;
                var detalles = {!! json_encode($detalles[0]) !!};
                var table = $('#tabla').DataTable(
                    {
                        language: {
                            "decimal": "",
                            "emptyTable": "No hay información",
                            "info": "Mostrando _START_ a _END_ de _TOTAL_ filas",
                            "infoEmpty": "",
                            "infoFiltered": "(Filtrado de _MAX_ total entradas)",
                            "infoPostFix": "",
                            "thousands": ",",
                            "lengthMenu": "Mostrar _MENU_ filas",
                            "loadingRecords": "Cargando...",
                            "processing": "Procesando...",
                            "search": "Buscar:",
                            "zeroRecords": "No se encontraron resultados.",
                            "paginate": {
                                "first": "Primero",
                                "last": "Ultimo",
                                "next": "Siguiente",
                                "previous": "Anterior"
                            }
                        },
                        dom: 'Bfrtip',
                        buttons: [
                            {
                                extend: 'pdfHtml5',
                                orientation: 'landscape',
                                title:'Salida Agrupada de Insumos - '+detalles.destinatario + ' - Nucleo '+ detalles.nucleo + ' - ' + fechaHoraString,
                                pageSize: 'LETTER',
                                customize: function(doc) {
                                    doc.styles.tableBodyEven.alignment = 'center';
                                    doc.styles.tableBodyOdd.alignment = 'center';
                                    doc.content[1].margin = [ 75, 0, 0, 0 ];
                                    doc['footer']=(function(page, pages) {
                                        return {
                                            columns: [

                                                {
                                                    alignment: 'center',
                                                    text: [
                                                        { text: page.toString(), italics: true },
                                                        ' of ',
                                                        { text: pages.toString(), italics: true }
                                                    ]
                                                }
                                            ],
                                            margin: [10, 0]
                                        }
                                    });
                                },
                                exportOptions: {
                                    columns: [ 0, 1, 2, 3, 4, 5, 6 ]
                                }
                            }
                        ],
                        "columns": [
                            {"name": "COD SALIDA"},
                            {"name": "FECHA"},
                            {"name": "INSUMO"},
                            {"name": "PRESENTACION"},
                            {"name": "CANTIDAD"},
                            {"name": "PRECIO UNI $US"},
                            {"name": "SUB-TOTAL $US"},
                        ],
                        "order": [[0, 'asc']]
                    }
                );

            });
        </script>
    @endpush()
@endsection
