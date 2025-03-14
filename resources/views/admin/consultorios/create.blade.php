@extends('layouts.admin')

@section('content')
 <div class="row">
 <h1>
  Registro de consultorios
 
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
          <form action="{{url('/admin/consultorios/create')}}" method="POST">
            @csrf
            <div class="row">
                <div class="col-md-3">
                   <div class="form group">
                       <label for="">Nombres</label> <b>*</b>
                       <input type="text" value="{{old('nombre')}}" name="nombre" class="form-control" required>
                        @error('nombre')
                        <small style="color: rgb(224, 22, 22)">{{$message}}</small>
                         @enderror
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form group">
                        <label for="">Ubicacion</label> <b>*</b>
                        <input type="text" value="{{old('ubicacion')}}" name="ubicacion" class="form-control" required>
                         @error('ubicacion')
                         <small style="color: rgb(224, 22, 22)">{{$message}}</small>
                          @enderror
                     </div>
                 </div>
                 <div class="col-md-3">
                    <div class="form group">
                        <label for="">Capacidad</label> <b>*</b>
                        <input type="text" value="{{old('capacidad')}}" name="capacidad" class="form-control" required>
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
                  <input type="text" value="{{old('telefono')}}" name="telefono" class="form-control" >
                   @error('telefono')
                   <small style="color: rgb(224, 22, 22)">{{$message}}</small>
                    @enderror
               </div>
           </div>

             <div class="col-md-3">
                <div class="form group">
                    <label for="">Especialidad</label> <b>*</b>
                    <input type="text" value="{{old('especialidad')}}" name="especialidad" class="form-control" required>
                     @error('especialidad')
                     <small style="color: rgb(224, 22, 22)">{{$message}}</small>
                      @enderror
                 </div>
             </div>
               <div class="col-md-3">
                  <div class="form group">
                      <label for="">Estado</label> <b>*</b>
                      <input type="text"  value="{{old('estado')}}" name="estado" class="form-control" required>
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