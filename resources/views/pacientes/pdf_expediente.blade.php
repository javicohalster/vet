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
      <table style="height: 40px;">
        <tr>
          <td> 
            <div id="logo">
              <img src="./images/logo.jpg">             
            </div>
          </td>
          <td style="text-align: center"><h5>CLÍNICA VETERINARIA <br>"SAN JOSÉ DEL CONDADO"</h5><br>
            <h5>Bienestar y salud para su mascota</h5>
          </td>
        </tr>
      </table> 
      <div id="company" class="clearfix">
        <div id="img_perfil">
        <img src="assets/img/perfiles/{{$paciente->avatar}}">
      </div>
      </div>
      <div id="project">
        <table style="width: 70%;">
          <tr>
              <td><span>Nro.Historia </span></td>
              <td>{{$paciente->id}}</td>
          </tr>
          <tr>
              <td><span>Paciente</span></td>
              <td>{{$paciente->nombres}}</td>
          </tr>
          <tr>
              <td><span>Raza</span></td>
              <td>{{$paciente->sangre}}</td>
          </tr>
          <tr>
              <td><span>Especie</span></td>
              <td>{{$paciente->medicamento_actual}}</td>
          </tr>
          <tr>
              <td><span>Esterilizado</span></td>
              <td>{{$paciente->alergia}}</td>
          </tr>
          <tr>
              <td><span>Sexo</span></td>
              <td>{{$paciente->genero}}</td>
          </tr>         
          <tr>
              <td><span>Color</span></td>
              <td>{{$paciente->vih}}</td>
          </tr>
          <tr>
              <td><span>Edad</span></td>
              <td>{{$edad}}</td>
          </tr>
          <tr>
              <td><span>Propietario</span></td>
              <td>{{$paciente->apellidos}}</td>
          </tr>
          <tr>
              <td><span>Teléfono</span></td>
              <td>{{$paciente->telefono}}</td>
          </tr>
        </table>
        <div id="fecha">
            {{ $fecha }}
        </div>  
      
        <!--<div><span>Email</span>  <a href="mailto:{{$paciente->email}}">{{$paciente->email}}</a></div>
        <div><span>Dirección</span> {{$paciente->direccion}}</div>
        <div><span>Teléfono</span> {{$paciente->telefono}}</div>
        <div><span>Edad</span> {{$edad}}</div>-->
      </div>
    </header>
    <main style="font-size: 8px;">
      @foreach($query_paciente as $query)
      <table>
        <tbody>
          <!--<tr>
            <td colspan="2">{{Date::parse($query->fecha_inicio)->toFormattedDateString()}}</td>
          </tr>-->      
              @if($query->sintomas)
              <tr>
              <td colspan="4">Anamnesis</td>              
              <td class="total">{{$query->sintomas}}</td>
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
             @if($query->diagnostico)
             <tr>
              <td colspan="4">Diagnóstico</td>              
              <td class="total">{{$query->diagnostico}}</td>
             </tr>
             @endif            
             @if($query->examenes)
             <tr>
              <td colspan="4">Pruebas Realizadas</td>              
              <td class="total">{{$query->examenes}}</td>
             </tr>
             @endif
            
             @if($query->tratamiento)
             <tr>
              <td colspan="4">Tratamiento</td>              
              <td class="total">{{$query->tratamiento}}</td>
             </tr>
             @endif
             @if($query->observaciones)
             <tr>
              <td colspan="4">Resultados</td>              
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
        <div style="text-align: center; font-size: 9px;" align="center">
            <br> 
            <br> 
            <br> 
            <br> 
            <br> 
            <br> 
            <br> 
            <br> 
            <br> 
       ________________________________<br>    
          Dr. Xavier Villacís Páez<br>
          Médico Veterinario<br>
          MSP. L4 F90 No.370<br>
          Senescyt 1040-10-997207<br>
        </div>        
        <br>
        <br>
        <!--<div>Éste documento fue descargado por:</div>
        <div class="notice">{{Auth::User()->nombres}} {{Auth::User()->apellidos}}</div>-->
      </div>

      
    </main>
    <footer style="font-size: 8px;" >
      <table>
        <tr>
          <td>
Piedras Negras N71-416 Y Av. Occidental<br>
Telf. 2495-831<br>
e-mail: vetsanjosecondado@gmail.com
          </td>
          <td>
            Celulares:<br>
            0992458192<br>
            0996007858
            </td>
        </tr>
      </table>      
    </footer>
  </body>
</html>