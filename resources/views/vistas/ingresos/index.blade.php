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
                    @if(session()->has('message'))
                        <div class="alert alert-info alert-dismissible fade show" role="alert">
                            {{ session('message') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                    <div class="table-responsive">
                        <table id="tabla" class="table table-hover table-bordered color-table info-table">
                            <thead>
                            <tr>
                                <th class="text-center">ID</th>
                                <th class="text-center">FECHA</th>
                                <th class="text-center">PROVEEDOR</th>
                                <th class="text-center">TOTAL $US</th>
                                <th class="text-center">OPCIONES</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($ingresos as $ingreso)
                                <tr class="text-center">
                                    <td>{{$ingreso -> id}}</td>
                                    <td>{{date_format(date_create($ingreso->fecha), 'd-M-Y')}}</td>
                                    <td>{{$ingreso-> proveedor->empresa.': '.$ingreso->proveedor->tecnico}}  </td>
                                    <td>{{$ingreso -> total}}</td>
                                    <td>
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
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('vistas.modal')
    @push('arriba')
        <link href="{{asset('plantilla/assets/plugins/datatables/dataTables.bootstrap4.css')}}" id="theme" rel="stylesheet">
    @endpush
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
                                title:'Ingreso de Insumos '+fechaHoraString,
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
                                    columns: [ 0, 1, 2, 3 ]
                                }
                            }
                        ],
                        "columns": [
                            {"name": "ID"},
                            {"name": "FECHA"},
                            {"name": "PROVEEDOR"},
                            {"name": "TOTAL $US"},
                            {"name": "OPCIONES", "orderable": false},
                        ],
                        "order": [[0, 'desc']]
                    }
                );

            });
        </script>
    @endpush()
@endsection
