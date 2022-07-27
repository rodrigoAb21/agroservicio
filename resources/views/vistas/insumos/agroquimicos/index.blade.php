@extends('layouts.index')

@section('contenido')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h2 class="pb-2">
                            <i class="fa fa-biohazard"></i> Agroquímicos
                        <div class="float-right">
                            <a class="btn btn-success" href="{{url('insumos/agroquimicos/create')}}">
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
                                <th class="text-center">NOMBRE</th>
                                <th class="text-center">PRESENTACION</th>
                                <th class="text-center">TIPO</th>
                                <th class="text-center">INGREDIENTE ACTIVO</th>
                                <th class="text-center">EXISTENCIAS</th>
                                <th class="text-center">OPCIONES</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($insumos as $insumo)
                                <tr class="text-center">
                                    <td>{{$insumo -> id}}</td>
                                    <td>{{$insumo -> nombre}}</td>
                                    <td>{{$insumo -> envase}} {{$insumo->unidad->nombre}}</td>
                                    <td>{{$insumo -> subtipo -> nombre}}</td>
                                    <td>{{$insumo -> composicion}}</td>
                                    <td>{{$insumo -> existencias}}</td>
                                    <td class="text-center" style="white-space: nowrap">
                                        <a href="{{url('insumos/agroquimicos/'.$insumo->id)}}">
                                            <button class="btn btn-outline-info">
                                                <i class="fa fa-eye"></i>
                                            </button>
                                        </a>
                                        <a href="{{url('insumos/agroquimicos/'.$insumo->id.'/edit')}}">
                                            <button class="btn btn-warning">
                                                <i class="fa fa-pen"></i>
                                            </button>
                                        </a>
                                        <button type="button" class="btn btn-danger" onclick="modalEliminar('{{$insumo -> nombre}}', '{{url('insumos/agroquimicos/'.$insumo -> id)}}');">
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
        <link href="{{asset('plantilla/assets/plugins/DataTables2/DataTables-1.12.1/css/dataTables.bootstrap4.css')}}" id="theme" rel="stylesheet">
    @endpush
    @push('scripts')
        <script>

            function modalEliminar(nombre, url) {
                $('#modalEliminarForm').attr("action", url);
                $('#metodo').val("delete");
                $('#modalEliminarTitulo').html("Eliminar Agroquímico");
                $('#modalEliminarEnunciado').html("Realmente desea eliminar el agroquímico: " + nombre + "?");
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
                                title:'Agroquimicos',
                                pageSize: 'LETTER',
                                customize: function(doc) {
                                    doc.styles.tableBodyEven.alignment = 'center';
                                    doc.styles.tableBodyOdd.alignment = 'center';
                                    doc.content[1].margin = [ 100, 0, 100, 0 ];
                                },
                                exportOptions: {
                                    columns: [ 0, 1, 2, 3, 4, 5 ]
                                }
                            }
                        ],
                        "columns": [
                            {"name": "ID"},
                            {"name": "NOMBRE"},
                            {"name": "PRESENTACION"},
                            {"name": "TIPO"},
                            {"name": "INGREDIENTE ACTIVO"},
                            {"name": "EXISTENCIAS"},
                            {"name": "OPCIONES", "orderable": false}
                        ],
                        "order": [[1, 'asc']]
                    }
                );

            });
        </script>
    @endpush()
@endsection
