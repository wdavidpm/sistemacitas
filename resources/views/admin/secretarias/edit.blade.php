@extends('layouts.admin')

@section('content')
 <div class="row">
 <h1>
  Modificar Secretaria  
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
          <form action="{{url('/admin/secretarias',$secretaria->id)}}" method="POST">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-md-4">
                   <div class="form group">
                       <label for="">Nombres</label> <b>*</b>
                       <input type="text" value="{{$secretaria->nombres}}" name="nombres" class="form-control">
                        @error('nombres')
                        <small style="color: rgb(224, 22, 22)">{{$message}}</small>
                         @enderror
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form group">
                        <label for="">Apellidos</label> <b>*</b>
                        <input type="text" value="{{$secretaria->apellidos}}" name="apellidos" class="form-control">
                         @error('apellidos')
                         <small style="color: rgb(224, 22, 22)">{{$message}}</small>
                          @enderror
                     </div>
                 </div>
                 <div class="col-md-4">
                    <div class="form group">
                        <label for="">Identificacion</label> <b>*</b>
                        <input type="text" value="{{$secretaria->identificacion}}" name="identificacion" class="form-control">
                         @error('identificacion')
                         <small style="color: rgb(224, 22, 22)">{{$message}}</small>
                          @enderror
                     </div>
                 </div>
               </div>

           <br>
           <div class="row">
            <div class="col-md-4">
                <div class="form group">
                    <label for="">Telefono</label> <b>*</b>
                    <input type="text" value="{{$secretaria->telefono}}" name="telefono" class="form-control">
                     @error('telefono')
                     <small style="color: rgb(224, 22, 22)">{{$message}}</small>
                      @enderror
                 </div>
             </div>
             <div class="col-md-4">
                <div class="form group">
                    <label for="">Dirección</label> <b>*</b>
                    <input type="address" value="{{$secretaria->direccion}}" name="direccion" class="form-control">
                     @error('direccion')
                     <small style="color: rgb(224, 22, 22)">{{$message}}</small>
                      @enderror
                 </div>
             </div>
             <div class="col-md-4">
                <div class="form group">
                    <label for="">Fecha de nacimiento</label> <b>*</b>
                    <input type="date" value="{{$secretaria->fecha_de_nacimiento}}" name="fecha_de_nacimiento" class="form-control">
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
                    <input type="email" name="email" value="{{$secretaria->user->email}}" class="form-control">
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
                    <input type="password" name="password" class="form-control">
                    @error('password')
                    <small style="color: rgb(224, 22, 22)">{{$message}}</small>
                     @enderror
                  </div>
             </div>
               <div class="col md 12">
                  <div class="form group">
                      <label for="">Confirmar contraseña</label> <b>*</b>
                      <input type="password" name="password_confirmation" class="form-control">
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