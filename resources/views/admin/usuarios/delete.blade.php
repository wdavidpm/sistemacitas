@extends('layouts.admin')

@section('content')
 <div class="row">
 <h1>
   Usuario : {{$usuario->name}} 
 
</h1> 
 </div>
 <hr>
 <div class="row">
    
    <div class="col-md-10">
        <div class="card card card-danger">
          <div class="card-header">
            <h3 class="card-title">¿Estas seguro de eliminar este usuario?</h3>
            <!-- /.card-tools -->
          </div>
          <!-- /.card-header -->
          <div class="card-body">
          <form action="{{url('/admin/usuarios',$usuario->id)}}" method="POST">
            @csrf
            @method('DELETE')
            <div class="row">
                <div class="col md 12">
                   <div class="form group">
                       <label for="">Nombre de usuario</label> 
                       <input type="text" value="{{$usuario->name}}" name="name" class="form-control" disabled>
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
                      <label for="">Email</label> 
                      <input type="email"  value="{{$usuario->email}}" name="email" class="form-control" disabled>
                      @error('email')
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
                     <a href="{{url('admin/usuarios')}}" class="btn btn-secondary">Volver</a>
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