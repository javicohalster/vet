<?php
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
    <title>Documentos del paciente</title>
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css" media="all" />
    <link rel="stylesheet" href="../assets/css/material-dashboard.css" media="all" />
    <link rel="stylesheet" href="../assets/css/style_receta.css" media="all" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <style>
        body{
            background: #f4f6f9;
            padding: 30px;
        }
        .modal-notice{
            max-width: 900px;
            margin: 30px auto;
        }
        .modal-header-info{
            background: #00bcd4;
            color: #fff;
            padding: 20px;
            border-radius: 4px 4px 0 0;
            position: relative;
        }
        .modal-header-info h6{
            margin: 0;
            font-size: 18px;
            font-weight: 500;
        }
        .modal-header-info .close{
            position: absolute;
            right: 15px;
            top: 12px;
            color: #fff;
            opacity: 1;
        }
        .modal-content{
            border-radius: 6px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0,0,0,.15);
        }
        .info-box{
            background: #fff;
            border: 1px solid #e7e7e7;
            border-radius: 6px;
            padding: 20px;
            margin-bottom: 20px;
        }
        .info-title{
            margin-top: 0;
            margin-bottom: 15px;
            font-weight: bold;
            color: #333;
        }
        .upload-box{
            border: 2px dashed #d2d6de;
            border-radius: 6px;
            padding: 25px;
            background: #fafafa;
            text-align: center;
        }
        .upload-box input[type=file]{
            margin: 15px auto;
        }
        .help-text{
            color: #777;
            font-size: 13px;
            margin-top: 10px;
        }
        .badge-id{
            display: inline-block;
            background: #e3f2fd;
            color: #0277bd;
            padding: 6px 12px;
            border-radius: 20px;
            font-weight: bold;
            margin-top: 8px;
        }
        .modal-footer{
            padding: 15px 20px;
            background: #fafafa;
            border-top: 1px solid #eee;
        }
    </style>
</head>


<div>
    <div class="modal-content">
        <div class="modal-header-info">
           <button type="button" class="close" onclick="window.close();" data-dismiss="modal" aria-hidden="true">
                <i class="material-icons">clear</i>
            </button>
            <h6>
                DOCUMENTOS DEL PACIENTE:
                <b><span class="title-name">Historia / Consulta #<?php echo htmlspecialchars($id); ?></span></b>
            </h6>
        </div>

        <div class="modal-body">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-4">
                        <div class="info-box text-center">
                           
                            <br>
                            <h4 class="info-title">Carga de Documentos</h4>
                            <p class="text-muted">Adjunta archivos relacionados con el paciente o la historia clínica.</p>
                            <div class="badge-id">
                                ID Historia: <?php echo htmlspecialchars($id); ?>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-8">
                        <div class="info-box">
                            <h4 class="info-title">Subir archivo</h4>

                            <form action="qr/uploadFiles.php" method="post" enctype="multipart/form-data">
                                <input type="hidden" name="query_id" value="<?php echo htmlspecialchars($id); ?>">

                                <div class="upload-box">
                                    <i class="material-icons" style="font-size:48px; color:#00bcd4;">cloud_upload</i>
                                    <h5>Selecciona un archivo</h5>
                                    <p class="text-muted">Formatos permitidos: PDF, DOC, DOCX, JPG, JPEG, PNG, GIF, MP4, AVI, MOV, WEBM</p>

                                    <input type="file"
                                           name="file"
                                           id="file"
                                           class="form-control"
                                           accept=".pdf,.doc,.docx,.jpg,.jpeg,.png,.gif,.mp4,.avi,.mov,.webm,image/*,video/*"
                                           required>

                                    <div class="help-text">
                                        El archivo quedará asociado a la historia o consulta seleccionada.
                                    </div>
                                </div>

                                <br>

                                <div class="form-group">
                                    <label for="descripcion"><b>Descripción del documento</b></label>
                                    <textarea name="descripcion"
                                              id="descripcion"
                                              rows="4"
                                              class="form-control"
                                              placeholder="Ejemplo: Resultado de laboratorio, ecografía, receta, examen complementario..."></textarea>
                                </div>

                                <div class="text-right">
                                    <button type="submit" class="btn btn-info" name="submit">
                                        <span class="btn-label">
                                            <i class="material-icons">file_upload</i>
                                        </span>
                                        Subir archivo
                                    </button>
                                </div>
                            </form>
                        </div>                        
                    </div>
                </div>
            </div>
            <div style="clear: both;"></div>
        </div>

        <div class="modal-footer text-center">
            <a href="javascript:history.back()" class="btn btn-default pull-left">
                <i class="material-icons">arrow_back</i> Volver
            </a>
        </div>
    </div>
</div>


</html>