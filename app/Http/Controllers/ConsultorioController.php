<?php

namespace App\Http\Controllers;

use App\Models\Consultorio;
use Illuminate\Http\Request;

class ConsultorioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       $consultorios= Consultorio::all();
       return view('admin.consultorios.index',compact('consultorios'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.consultorios.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre'               => 'required|max:250',
            'ubicacion'             => 'required|max:250',
            'capacidad'             => 'required|max:250',
            'especialidad'          => 'required|max:250', 
            'estado'                => 'required|max:250'
        ]);
    

    
        // Crear la consultorio (registro en la tabla consultorios)
       Consultorio::create($request->all());
    
        return redirect()->route('admin.consultorios.index')
            ->with('mensaje', 'El registro fue exitoso')
            ->with('icono', 'success');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $consultorio= consultorio::findOrfail($id);
        return view('admin.consultorios.show',compact('consultorio'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $consultorio= Consultorio::findOrfail($id);
        return view('admin.consultorios.edit',compact('consultorio'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        
                // Obtener la instancia del consultorio
        $consultorio =Consultorio::findOrFail($id);

        $request->validate([
            'nombre'               => 'required|max:250',
            'ubicacion'             => 'required|max:250',
            'capacidad'             => 'required|max:250',
            'especialidad'          => 'required|max:250', 
            'estado'                => 'required|max:250'
        ]);
       
       $consultorio->update($request->all());

        return redirect()->route('admin.consultorios.index')
        ->with('mensaje', 'Se actualizaron los datos')
        ->with('icono', 'success');
    }

    public function confirmDelete($id){
        $consultorio = consultorio::findOrfail($id);
        return view('admin.consultorios.delete',compact('consultorio'));
      }

      public function destroy($id)
      {   
          $consultorio = consultorio::findOrfail($id);
          consultorio::destroy($id);
          
          return redirect()->route('admin.consultorios.index')
          ->with('mensaje','Se elimino correctamente')
          ->with('icono','success');
      }
}
