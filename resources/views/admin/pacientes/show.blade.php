@extends('layouts.admin')

@section('content')
 <div class="row">
 <h1>
  paciente :  {{$paciente->nombres}} {{$paciente->apellidos}}
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
                       <label for="">Nombres </label>
                        <p>{{$paciente->nombres}}</p>
                    </div>
                </div>
                <div class="col md 3">
                    <div class="form group">
                        <label for="">Apellidos</label>
                         <p>{{$paciente->apellidos}}</p>
                     </div>
                 </div>

                 <div class="col md 12">
                    <div class="form group">
                        <label for="">Identificiación</label>
                         <p>{{$paciente->identificacion}}</p>
                     </div>
                 </div>
               </div>

           <br>
           <div class="row">
            <div class="col md 12">
                <div class="form group">
                    <label for="">Entidad</label>
                     <p>{{$paciente->entidad}}</p>
                 </div>
             </div>
             <div class="col md 12">
                <div class="form group">
                    <label for="">Telefono</label>
                     <p>{{$paciente->telefono}}</p>
                 </div>
             </div>

             <div class="col md 12">
                <div class="form group">
                    <label for="">Fecha de nacimiento</label>
                     <p>{{$paciente->fecha_de_nacimiento}}</p>
                 </div>
             </div>
           </div>

       <br>
       <div class="row">
         <div class="col md 12">
            <div class="form group">
                <label for="">Genero</label>
                 <p>{{$paciente->genero}}</p>
             </div>
         </div>
         <div class="col md 12">
            <div class="form group">
                <label for="">Direccion</label>
                 <p>{{$paciente->direccion}}</p>
             </div>
         </div>
         <div class="col md 12">
            <div class="form group">
                <label for="">Tipo de sangre</label>
                 <p>{{$paciente->tipo_de_sangre}}</p>
             </div>
         </div>
       </div>
       <br>
       <div class="row">
        <div class="col md 12">
            <div class="form group">
                <label for="">Email</label>
                 <p>{{$paciente->correo}}</p>
             </div>
         </div>
         <div class="col md 12">
            <div class="form group">
                <label for="">Alergias</label>
                 <p>{{$paciente->alergias}}</p>
             </div>
         </div>
         <div class="col md 12">
            <div class="form group">
                <label for="">Contacto de emergencia</label>
                 <p>{{$paciente->contacto_emergencia}}</p>
             </div>
         </div>
       </div>
       <div class="row">
        <div class="col md 12">
            <div class="form group">
                <label for="">Observaciones</label>
                 <p>{{$paciente->observaciones}}</p>
             </div>
         </div>
       </div>

           <br>
            <div class="col md 12">
                   <div class="form group">
                     <a href="{{url('admin/pacientes')}}" class="btn btn-secondary">Volver</a>
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
