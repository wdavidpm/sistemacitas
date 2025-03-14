<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $doctores= Doctor::with('user')->get();
        return view('admin.doctores.index',compact('doctores'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.doctores.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombres'                => 'required|max:250',
            'apellidos'              => 'required|max:250',
            'identificacion'        => 'required|max:250|unique:doctors',
            'especialidad'          => 'required|max:250', 
            'telefono'              => 'required|max:250',
            'email'                 => 'required|max:250|unique:users',
            'password'              => 'required|max:250|confirmed'
        ]);
    
        // Crear el usuario (para la autenticación)
        $usuario = new User();
        $usuario->name = $request->nombres;
        $usuario->email = $request->email;
        $usuario->password = Hash::make($request->password);
        $usuario->save();
    
        // Crear la doctor (registro en la tabla doctors)
        $doctor = new doctor(); 
        $doctor->user_id = $usuario->id;
        $doctor->nombres = $request->nombres;
        $doctor->apellidos = $request->apellidos;
        $doctor->identificacion = $request->identificacion;
        $doctor->especialidad = $request->especialidad;  
        $doctor->telefono = $request->telefono;
        $doctor->save();
        
        $usuario->assignRole('doctor');

        
        return redirect()->route('admin.doctores.index')
            ->with('mensaje', 'El registro fue exitoso')
            ->with('icono', 'success');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $doctor = doctor::with('user')->findOrFail($id);
        return view('admin.doctores.show',compact('doctor'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $doctor = doctor::with('user')->findOrFail($id);
        return view('admin.doctores.edit',compact('doctor'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $doctor = doctor::findOrFail($id);

        $request->validate([
            'nombres'               => 'required|max:250',
            'apellidos'             => 'required|max:250',
            'identificacion'        => 'required|max:250|unique:doctors,identificacion,'.$doctor->id,
            'especialidad'          => 'required|max:250',
            'telefono'              => 'required|max:250', 
            'email'                 => 'required|max:250|unique:users,email,'.$doctor->user->id,
            'password'              => 'nullable|max:250|confirmed'
        ]);
        
        $doctor->nombres = $request->nombres;
        $doctor->apellidos = $request->apellidos;
        $doctor->identificacion = $request->identificacion;
        $doctor->especialidad = $request->especialidad; 
        $doctor->telefono = $request->telefono;
      
        $doctor->save();

        $usuario=User::find($doctor->user->id);
        $usuario->name=$request->nombres;
        $usuario->email=$request->email;
        
        if($request->filled('password')){
        $usuario->password=Hash::make($request['password']);
        }
        $usuario->save();
        return redirect()->route('admin.doctores.index')
        ->with('mensaje','Se actualizaron los datos')
        ->with('icono','success');

    }

    public function confirmDelete($id){
        $doctor = doctor::with('user')->findOrfail($id);
        return view('admin.doctores.delete',compact('doctor'));
      }


    public function destroy($id)
    {
        $doctor = doctor::findOrFail($id);
        $user=$doctor->user;
        
        $user->delete();
        $doctor->delete();

        return redirect()->route('admin.doctores.index')
        ->with('mensaje','Se elimino correctamente')
        ->with('icono','success');
    }
}
