<?php
// Asegúrate de usar tu conexión si es necesaria para validar algo.
// include "connect.php";

// Tomamos el ID de la consulta desde la URL
$id = $_GET['qr'] ?? null;
if (!$id) {
    echo "No se recibió el ID de la consulta (qr).";
    exit;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Subir archivos</title>
    <link rel="stylesheet" href="../assets/css/material-dashboard.css" media="all" />
    <link rel="stylesheet" href="../assets/css/style_receta.css" media="all" />
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css" media="all" />
</head>
<body>
<header class="clearfix">
      <div id="logo">
        <img src="../images/firmas/logo.jpg">
      </div>
      <h1>Subir archivos</h1>
           
    </header>
    <h1>Subir archivos para la historia #<?php echo htmlspecialchars($id); ?></h1>

    <form action="uploadFiles.php" method="post" enctype="multipart/form-data">
        <!-- Campo oculto para pasar el ID de la consulta -->
        <input type="hidden" name="query_id" value="<?php echo htmlspecialchars($id); ?>">
        
        <label for="file">Seleccionar archivo (pdf, doc, docx):</label><br><br>
        <input type="file" name="file" id="file" accept=".pdf,.doc,.docx" required><br><br>
        
        <button type="submit" name="submit">Subir archivo</button>
    </form>

</body>
</html>
