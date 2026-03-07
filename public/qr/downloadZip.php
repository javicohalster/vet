<?php
include "connect.php";

$query_id = isset($_GET['qr']) ? intval($_GET['qr']) : 0;
if ($query_id <= 0) {
    die("ID de query no válido.");
}

$sql = "SELECT file_path FROM query_files WHERE query_id = ?";
$stmt = mysqli_prepare($conexion, $sql);
mysqli_stmt_bind_param($stmt, "i", $query_id);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

if (!$result || mysqli_num_rows($result) == 0) {
    die("No existen archivos para descargar.");
}

$zip = new ZipArchive();
$zipName = "documentos_query_" . $query_id . "_" . date("Ymd_His") . ".zip";
$tmpZip = sys_get_temp_dir() . DIRECTORY_SEPARATOR . $zipName;

if ($zip->open($tmpZip, ZipArchive::CREATE | ZipArchive::OVERWRITE) !== true) {
    die("No se pudo crear el archivo ZIP.");
}

while ($row = mysqli_fetch_assoc($result)) {
    $file = $row['file_path'];
    $fullPath = __DIR__ . "/uploads/" . $file;

    if (file_exists($fullPath)) {
        $zip->addFile($fullPath, $file);
    }
}

$zip->close();

mysqli_stmt_close($stmt);
mysqli_close($conexion);

if (!file_exists($tmpZip)) {
    die("No se pudo generar el ZIP.");
}

header('Content-Type: application/zip');
header('Content-Disposition: attachment; filename="' . basename($zipName) . '"');
header('Content-Length: ' . filesize($tmpZip));
readfile($tmpZip);

unlink($tmpZip);
exit;