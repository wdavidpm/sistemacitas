<?php

namespace App\Http\Controllers;

use App\Models\Secretaria;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;


class SecretariaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {        
        $secretarias= Secretaria::with('user')->get();
        return view('admin.secretarias.index',compact('secretarias'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.secretarias.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombres'               => 'required|max:250',
            'apellidos'             => 'required|max:250',
            'identificacion'        => 'required|max:250|unique:secretarias',
            'telefono'              => 'required|max:250',
            'direccion'             => 'required|max:250', 
            'fecha_de_nacimiento'   => 'required|max:250',
            'email'                 => 'required|max:250|unique:users',
            'password'              => 'required|max:250|confirmed'
        ]);
    
        // Crear el usuario (para la autenticación)
        $usuario = new User();
        $usuario->name = $request->nombres;
        $usuario->email = $request->email;
        $usuario->password = Hash::make($request->password);
        $usuario->save();
    
        // Crear la secretaria (registro en la tabla secretarias)
        $secretaria = new secretaria(); 
        $secretaria->user_id = $usuario->id;
        $secretaria->nombres = $request->nombres;
        $secretaria->apellidos = $request->apellidos;
        $secretaria->identificacion = $request->identificacion;
        $secretaria->telefono = $request->telefono;
        $secretaria->direccion = $request->direccion;  
        $secretaria->fecha_de_nacimiento = $request->fecha_de_nacimiento; 
        $secretaria->save();
    
        $usuario->assignRole('secretaria');

        return redirect()->route('admin.secretarias.index')
            ->with('mensaje', 'El registro fue exitoso')
            ->with('icono', 'success');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $secretaria = secretaria::with('user')->findOrFail($id);
        return view('admin.secretarias.show',compact('secretaria'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $secretaria = secretaria::with('user')->findOrFail($id);
        return view('admin.secretarias.edit',compact('secretaria'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $secretaria = Secretaria::findOrFail($id);

        $request->validate([
            'nombres'               => 'required|max:250',
            'apellidos'             => 'required|max:250',
            'identificacion'        => 'required|max:250|unique:secretarias,identificacion,'.$secretaria->id,
            'telefono'              => 'required|max:250',
            'direccion'             => 'required|max:250', 
            'fecha_de_nacimiento'   => 'required|max:250',
            'email'                 => 'required|max:250|unique:users,email,'.$secretaria->user->id,
            'password'              => 'nullable|max:250|confirmed'
        ]);
        
        $secretaria->nombres = $request->nombres;
        $secretaria->apellidos = $request->apellidos;
        $secretaria->identificacion = $request->identificacion;
        $secretaria->telefono = $request->telefono;
        $secretaria->direccion = $request->direccion;  
        $secretaria->fecha_de_nacimiento = $request->fecha_de_nacimiento; 
        $secretaria->save();

        $usuario=User::find($secretaria->user->id);
        $usuario->name=$request->nombres;
        $usuario->email=$request->email;
        
        if($request->filled('password')){
        $usuario->password=Hash::make($request['password']);
        }
        $usuario->save();
        return redirect()->route('admin.secretarias.index')
        ->with('mensaje','Se actualizaron los datos')
        ->with('icono','success');

    }

    public function confirmDelete($id){
        $secretaria = Secretaria::with('user')->findOrfail($id);
        return view('admin.secretarias.delete',compact('secretaria'));
      }


    public function destroy($id)
    {
        $secretaria = Secretaria::findOrFail($id);
        $user=$secretaria->user;
        
        $user->delete();
        $secretaria->delete();

        return redirect()->route('admin.secretarias.index')
        ->with('mensaje','Se elimino correctamente')
        ->with('icono','success');
    }
}
