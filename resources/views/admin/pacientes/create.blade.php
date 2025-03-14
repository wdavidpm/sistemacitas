@extends('layouts.admin')

@section('content')
 <div class="row">
 <h1>
  Registro de paciente
 
</h1> 
 </div>
 <hr>
 <div class="row">
    
    <div class="col-md-10">
        <div class="card card-outline card-primary">
          <div class="card-header">
            <h3 class="card-title">Completar datos</h3>
            <!-- /.card-tools -->
          </div>
          <!-- /.card-header -->
          <div class="card-body">
          <form action="{{url('/admin/pacientes/create')}}" method="POST">
            @csrf
            <div class="row">
                <div class="col-md-3">
                   <div class="form group">
                       <label for="">Nombres</label> <b>*</b>
                       <input type="text" value="{{old('nombres')}}" name="nombres" class="form-control" required>
                        @error('nombres')
                        <small style="color: rgb(224, 22, 22)">{{$message}}</small>
                         @enderror
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form group">
                        <label for="">Apellidos</label> <b>*</b>
                        <input type="text" value="{{old('apellidos')}}" name="apellidos" class="form-control" required>
                         @error('apellidos')
                         <small style="color: rgb(224, 22, 22)">{{$message}}</small>
                          @enderror
                     </div>
                 </div>
                 <div class="col-md-3">
                    <div class="form group">
                        <label for="">Identificacion</label> <b>*</b>
                        <input type="text" value="{{old('identificacion')}}" name="identificacion" class="form-control" required>
                         @error('identificacion')
                         <small style="color: rgb(224, 22, 22)">{{$message}}</small>
                          @enderror
                     </div>
                 </div>
               </div>
             <br>
             
            <div class="row">
                <div class="col-md-6">
                    <div class="form group">
                        <label for="">Correo</label> <b>*</b>
                        <input type="email" value="{{old('correo')}}" name="correo" class="form-control" required>
                         @error('correo')
                         <small style="color: rgb(224, 22, 22)">{{$message}}</small>
                          @enderror
                     </div>
                 </div>

                 <div class="col-md-3">
                    <div class="form group">
                        <label for="">Entidad</label> <b>*</b>
                        <input type="text" value="{{old('entidad')}}" name="entidad" class="form-control" required>
                         @error('entidad')
                         <small style="color: rgb(224, 22, 22)">{{$message}}</small>
                          @enderror
                     </div>
                 </div>
            <br>
            </div>
           <div class="row">

               <div class="col-md-3">
                  <div class="form group">
                      <label for="">Fecha de nacimiento</label> <b>*</b>
                      <input type="date"  value="{{old('fecha_de_nacimiento')}}" name="fecha_de_nacimiento" class="form-control" required>
                      @error('fecha_de_nacimiento')
                      <small style="color: rgb(224, 22, 22)">{{$message}}</small>
                       @enderror
                    </div>
               </div>
               <div class="col-md-3">
                <div class="form group">
                    <label for="">Genero</label> <b>*</b>
                    <input type="text" value="{{old('genero')}}" name="genero" class="form-control" required>
                     @error('genero')
                     <small style="color: rgb(224, 22, 22)">{{$message}}</small>
                      @enderror
                 </div>
             </div>
             <div class="col-md-3">
                <div class="form group">
                    <label for="">Telefono</label> <b>*</b>
                    <input type="text" value="{{old('telefono')}}" name="telefono" class="form-control" required>
                     @error('telefono')
                     <small style="color: rgb(224, 22, 22)">{{$message}}</small>
                      @enderror
                 </div>
             </div>
              </div>
           <br>
           <div class="row">
            <div class="col-md-6">
                <div class="form group">
                    <label for="">Dirección</label> <b>*</b>
                    <input type="address" value="{{old('direccion')}}" name="direccion" class="form-control" required>
                     @error('direccion')
                     <small style="color: rgb(224, 22, 22)">{{$message}}</small>
                      @enderror
                 </div>
                
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="tipo_de_sangre">Tipo de sangre <b>*</b></label>
                        <select name="tipo_de_sangre" id="tipo_de_sangre" class="form-control" required>
                            <option value="">Seleccione el tipo de sangre</option>
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

            </div>
           <br>
           <div class="row">
            <div class="col-md-3">
                <div class="form group">
                    <label for="">Alergias</label> 
                    <input type="text" value="{{old('alergias')}}" name="alergias" class="form-control" >
                     @error('alergias')
                     <small style="color: rgb(224, 22, 22)">{{$message}}</small>
                      @enderror
                 </div>
             </div>
             <div class="col-md-3">
                <div class="form group">
                    <label for="">Contacto de emergencia</label> <b>*</b>
                    <input type="text" value="{{old('contacto_emergencia')}}" name="contacto_emergencia" class="form-control" required>
                     @error('contacto_emergencia')
                     <small style="color: rgb(224, 22, 22)">{{$message}}</small>
                      @enderror
                 </div>
             </div>
             <div class="col-md-3">
                <div class="form group">
                    <label for="">Observacion</label> 
                    <input type="text" value="{{old('observacion')}}" name="observacion" class="form-control" >
                     @error('observacion')
                     <small style="color: rgb(224, 22, 22)">{{$message}}</small>
                      @enderror
                 </div>
             </div>
           </div>
           <br>
           <div class="row">
              </div>  
           <hr>
           <div class="row">
          </form>
                <div class="col md 12">
                   <div class="form group">
                     <a href="{{url('admin/pacientes')}}" class="btn btn-secondary">Volver</a>
                     <button type="submit" class="btn btn-primary">Registrar</button>
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