<?php

namespace App\Http\Controllers;

use App\Models\Configuracione;
use App\Models\Doctor;
use App\Models\Event;
use App\Models\Horario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB; 
use Barryvdh\DomPDF\PDF;
use Illuminate\Validation\ValidationException;
use Carbon\Carbon;


class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'fecha_reserva'=>'required|date',
            'hora_reserva'=>'required|date_format:H:i',
        ]);
    
        $doctor = Doctor::find($request->doctor_id);
        $fecha_reserva = $request->fecha_reserva;
        // Agregamos segundos para formar un tiempo completo
        $hora_reserva = $request->hora_reserva . ':00';
    
        $dia = date('l', strtotime($fecha_reserva));
        $dia_de_reserva = $this->traducir_dia($dia);
    
        // Valida si existe el horario del doctor para ese día y hora
        $horarios = Horario::where('doctor_id', $doctor->id)
                    ->where('dia', $dia_de_reserva)
                    ->where('hora_inicio', '<=', $hora_reserva)
                    ->where('hora_fin', '>=', $hora_reserva)
                    ->exists();
    
        if (!$horarios) {
            return redirect()->back()->with([
                'mensaje' => 'El doctor no está disponible en ese horario.',
                'icono'   => 'error',
                'hora_reserva' => 'El doctor no está disponible en ese horario.'
            ]);
        }
    
        // Construimos el inicio de la cita usando Carbon
        $fecha_hora_reserva = Carbon::parse($fecha_reserva . " " . $hora_reserva);
        // La cita dura 30 minutos
        $fecha_hora_fin = $fecha_hora_reserva->copy()->addMinutes(30);
    
        // Valida si ya existe un evento con el mismo doctor en la misma fecha y hora de inicio
        $eventos_duplicados = Event::where('doctor_id', $doctor->id)
                                  ->where('start', $fecha_hora_reserva->toDateTimeString())
                                  ->exists();
    
        if ($eventos_duplicados) {
            return redirect()->back()->with([
                'mensaje' => 'Ya existe una reserva con el mismo doctor en esa fecha y hora.',
                'icono'   => 'error',
                'hora_reserva' => 'Ya existe una reserva con el mismo doctor en esa fecha y hora.'
            ]);
        }
    
        $evento = new Event();
        $evento->title = $request->hora_reserva . " " . $doctor->especialidad;
        $evento->start = $fecha_hora_reserva->toDateTimeString();
        $evento->end   = $fecha_hora_fin->toDateTimeString();
        $evento->color = '#e82a7a';
        $evento->user_id = Auth::user()->id;
        $evento->doctor_id = $request->doctor_id;
        $evento->consultorio_id = '1';
        $evento->save();
    
        return redirect()->route('admin.index')
            ->with('mensaje', 'Se registró la reserva de la cita médica de la manera correcta')
            ->with('icono', 'success');
    }

    private function traducir_dia($dia){
        $dias=[
            'Monday' => 'LUNES',
            'Tuesday' => 'MARTES',
            'Wednesday' => 'MIERCOLES',
            'Thursday' => 'JUEVES',
            'Friday' => 'VIERNES',
            'Saturday' => 'SABADO',
            'Sunday' => 'DOMINGO',
        ];
        return $dias[$dia]??$dias;
    }

 
    
    public function getDoctorEvents($doctorId)
    {
        $events = Event::where('doctor_id', $doctorId)
                       ->select(
                           'id',
                           'title',
                           DB::raw("DATE_FORMAT(start, '%Y-%m-%d') as start"),
                           DB::raw("DATE_FORMAT(end, '%Y-%m-%d') as end"),
                           'color'
                       )
                       ->get();
    
        return response()->json($events);
    }
    

    /**
     * Display the specified resource.
     */
    public function show(Event $event)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Event $event)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Event $event)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Event $event)
    {
      //  return redirect()->back()->with([
      //      'mensaje' => 'Se elimino la reserva de la manera correcta',
      //      'icono' => 'success',
      //  ]);

        
    }

}
