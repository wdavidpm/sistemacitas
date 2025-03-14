
@extends('layouts.admin')

@section('content')
 <div class="row">
 
 <h1>
    Listado de horarios
 </h1>
 </div>
 <div class="row">

   <div class="col-md-12">
      <div class="card card-outline card-primary">
        <div class="card-header">
          <h3 class="card-title">Horarios registradas</h3>
        
          <div class="card-tools">
            <a href="{{url('admin/horarios/create')}}" class="btn btn-primary">
              Nueva horario
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
               <td style="text-align:center"><b>Dia</b></td>
               <td style="text-align:center"><b>Hora de inicio</b></td>
               <td style="text-align:center"><b>Hora final</b></td>
               <td style="text-align:center"><b>Doctor</b></td>
               <td style="text-align:center"><b>Consultorio</b></td>
               <td style="text-align:center"><b>Acciones</b></td> 
              </tr>
            </thead>
        
            <tbody>
              <?php $contador=1;?>
             @foreach ($horarios as $horario)
             <tr>
              <td style="text-align: center">{{$contador++}}</td>
              <td>{{$horario->dia}}</td>
              <td>{{$horario->hora_inicio}}</td>
              <td>{{$horario->hora_fin}}</td>
              <td>{{$horario->doctor->nombres}}</td>
              <td>{{$horario->consultorio->nombre}}</td>

              <td>
                <div class="btn-group" role="group" aria-label="Basic example">
                  <a href="{{url('admin/horarios/'.$horario->id)}}" type="button" class="btn btn-info"><i class="bi bi-eye"></i></a>
                  <a href="{{url('admin/horarios/'.$horario->id.'/edit')}}" type="button" class="btn btn-success"><i class="bi bi-pencil"></i></a>
                  <a href="{{url('admin/horarios/'.$horario->id.'/confirm-Delete')}}" type="button" class="btn btn-danger"><i class="bi bi-trash"></i></a>
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
                  "info": "Mostrando _START_ a _END_ de _TOTAL_ de horarios",
                  "infoEmpty": "Mostrando 0 a 0 de 0 Usuarios",
                  "infoFiltered": "(Filtrado de _MAX_ total de horarios)",
                  "infoPostfix": "",
                  "thousands": ",",
                  "lengthMenu": "Mostrar _MENU_ de horarios",
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
  <div class="row">
    <div class="col-md-12">
      <div class="card card-outline card-primary">
        <div class="card-header">
          <h3 class="card-title">Calendario de atencion de doctores</h3>
          
        </div>
        <!-- /.card-header -->
        <div class="card-body">
         <div class="row">
            <div class="col-md-4">
             <div class="form-group">
              <label for="consultorio_id">Consultorio</label> 
              <select name="consultorio_id" id="consultorio_select" class="form-control" required>
                  <option value="" disabled {{ old('consultorio_id') ? '' : 'selected' }}>Seleccione un consultorio</option>
                  @foreach ($consultorios as $consultorio)
                      <option value="{{ $consultorio->id }}" {{ old('consultorio_id') == $consultorio->id ? 'selected' : '' }}>
                          {{ $consultorio->nombre . ' - ' . $consultorio->ubicacion }}
                      </option>
                  @endforeach
              </select>
              @error('consultorio_id')
                  <small style="color: rgb(224, 22, 22)">{{ $message }}</small>
              @enderror
          </div>
           </div>
          </div> 
          <script>
            document.getElementById('consultorio_select').addEventListener('change', function() {
                var consultorio_id = this.value;
                var url = "{{ route('admin.horarios.cargar_datos_consultorios', ':id') }}";
                url = url.replace(':id', consultorio_id);
        
                if (consultorio_id) {
                    fetch(url)
                        .then(response => response.text())
                        .then(data => {
                            document.getElementById('consultorio_info').innerHTML = data;
                        })
                        .catch(() => {
                            alert('Error al obtener los datos');
                        });
                } else {
                    document.getElementById('consultorio_info').innerHTML = '';
                }
            });
        </script>  
            <div id="consultorio_info">

            </div>
        <hr>

  
      </div>
   
      </div>
    </div>
  </div>
 
@endsection