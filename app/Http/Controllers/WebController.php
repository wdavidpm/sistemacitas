<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Consultorio;
use App\Models\Horario;
use App\Models\Event;


class WebController extends Controller
{
 public function index(){


    $consultorios= Consultorio::all();
    return view('index',compact('consultorios'));
 }
 
 public function cargar_datos_consultorios($id){
   try {
       $horarios = Horario::with('doctor', 'consultorio')
           ->where('consultorio_id', $id)
           ->get();

       // Retorna la vista con los datos necesarios
       return view('admin.cargar_datos_consultorios', compact('horarios'));
}catch(\Exception $exception ){
      return response()->json(['mensaje'=>'Error']);
   }
   
}




}
