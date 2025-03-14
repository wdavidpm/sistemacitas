
@extends('layouts.admin')

@section('content')
 <div class="row">
 
 <h1>
    Listado de consultorios
 </h1>
 </div>
 <div class="row">

   <div class="col-md-12">
      <div class="card card-outline card-primary">
        <div class="card-header">
          <h3 class="card-title">Consultorios registrados</h3>

          <div class="card-tools">
            <a href="{{url('admin/consultorios/create')}}" class="btn btn-primary">
              Nuevo consultorio
            </a>
          </div>
          <!-- /.card-tools -->
        </div>
        <!-- /.card-header -->
        <div class="card-body">

         <table id="example1" class="table table-striped table-hover table-bordered table-sm">
            <thead style="background-color: #c0c0c0">
              <tr>
               <td style="text-align:center">#</td>
               <td style="text-align:center"><b>Nombre</b></td>
               <td style="text-align:center"><b>Ubicacion</b></td>
               <td style="text-align:center"><b>Capacidad</b></td>
               <td style="text-align:center"><b>Telefono</b></td>
               <td style="text-align:center"><b>Especialidad</b></td>
               <td style="text-align:center"><b>Estado</b></td>
               <td style="text-align:center"><b>Acciones</b></td> 
              </tr>
            </thead>
        
            <tbody>
              <?php $contador=1;?>
             @foreach ($consultorios as $consultorio)
             <tr>
              <td style="text-align: center">{{$contador++}}</td>
              <td>{{$consultorio->nombre}}</td>
              <td>{{$consultorio->ubicacion}}</td>
              <td>{{$consultorio->capacidad}}</td>
              <td>{{$consultorio->telefono}}</td>
              <td>{{$consultorio->especialidad}}</td>
              <td>{{$consultorio->estado}}</td>

              <td>
                <div class="btn-group" role="group" aria-label="Basic example">
                  <a href="{{url('admin/consultorios/'.$consultorio->id)}}" type="button" class="btn btn-info"><i class="bi bi-eye"></i></a>
                  <a href="{{url('admin/consultorios/'.$consultorio->id.'/edit')}}" type="button" class="btn btn-success"><i class="bi bi-pencil"></i></a>
                  <a href="{{url('admin/consultorios/'.$consultorio->id.'/confirm-Delete')}}" type="button" class="btn btn-danger"><i class="bi bi-trash"></i></a>
                </div>
              </td>
           </tr>
             @endforeach   
            </tbody>
          </table>
          <script>
            $(function () {
              $("#example1").DataTable({
                "pageLength": 10,
                "language": {
                  "emptyTable": "No hay información",
                  "info": "Mostrando _START_ a _END_ de _TOTAL_ de consultorios",
                  "infoEmpty": "Mostrando 0 a 0 de 0 Usuarios",
                  "infoFiltered": "(Filtrado de _MAX_ total de consultorios)",
                  "infoPostfix": "",
                  "thousands": ",",
                  "lengthMenu": "Mostrar _MENU_ de consultorios",
                  "loadingRecords": "Cargando...",
                  "processing": "Procesando...",
                  "search": "Buscador:",
                  "zeroRecords": "Sin resultados encontrados",
                  "paginate": {
                    "first": "Primero",
                    "last": "Último",
                    "next": "Siguiente",
                    "previous": "Anterior"
                  }
                },
                "responsive": true,
                "lengthChange": true,
                "autoWidth": false,
                buttons: [{
                  extend: 'collection',
                  text: 'Reportes',
                  orientation: 'landscape',
                  buttons: [{
                    text: 'Copiar',
                    extend: 'copy',
                  }, {
                    extend: 'pdf'
                  }, {
                    extend: 'csv'
                  }, {
                    extend: 'excel'
                  }, {
                    text: 'Imprimir',
                    extend: 'print'
                  }]
                }, {
                  extend: 'colvis',
                  text: 'Visor de columnas',
                  collectionLayout: 'fixed three-column'
                }],
              }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
            });
          </script>
      </div>
   
      </div>
      <!-- /.card -->
    </div>

 
 </div>
 
@endsection