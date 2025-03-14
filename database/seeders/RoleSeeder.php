<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
              // Crear o recuperar roles (se utiliza firstOrCreate para evitar duplicados)
              $admin      = Role::firstOrCreate(['name' => 'admin']);
              $secretaria = Role::firstOrCreate(['name' => 'secretaria']);
              $doctor     = Role::firstOrCreate(['name' => 'doctor']);
              $paciente   = Role::firstOrCreate(['name' => 'paciente']);
              $usuario    = Role::firstOrCreate(['name' => 'usuario']);
      
              // Crear permisos y asignarlos a los roles correspondientes
              Permission::firstOrCreate(['name' => 'admin.index'])->assignRole($admin);
      
              // Permisos para administración de usuarios (solo admin)
              Permission::firstOrCreate(['name' => 'admin.usuarios.index'])->assignRole($admin);
              Permission::firstOrCreate(['name' => 'admin.usuarios.create'])->assignRole($admin);
              Permission::firstOrCreate(['name' => 'admin.usuarios.store'])->assignRole($admin);
              Permission::firstOrCreate(['name' => 'admin.usuarios.show'])->assignRole($admin);
              Permission::firstOrCreate(['name' => 'admin.usuarios.edit'])->assignRole($admin);
              Permission::firstOrCreate(['name' => 'admin.usuarios.update'])->assignRole($admin);
              Permission::firstOrCreate(['name' => 'admin.usuarios.confirmeDelete'])->assignRole($admin);
              Permission::firstOrCreate(['name' => 'admin.usuarios.destroy'])->assignRole($admin);
      
              // Permisos para secretarias (se asignan a admin para este ejemplo)
              Permission::firstOrCreate(['name' => 'admin.secretarias.index'])->assignRole($admin);
              Permission::firstOrCreate(['name' => 'admin.secretarias.create'])->assignRole($admin);
              Permission::firstOrCreate(['name' => 'admin.secretarias.store'])->assignRole($admin);
              Permission::firstOrCreate(['name' => 'admin.secretarias.show'])->assignRole($admin);
              Permission::firstOrCreate(['name' => 'admin.secretaria.edit'])->assignRole($admin);
              Permission::firstOrCreate(['name' => 'admin.secretarias.update'])->assignRole($admin);
              Permission::firstOrCreate(['name' => 'admin.secretarias.confirmeDelete'])->assignRole($admin);
              Permission::firstOrCreate(['name' => 'admin.secretarias.destroy'])->assignRole($admin);
      
              // Permisos para pacientes (se asignan a admin y secretaria)
              Permission::firstOrCreate(['name' => 'admin.pacientes.index'])->assignRole($admin, $secretaria);
              Permission::firstOrCreate(['name' => 'admin.pacientes.create'])->assignRole($admin, $secretaria);
              Permission::firstOrCreate(['name' => 'admin.pacientes.store'])->assignRole($admin, $secretaria);
              Permission::firstOrCreate(['name' => 'admin.pacientes.show'])->assignRole($admin, $secretaria);
              Permission::firstOrCreate(['name' => 'admin.pacientes.edit'])->assignRole($admin, $secretaria);
              Permission::firstOrCreate(['name' => 'admin.pacientes.update'])->assignRole($admin, $secretaria);
              Permission::firstOrCreate(['name' => 'admin.pacientes.confirmeDelete'])->assignRole($admin, $secretaria);
              Permission::firstOrCreate(['name' => 'admin.pacientes.destroy'])->assignRole($admin, $secretaria);
      
              // Permisos para consultorios (se asignan a admin y secretaria)
              Permission::firstOrCreate(['name' => 'admin.consultorios.index'])->assignRole($admin, $secretaria);
              Permission::firstOrCreate(['name' => 'admin.consultorios.create'])->assignRole($admin, $secretaria);
              Permission::firstOrCreate(['name' => 'admin.consultorios.store'])->assignRole($admin, $secretaria);
              Permission::firstOrCreate(['name' => 'admin.consultorios.show'])->assignRole($admin, $secretaria);
              Permission::firstOrCreate(['name' => 'admin.consultorios.edit'])->assignRole($admin, $secretaria);
              Permission::firstOrCreate(['name' => 'admin.consultorios.update'])->assignRole($admin, $secretaria);
              Permission::firstOrCreate(['name' => 'admin.consultorios.confirmDelete'])->assignRole($admin, $secretaria);
              Permission::firstOrCreate(['name' => 'admin.consultorios.destroy'])->assignRole($admin, $secretaria);
      
              // Permisos para doctores (se asignan a admin y secretaria)
              Permission::firstOrCreate(['name' => 'admin.doctores.index'])->assignRole($admin, $secretaria);
              Permission::firstOrCreate(['name' => 'admin.doctores.create'])->assignRole($admin, $secretaria);
              Permission::firstOrCreate(['name' => 'admin.doctores.store'])->assignRole($admin, $secretaria);
              Permission::firstOrCreate(['name' => 'admin.doctores.show'])->assignRole($admin, $secretaria);
              Permission::firstOrCreate(['name' => 'admin.doctores.edit'])->assignRole($admin, $secretaria);
              Permission::firstOrCreate(['name' => 'admin.doctores.update'])->assignRole($admin, $secretaria);
              Permission::firstOrCreate(['name' => 'admin.doctores.confirmDelete'])->assignRole($admin, $secretaria);
              Permission::firstOrCreate(['name' => 'admin.doctores.destroy'])->assignRole($admin, $secretaria);
      
              // Permisos para horarios (se asignan a admin y secretaria)
              Permission::firstOrCreate(['name' => 'admin.horarios.index'])->assignRole($admin, $secretaria);
              Permission::firstOrCreate(['name' => 'admin.horarios.create'])->assignRole($admin, $secretaria);
              Permission::firstOrCreate(['name' => 'admin.horarios.store'])->assignRole($admin, $secretaria);
              Permission::firstOrCreate(['name' => 'admin.horarios.show'])->assignRole($admin, $secretaria);
              Permission::firstOrCreate(['name' => 'admin.horarios.edit'])->assignRole($admin, $secretaria);
              Permission::firstOrCreate(['name' => 'admin.horarios.update'])->assignRole($admin, $secretaria);
              Permission::firstOrCreate(['name' => 'admin.horarios.confirmDelete'])->assignRole($admin, $secretaria);
              Permission::firstOrCreate(['name' => 'admin.horarios.destroy'])->assignRole($admin, $secretaria);
              
              // Permiso para ajax
              Permission::firstOrCreate(['name' => 'admin.horarios.cargar_datos_consultorios'])->assignRole($admin, $secretaria);
      
    }
}
