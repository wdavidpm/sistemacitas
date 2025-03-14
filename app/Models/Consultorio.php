<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Doctor;
use App\Models\Horario;
use Spatie\Permission\Traits\HasRoles;


class Consultorio extends Model
{
    use HasFactory;

    protected $fillable = ['nombre','ubicacion','capacidad','telefono','especialidad','estado'];

    public function doctores(){
        return $this->hasMany(Doctor::class);
    }

    public function horarios(){
        return $this->hasMany(Horario::class);
    }

    public function events(){
        return $this->hasMany(Event::class);
    }
}