<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UsuarioController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [App\Http\Controllers\WebController::class, 'index'])->name('index');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//ruta admin
Route::get('/admin', [App\Http\Controllers\AdminController::class, 'index'])->name('admin.index')->middleware('auth');
// Ruta Ajax
Route::get('/consultorios/{id}', [App\Http\Controllers\WebController::class, 'cargar_datos_consultorios'])
    ->name('admin.cargar_datos_consultorios')
    ->middleware('auth');
   

Route::post('/admin/eventos/create', [App\Http\Controllers\EventController::class, 'store'])
    ->name('admin.eventos.create')
    ->middleware('auth');

    Route::get('/admin/citas/doctor/{doctorId}', [App\Http\Controllers\EventController::class, 'getDoctorEvents'])
    ->name('admin.citas.doctor')
    ->middleware('auth');

// Rutas de Usuarios
Route::get('/admin/usuarios', [App\Http\Controllers\UsuarioController::class, 'index'])
    ->name('admin.usuarios.index')
    ->middleware('auth', 'can:admin.usuarios.index');

Route::get('/admin/usuarios/create', [App\Http\Controllers\UsuarioController::class, 'create'])
    ->name('admin.usuarios.create')
    ->middleware('auth', 'can:admin.usuarios.create');

Route::post('/admin/usuarios/create', [App\Http\Controllers\UsuarioController::class, 'store'])
    ->name('admin.usuarios.store')
    ->middleware('auth', 'can:admin.usuarios.store');

Route::get('/admin/usuarios/{id}', [App\Http\Controllers\UsuarioController::class, 'show'])
    ->name('admin.usuarios.show')
    ->middleware('auth', 'can:admin.usuarios.show');

Route::get('/admin/usuarios/{id}/edit', [App\Http\Controllers\UsuarioController::class, 'edit'])
    ->name('admin.usuarios.edit')
    ->middleware('auth', 'can:admin.usuarios.edit');

Route::put('/admin/usuarios/{id}', [App\Http\Controllers\UsuarioController::class, 'update'])
    ->name('admin.usuarios.update')
    ->middleware('auth', 'can:admin.usuarios.update');

Route::get('/admin/usuarios/{id}/confirm-Delete', [App\Http\Controllers\UsuarioController::class, 'ConfirmDelete'])
    ->name('admin.usuarios.confirmeDelete')
    ->middleware('auth', 'can:admin.usuarios.confirmeDelete');

Route::delete('/admin/usuarios/{id}', [App\Http\Controllers\UsuarioController::class, 'destroy'])
    ->name('admin.usuarios.destroy')
    ->middleware('auth', 'can:admin.usuarios.destroy');


// Rutas de Secretarias
Route::get('/admin/secretarias', [App\Http\Controllers\SecretariaController::class, 'index'])
    ->name('admin.secretarias.index')
    ->middleware('auth', 'can:admin.secretarias.index');

Route::get('/admin/secretarias/create', [App\Http\Controllers\SecretariaController::class, 'create'])
    ->name('admin.secretarias.create')
    ->middleware('auth', 'can:admin.secretarias.create');

Route::post('/admin/secretarias/create', [App\Http\Controllers\SecretariaController::class, 'store'])
    ->name('admin.secretarias.store')
    ->middleware('auth', 'can:admin.secretarias.store');

Route::get('/admin/secretarias/{id}', [App\Http\Controllers\SecretariaController::class, 'show'])
    ->name('admin.secretarias.show')
    ->middleware('auth', 'can:admin.secretarias.show');

Route::get('/admin/secretarias/{id}/edit', [App\Http\Controllers\SecretariaController::class, 'edit'])
    ->name('admin.secretaria.edit')
    ->middleware('auth', 'can:admin.secretarias.edit');

Route::put('/admin/secretarias/{id}', [App\Http\Controllers\SecretariaController::class, 'update'])
    ->name('admin.secretarias.update')
    ->middleware('auth', 'can:admin.secretarias.update');

