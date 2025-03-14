@extends('layouts.admin')

@section('content')
 <div class="row">
 <h1>
  Modificar paciente 
</h1> 
 </div>
 <hr>
 <div class="row">
    
    <div class="col-md-10">
        <div class="card card-outline card-success">
          <div class="card-header">
            <h3 class="card-title">Completar datos</h3>
            <!-- /.card-tools -->
          </div>
          <!-- /.card-header -->
          <div class="card-body">
          <form action="{{url('/admin/pacientes',$paciente->id)}}" method="POST">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-md-3">
                   <div class="form group">
                       <label for="">Nombres</label> <b>*</b>
                       <input type="text" value="{{$paciente->nombres}}" name="nombres" class="form-control">
                        @error('nombres')
                        <small style="color: rgb(224, 22, 22)">{{$message}}</small>
                         @enderror
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form group">
                        <label for="">Apellidos</label> <b>*</b>
                        <input type="text" value="{{$paciente->apellidos}}" name="apellidos" class="form-control">
                         @error('apellidos')
                         <small style="color: rgb(224, 22, 22)">{{$message}}</small>
                          @enderror
                     </div>
                 </div>
                 <div class="col-md-3">
                    <div class="form group">
                        <label for="">Identificacion</label> <b>*</b>
                        <input type="text" value="{{$paciente->identificacion}}" name="identificacion" class="form-control">
                         @error('identificacion')
                         <small style="color: rgb(224, 22, 22)">{{$message}}</small>
                          @enderror
                     </div>
                 </div>
                 <div class="col-md-3">
                    <div class="form group">
                        <label for="">Correo</label> <b>*</b>
                        <input type="email" value="{{$paciente->correo}}" name="correo" class="form-control">
                         @error('correo')
                         <small style="color: rgb(224, 22, 22)">{{$message}}</small>
                          @enderror
                     </div>
                 </div>
               </div>

           <br>
           <div class="row">
            <div class="col-md-3">
                <div class="form group">
                    <label for="">Entidad</label> <b>*</b>
                    <input type="text" value="{{$paciente->entidad}}" name="entidad" class="form-control">
                     @error('entidad')
                     <small style="color: rgb(224, 22, 22)">{{$message}}</small>
                      @enderror
                 </div>
             </div>
             <div class="col-md-3">
                <div class="form group">
                    <label for="">Fecha de nacimiento</label> <b>*</b>
                    <input type="date" value="{{$paciente->fecha_de_nacimiento}}" name="fecha_de_nacimiento" class="form-control">
                     @error('fecha_de_nacimiento')
                     <small style="color: rgb(224, 22, 22)">{{$message}}</small>
                      @enderror
                 </div>
             </div>
             <div class="col-md-3">
                <div class="form group">
                    <label for="">Genero</label> <b>*</b>
                    <input type="text" value="{{$paciente->genero}}" name="genero" class="form-control">
                     @error('genero')
                     <small style="color: rgb(224, 22, 22)">{{$message}}</small>
                      @enderror
                 </div>
            </div>
            <div class="col-md-3">
                <div class="form group">
                    <label for="">Telefono</label> <b>*</b>
                    <input type="text" value="{{$paciente->telefono}}" name="telefono" class="form-control">
                     @error('telefono')
                     <small style="color: rgb(224, 22, 22)">{{$message}}</small>
                      @enderror
                 </div>

            </div>
              </div>
           <br>
           <div class="row">
            <div class="col-md-3">
                <div class="form group">
                    <label for="">Dirección</label> <b>*</b>
                    <input type="address" value="{{$paciente->direccion}}" name="direccion" class="form-control">
                     @error('direccion')
                     <small style="color: rgb(224, 22, 22)">{{$message}}</small>
                      @enderror
                 </div>
             </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="">Tipo de sangre <b>*</b></label>
                    <select name="tipo_de_sangre" id="" class="form-control" required>
                        <option value="A+">A+</option>
                        <option value="A-">A-</option>
                        <option value="B+">B+</option>
                        <option value="B-">B-</option>
                        <option value="AB+">AB+</option>
                        <option value="AB-">AB-</option>
                        <option value="O+">O+</option>
                        <option value="O-">O-</option>
                    </select>
                    @error('tipo_de_sangre')
                        <small style="color: rgb(224, 22, 22)">{{ $message }}</small>
                    @enderror
                </div>
            </div>
            <div class="col-md-3">
                <div class="form group">
                    <label for="">Alergias</label> <b>*</b>
                    <input type="text" value="{{$paciente->alergias}}" name="alergias" class="form-control">
                     @error('alergias')
                     <small style="color: rgb(224, 22, 22)">{{$message}}</small>
                      @enderror
                 </div>
            </div>
            <div class="col-md-3">
                <div class="form group">
                    <label for="">Contacto de emergencia</label> <b>*</b>
                    <input type="text" value="{{$paciente->contacto_emergencia}}" name="contacto_emergencia" class="form-control">
                     @error('contacto_emergencia')
                     <small style="color: rgb(224, 22, 22)">{{$message}}</small>
                      @enderror
                 </div>
            </div>
              </div>
           <br>
           <div class="row">
            <div class="col-md-12">
                <div class="form group">
                    <label for="">Observaciones</label> <b>*</b>
                    <input type="text" value="{{$paciente->observaciones}}" name="observaciones" class="form-control">
                     @error('observaciones')
                     <small style="color: rgb(224, 22, 22)">{{$message}}</small>
                      @enderror
                 </div>
            </div>
              </div>  
           <hr>
           <div class="row">
          </form>
                <div class="col md 12">
                   <div class="form group">
                     <a href="{{url('admin/pacientes')}}" class="btn btn-secondary">Volver</a>
                     <button type="submit" class="btn btn-success">Actualizar datos</button>
                   </div>
                </div>
               </div>
        </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
  </div>
@endsection