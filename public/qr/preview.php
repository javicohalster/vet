<?php
// Incluir la conexión a la base de datos
include "connect.php";

// Recuperamos el query_id vía GET
$query_id = isset($_GET['qr']) ? intval($_GET['qr']) : 0;
if ($query_id <= 0) {
    die("ID de query no válido.");
}

// Consulta para obtener los archivos asociados a ese query_id
$sql  = "SELECT * FROM query_files WHERE query_id = $query_id";
$res  = mysqli_query($conexion, $sql);

if (!$res) {
    die("Error en la consulta a la BD: " . mysqli_error($conexion));
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Resultados asociados</title>
    <!-- Enlaces a Bootstrap y Material Dashboard (ajusta rutas según tu proyecto) -->
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="../assets/css/material-dashboard.css" />
    
</head>
<body>
<div class="container">
    <h1 class="text-center mt-4 mb-4">Resultados Asociados</h1>

    <div class="row justify-content-center">
        <div class="col-md-10">
            <?php
            // Recorremos los archivos obtenidos de la base de datos
            while ($fila = mysqli_fetch_assoc($res)) {
                $archivo   = $fila['file_path']; // nombre único guardado en la BD
                $ruta      = "uploads/" . $archivo; // Ruta física/relativa donde se ubica el archivo
                $extension = strtolower(pathinfo($archivo, PATHINFO_EXTENSION));

                // Iniciamos un "card" de Bootstrap para cada archivo
                echo '<div class="card mb-4">';
                echo '  <div class="card-body text-center">';

                // 1) Vista previa
                if ($extension === "pdf") {
                    // Para PDF, la mayoría de navegadores modernos permiten abrirlo en un <iframe>.
                    echo "<iframe src='$ruta' width='100%' height='500px' style='border: none;'></iframe>";
                } elseif ($extension === "doc" || $extension === "docx") {
                    // Para doc/docx, podemos usar Google Docs Viewer
                    // Necesitamos la URL absoluta pública
                    $dominio      = "http://localhost/vet/public/qr";  // <--- ADAPTA ESTO a tu dominio real
                  //  $dominio      = "http://cvsanjosecondado.com/vet/public/qr/";
                    $rutaCompleta = $dominio . "/" . $ruta;
                    $rutaEncode   = urlencode($rutaCompleta);
                    
                    echo "
                        <iframe 
                            src='https://docs.google.com/gview?url=$rutaEncode&embedded=true' 
                            style='width:100%; height:500px; border:none;' 
                            frameborder='0'>
                        </iframe>
                    ";
                } else {
                    // Si el archivo no es pdf, doc o docx, no mostramos preview.
                    echo "<p class='text-muted'>No hay vista previa disponible para <strong>$archivo</strong>.</p>";
                }

                // 2) Enlace de descarga (forzando la descarga con `download` en el <a>)
                echo "<p class='mt-3'><a href='$ruta' class='btn btn-primary' download>Descargar: $archivo</a></p>";

                echo '  </div>'; // Fin card-body
                echo '</div>';   // Fin card
            }

            mysqli_close($conexion);
            ?>
        </div>
    </div>
</div>

<!-- Scripts de Bootstrap (ajusta rutas según tu proyecto) -->
<script src="../assets/js/bootstrap.bundle.min.js"></script>
</body>
</html>