Route::get('/admin/secretarias/{id}/confirm-Delete', [App\Http\Controllers\SecretariaController::class, 'ConfirmDelete'])
    ->name('admin.secretarias.confirmeDelete')
    ->middleware('auth', 'can:admin.secretarias.confirmeDelete');

Route::delete('/admin/secretarias/{id}', [App\Http\Controllers\SecretariaController::class, 'destroy'])
    ->name('admin.secretarias.destroy')
    ->middleware('auth', 'can:admin.secretarias.destroy');


// Rutas de Pacientes
Route::get('/admin/pacientes', [App\Http\Controllers\PacienteController::class, 'index'])
    ->name('admin.pacientes.index')
    ->middleware('auth', 'can:admin.pacientes.index');

Route::get('/admin/pacientes/create', [App\Http\Controllers\PacienteController::class, 'create'])
    ->name('admin.pacientes.create')
    ->middleware('auth', 'can:admin.pacientes.create');

Route::post('/admin/pacientes/create', [App\Http\Controllers\PacienteController::class, 'store'])
    ->name('admin.pacientes.store')
    ->middleware('auth', 'can:admin.pacientes.store');

Route::get('/admin/pacientes/{id}', [App\Http\Controllers\PacienteController::class, 'show'])
    ->name('admin.pacientes.show')
    ->middleware('auth', 'can:admin.pacientes.show');

Route::get('/admin/pacientes/{id}/edit', [App\Http\Controllers\PacienteController::class, 'edit'])
    ->name('admin.pacientes.edit')
    ->middleware('auth', 'can:admin.pacientes.edit');

Route::put('/admin/pacientes/{id}', [App\Http\Controllers\PacienteController::class, 'update'])
    ->name('admin.pacientes.update')
    ->middleware('auth', 'can:admin.pacientes.update');

Route::get('/admin/pacientes/{id}/confirm-Delete', [App\Http\Controllers\PacienteController::class, 'ConfirmDelete'])
    ->name('admin.pacientes.confirmeDelete')
    ->middleware('auth', 'can:admin.pacientes.confirmeDelete');

Route::delete('/admin/pacientes/{id}', [App\Http\Controllers\PacienteController::class, 'destroy'])
    ->name('admin.pacientes.destroy')
    ->middleware('auth', 'can:admin.pacientes.destroy');


// Rutas de Consultorios
Route::get('/admin/consultorios', [App\Http\Controllers\consultorioController::class, 'index'])
    ->name('admin.consultorios.index')
    ->middleware('auth', 'can:admin.consultorios.index');

Route::get('/admin/consultorios/create', [App\Http\Controllers\consultorioController::class, 'create'])
    ->name('admin.consultorios.create')
    ->middleware('auth', 'can:admin.consultorios.create');

Route::post('/admin/consultorios/create', [App\Http\Controllers\consultorioController::class, 'store'])
    ->name('admin.consultorios.store')
    ->middleware('auth', 'can:admin.consultorios.store');

Route::get('/admin/consultorios/{id}', [App\Http\Controllers\consultorioController::class, 'show'])
    ->name('admin.consultorios.show')
    ->middleware('auth', 'can:admin.consultorios.show');

Route::get('/admin/consultorios/{id}/edit', [App\Http\Controllers\consultorioController::class, 'edit'])
    ->name('admin.consultorios.edit')
    ->middleware('auth', 'can:admin.consultorios.edit');

Route::put('/admin/consultorios/{id}', [App\Http\Controllers\consultorioController::class, 'update'])
    ->name('admin.consultorios.update')
    ->middleware('auth', 'can:admin.consultorios.update');

Route::get('/admin/consultorios/{id}/confirm-Delete', [App\Http\Controllers\consultorioController::class, 'ConfirmDelete'])
    ->name('admin.consultorios.confirmeDelete')
    ->middleware('auth', 'can:admin.consultorios.confirmeDelete');

