@extends('layouts.admin')

@section('content')
 <div class="row">
 <h1>
  usuario:  {{$usuario->name}} 
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
                        <p>{{$usuario->name}}</p>
                    </div>
                </div>
               </div>
       <br>
           <div class="row">
               <div class="col md 12">
                  <div class="form group">
                      <label for="">Email</label>
                      <p>{{$usuario->email}}</p>

                    </div>
               </div>
              </div>
           <br>
            <div class="col md 12">
                   <div class="form group">
                     <a href="{{url('admin/usuarios')}}" class="btn btn-secondary">Volver</a>
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