@extends('layouts.admin')

@section('content')
 <div class="row">
 <h1>
  Registro de secretarias
 
</h1> 
 </div>
 <hr>
 <div class="row">
    
    <div class="col-md-12">
        <div class="card card-outline card-primary">
          <div class="card-header">
            <h3 class="card-title">Completar datos</h3>
            <!-- /.card-tools -->
          </div>
          <!-- /.card-header -->
          <div class="card-body">
          <form action="{{url('/admin/secretarias/create')}}" method="POST">
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
                 <div class="col-md-3">
                    <div class="form group">
                        <label for="">Celular</label> <b>*</b>
                        <input type="text" value="{{old('telefono')}}" name="telefono" class="form-control" required>
                         @error('telefono')
                         <small style="color: rgb(224, 22, 22)">{{$message}}</small>
                          @enderror
                     </div>
                 </div>
               </div>
             <br>
             
           <div class="row">

             <div class="col-md-9">
                <div class="form group">
                    <label for="">Dirección</label> <b>*</b>
                    <input type="address" value="{{old('direccion')}}" name="direccion" class="form-control" required>
                     @error('direccion')
                     <small style="color: rgb(224, 22, 22)">{{$message}}</small>
                      @enderror
                 </div>
             </div>
               <div class="col-md-3">
                  <div class="form group">
                      <label for="">Fecha de nacimiento</label> <b>*</b>
                      <input type="date"  value="{{old('fecha_de_nacimiento')}}" name="fecha_de_nacimiento" class="form-control" required>
                      @error('fecha_de_nacimiento')
                      <small style="color: rgb(224, 22, 22)">{{$message}}</small>
                       @enderror
                    </div>
               </div>
              </div>
           <br>
           <div class="row">
            <div class="col md 12">
                <div class="form group">
                    <label for="">Email</label> <b>*</b>
                    <input type="email" name="email" class="form-control" required>
                    @error('email')
                    <small style="color: rgb(224, 22, 22)">{{$message}}</small>
                     @enderror
                </div>
             </div>

              </div>
           <br>
           <div class="row">
            <div class="col md 12">
                <div class="form group">
                    <label for="">Contraseña</label> <b>*</b>
                    <input type="password" name="password" class="form-control" required>
                    @error('password')
                    <small style="color: rgb(224, 22, 22)">{{$message}}</small>
                     @enderror
                </div>
             </div>
               <div class="col md 12">
                  <div class="form group">
                      <label for="">Confirmar contraseña</label> <b>*</b>
                      <input type="password" name="password_confirmation" class="form-control" required>
                      @error('password_confirmation')
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
                     <a href="{{url('admin/secretarias')}}" class="btn btn-secondary">Volver</a>
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