Route::delete('/admin/consultorios/{id}', [App\Http\Controllers\consultorioController::class, 'destroy'])
    ->name('admin.consultorios.destroy')
    ->middleware('auth', 'can:admin.consultorios.destroy');


// Rutas de Doctores
Route::get('/admin/doctores', [App\Http\Controllers\doctorController::class, 'index'])
    ->name('admin.doctores.index')
    ->middleware('auth', 'can:admin.doctores.index');

Route::get('/admin/doctores/create', [App\Http\Controllers\doctorController::class, 'create'])
    ->name('admin.doctores.create')
    ->middleware('auth', 'can:admin.doctores.create');

Route::post('/admin/doctores/create', [App\Http\Controllers\doctorController::class, 'store'])
    ->name('admin.doctores.store')
    ->middleware('auth', 'can:admin.doctores.store');

Route::get('/admin/doctores/{id}', [App\Http\Controllers\doctorController::class, 'show'])
    ->name('admin.doctores.show')
    ->middleware('auth', 'can:admin.doctores.show');

Route::get('/admin/doctores/{id}/edit', [App\Http\Controllers\doctorController::class, 'edit'])
    ->name('admin.doctores.edit')
    ->middleware('auth', 'can:admin.doctores.edit');

Route::put('/admin/doctores/{id}', [App\Http\Controllers\doctorController::class, 'update'])
    ->name('admin.doctores.update')
    ->middleware('auth', 'can:admin.doctores.update');

Route::get('/admin/doctores/{id}/confirm-Delete', [App\Http\Controllers\doctorController::class, 'ConfirmDelete'])
    ->name('admin.doctores.confirmeDelete')
    ->middleware('auth', 'can:admin.doctores.confirmeDelete');

Route::delete('/admin/doctores/{id}', [App\Http\Controllers\doctorController::class, 'destroy'])
    ->name('admin.doctores.destroy')
    ->middleware('auth', 'can:admin.doctores.destroy');


// Rutas de Horarios
Route::get('/admin/horarios', [App\Http\Controllers\horarioController::class, 'index'])
    ->name('admin.horarios.index')
    ->middleware('auth', 'can:admin.horarios.index');

Route::get('/admin/horarios/create', [App\Http\Controllers\horarioController::class, 'create'])
    ->name('admin.horarios.create')
    ->middleware('auth', 'can:admin.horarios.create');

Route::post('/admin/horarios/create', [App\Http\Controllers\horarioController::class, 'store'])
    ->name('admin.horarios.store')
    ->middleware('auth', 'can:admin.horarios.store');

Route::get('/admin/horarios/{id}', [App\Http\Controllers\horarioController::class, 'show'])
    ->name('admin.horarios.show')
    ->middleware('auth', 'can:admin.horarios.show');

Route::get('/admin/horarios/{id}/edit', [App\Http\Controllers\horarioController::class, 'edit'])
    ->name('admin.horarios.edit')
    ->middleware('auth', 'can:admin.horarios.edit');

Route::put('/admin/horarios/{id}', [App\Http\Controllers\horarioController::class, 'update'])
    ->name('admin.horarios.update')
    ->middleware('auth', 'can:admin.horarios.update');

Route::get('/admin/horarios/{id}/confirm-Delete', [App\Http\Controllers\horarioController::class, 'ConfirmDelete'])
    ->name('admin.horarios.confirmeDelete')
    ->middleware('auth', 'can:admin.horarios.confirmeDelete');

Route::delete('/admin/horarios/{id}', [App\Http\Controllers\horarioController::class, 'destroy'])
    ->name('admin.horarios.destroy')
    ->middleware('auth', 'can:admin.horarios.destroy');


// Ruta Ajax
Route::get('/admin/horarios/consultorios/{id}', [App\Http\Controllers\horarioController::class, 'cargar_datos_consultorios'])
    ->name('admin.horarios.cargar_datos_consultorios')
    ->middleware('auth', 'can:admin.horarios.cargar_datos_consultorios');