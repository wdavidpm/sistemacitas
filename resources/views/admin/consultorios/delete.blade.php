@extends('layouts.admin')

@section('content')
 <div class="row">
 <h1>
   consultorio : {{$consultorio->nombre}} 
 
</h1> 
 </div>
 <hr>
 <div class="row">
    
    <div class="col-md-12">
        <div class="card card card-danger">
          <div class="card-header">
            <h3 class="card-title">¿Estas seguro de eliminar esta consultorio?</h3>
            <!-- /.card-tools -->
          </div>
          <!-- /.card-header -->
          <div class="card-body">
          <form action="{{url('/admin/consultorios',$consultorio->id)}}" method="POST">
            @csrf
            @method('DELETE')
            <div class="row">
                <div class="col-md-3">
                    <div class="form group">
                        <label for="">Nombres</label> 
                        <input type="text" value="{{$consultorio->nombre}}" name="nombre" class="form-control"  disabled>
                         @error('nombre')
                         <small style="color: rgb(224, 22, 22)">{{$message}}</small>
                          @enderror
                     </div>
                 </div>
                 <div class="col-md-3">
                     <div class="form group">
                         <label for="">Ubicacion</label> 
                         <input type="text" value="{{$consultorio->ubicacion}}" name="ubicacion" class="form-control"  disabled>
                          @error('ubicacion')
                          <small style="color: rgb(224, 22, 22)">{{$message}}</small>
                           @enderror
                      </div>
                  </div>
                  <div class="col-md-3">
                     <div class="form group">
                         <label for="">Capacidad</label> 
                         <input type="text" value="{{$consultorio->capacidad}}" name="capacidad" class="form-control"  disabled>
                          @error('capacidad')
                          <small style="color: rgb(224, 22, 22)">{{$message}}</small>
                           @enderror
                      </div>
                  </div>

               </div>

           <br>
           <div class="row">
            <div class="col-md-3">
                <div class="form group">
                    <label for="">Telefono</label> 
                    <input type="text" value="{{$consultorio->telefono}}" name="telefono" class="form-control"  disabled>
                     @error('telefono')
                     <small style="color: rgb(224, 22, 22)">{{$message}}</small>
                      @enderror
                 </div>
             </div>
            <div class="col-md-3">
                <div class="form group">
                    <label for="">Especialidad</label> 
                    <input type="text" value="{{$consultorio->especialidad}}" name="especialidad" class="form-control" disabled>
                     @error('especialidad')
                     <small style="color: rgb(224, 22, 22)">{{$message}}</small>
                      @enderror
                 </div>
             </div>
             <div class="col-md-3">
                <div class="form group">
                    <label for="">Estado</label>
                    <input type="text" value="{{$consultorio->estado}}" name="estado" class="form-control" disabled>
                     @error('estado')
                     <small style="color: rgb(224, 22, 22)">{{$message}}</small>
                      @enderror
                 </div>
             </div>


           </div>
           <br>
           <div class="row">

              </div>
           <br>
           <div class="row">
              </div>  
              <br>

           <div class="row">
          </form>
                <div class="col md 12">
                   <div class="form group">
                     <a href="{{url('admin/consultorios')}}" class="btn btn-secondary">Volver</a>
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