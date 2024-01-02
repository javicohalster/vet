
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

$consulta = "SELECT `users`.*,TIMESTAMPDIFF(YEAR,nacimiento,CURDATE()) AS edad FROM `users` WHERE `id` = ". $_GET['qr'].";";
	$resultado = mysqli_query( $conexion, $consulta ) or die ( "Algo ha ido mal en la consulta a la base de datos");
    while ($columna = mysqli_fetch_array( $resultado ))
	{

        $edad = calcular_edad($columna['nacimiento']);
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title><?php echo  $columna['nombres'];  ?> <?php echo $columna['apellidos'];  ?></title>
    <link rel="stylesheet" href="../assets/css/material-dashboard.css" media="all" />
    <link rel="stylesheet" href="../assets/css/style_pdf.css" media="all" />
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css" media="all" />
  </head>
  <body style="text-transform: uppercase;">
    <header class="clearfix">
      <div id="logo">
        <img src="https://irp-cdn.multiscreensite.com/1be65cd3/DESKTOP/jpg/995.jpg">
      </div>
      <h1>FICHA PERSONAL DEL PACIENTE</h1>
           
    </header>
    <main class="container">
    <div id="company" class="clearfix">
        <div id="img_perfil">
        <img src="../assets/img/perfiles/<?php echo $columna['avatar']  ?>">
      </div>
      </div> 
      <table>
        <tbody>
          <tr>
            <td colspan="4" class="font-weight-bold"><b>CI</b></td>
            <td><?php echo $columna['rut']   ?></td>
          </tr>
          <tr>
            <td colspan="4"><b>CHIP</td>
            <td><?php echo $columna['chip']   ?></td>
          </tr>
          <tr>
            <td colspan="4"><b>PACIENTE</td>
            <td><?php echo $columna['nombres']   ?></td>
          </tr>
          <tr>
            <td colspan="4"><b>RAZA</td>
            <td><?php echo $columna['sangre']   ?></td>
          </tr>
          <tr>
            <td colspan="4"><b>SEXO</td>
            <td><?php echo $columna['genero']   ?></td>
          </tr>
          <tr>
            <td colspan="4"><b>COLOR</b></td>
            <td class="total"><?php echo $columna['vih']  ?></td>
          </tr>
         <tr>
            <td colspan="4"><b>ESTERILIZADO/A</b></td>
            <td class="total"><?php echo $columna['alergia']  ?></td>
          </tr>
          <tr>
            <td colspan="4"><b>PROPIETARIO</td>
            <td><?php echo $columna['apellidos']   ?></td>
          </tr>
          <tr>
            <td colspan="4"><b>EMAIL</td>
            <td><a href="mailto:<?php echo $columna['email']  ?>"><?php echo $columna['email']  ?></a></td>
          </tr>
          <tr>
            <td colspan="4"><b>DIRECCION</td>
            <td><?php echo $columna['direccion']   ?></td>
          </tr>
          <tr>
            <td colspan="4"><b>TELEFONO</td>
            <td><?php echo $columna['telefono']   ?></td>
          </tr>
          <tr>
            <td colspan="4"><b>FECHA NACIMIENTO</td>
            <td><?php echo $columna['nacimiento']   ?></td>
          </tr>         
          <tr>
            <td colspan="4"><b>EDAD</b></td>
            <td class="total"><?php echo  $edad->format('%Y'). " años y " . $edad->format('%m') . " meses "  . $edad->format('%d') . " dias";  ?></td>
          </tr>
          <tr>
            <td colspan="4"><b>QR</b></td>
            <td class="total"><div class="img qr" > <?php QRcode::png($str, $codesDir.$codeFile, "H", "2") ?> <?php echo '<img class="img-thumbnail" src="'.$codesDir.$codeFile.'" />'; ?></td>
          </tr>
          <tr>
            <td colspan="4"><b>ESPECIE</b></td>
            <td class="total"><?php echo $columna['medicamento_actual']  ?></td>
          </tr>
          <tr>
            <td colspan="4"><b>OBSERVACIONES</b></td>
            <td class="total"><?php echo $columna['enfermedad']  ?></td>
          </tr>
        </tbody>
      </table>
      <div id="notices">
        <div>Advertencia:</div>
        <div class="notice" align="justify">La información que se muestra en esta ficha clínica, de los estudios y demás documentos donde se registren procedimientos y tratamientos a los que fue sometido el paciente <b><?php echo $columna['nombres']  ?> <?php echo $columna['apellidos']  ?></b>, es considerada como <b>información sensible</b> y por tanto tiene la calidad de reservada. Quienes no estén relacionados directamente con la atención no tendrán acceso a la información, salvo las excepciones legales.</div>
        <br>
        <br>
        <br>        
      </div>

      <div id="fecha">
      <?php echo $fecha;  ?>
      </div>
    </main>
    <footer>
      Documento generado por el sistema de reservas y gestión administrativa javicohal, Todos los derechos reservados &copy; 2019.
    </footer>
  </body>
</html>
<?php
// cerrar conexión de base de datos
mysqli_close( $conexion );
}
?>
	


	









?>
