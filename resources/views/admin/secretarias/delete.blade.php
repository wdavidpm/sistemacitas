@extends('layouts.admin')

@section('content')
 <div class="row">
 <h1>
   Secretaria : {{$secretaria->nombres}} 
 
</h1> 
 </div>
 <hr>
 <div class="row">
    
    <div class="col-md-12">
        <div class="card card card-danger">
          <div class="card-header">
            <h3 class="card-title">¿Estas seguro de eliminar esta secretaria?</h3>
            <!-- /.card-tools -->
          </div>
          <!-- /.card-header -->
          <div class="card-body">
          <form action="{{url('/admin/secretarias',$secretaria->id)}}" method="POST">
            @csrf
            @method('DELETE')
            <div class="row">
                <div class="col-md-4">
                   <div class="form group">
                       <label for="">Nombres</label> 
                       <input type="text" value="{{$secretaria->nombres}}" name="nombres" class="form-control" disabled>
                        @error('nombres')
                        <small style="color: rgb(224, 22, 22)">{{$message}}</small>
                         @enderror
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form group">
                        <label for="">Apellidos</label> 
                        <input type="text" value="{{$secretaria->apellidos}}" name="apellidos" class="form-control" disabled>
                         @error('apellidos')
                         <small style="color: rgb(224, 22, 22)">{{$message}}</small>
                          @enderror
                     </div>
                 </div>
                 <div class="col-md-4">
                    <div class="form group">
                        <label for="">Identificacion</label> 
                        <input type="text" value="{{$secretaria->identificacion}}" name="identificacion" class="form-control" disabled>
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
                    <label for="">Telefono</label> 
                    <input type="text" value="{{$secretaria->telefono}}" name="telefono" class="form-control" disabled>
                     @error('telefono')
                     <small style="color: rgb(224, 22, 22)">{{$message}}</small>
                      @enderror
                 </div>
             </div>
             <div class="col-md-4">
                <div class="form group">
                    <label for="">Dirección</label> 
                    <input type="address" value="{{$secretaria->direccion}}" name="direccion" class="form-control" disabled>
                     @error('direccion')
                     <small style="color: rgb(224, 22, 22)">{{$message}}</small>
                      @enderror
                 </div>
             </div>
             <div class="col-md-4">
                <div class="form group">
                    <label for="">Fecha de facimiento</label> 
                    <input type="date" value="{{$secretaria->fecha_de_nacimiento}}" name="fecha_de_nacimiento" class="form-control" disabled>
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
                      <label for="">Email</label> 
                      <input type="email"  value="{{$secretaria->user->email}}" name="email" class="form-control" disabled>
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
                     <a href="{{url('admin/secretarias')}}" class="btn btn-secondary">Volver</a>
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