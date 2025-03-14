@extends('layouts.admin')

@section('content')
 <div class="row">
 <h1>Registro de horarios</h1> 
 </div>
 <hr>
 <div class="row">
    <div class="col-md-8">
        <div class="card card-outline card-primary">
          <div class="card-header">
            <h3 class="card-title">Completar datos</h3>
          </div>
          <div class="card-body row">
            <form action="{{url('/admin/horarios/create')}}" method="POST">
              @csrf
              
              <div class="col-md-12">
                <div class="form-group">
                  <label for="consultorio_id">Consultorio</label> <b>*</b>
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
              <div id="consultorio_info"></div>
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
              
              <div class="col-md-12">
                <div class="form-group">
                  <label for="doctor_id">Doctores</label> <b>*</b>
                  <select name="doctor_id" id="doctor_id" class="form-control" required>
                      <option value="" disabled {{ old('doctor_id') ? '' : 'selected' }}>Seleccione un doctor</option>
                      @foreach ($doctores as $doctor)
                          <option value="{{ $doctor->id }}" {{ old('doctor_id') == $doctor->id ? 'selected' : '' }}>
                              {{ $doctor->nombres . ' ' . $doctor->apellidos . ' - ' . $doctor->especialidad }}
                          </option>
                      @endforeach
                  </select>
                  @error('doctor_id')
                      <small style="color: rgb(224, 22, 22)">{{ $message }}</small>
                  @enderror
              </div>
              </div>
              
              <div class="col-md-12">
                <div class="form-group">
                    <label for="">Dia</label> <b>*</b>
                    <select name="dia" class="form-control" required>
                        <option value="lunes">LUNES</option>
                        <option value="martes">MARTES</option>
                        <option value="miercoles">MIERCOLES</option>
                        <option value="jueves">JUEVES</option>
                        <option value="viernes">VIERNES</option>
                        <option value="sabado">SABADO</option>
                    </select>
                </div>
              </div>
              
              <div class="col-md-12">
                  <div class="form-group">
                      <label for="">Hora de inicio</label> <b>*</b>
                      <input type="time" value="{{old('hora_inicio')}}" name="hora_inicio" step="1800" class="form-control" required>
                      @error('hora_inicio')
                      <small style="color: rgb(224, 22, 22)">{{$message}}</small>
                      @enderror
                  </div>
              </div>
              
              <div class="col-md-12">
                  <div class="form-group">
                      <label for="">Hora final</label> <b>*</b>
                      <input type="time" value="{{old('hora_fin')}}" name="hora_fin" step="1800" class="form-control" required>
                      @error('hora_fin')
                      <small style="color: rgb(224, 22, 22)">{{$message}}</small>
                      @enderror
                  </div>
              </div>
              
              <div class="col-md-12">
                <button type="submit" class="btn btn-primary">Registrar</button>
                <a href="{{url('admin/horarios')}}" class="btn btn-secondary">Volver</a>
              </div>
            </form>
          </div>
        </div>
    </div>
    
</div>
@endsection
