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

$total_archivos = mysqli_num_rows($res);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Resultados asociados</title>
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="../assets/css/material-dashboard.css" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <style>
        body{
            background: #f4f6f9;
            padding: 30px;
        }
        .page-box{
            max-width: 1100px;
            margin: 0 auto;
        }
        .page-header{
            background: #00bcd4;
            color: #fff;
            padding: 20px 25px;
            border-radius: 6px 6px 0 0;
            min-height: 80px;
            position: relative;
            height: 10vh;
        }
        .page-header h3{
            margin: 0;
            font-weight: 500;
            line-height: 40px;
        }
        .header-actions{
            position: absolute;
            right: 55px;
            top: 18px;
        }
        .header-actions .btn{
            margin-left: 8px;
        }
        .page-content{
            background: #fff;
            padding: 25px;
            border-radius: 0 0 6px 6px;
            box-shadow: 0 10px 30px rgba(0,0,0,.15);
        }
        .file-card{
            border: 1px solid #e7e7e7;
            border-radius: 6px;
            background: #fff;
            margin-bottom: 25px;
            overflow: hidden;
        }
        .file-card-header{
            background: #fafafa;
            border-bottom: 1px solid #eee;
            padding: 12px 18px;
            font-weight: bold;
            color: #333;
        }
        .file-card-body{
            padding: 20px;
            text-align: center;
        }
        .preview-image{
            max-width: 100%;
            max-height: 500px;
            border-radius: 6px;
            border: 1px solid #ddd;
        }
        .preview-video{
            width: 100%;
            max-height: 500px;
            border-radius: 6px;
            background: #000;
        }
        .no-preview{
            padding: 40px 20px;
            color: #777;
            background: #fafafa;
            border: 1px dashed #ddd;
            border-radius: 6px;
        }
        .download-box{
            margin-top: 20px;
        }
        .empty-box{
            background: #fff;
            border-radius: 6px;
            padding: 40px;
            text-align: center;
            color: #777;
            box-shadow: 0 10px 30px rgba(0,0,0,.10);
        }
        .close{
            position: absolute;
            top: 14px;
            right: 15px;
            color: #fff;
            opacity: 1;
            z-index: 10;
        }
        .close i{
            color: #fff;
        }
    </style>
</head>
<body>

<div class="page-box">
    <div class="page-header">
        <button type="button" class="close" onclick="window.close();" data-dismiss="modal" aria-hidden="true">
            <i class="material-icons">clear</i>
        </button>

        <h3>Resultados Asociados - Historia# <?php echo htmlspecialchars($query_id); ?></h3>

        <?php if ($total_archivos > 0) { ?>
            <div class="header-actions">
                <a href="downloadZip.php?qr=<?php echo urlencode($query_id); ?>" class="btn btn-success btn-sm">
                    <i class="material-icons" style="vertical-align: middle;">folder_zip</i>
                    Descargar todo en ZIP
                </a>
            </div>
        <?php } ?>
    </div>

    <div class="page-content">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <?php
                if ($total_archivos == 0) {
                    echo '<div class="empty-box">';
                    echo '<i class="material-icons" style="font-size:48px; color:#bdbdbd;">folder_open</i>';
                    echo '<h4>No existen archivos cargados</h4>';
                    echo '<p>No se encontraron documentos asociados a esta historia o consulta.</p>';
                    echo '</div>';
                } else {
                    while ($fila = mysqli_fetch_assoc($res)) {
                        $archivo   = $fila['file_path'];
                        $ruta      = "uploads/" . $archivo;
                        $extension = strtolower(pathinfo($archivo, PATHINFO_EXTENSION));

                        echo '<div class="file-card">';
                        echo '  <div class="file-card-header">';
                        echo '      <i class="material-icons" style="font-size:18px; vertical-align:middle;">attach_file</i> ';
                        echo        htmlspecialchars($archivo);
                        echo '  </div>';
                        echo '  <div class="file-card-body">';

                        // PDF
                        if ($extension === "pdf") {
                            echo "<iframe src='$ruta' width='100%' height='500px' style='border:none; border-radius:6px;'></iframe>";

                        // Word
                        } elseif ($extension === "doc" || $extension === "docx") {
                            $dominio      = "http://cvsanjosecondado.com/vet/public/qr";
                            $rutaCompleta = $dominio . "/" . $ruta;
                            $rutaEncode   = urlencode($rutaCompleta);

                            echo "
                                <iframe 
                                    src='https://docs.google.com/gview?url=$rutaEncode&embedded=true' 
                                    style='width:100%; height:500px; border:none; border-radius:6px;' 
                                    frameborder='0'>
                                </iframe>
                            ";

                        // Imágenes
                        } elseif (in_array($extension, ['jpg', 'jpeg', 'png', 'gif', 'webp', 'bmp'])) {
                            echo "<img src='$ruta' alt='".htmlspecialchars($archivo)."' class='preview-image'>";

                        // Videos
                        } elseif (in_array($extension, ['mp4', 'webm', 'ogg', 'mov', 'avi'])) {
                            echo "
                                <video class='preview-video' controls>
                                    <source src='$ruta' type='video/$extension'>
                                    Tu navegador no soporta la reproducción de video.
                                </video>
                            ";

                        } else {
                            echo "<div class='no-preview'>";
                            echo "<i class='material-icons' style='font-size:48px; color:#bdbdbd;'>insert_drive_file</i>";
                            echo "<p>No hay vista previa disponible para <strong>" . htmlspecialchars($archivo) . "</strong>.</p>";
                            echo "</div>";
                        }

                        echo "<div class='download-box'>";
                        echo "<a href='$ruta' class='btn btn-info' download>";
                        echo "<i class='material-icons'>file_download</i> Descargar: " . htmlspecialchars($archivo);
                        echo "</a>";
                        echo "</div>";

                        echo '  </div>';
                        echo '</div>';
                    }
                }

                mysqli_close($conexion);
                ?>
            </div>
        </div>
    </div>
</div>

<script src="../assets/js/bootstrap.bundle.min.js"></script>
</body>
</html>