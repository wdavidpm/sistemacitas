@extends('layouts.admin')

@section('content')
 <div class="row">
 <h1>
  Modificar doctor  
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
          <form action="{{url('/admin/doctores',$doctor->id)}}" method="POST">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-md-4">
                   <div class="form group">
                       <label for="">Nombres</label> <b>*</b>
                       <input type="text" value="{{$doctor->nombres}}" name="nombres" class="form-control">
                        @error('nombres')
                        <small style="color: rgb(224, 22, 22)">{{$message}}</small>
                         @enderror
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form group">
                        <label for="">Apellidos</label> <b>*</b>
                        <input type="text" value="{{$doctor->apellidos}}" name="apellidos" class="form-control">
                         @error('apellidos')
                         <small style="color: rgb(224, 22, 22)">{{$message}}</small>
                          @enderror
                     </div>
                 </div>
                 <div class="col-md-4">
                    <div class="form group">
                        <label for="">Identificacion</label> <b>*</b>
                        <input type="text" value="{{$doctor->identificacion}}" name="identificacion" class="form-control">
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
                    <label for="">Especialidad</label> <b>*</b>
                    <input type="text" value="{{$doctor->especialidad}}" name="especialidad" class="form-control">
                     @error('especialidad')
                     <small style="color: rgb(224, 22, 22)">{{$message}}</small>
                      @enderror
                 </div>
             </div>
             <div class="col-md-4">
                <div class="form group">
                    <label for="">Telefono</label> <b>*</b>
                    <input type="text" value="{{$doctor->telefono}}" name="telefono" class="form-control">
                     @error('telefono')
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
                    <input type="email" name="email" value="{{$doctor->user->email}}" class="form-control">
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
                     <a href="{{url('admin/doctores')}}" class="btn btn-secondary">Volver</a>
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