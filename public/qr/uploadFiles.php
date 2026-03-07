<?php
// Incluir la conexión a la BD
include "connect.php";

// Variable para guardar el mensaje final
$mensaje = "";

// Verificamos si se ha enviado el formulario
if (isset($_POST['submit'])) {
    // Obtenemos el ID de la consulta
    $query_id = isset($_POST['query_id']) ? intval($_POST['query_id']) : 0;

    if ($query_id <= 0) {
        $mensaje = "El ID de la consulta no es válido.";
    } else {
        // Revisamos que exista el archivo y que no haya errores de subida
        if (isset($_FILES['file']) && $_FILES['file']['error'] === 0) {

            // Extensiones permitidas
            $allowed_extensions = array(
                "pdf", "doc", "docx",
                "jpg", "jpeg", "png", "gif", "webp", "bmp",
                "mp4", "avi", "mov", "webm", "ogg"
            );

            // Tipos MIME permitidos como validación extra
            $allowed_mimes = array(
                "application/pdf",
                "application/msword",
                "application/vnd.openxmlformats-officedocument.wordprocessingml.document",
                "image/jpeg",
                "image/png",
                "image/gif",
                "image/webp",
                "image/bmp",
                "video/mp4",
                "video/x-msvideo",
                "video/quicktime",
                "video/webm",
                "video/ogg"
            );

            // Obtenemos datos del archivo subido
            $file_name = $_FILES['file']['name'];
            $file_tmp  = $_FILES['file']['tmp_name'];
            $file_size = $_FILES['file']['size'];

            // Extraemos la extensión en minúscula
            $file_ext  = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));

            // Validación de tamaño: 50 MB
            $max_size = 50 * 1024 * 1024;

            if ($file_size > $max_size) {
                $mensaje = "El archivo supera el tamaño permitido de 50 MB.";
            } elseif (!in_array($file_ext, $allowed_extensions)) {
                $mensaje = "Extensión de archivo no permitida. Solo se admiten pdf, doc, docx, imágenes y videos.";
            } else {
                // Validar MIME real del archivo
                $finfo = finfo_open(FILEINFO_MIME_TYPE);
                $mime_type = finfo_file($finfo, $file_tmp);
                finfo_close($finfo);

                if (!in_array($mime_type, $allowed_mimes)) {
                    $mensaje = "El tipo real del archivo no está permitido.";
                } else {
                    // Crear carpeta uploads si no existe
                    if (!is_dir("uploads")) {
                        mkdir("uploads", 0777, true);
                    }

                    // Limpiar nombre original por seguridad
                    $base_name = pathinfo($file_name, PATHINFO_FILENAME);
                    $base_name = preg_replace('/[^A-Za-z0-9_\-]/', '_', $base_name);

                    // Creamos un nombre único para evitar sobreescrituras
                    $new_file_name = uniqid() . '_' . $base_name . '.' . $file_ext;

                    // Carpeta de destino
                    $upload_path = "uploads/" . $new_file_name;

                    // Movemos el archivo a la carpeta de destino
                    if (move_uploaded_file($file_tmp, $upload_path)) {

                        // Insertamos el registro en la base de datos
                        $sql  = "INSERT INTO query_files (query_id, file_path, uploaded_at) VALUES (?, ?, NOW())";
                        $stmt = mysqli_prepare($conexion, $sql);

                        if ($stmt) {
                            mysqli_stmt_bind_param($stmt, "is", $query_id, $new_file_name);

                            if (mysqli_stmt_execute($stmt)) {
                                $mensaje = "El archivo se subió y se guardó correctamente en la base de datos.";
                            } else {
                                // Si falla BD, borramos archivo subido para no dejar basura
                                if (file_exists($upload_path)) {
                                    unlink($upload_path);
                                }
                                $mensaje = "Error al guardar la información del archivo en la base de datos.";
                            }

                            mysqli_stmt_close($stmt);
                        } else {
                            if (file_exists($upload_path)) {
                                unlink($upload_path);
                            }
                            $mensaje = "Error al preparar la consulta de base de datos.";
                        }

                    } else {
                        $mensaje = "Error al mover el archivo al directorio de destino.";
                    }
                }
            }
        } else {
            $error_code = isset($_FILES['file']['error']) ? $_FILES['file']['error'] : 'desconocido';
            $mensaje = "Error en la subida del archivo. Código: " . $error_code;
        }
    }
} else {
    $mensaje = "No se recibió el formulario correctamente.";
}

// Cerramos conexión
mysqli_close($conexion);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Subida de Archivos</title>
</head>
<body>
    <p><?php echo htmlspecialchars($mensaje); ?></p>

    <script>
      setTimeout(function() {
        window.close();
        history.back();
      }, 2000);
    </script>
</body>
</html>