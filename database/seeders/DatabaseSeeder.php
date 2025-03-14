<?php

namespace Database\Seeders;

use App\Models\Consultorio;
use App\Models\Doctor;
use App\Models\Secretaria;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
       
        $this->call([
            RoleSeeder::class,
        ]);


        // Crear usuarios de prueba (después de haber creado roles y permisos)
        User::create([
            'name'     => 'Administrador',
            'email'    => 'admin@admin.com',
            'password' => Hash::make('12345678')
        ])->assignRole('admin');

        User::create([
            'name'     => 'Norberta',
            'email'    => 'secretaria@admin.com',
            'password' => Hash::make('12345678')
        ])->assignRole('secretaria');

        Secretaria::create([
            'nombres'               => 'Norberta',
            'apellidos'             => 'Secretaria',
            'identificacion'        => '987654',
            'telefono'              => '15987',
            'direccion'             => 'Calle 10c', 
            'fecha_de_nacimiento'   => '10/10/2000',
            'user_id'               => '2'
        ]);

        User::create([
            'name'     => 'Paciente',
            'email'    => 'paciente@admin.com',
            'password' => Hash::make('12345678')
        ])->assignRole('paciente');

        User::create([
            'name'     => 'Dr',
            'email'    => 'doctor@admin.com',
            'password' => Hash::make('12345678')
        ])->assignRole('doctor');

        Doctor::create([
            'nombres'                => 'Dr',
            'apellidos'              => 'Tulio',
            'identificacion'        => '156842',
            'especialidad'          => 'Pediatria', 
            'telefono'              => '13568',
            'user_id'               => '4'
        ]);

        User::create([
            'name'     => 'Chimuelo',
            'email'    => 'doctor1@admin.com',
            'password' => Hash::make('12345678')
        ])->assignRole('doctor');

        Doctor::create([
            'nombres'                => 'Chimuelo',
            'apellidos'              => 'Tulio',
            'identificacion'        => '15684248',
            'especialidad'          => 'Rayos X', 
            'telefono'              => '13568',
            'user_id'               => '5'
        ]);

        Consultorio::create([
            'nombre'               => 'Pediatria',
            'ubicacion'             => '106',
            'capacidad'             => '3',
            'especialidad'          => 'Pediatria', 
            'estado'                => 'Activo'
        ]);
        
        Consultorio::create([
            'nombre'               => 'Rayos X',
            'ubicacion'             => '206',
            'capacidad'             => '5',
            'especialidad'          => 'Rayos X', 
            'estado'                => 'Activo'
        ]);


        User::create([
            'name'     => 'Usuario',
            'email'    => 'usuario@admin.com',
            'password' => Hash::make('12345678')
        ])->assignRole('usuario');
        
        // Llamar a pacientes
        $this->call([
            PacienteSeeder::class,
        ]);
    }
}