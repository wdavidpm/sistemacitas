<?php

namespace App\Http\Controllers;

use App\Models\Paciente;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class PacienteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pacientes= Paciente::all();
        return view('admin.pacientes.index',compact('pacientes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pacientes.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombres'               => 'required|max:250',
            'apellidos'             => 'required|max:250',
            'identificacion'        => 'required|max:250|unique:pacientes',
            'correo'                 => 'required|max:250|unique:pacientes',
            'entidad'               => 'required|max:250',
            'fecha_de_nacimiento'   => 'required|max:250',
            'genero'                => 'required|max:250', 
            'telefono'              => 'required|max:250',
            'direccion'             => 'required|max:250|',
            'tipo_de_sangre'        => 'required|max:250|',
            'contacto_emergencia'   => 'required|max:250|',
        ]);
    

      // Crear la paciente (registro en la tabla pacientes)
        $paciente = new paciente(); 
        $paciente->nombres = $request->nombres;
        $paciente->apellidos = $request->apellidos;
        $paciente->identificacion = $request->identificacion;
        $paciente->correo = $request->correo;
        $paciente->entidad = $request->entidad;
        $paciente->fecha_de_nacimiento = $request->fecha_de_nacimiento; 
        $paciente->genero = $request->genero;
        $paciente->telefono = $request->telefono;         
        $paciente->direccion = $request->direccion;
        $paciente->tipo_de_sangre = $request->tipo_de_sangre;
        $paciente->alergias = $request->alergias;
        $paciente->contacto_emergencia = $request->contacto_emergencia;
        $paciente->observaciones = $request->observacions;

        $paciente->save();
        
    
        return redirect()->route('admin.pacientes.index')
            ->with('mensaje', 'El registro fue exitoso')
            ->with('icono', 'success');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $paciente= paciente::findOrfail($id);
        return view('admin.pacientes.show',compact('paciente'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $paciente= paciente::findOrfail($id);
        return view('admin.pacientes.edit',compact('paciente'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Obtener la instancia del paciente
        $paciente = Paciente::findOrFail($id);
    
        // Validar los datos
        $request->validate([
            'nombres'             => 'required|max:250',
            'apellidos'           => 'required|max:250',
            'identificacion'      => 'required|max:250|unique:pacientes,identificacion,'.$paciente->id,
            'correo'              => 'required|max:250|unique:pacientes,correo,'.$paciente->id,
            'entidad'             => 'required|max:250',
            'fecha_de_nacimiento' => 'required|max:250',
            'genero'              => 'required|max:250',
            'telefono'            => 'required|max:250',
            'direccion'           => 'required|max:250',
            'tipo_de_sangre'      => 'required|max:250',
            'contacto_emergencia' => 'required|max:250',
        ]);
    
        // Actualizar los datos del paciente en el orden especificado:
            $paciente->nombres = $request->nombres;
            $paciente->apellidos = $request->apellidos;
            $paciente->identificacion = $request->identificacion;
            $paciente->correo = $request->correo;
            $paciente->entidad = $request->entidad;
            $paciente->fecha_de_nacimiento = $request->fecha_de_nacimiento; 
            $paciente->genero = $request->genero;
            $paciente->telefono = $request->telefono;         
            $paciente->direccion = $request->direccion;
            $paciente->tipo_de_sangre = $request->tipo_de_sangre;
            $paciente->alergias = $request->alergias;
            $paciente->contacto_emergencia = $request->contacto_emergencia;
            $paciente->observaciones = $request->observacions;
    
            $paciente->save();
    
        return redirect()->route('admin.pacientes.index')
            ->with('mensaje', 'Se actualizaron los datos')
            ->with('icono', 'success');
    }

 
    public function confirmDelete($id){
        $paciente = Paciente::findOrfail($id);
        return view('admin.pacientes.delete',compact('paciente'));
      }

    public function destroy($id)
    {   
        $paciente = Paciente::findOrfail($id);
        Paciente::destroy($id);
        
        return redirect()->route('admin.pacientes.index')
        ->with('mensaje','Se elimino correctamente')
        ->with('icono','success');
    }
}
