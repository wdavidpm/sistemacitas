<?php

namespace App\Http\Controllers;

use App\Models\Consultorio;
use App\Models\Horario;
use Illuminate\Http\Request;

use App\Models\Doctor;
use PhpParser\Node\Stmt\Echo_;
use PhpParser\Node\Stmt\TryCatch;

class HorarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $consultorios = Consultorio::all();
        $horarios= Horario::with('doctor','consultorio')->get();
        return view('admin.horarios.index',compact('horarios','consultorios'));
    }

    public function cargar_datos_consultorios($id){
        try {
            $horarios = Horario::with('doctor', 'consultorio')
                ->where('consultorio_id', $id)
                ->get();
    
            // Retorna la vista con los datos necesarios
            return view('admin.horarios.cargar_datos_consultorios', compact('horarios'));
    }catch(\Exception $exception ){
           return response()->json(['mensaje'=>'Error']);
        }
        
    }

    public function create()
    {
        $doctores = Doctor::all();
        $consultorios = Consultorio::all();
        $horarios= Horario::with('doctor','consultorio')->get();
        return view('admin.horarios.create', compact('doctores','consultorios','horarios'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validar los datos del formulario
        $request->validate([
            'consultorio_id' => 'required|exists:consultorios,id',
            'doctor_id'      => 'required|exists:doctors,id',
            'dia'            => 'required|in:lunes,martes,miercoles,jueves,viernes,sabado',
            'hora_inicio'    => 'required|date_format:H:i',
            'hora_fin'       => 'required|date_format:H:i|after:hora_inicio',
        ]);
    
        // Verificar si el horario ya existe para el mismo consultorio, día y rango de horas
        $horarioExistente = Horario::where('consultorio_id', $request->consultorio_id)
            ->where('dia', $request->dia)
            ->where(function ($query) use ($request) {
                $query->whereBetween('hora_inicio', [$request->hora_inicio, $request->hora_fin])
                      ->orWhereBetween('hora_fin', [$request->hora_inicio, $request->hora_fin])
                      ->orWhere(function ($query) use ($request) {
                          $query->where('hora_inicio', '<', $request->hora_inicio)
                                ->where('hora_fin', '>', $request->hora_fin);
                      });
            })
            ->exists();
    
        if ($horarioExistente) {
            return redirect()->back()
                ->withInput()
                ->with('mensaje', 'Ya existe un horario que se superpone con el horario ingresado para este consultorio')
                ->with('icono', 'error');
        }
    
        // Crear el horario (registro en la tabla horarios)
        Horario::create($request->all());
    
        return redirect()->route('admin.horarios.index')
            ->with('mensaje', 'El registro fue exitoso')
            ->with('icono', 'success');
    }


    public function show($id)
    {
        $horario= Horario::find($id);
        return view('admin.horarios.show',compact('horario'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $horario = Horario::findOrFail($id);
        $consultorios = Consultorio::all();
        $doctores = Doctor::all();
        
        return view('admin.horarios.edit', compact('horario', 'consultorios', 'doctores'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
            // Validar los datos recibidos
    $validatedData = $request->validate([
        'dia' => 'required',
        'hora_inicio' => 'date_format:H:i',
        'hora_fin' => 'date_format:H:i|after:hora_inicio',
    ]);

    // Encontrar el horario a modificar
    $horario = Horario::findOrFail($id);

    // Actualizar los datos del horario
    $horario->update($validatedData);

    return redirect()->route('admin.horarios.index')
    ->with('mensaje','Se actualizaron los datos')
    ->with('icono','success');
    }

    public function confirmDelete($id){
        $horario = Horario::findOrfail($id);
        return view('admin.horarios.delete',compact('horario'));
      }

    public function destroy($id)
    {
        $horario = Horario::findOrfail($id);
        Horario::destroy($id);
        
        return redirect()->route('admin.horarios.index')
        ->with('mensaje','Se elimino correctamente')
        ->with('icono','success');
    }
}
