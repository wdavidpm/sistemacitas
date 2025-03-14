@extends('layouts.admin')

@section('content')
 <div class="row">
   <h1>
     Horario para el doctor: {{ $horario->doctor->nombres }} {{ $horario->doctor->apellidos }}
   </h1> 
 </div>
 <hr>
 <div class="row">
    <div class="col-md-12">
        <div class="card card-danger">
          <div class="card-header">
            <h3 class="card-title">¿Estás seguro de eliminar este horario?</h3>
          </div>
          <div class="card-body">
            <form action="{{ url('/admin/horarios', $horario->id) }}" method="POST">
              @csrf
              @method('DELETE')
              <div class="row">
                  <div class="col-md-3">
                      <div class="form-group">
                          <label for="">Consultorio</label>
                          <input type="text" value="{{ $horario->consultorio->nombre }}" name="consultorio" class="form-control" disabled>
                          @error('consultorio')
                              <small style="color: rgb(224, 22, 22)">{{ $message }}</small>
                          @enderror
                      </div>
                  </div>
                  <div class="col-md-3">
                      <div class="form-group">
                          <label for="">Doctor</label>
                          <input type="text" value="{{ $horario->doctor->nombres }} {{ $horario->doctor->apellidos }}" name="doctor" class="form-control" disabled>
                          @error('doctor')
                              <small style="color: rgb(224, 22, 22)">{{ $message }}</small>
                          @enderror
                      </div>
                  </div>
                  <div class="col-md-3">
                      <div class="form-group">
                          <label for="">Día</label>
                          <input type="text" value="{{ ucfirst($horario->dia) }}" name="dia" class="form-control" disabled>
                          @error('dia')
                              <small style="color: rgb(224, 22, 22)">{{ $message }}</small>
                          @enderror
                      </div>
                  </div>
              </div>
              <br>
              <div class="row">
                  <div class="col-md-3">
                      <div class="form-group">
                          <label for="">Hora de inicio</label>
                          <input type="time" value="{{ $horario->hora_inicio }}" name="hora_inicio" class="form-control" disabled>
                          @error('hora_inicio')
                              <small style="color: rgb(224, 22, 22)">{{ $message }}</small>
                          @enderror
                      </div>
                  </div>
                  <div class="col-md-3">
                      <div class="form-group">
                          <label for="">Hora final</label>
                          <input type="time" value="{{ $horario->hora_fin }}" name="hora_fin" class="form-control" disabled>
                          @error('hora_fin')
                              <small style="color: rgb(224, 22, 22)">{{ $message }}</small>
                          @enderror
                      </div>
                  </div>
              </div>
              <br>
              <div class="row">
                  <div class="col-md-12">
                      <a href="{{ url('admin/horarios') }}" class="btn btn-secondary">Volver</a>
                      <button type="submit" class="btn btn-danger">Confirmar</button>
                  </div>
              </div>
            </form>
          </div>
        </div>
    </div>
 </div>
@endsection
