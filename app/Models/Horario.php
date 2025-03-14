<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Consultorio;
use App\Models\Doctor;
use Spatie\Permission\Traits\HasRoles;

class Horario extends Model
{
    use HasFactory;

    protected $fillable = ['dia','hora_inicio','hora_fin','doctor_id','consultorio_id'];

    public function consultorio(){

        return $this->belongsTo(Consultorio::class);
    }

    public function doctor(){

        return $this->belongsTo(Doctor::class);
    }

}
