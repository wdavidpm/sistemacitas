@extends('layouts.admin')

@section('content')
 <div class="row">
   <h1>Modificar horario</h1> 
 </div>
 <hr>
 <div class="row">
    <div class="col-md-10">
        <div class="card card-outline card-success">
          <div class="card-header">
            <h3 class="card-title">Completar datos</h3>
          </div>
          <div class="card-body">
            <form action="{{ url('/admin/horarios', $horario->id) }}" method="POST">
              @csrf
              @method('PUT')
              <div class="row">
                <div class="col-md-4">
                   <div class="form-group">
                       <label for="consultorio_id">Consultorio</label> <b>*</b>
                       <select name="consultorio_id" id="consultorio_id" class="form-control" required>
                           <option value="" disabled {{ old('consultorio_id', $horario->consultorio_id) ? '' : 'selected' }}>Seleccione un consultorio</option>
                           @foreach ($consultorios as $consultorio)
                               <option value="{{ $consultorio->id }}" {{ (old('consultorio_id', $horario->consultorio_id) == $consultorio->id) ? 'selected' : '' }}>
                                   {{ $consultorio->nombre . ' - ' . $consultorio->ubicacion }}
                               </option>
                           @endforeach
                       </select>
                       @error('consultorio_id')
                           <small style="color: rgb(224, 22, 22)">{{ $message }}</small>
                       @enderror
                   </div>
                </div>
                <div class="col-md-4">
                   <div class="form-group">
                       <label for="doctor_id">Doctor</label> <b>*</b>
                       <select name="doctor_id" id="doctor_id" class="form-control" required>
                           <option value="" disabled {{ old('doctor_id', $horario->doctor_id) ? '' : 'selected' }}>Seleccione un doctor</option>
                           @foreach ($doctores as $doctor)
                               <option value="{{ $doctor->id }}" {{ (old('doctor_id', $horario->doctor_id) == $doctor->id) ? 'selected' : '' }}>
                                   {{ $doctor->nombres . ' ' . $doctor->apellidos . ' - ' . $doctor->especialidad }}
                               </option>
                           @endforeach
                       </select>
                       @error('doctor_id')
                           <small style="color: rgb(224, 22, 22)">{{ $message }}</small>
                       @enderror
                   </div>
                </div>
                <div class="col-md-4">
                   <div class="form-group">
                       <label for="dia">Día</label> <b>*</b>
                       <select name="dia" id="dia" class="form-control" required>
                           <option value="lunes" {{ old('dia', $horario->dia) == 'lunes' ? 'selected' : '' }}>Lunes</option>
                           <option value="martes" {{ old('dia', $horario->dia) == 'martes' ? 'selected' : '' }}>Martes</option>
                           <option value="miercoles" {{ old('dia', $horario->dia) == 'miercoles' ? 'selected' : '' }}>Miércoles</option>
                           <option value="jueves" {{ old('dia', $horario->dia) == 'jueves' ? 'selected' : '' }}>Jueves</option>
                           <option value="viernes" {{ old('dia', $horario->dia) == 'viernes' ? 'selected' : '' }}>Viernes</option>
                           <option value="sabado" {{ old('dia', $horario->dia) == 'sabado' ? 'selected' : '' }}>Sábado</option>
                       </select>
                       @error('dia')
                           <small style="color: rgb(224, 22, 22)">{{ $message }}</small>
                       @enderror
                   </div>
                </div>
              </div>
              <br>
              <div class="row">
                <div class="col-md-6">
                   <div class="form-group">
                       <label for="hora_inicio">Hora de inicio</label> <b>*</b>
                       <input type="time" value="{{ old('hora_inicio', $horario->hora_inicio) }}" name="hora_inicio" id="hora_inicio" step="1800" class="form-control" required>
                       @error('hora_inicio')
                           <small style="color: rgb(224, 22, 22)">{{ $message }}</small>
                       @enderror
                   </div>
                </div>
                <div class="col-md-6">
                   <div class="form-group">
                       <label for="hora_fin">Hora final</label> <b>*</b>
                       <input type="time" value="{{ old('hora_fin', $horario->hora_fin) }}" name="hora_fin" id="hora_fin" step="1800" class="form-control" required>
                       @error('hora_fin')
                           <small style="color: rgb(224, 22, 22)">{{ $message }}</small>
                       @enderror
                   </div>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-md-12">
                  <a href="{{ url('admin/horarios') }}" class="btn btn-secondary">Volver</a>
                  <button type="submit" class="btn btn-success">Actualizar horario</button>
                </div>
              </div>
            </form>
          </div>
        </div>
    </div>
 </div>
@endsection
