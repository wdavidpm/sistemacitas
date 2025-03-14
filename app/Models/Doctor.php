<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Horario;
use App\Models\Consultorio;
use App\Models\User;
use Spatie\Permission\Traits\HasRoles;

class Doctor extends Model
{
    use HasFactory;

    
    protected $fillable = ['nombres','apellidos','identificacion','especialidad','telefono','user_id'];
   

    public function consultorio(){

        return $this->belongsTo(Consultorio::class);
    }

    public function horarios(){

        return $this->hasMany(Horario::class);
    }

    public function user(){

        return $this->belongsTo(User::class);
    }

    public function events(){

        return $this->hasMany(Event::class);
    }
}
