<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AGENDAMIENTO DE CITAS</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{url('plugins/fontawesome-free/css/all.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{url('dist/css/adminlte.min.css')}}">
  <!-- Icono -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
 

    <!-- Calendario -->
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.15/index.global.min.js'></script>
    <script src="{{url('fullcalendar/es.global.js')}}"></script>

<!-- sweetalert -->
   <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> 

    <!-- DataTables -->
    <link rel="stylesheet" href="{{url('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{url('plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{url('plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">

  <!-- jQuery -->
  <script src="{{url('plugins/jquery/jquery.min.js')}}"></script>

  <body class="hold-transition sidebar-mini">
  <div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="{{url('/admin')}}" class="nav-link">RESERVA DE CITAS</a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->



      <!-- Notifications Dropdown Menu -->

      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
          <i class="fas fa-th-large"></i>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="" class="brand-link">
      <img src="{{url('dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">PERFECT BODY</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        
        <div class="info">
          <a href="#" class="d-block">{{Auth::user()->name}}</a>
        </div>
      </div>

      <!-- SidebarSearch Form -->


      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
            with font-awesome or any other icon font library -->

        @can('admin.usuarios.index')
             <li class="nav-item menu">
            <a href="#" class="nav-link active">
                <i class="nav-icon fas bi bi-person-circle"></i>
                <p>
                Usuarios
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="#" class="nav-link ">
                    <a href="{{url('admin/usuarios/create')}}" class="nav-link ">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Crear usuario</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('admin/usuarios')}}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Listar usuario</p>
                  </a>
              </li>
            </ul>
          </li>           
        @endcan
        
        @can('admin.secretaria.index')
          <li class="nav-item menu">
            <a href="#" class="nav-link active">
                <i class="nav-icon fas bi bi-clipboard2-plus"></i>
                <p>
               Secretarias
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="#" class="nav-link ">
                    <a href="{{url('admin/secretarias/create')}}" class="nav-link ">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Crear Secretaria</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('admin/secretarias')}}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Listar Secretaria</p>
                  </a>
              </li>
            </ul>
          </li>          
        @endcan


        @can('admin.pacientes.index')
          <li class="nav-item menu">
            <a href="#" class="nav-link active">
                <i class="nav-icon fas bi bi-person-square"></i>
                <p>
               Pacientes
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="#" class="nav-link ">
                    <a href="{{url('admin/pacientes/create')}}" class="nav-link ">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Crear paciente</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('admin/pacientes')}}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Listar pacientes</p>
                  </a>
              </li>
            </ul>
          </li>          
        @endcan
        
        @can('admin.consultorios.index')
          <li class="nav-item menu">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas bi bi-door-open" ></i>              
              <p>
               Consultorios
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="#" class="nav-link ">
                    <a href="{{url('admin/consultorios/create')}}" class="nav-link ">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Crear consultorio</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('admin/consultorios')}}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Listar consultorios</p>
                  </a>
              </li>
            </ul>
          </li>          
        @endcan



        @can('admin.doctores.index')
          <li class="nav-item menu">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas bi bi-person-heart"></i>              
              <p>
               Doctores
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="#" class="nav-link ">
                    <a href="{{url('admin/doctores/create')}}" class="nav-link ">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Crear doctores</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('admin/doctores')}}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Listar doctores</p>
                  </a>
              </li>
            </ul>
          </li>          
        @endcan


   
        @can('admin.horarios.index')
          <li class="nav-item menu">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas bi bi-calendar-event"></i>              
              <p>
               Horarios
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="#" class="nav-link ">
                    <a href="{{url('admin/horarios/create')}}" class="nav-link ">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Agendar</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('admin/horarios')}}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Horarios Ocupados</p>
                  </a>
              </li>
            </ul>
          </li>          
        @endcan


          <li class="nav-item" style="background-color: rgb(180, 42, 42)">
            <a href="#" class="nav-link" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
              <i class="nav-icon fas fbi bi-door-closed"></i>
              <p>Cerrar sesión</p>
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
 
 
  @if (($message = Session::get('mensaje')) && ($icono = Session::get('icono')))
    <script>
          Swal.fire({
          position: "central",
          icon: "{{$icono}}",
          title: "{{$message}}",
          showConfirmButton: false,
          timer: 3000
          });
    </script>              
  @endif


  <!-- Content Wrapper. Contains page content -->

  <!-- /.content-wrapper -->
  <div class="content-wrapper">
    <div class="container">
        @yield('content')
    </div>
  </div>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
    <div class="p-3">
      <h5>Title</h5>
      <p>Sidebar content</p>
    </div>
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="float-right d-none d-sm-inline">
      Anything you want
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">Wdavidpm</a>.</strong> All rights reserved.
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- Bootstrap 4 -->
<script src="{{url('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

<!-- Datatable-->
<script src="{{url('plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{url('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{url('plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{url('plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<script src="{{url('plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{url('plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{url('plugins/jszip/jszip.min.js')}}"></script>
<script src="{{url('plugins/pdfmake/pdfmake.min.js')}}"></script>
<script src="{{url('plugins/pdfmake/vfs_fonts.js')}}"></script>
<script src="{{url('plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
<script src="{{url('plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>
<script src="{{url('plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{url('dist/js/adminlte.min.js')}}"></script>
</body>
</html>
