@extends('layouts.admin')

@section('content')
 <div class="row">
 <h1>
  doctor :  {{$doctor->nombres}} {{$doctor->apellidos}}
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
                <div class="col md 12">
                   <div class="form group">
                       <label for="">Nombres </label>
                        <p>{{$doctor->nombres}}</p>
                    </div>
                </div>
                <div class="col md 12">
                    <div class="form group">
                        <label for="">Apellidos</label>
                         <p>{{$doctor->apellidos}}</p>
                     </div>
                 </div>
               </div>

           <br>
           <div class="row">
            <div class="col md 12">
                <div class="form group">
                    <label for="">Identificiación</label>
                     <p>{{$doctor->identificacion}}</p>
                 </div>
             </div>
             <div class="col md 12">
                <div class="form group">
                    <label for="">Especialidad</label>
                     <p>{{$doctor->especialidad}}</p>
                 </div>
             </div>
           </div>

       <br>
       <div class="row">
        <div class="col md 12">
            <div class="form group">
                <label for="">Telefono</label>
                 <p>{{$doctor->telefono}}</p>
             </div>
         </div>
       </div>
       <br>
       <div class="row">
        <div class="col md 12">
            <div class="form group">
                <label for="">Email</label>
                 <p>{{$doctor->user->email}}</p>
             </div>
         </div>
       </div>

           <br>
            <div class="col md 12">
                   <div class="form group">
                     <a href="{{url('admin/doctores')}}" class="btn btn-secondary">Volver</a>
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