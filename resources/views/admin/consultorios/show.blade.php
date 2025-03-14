@extends('layouts.admin')

@section('content')
 <div class="row">
 <h1>
  consultorio :  {{$consultorio->nombre}} 
</h1> 
 </div>
 <hr>
 <div class="row">
    
    <div class="col-md-10">
        <div class="card card-outline card-primary">
          <div class="card-header">
            <h3 class="card-title">Datos registrados</h3>
            <!-- /.card-tools -->
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <div class="row">
                <div class="col md 3">
                   <div class="form group">
                       <label for="">Nombre </label>
                        <p>{{$consultorio->nombre}}</p>
                    </div>
                </div>
                <div class="col md 3">
                    <div class="form group">
                        <label for="">Ubicacion</label>
                         <p>{{$consultorio->ubicacion}}</p>
                     </div>
                 </div>

                 <div class="col md 12">
                    <div class="form group">
                        <label for="">Capacidad</label>
                         <p>{{$consultorio->capacidad}}</p>
                     </div>
                 </div>
               </div>

           <br>
           <div class="row">
            <div class="col md 12">
                <div class="form group">
                    <label for="">Telefono</label>
                     <p>{{$consultorio->telefono}}</p>
                 </div>
             </div>
             <div class="col md 12">
                <div class="form group">
                    <label for="">Especialidad</label>
                     <p>{{$consultorio->especialidad}}</p>
                 </div>
             </div>

             <div class="col md 12">
                <div class="form group">
                    <label for="">Estado</label>
                     <p>{{$consultorio->estado}}</p>
                 </div>
             </div>
        </div>

           <br>
            <div class="col md 12">
                   <div class="form group">
                     <a href="{{url('admin/consultorios')}}" class="btn btn-secondary">Volver</a>
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
