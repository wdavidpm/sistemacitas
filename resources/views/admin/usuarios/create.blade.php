@extends('layouts.admin')

@section('content')
 <div class="row">
 <h1>
  Regristro de usuarios 
 
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
          <form action="{{url('/admin/usuarios/create')}}" method="POST">
            @csrf
            <div class="row">
                <div class="col md 12">
                   <div class="form group">
                       <label for="">Nombre de usuario</label> <b>*</b>
                       <input type="text" value="{{old('name')}}" name="name" class="form-control" required>
                        @error('name')
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
                      <input type="email"  value="{{old('email')}}" name="email" class="form-control" required>
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
              </div>
           <br>
           <div class="row">
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
                     <a href="{{url('admin/usuarios')}}" class="btn btn-secondary">Volver</a>
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