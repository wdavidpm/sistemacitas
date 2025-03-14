<?php 
?>

<table style="font-size: 15px"  class="table table-striped table-hover table-sm table-bordered">
    <thead>
      <tr style="text-align: center">
        <th>Hora</th>
        <th>Lunes</th>
        <th>Martes</th>
        <th>Miercoles</th>
        <th>Jueves</th>
        <th>Viernes</th>
        <th>Sabado</th>
      </tr>
    </thead>
    <tbody>
   @php
      $horas=['08:00:00 - 09:00:00','09:00:00 - 10:00:00','10:00:00 - 11:00:00','11:00:00 - 12:00:00','14:00:00 - 15:00:00','15:00:00 - 16:00:00','16:00:00 - 17:00:00','17:00:00 - 18:00:00'];
      $diaSemana=['LUNES','MARTES','MIERCOLES','JUEVES','VIERNES','SABADO'];
     @endphp
    @foreach ($horas as $hora)
    @php
       list($hora_inicio,$hora_fin)=explode(' - ',$hora);
    @endphp
    <tr style="text-align: center">
      <td>{{$hora}}</td>
        @foreach ($diaSemana as $dia)
            @php
                $nombre_doctor= ' ';
                $apellido_doctor= ' ';
                foreach ($horarios as $horario) {
                  if(strtoupper($horario->dia)== $dia && $hora_inicio >= $horario->hora_inicio && $hora_fin <= $horario->hora_fin){
                     $nombre_doctor= $horario->doctor->nombres;
                     $apellido_doctor= $horario->doctor->apellidos;
                     break;
                    }
                }
            @endphp          
           <td>{{$nombre_doctor. ' ' .$apellido_doctor }}</td>
        @endforeach

    </tr>
    @endforeach
    </tbody>
  </table>