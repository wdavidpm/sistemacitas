@extends('layouts.admin')
@section('content')
  <div class="row">
      <h1>Bienvenido {{Auth::user()->roles->pluck('name')->first()}} {{ Auth::user()->name }}</h1>
  </div>
  <hr>

  <div class="row">
    @can('admin.usuarios.index')
      <div class="col-lg-3 col-6">
        <!-- Small box for Usuarios -->
        <div class="small-box bg-info">
          <div class="inner">
            <h3>{{ $total_usuarios }}</h3>
            <p>Usuarios</p>
          </div>
          <div class="icon">
            <i class="ion ion-bag fas bi bi-person"></i>
          </div>
          <a href="{{ url('admin/usuarios') }}" class="small-box-footer">
            Más información <i class="fas bi bi-person"></i>
          </a>
        </div>
      </div>
    @endcan

    @can('admin.secretarias.index')
      <div class="col-lg-3 col-6">
        <!-- Small box for Secretarias -->
        <div class="small-box bg-info">
          <div class="inner">
            <h3>{{ $total_secretarias }}</h3>
            <p>Secretarias</p>
          </div>
          <div class="icon">
            <i class="ion ion-bag fas bi bi-person"></i>
          </div>
          <a href="{{ url('admin/secretarias') }}" class="small-box-footer">
            Más información <i class="fas bi bi-person"></i>
          </a>
        </div>
      </div>
    @endcan

    @can('admin.pacientes.index')
      <div class="col-lg-3 col-6">
        <!-- Small box for Pacientes -->
        <div class="small-box bg-success">
          <div class="inner">
            <h3>{{ $total_pacientes }}</h3>
            <p>Pacientes</p>
          </div>
          <div class="icon">
            <i class="ion ion-bag fas bi bi-person"></i>
          </div>
          <a href="{{ url('admin/pacientes') }}" class="small-box-footer">
            Más información <i class="fas bi bi-person"></i>
          </a>
        </div>
      </div>
    @endcan

    @can('admin.consultorios.index')
      <div class="col-lg-3 col-6">
        <!-- Small box for Consultorios -->
        <div class="small-box bg-warning">
          <div class="inner">
            <h3>{{ $total_consultorios }}</h3>
            <p>Consultorios</p>
          </div>
          <div class="icon">
            <i class="ion ion-bag fas bi bi-door-open"></i>
          </div>
          <a href="{{ url('admin/consultorios') }}" class="small-box-footer">
            Más información <i class="fas bi bi-person"></i>
          </a>
        </div>
      </div>
    @endcan

    @can('admin.doctores.index')
      <div class="col-lg-3 col-6">
        <!-- Small box for Doctores -->
        <div class="small-box bg-primary">
          <div class="inner">
            <h3>{{ $total_doctores }}</h3>
            <p>Doctores</p>
          </div>
          <div class="icon">
            <i class="ion ion-bag fas bi bi-person-heart"></i>
          </div>
          <a href="{{ url('admin/doctores') }}" class="small-box-footer">
            Más información <i class="fas bi bi-person"></i>
          </a>
        </div>
      </div>
    @endcan

    @can('admin.horarios.index')
      <div class="col-lg-3 col-6">
        <!-- Small box for Horarios -->
        <div class="small-box bg-secondary">
          <div class="inner">
            <h3>{{ $total_horarios }}</h3>
            <p>Horarios</p>
          </div>
          <div class="icon">
            <i class="ion ion-bag fas bi bi-calendar-event"></i>
          </div>
          <a href="{{ url('admin/horarios') }}" class="small-box-footer">
            Más información <i class="fas bi bi-person"></i>
          </a>
        </div>
      </div>
    @endcan
  </div>
  <div class="row">
    <!-- Columna para el select y la información -->
    <div class="col-md-12">
      <div class="card card-outline card-primary">
        <div class="card-header">
          <div class="form-group">
            <label for="consultorio_id">Calendario de doctores</label>
            <select name="consultorio_id" id="consultorio_select" class="form-control" required>
              <option value="" disabled selected>Seleccione un consultorio</option>
              @foreach ($consultorios as $consultorio)
                <option value="{{ $consultorio->id }}">
                  {{ $consultorio->nombre . ' - ' . $consultorio->ubicacion }}
                </option>
              @endforeach
            </select>
            @error('consultorio_id')
              <small style="color: rgb(224, 22, 22)">{{ $message }}</small>
            @enderror
          </div>
          <div class="col-md-12">
            <div id="consultorio_info">
              <!-- Aquí se cargarán los datos vía AJAX -->
            </div>
          </div>
        </div>
      </div>
    </div>
    
    <!-- Columna para el script (puedes usar col-12 para ocupar el ancho completo) -->
    <div class="col-12">
      <script>
        document.getElementById('consultorio_select').addEventListener('change', function() {
          var consultorio_id = this.value;
          var url = "{{ route('admin.cargar_datos_consultorios', ':id') }}";
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
    </div>
  </div>
  
  <div class="row">
    <!-- Tarjeta principal: Select y Calendario -->
    <div class="col-md-12">
      <div class="card card-outline card-warning">
        <!-- Card Header: Select de doctor -->
        <div class="card-header">
          <div class="form-group">
            <label for="doctor_select">Calendario para reservas</label>
            <select name="doctor_id" id="doctor_select" class="form-control" required>
              <option value="" disabled selected>Seleccione un doctor</option>
              @foreach ($doctores as $doctor)
                <option value="{{ $doctor->id }}">
                  {{ $doctor->nombres . ' ' . $doctor->apellidos . ' - ' . $doctor->especialidad }}
                </option>
              @endforeach
            </select>
            @error('doctor_id')
              <small style="color: rgb(224, 22, 22)">{{ $message }}</small>
            @enderror
          </div>
        </div>
        <!-- Card Body: Calendario y Botón para Modal -->
        <div class="card-body">
          <div class="row mb-3">
            <div class="col-12 text-left">
              <!-- Botón para abrir el modal de registrar cita -->
              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                Registrar cita
              </button>
            </div>
          </div>
          <div class="row">
            <div class="col-12">
              <div id="calendar"></div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  
  <!-- Modal: Registrar cita -->
  <form action="{{ url('/admin/eventos/create') }}" method="POST">
    @csrf
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Cita médica</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="row">
              <!-- Selección de doctor en el modal -->
              <div class="col-md-12">
                <div class="form-group">
                  <label for="doctor_modal">Doctores</label>
                  <select name="doctor_id" id="doctor_modal" class="form-control">
                    <option value="" disabled selected>Seleccione un doctor</option>
                    @foreach ($doctores as $doctor)
                      <option value="{{ $doctor->id }}">
                        {{ $doctor->nombres . ' ' . $doctor->apellidos . ' - ' . $doctor->especialidad }}
                      </option>
                    @endforeach
                  </select>
                </div>
              </div>
              <!-- Fecha de la reserva -->
              <div class="col-md-12">
                <div class="form-group">
                  <label for="fecha_reserva">Fecha de la reserva</label>
                  <input type="date" name="fecha_reserva" id="fecha_reserva" class="form-control">
                  <script>
                    document.addEventListener('DOMContentLoaded', function(){
                      const fechaReservaInput = document.getElementById('fecha_reserva');
                      fechaReservaInput.addEventListener('change', function(){
                        let selectedDate = this.value;
                        let today = new Date().toISOString().slice(0,10);
                        if (selectedDate < today){
                          this.value = null;
                          alert('No se puede reservar en una fecha pasada.');
                        }
                      });
                    });
                  </script>
                </div>
              </div>
              <!-- Hora de la reserva -->
              <div class="col-md-12">
                <div class="form-group">
                  <label for="hora_reserva">Hora de la cita</label>
                  <input type="time" name="hora_reserva" id="hora_reserva" class="form-control" step="1800">
                  <script>
                    document.addEventListener('DOMContentLoaded', function(){
                      const horaReservaInput = document.getElementById('hora_reserva');
                      horaReservaInput.addEventListener('change', function(){
                        let selectedTime = this.value; // formato "HH:mm"
                        if(selectedTime){
                          let parts = selectedTime.split(':');
                          let hour = parts[0];
                          let minute = parseInt(parts[1]);
                          // Redondear a intervalos de 30 minutos
                          if (minute < 30) {
                            minute = '00';
                          } else {
                            minute = '30';
                          }
                          selectedTime = hour + ':' + minute;
                          this.value = selectedTime;
                        }
                        // Validar rango (08:00 a 17:30, considerando citas de 30 min)
                        if(selectedTime < '08:00' || selectedTime > '17:30'){
                          this.value = null;
                          alert('Por favor ingrese un horario entre las 08:00 y 17:30 (citas de 30 minutos).');
                        }
                      });
                    });
                  </script>
                </div>
              </div>
            </div> <!-- Fin row del modal -->
          </div> <!-- Fin modal-body -->
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
            <button type="submit" class="btn btn-primary">Guardar</button>
          </div>
        </div> <!-- Fin modal-content -->
      </div> <!-- Fin modal-dialog -->
    </div> <!-- Fin modal -->
  </form>
  
  <!-- Script para el Calendario y carga AJAX -->
  <script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.15/index.global.min.js"></script>
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      var doctorSelect = document.getElementById('doctor_select');
      var calendarEl = document.getElementById('calendar');
  
      var calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: 'dayGridMonth',
        locale: 'es',
        events: function(fetchInfo, successCallback, failureCallback) {
          var doctorId = doctorSelect.value;
          if (!doctorId) {
            successCallback([]);
            return;
          }
          // Se asume que tienes la ruta para cargar eventos por doctor en formato JSON
          var url = "{{ route('admin.citas.doctor', ':doctorId') }}";
          url = url.replace(':doctorId', doctorId);
          fetch(url)
            .then(response => response.json())
            .then(data => {
              successCallback(data);
            })
            .catch(error => {
              console.error("Error al cargar eventos:", error);
              failureCallback(error);
            });
        }
      });
      calendar.render();
  
      // Actualiza los eventos cada vez que se cambia el doctor
      doctorSelect.addEventListener('change', function() {
        calendar.refetchEvents();
      });
    });
  </script>
  
  

@endsection
