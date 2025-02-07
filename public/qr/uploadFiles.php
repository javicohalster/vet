<?php
// Incluir la conexión a la BD
include "connect.php";

// Variable para guardar el mensaje final
$mensaje = "";

// Verificamos si se ha enviado el formulario
if (isset($_POST['submit'])) {
    // Obtenemos el ID de la consulta
    $query_id = $_POST['query_id'];
    
    // Revisamos que exista el archivo y que no haya errores de subida
    if (isset($_FILES['file']) && $_FILES['file']['error'] === 0) {
        
        // Definimos extensiones permitidas
        $allowed_extensions = array("pdf", "doc", "docx");
        
        // Obtenemos datos del archivo subido
        $file_name = $_FILES['file']['name'];
        $file_tmp  = $_FILES['file']['tmp_name'];
        
        // Extraemos la extensión en minúscula
        $file_ext  = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
        
        // Validamos extensión
        if (in_array($file_ext, $allowed_extensions)) {
            
            // Creamos un nombre único para evitar sobreescrituras
            $new_file_name = uniqid() . '.' . $file_ext;
            
            // Carpeta de destino (asegúrate de que exista y tenga permisos de escritura)
            $upload_path = "uploads/" . $new_file_name;
            
            // Movemos el archivo a la carpeta de destino
            if (move_uploaded_file($file_tmp, $upload_path)) {
                
                // Insertamos el registro en la base de datos
                $sql  = "INSERT INTO query_files (query_id, file_path, uploaded_at) VALUES (?, ?, NOW())";
                $stmt = mysqli_prepare($conexion, $sql);
                
                // Asignamos los parámetros de la consulta
                mysqli_stmt_bind_param($stmt, "is", $query_id, $new_file_name);
                
                if (mysqli_stmt_execute($stmt)) {
                    $mensaje = "El archivo se subió y se guardó correctamente en la base de datos.";
                } else {
                    $mensaje = "Error al guardar la información del archivo en la base de datos.";
                }
                
                mysqli_stmt_close($stmt);
                
            } else {
                $mensaje = "Error al mover el archivo al directorio de destino.";
            }
        } else {
            $mensaje = "Extensión de archivo no permitida. Solo se admiten pdf, doc, docx.";
        }
    } else {
        $mensaje = "Error en la subida del archivo. Verifica que hayas seleccionado un archivo válido.";
    }
} else {
    $mensaje = "No se recibió el formulario correctamente.";
}

// Cerramos conexión (opcional)
mysqli_close($conexion);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Subida de Archivos</title>
</head>
<body>
    <p><?php echo $mensaje; ?></p>
    
    <!-- Script para cerrar la ventana automáticamente tras 2 segundos -->
    <script>
      setTimeout(function() {
        window.close();
      }, 2000);
    </script>
</body>
</html>
