@extends('layouts.index')

@section('contenido')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h2 class="pb-2"><i class="fas fa-cash-register"></i> 
                        Salida de Insumos por Destinatario
                    </h2>
                    
                    <div class="table-responsive">
                        <table id="tabla" class="table table-hover table-bordered color-table info-table">
                            <thead>
                            <tr>
                                <th class="text-center">NRO</th>
                                <th class="text-center">DESTINATARIO</th>
                                <th class="text-center">OPCIONES</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($salidas as $salida)
                                <tr class="text-center">
                                    <td>{{$loop->iteration }}</td>
                                    <td>{{$salida->nombre.' - Núcleo: '.$salida->nucleo}}</td>
                                    <td>
                                        <a href="{{url('salidasagrupadas/'.$salida->id)}}">
                                            <button class="btn btn-outline-info">
                                                <i class="fa fa-eye"></i>
                                            </button>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
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
                const fechaHoraString = `${fechaHoraActual.getDate()}-${fechaHoraActual.getMonth()+1}-${fechaHoraActual.getFullYear()} ${fechaHoraActual.getHours()}:${fechaHoraActual.getMinutes()}:${fechaHoraActual.getSeconds()}`;
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
                                orientation: 'portrait',
                                title:'Salida de Insumos '+fechaHoraString,
                                pageSize: 'LETTER',
                                customize: function(doc) {
                                    doc.styles.tableBodyEven.alignment = 'center';
                                    doc.styles.tableBodyOdd.alignment = 'center';
                                    doc.content[1].margin = [ 100, 0, 100, 0 ];
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
                                    columns: [ 0, 1 ]
                                }
                            }
                        ],
                        "columns": [
                            {"name": "NRO"},
                            {"name": "DESTINATARIO"},
                            {"name": "OPCIONES", "orderable": false},
                        ],
                        "order": [[0, 'asc']]
                    }
                );

            });
        </script>
    @endpush()
@endsection
