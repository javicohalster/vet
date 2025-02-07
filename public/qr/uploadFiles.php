<?php
// Incluir la conexión a la BD
include "connect.php";

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
                    echo "El archivo se subió y se guardó correctamente en la base de datos.";
                } else {
                    echo "Error al guardar la información del archivo en la base de datos.";
                }
                
                mysqli_stmt_close($stmt);
                
            } else {
                echo "Error al mover el archivo al directorio de destino.";
            }
        } else {
            echo "Extensión de archivo no permitida. Solo se admiten pdf, doc, docx.";
        }
    } else {
        echo "Error en la subida del archivo. Verifica que hayas seleccionado un archivo válido.";
    }
} else {
    echo "No se recibió el formulario correctamente.";
}

// Cerramos conexión (opcional)
mysqli_close($conexion);
?>
