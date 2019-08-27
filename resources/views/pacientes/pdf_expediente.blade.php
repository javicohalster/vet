<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>{{$paciente->nombres}} {{$paciente->apellidos}}</title>
    <link rel="stylesheet" href="assets/css/material-dashboard.css" media="all" />
    <link rel="stylesheet" href="assets/css/style_pdf.css" media="all" />
  </head>
  <body>
    <header class="clearfix">     
      <table>
        <tr>
          <td> 
            <div id="logo">
              <img src="./images/logo.jpg">             
            </div>  </td>
          <td><h4>CLÍNICA VETERINARIA SAN JOSÉ DEL CONDADO</h4></td>
        </tr>
      </table> 
      <div id="company" class="clearfix">
        <div id="img_perfil">
        <img src="assets/img/perfiles/{{$paciente->avatar}}">
      </div>
      </div>
      <div id="project">
        <div><span>Nro.Historia </span>{{$paciente->id}}</div>
        <div><span>Paciente</span> {{$paciente->nombres}} </div>
        <div><span>Raza</span> {{$paciente->sangre}} </div> 
        <div><span>Especie</span> {{$paciente->medicamento_actual}} </div>  
        <div><span>Esterilizado</span> {{$paciente->alergia}} </div>    
        <div><span>Sexo</span> {{$paciente->genero}}</div>
        <div><span>Propietario</span> {{$paciente->apellidos}}</div>
        <div><span>Color</span> {{$paciente->vih}}</div>
        <div><span>Email</span>  <a href="mailto:{{$paciente->email}}">{{$paciente->email}}</a></div>
        <div><span>Dirección</span> {{$paciente->direccion}}</div>
        <div><span>Teléfono</span> {{$paciente->telefono}}</div>
        <div><span>Edad</span> {{$edad}}</div>
      </div>
    </header>
    <main>
      @foreach($query_paciente as $query)
      <table>
        <tbody>
          <!--<tr>
            <td colspan="2">{{Date::parse($query->fecha_inicio)->toFormattedDateString()}}</td>
          </tr>-->       
             @if($query->sintomas)
             <tr>
              <td colspan="4">Síntomas</td>              
              <td class="total">{{$query->sintomas}}</td>
             </tr>
             @endif
             @if($query->diagnostico)
             <tr>
              <td colspan="4">Diagnóstico</td>              
              <td class="total">{{$query->diagnostico}}</td>
             </tr>
             @endif            
             @if($query->examenes)
             <tr>
              <td colspan="4">Anamnesis</td>              
              <td class="total">{{$query->examenes}}</td>
             </tr>
             @endif
             @if($query->peso)
             <tr>
              <td colspan="4">Peso</td>              
              <td class="total">{{$query->peso}}</td>
             </tr>
             @endif
             @if($query->temperatura)
             <tr>
              <td colspan="4">Temperatura</td>              
              <td class="total">{{$query->temperatura}}</td>
             </tr>
             @endif
             @if($query->tratamiento)
             <tr>
              <td colspan="4">tratamiento</td>              
              <td class="total">{{$query->tratamiento}}</td>
             </tr>
             @endif
             @if($query->observaciones)
             <tr>
              <td colspan="4">Observaciones</td>              
              <td class="total">{{$query->observaciones}}</td>
             </tr>
             @endif
             @if($query->fechacirugia)
             <tr>
              <td colspan="4">Fecha Cirugía</td>              
              <td class="total">{{$query->fechacirugia}}</td>
             </tr>
             @endif
             @if($query->procedimientocirugia)
             <tr>
              <td colspan="4">Procedimiento Cirugía</td>              
              <td class="total">{{$query->procedimientocirugia}}</td>
             </tr>
             @endif
             @if($query->fechahospitalizacion)
             <tr>
              <td colspan="4">Fercha Hospitalización</td>              
              <td class="total">{{$query->fechahospitalizacion}}</td>
             </tr>
             @endif
             @if($query->diagnosticohospitalizar)
             <tr>
              <td colspan="4">Diagnóstico Hosp.</td>              
              <td class="total">{{$query->diagnosticohospitalizar}}</td>
             </tr>
             @endif
             @if($query->fechavacuna)
             <tr>
              <td colspan="4">Fecha Vacuna</td>              
              <td class="total">{{$query->fechavacuna}}</td>
             </tr>
             @endif
             @if($query->tipovacuna)
             <tr>
              <td colspan="4">Tipo Vacuna</td>              
              <td class="total">{{$query->tipovacuna}}</td>
             </tr>
             @endif
             @if($query->fechadesparasitacion)
             <tr>
              <td colspan="4">Fecha Desparasitación</td>              
              <td class="total">{{$query->fechadesparasitacion}}</td>
             </tr>
             @endif
             @if($query->descripciondesparacitacion)
             <tr>
              <td colspan="4">Descripción</td>              
              <td class="total">{{$query->descripciondesparacitacion}}</td>
             </tr>
             @endif
         
        </tbody>
      </table>
      <div class="divider"></div>
       @endforeach
      <div id="notices">
        <!--<div>Advertencia:</div>-->
        <!--<div class="notice" align="justify">La información que se muestra en esta ficha clínica, de los estudios y demás documentos donde se registren procedimientos y tratamientos a los que fue sometido el paciente <b>{{$paciente->nombres}} {{$paciente->apellidos}}</b>, es considerada como <b>información sensible</b> y por tanto tiene la calidad de reservada. Quienes no estén relacionados directamente con la atención no tendrán acceso a la información, salvo las excepciones legales.</div>-->        <br>
        <div style="text-align: center;" align="center">
       ________________________________<br>    
          Dr. Xavier Villacis Páez<br>
          Médico Veterinario<br>
          MSP. L4 F90 No.370<br>
          Senescyt 1040-10-997207<br>
        </div>        
        <br>
        <br>
        <!--<div>Éste documento fue descargado por:</div>
        <div class="notice">{{Auth::User()->nombres}} {{Auth::User()->apellidos}}</div>-->
      </div>

      <div id="fecha">
        {{ $fecha }}
      </div>
    </main>
    <footer>
      Documento generado por el sistema de gvets, Todos los derechos reservados &copy; 2019.
    </footer>
  </body>
</html>