
<?php
include('phpqrcode/qrlib.php'); 
$codesDir = "codes/";   
$codeFile = date('d-m-Y-h-i-s').'.png';
$host= $_SERVER["HTTP_HOST"];
$url= $_SERVER["REQUEST_URI"];
$str = "http://" . $host . $url;
$fecha = date("d-m-Y h:i:s");
include "connect.php";

function calcular_edad($fecha){
    $fecha_nac = new DateTime(date('Y-m-d',strtotime($fecha))); // Creo un objeto DateTime de la fecha ingresada
    $fecha_hoy =  new DateTime(date('Y-m-d',time())); // Creo un objeto DateTime de la fecha de hoy
    $edad = date_diff($fecha_hoy,$fecha_nac); // La funcion ayuda a calcular la diferencia, esto seria un objeto
    return $edad;
    }

$consulta = "SELECT 
    queries.id AS id, 
    queries.fecha_inicio, 
	queries.tratamiento AS medicamentos, 
	queries.receta AS indicaciones,
	queries.diagnostico AS diagnostico,
	queries.fechasiguientecita AS fechasiguientecita,
    paciente.nombres AS paciente, 
    paciente.apellidos AS propietario, 
    doctor.apellidos AS doctor, 
	doctor.firma AS firma,
    especialidad.nombre AS especialidad, 
    queries.estado AS estado
FROM queries
JOIN users AS paciente ON queries.paciente_id = paciente.id
JOIN users AS doctor ON queries.doctor_id = doctor.id
JOIN specialities AS especialidad ON queries.speciality_id = especialidad.id
WHERE queries.id =  ". $_GET['qr'].";";
mysqli_set_charset($conexion, "utf8");
	$resultado = mysqli_query( $conexion, $consulta ) or die ( "Algo ha ido mal en la consulta a la base de datos");
    while ($columna = mysqli_fetch_array( $resultado ))
	{

      //  $edad = calcular_edad($columna['nacimiento']);
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Receta medica Gevets</title>
    <link rel="stylesheet" href="../assets/css/material-dashboard.css" media="all" />
    <link rel="stylesheet" href="../assets/css/style_receta.css" media="all" />
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css" media="all" />
  </head>
  <body style="text-transform: capitalize;font-size: 10px;">
    <header class="clearfix">
      
     
           
    </header>
    <main class="container">
    <div id="logo">
        <img src="../images/firmas/logo.jpg">
      </div>
    <h1>RECETA MEDICA</h1>
    <div id="company" class="clearfix">
    <div id="img_perfil">
        <img src="../images/firmas/fotoclinica.jpeg">
      </div>
      </div> 
      <table class="service">
        <tbody>
        <tr>
            <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </td>
            <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </td>
            <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </td>
            <td colspan="6" class="font-weight-bold"><b>N*: </b> <?php echo $columna['id']  ?></td>

           
          </tr>
          <tr>
            <td colspan="6" class="font-weight-bold"><b>Fecha: </b> <?php echo $fecha   ?></td>
           
          </tr>
          <tr>
            <td colspan="6"><b>Propietario:</b> <?php echo $columna['propietario']   ?>  </td>
           
          </tr>
          <tr>
            <td colspan="6"><b>Paciente:</b> <?php echo $columna['paciente']   ?></td>
           
          </tr>
          <tr>
            <td colspan="6"><b>&nbsp;</b></td>
            
          </tr>
          <tr>
            <td colspan="3" style="border: 1px solid black;text-align: center;"><b>MEDICAMENTOS</b></td><td style="border: 1px solid black;;text-align: center;" colspan="3"><b>INDICACION</b></td>
            
          </tr>
          <tr>            
            <td style="border: 1px solid black;padding: 8px;" colspan="3"><?php echo nl2br($columna['medicamentos'] );   ?></td><td style="border: 1px solid black;padding: 8px;"colspan="3"><?php echo nl2br($columna['indicaciones']);   ?></td>      
          </tr>
          <tr>
            <td colspan="4"><b>&nbsp;</b></td>
            <td></td>
          </tr>
          <tr>
            <td colspan="4"><b>&nbsp;</b></td>
            <td></td>
          </tr>
          <tr>
            <td colspan="4"><b>&nbsp;</b></td>
            <td></td>
          </tr>
          <tr>
          
            <td colspan="6" class=""><div class="img qr" ><img style="width:12%;text-align: right;float:right;font-size: 16px;"  src="../images/firmas/<?php echo $columna['firma']  ?>" /></td>
          </tr>
          <tr>
            <td colspan="4"><b>Fecha Siguiente cita:</td>
            <td><?php echo $columna['fechasiguientecita']   ?></td>
          </tr>
          <tr>
            <td colspan="4"><b>OBSERVACIONES:</b></td>
            <td class="total" style="font-size: 12px;" ><?php echo $columna['diagnostico']  ?></td>
          </tr>
        </tbody>
      </table>
      <div id="notices">
         <br>
        <br>
        <br>        
      </div>

      <div id="fecha">
      <?php echo $fecha;  ?>
      </div>
    </main>
    <footer>
      Documento generado por el sistema de GEVETS, Todos los derechos reservados &copy; 2025.
    </footer>
  </body>
</html>
<?php
// cerrar conexión de base de datos
mysqli_close( $conexion );
}

	


	









?>
