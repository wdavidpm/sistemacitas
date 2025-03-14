@extends('layouts.admin')

@section('content')
 <div class="row">
 <h1>
  Modificar consultorio 
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
          <form action="{{url('/admin/consultorios',$consultorio->id)}}" method="POST">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-md-3">
                   <div class="form group">
                       <label for="">Nombre</label> <b>*</b>
                       <input type="text" value="{{$consultorio->nombre}}" name="nombre" class="form-control">
                        @error('nombre')
                        <small style="color: rgb(224, 22, 22)">{{$message}}</small>
                         @enderror
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form group">
                        <label for="">Ubicacion</label> <b>*</b>
                        <input type="text" value="{{$consultorio->ubicacion}}" name="ubicacion" class="form-control">
                         @error('ubicacion')
                         <small style="color: rgb(224, 22, 22)">{{$message}}</small>
                          @enderror
                     </div>
                 </div>
                 <div class="col-md-3">
                    <div class="form group">
                        <label for="">Capacidad</label> <b>*</b>
                        <input type="text" value="{{$consultorio->capacidad}}" name="capacidad" class="form-control">
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
                    <label for="">Telefono</label> <b>*</b>
                    <input type="text" value="{{$consultorio->telefono}}" name="telefono" class="form-control">
                     @error('entidad')
                     <small style="color: rgb(224, 22, 22)">{{$message}}</small>
                      @enderror
                 </div>
             </div>
             <div class="col-md-3">
                <div class="form group">
                    <label for="">Especialidad</label> <b>*</b>
                    <input type="text" value="{{$consultorio->especialidad}}" name="especialidad" class="form-control">
                     @error('especialidad')
                     <small style="color: rgb(224, 22, 22)">{{$message}}</small>
                      @enderror
                 </div>
             </div>
             <div class="col-md-3">
                <div class="form group">
                    <label for="">estado</label> <b>*</b>
                    <input type="text" value="{{$consultorio->estado}}" name="estado" class="form-control">
                     @error('estado')
                     <small style="color: rgb(224, 22, 22)">{{$message}}</small>
                      @enderror
                 </div>
            </div>
              </div>
           <br>
           <hr>
           <div class="row">
          </form>
                <div class="col md 12">
                   <div class="form group">
                     <a href="{{url('admin/consultorios')}}" class="btn btn-secondary">Volver</a>
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