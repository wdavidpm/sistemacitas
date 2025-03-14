@extends('layouts.admin')

@section('content')
 <div class="row">
 <h1>
</h1> 
 </div>
 <hr>
 <div class="row">
    
    <div class="col-md-8">
        <div class="card card-outline card-primary">
          <div class="card-header">
            <h3 class="card-title">Datos registrados</h3>
            <!-- /.card-tools -->
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                   <div class="form group">
                       <label for="">Doctor </label>
                        <p>{{$horario->doctor->nombres. ' ' .$horario->doctor->apellidos}}</p>
                    </div>
                </div>
                <div class="col md 12">
                    <div class="form group">
                        <label for="">Consultorio</label>
                         <p>{{$horario->consultorio->nombre. ' ' .$horario->consultorio->ubicacion}}</p>
                     </div>
                 </div>
               </div>

           <br>
           <div class="row">
            
            <div class="col md 12">
                <div class="form group">
                    <label for="">Dia</label>
                     <p>{{$horario->dia}}</p>
                 </div>
             </div>


            <div class="col md 12">
                <div class="form group">
                    <label for="">Hora de inicio</label>
                     <p>{{$horario->hora_inicio}}</p>
                 </div>
             </div>
             <div class="col md 12">
                <div class="form group">
                    <label for="">Hora final</label>
                     <p>{{$horario->hora_fin}}</p>
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
            <div class="col md 12">
                   <div class="form group">
                     <a href="{{url('admin/horarios')}}" class="btn btn-secondary">Volver</a>
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