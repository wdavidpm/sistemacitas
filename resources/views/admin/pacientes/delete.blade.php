@extends('layouts.admin')

@section('content')
 <div class="row">
 <h1>
   paciente : {{$paciente->nombres}} 
 
</h1> 
 </div>
 <hr>
 <div class="row">
    
    <div class="col-md-12">
        <div class="card card card-danger">
          <div class="card-header">
            <h3 class="card-title">¿Estas seguro de eliminar esta paciente?</h3>
            <!-- /.card-tools -->
          </div>
          <!-- /.card-header -->
          <div class="card-body">
          <form action="{{url('/admin/pacientes',$paciente->id)}}" method="POST">
            @csrf
            @method('DELETE')
            <div class="row">
                <div class="col-md-3">
                    <div class="form group">
                        <label for="">Nombres</label> 
                        <input type="text" value="{{$paciente->nombres}}" name="nombres" class="form-control"  disabled>
                         @error('nombres')
                         <small style="color: rgb(224, 22, 22)">{{$message}}</small>
                          @enderror
                     </div>
                 </div>
                 <div class="col-md-3">
                     <div class="form group">
                         <label for="">Apellidos</label> 
                         <input type="text" value="{{$paciente->apellidos}}" name="apellidos" class="form-control"  disabled>
                          @error('apellidos')
                          <small style="color: rgb(224, 22, 22)">{{$message}}</small>
                           @enderror
                      </div>
                  </div>
                  <div class="col-md-3">
                     <div class="form group">
                         <label for="">Identificacion</label> 
                         <input type="text" value="{{$paciente->identificacion}}" name="identificacion" class="form-control"  disabled>
                          @error('identificacion')
                          <small style="color: rgb(224, 22, 22)">{{$message}}</small>
                           @enderror
                      </div>
                  </div>
                  <div class="col-md-3">
                     <div class="form group">
                         <label for="">Correo</label> 
                         <input type="email" value="{{$paciente->correo}}" name="correo" class="form-control"  disabled>
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
                    <label for="">Entidad</label> 
                    <input type="text" value="{{$paciente->entidad}}" name="entidad" class="form-control" disabled>
                     @error('entidad')
                     <small style="color: rgb(224, 22, 22)">{{$message}}</small>
                      @enderror
                 </div>
             </div>
             <div class="col-md-3">
                <div class="form group">
                    <label for="">Fecha de nacimiento</label>
                    <input type="date" value="{{$paciente->fecha_de_nacimiento}}" name="fecha_de_nacimiento" class="form-control" disabled>
                     @error('fecha_de_nacimiento')
                     <small style="color: rgb(224, 22, 22)">{{$message}}</small>
                      @enderror
                 </div>
             </div>
             <div class="col-md-3">
                <div class="form group">
                    <label for="">Genero</label>
                    <input type="text" value="{{$paciente->genero}}" name="genero" class="form-control" disabled>
                     @error('genero')
                     <small style="color: rgb(224, 22, 22)">{{$message}}</small>
                      @enderror
                 </div>
            </div>
            <div class="col-md-3">
                <div class="form group">
                    <label for="">Telefono</label> 
                    <input type="text" value="{{$paciente->telefono}}" name="telefono" class="form-control" disabled>
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
                    <label for="">Dirección</label>
                    <input type="address" value="{{$paciente->direccion}}" name="direccion" class="form-control" disabled>
                     @error('direccion')
                     <small style="color: rgb(224, 22, 22)">{{$message}}</small>
                      @enderror
                 </div>
             </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="">Tipo de sangre </label>
                    <select name="tipo_de_sangre" id="" class="form-control"  disabled>
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
                    <label for="">Alergias</label>
                    <input type="text" value="{{$paciente->alergias}}" name="alergias" class="form-control"  disabled>
                     @error('alergias')
                     <small style="color: rgb(224, 22, 22)">{{$message}}</small>
                      @enderror
                 </div>
            </div>
            <div class="col-md-3">
                <div class="form group">
                    <label for="">Contacto de emergencia</label>
                    <input type="text" value="{{$paciente->contacto_emergencia}}" name="contacto_emergencia" class="form-control"  disabled>
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
                    <label for="">Observaciones</label> 
                    <input type="text" value="{{$paciente->observaciones}}" name="observaciones" class="form-control" disabled>
                     @error('observaciones')
                     <small style="color: rgb(224, 22, 22)">{{$message}}</small>
                      @enderror
                 </div>
            </div>
              </div>  
              <br>

           <div class="row">
          </form>
                <div class="col md 12">
                   <div class="form group">
                     <a href="{{url('admin/pacientes')}}" class="btn btn-secondary">Volver</a>
                     <button type="submit" class="btn btn-danger">Confirmar</button>
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