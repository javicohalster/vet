<div class="col-md-12">
    <div class="row">
        <div class="col-md-12">
                <div class="row">
                    <div class="table-responsive">
                        <table class="table">
                                <th>Paciente:</th>
                                <td id="paciente3"></td>
                                <th>Edad:</th>
                                <td id="edad3"></td>
                                <th>Visitas:</th>
                                <td id="visitas3"></td>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                        </table>
                    </div>
                </div>
                <form id="form_cirugia">
                <div class="row sinpadding">
                    <input id="id3" name="id3" type="text" hidden="true" />
                    <input id="tipo" name="tipo" type="text" value="CIR" hidden="true" />                   
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="control-label">PESO Kg:</label>
                            <input type="text"  id="sintomas" name="sintomas" value="N" hidden="true"/>
                            <input type="text"  id="examenes" name="examenes" value="N" hidden="true"/>
                            <input type="text"  id="tratamiento" name="tratamiento" value="N" hidden="true"/>
                            <input type="text"  id="observacion" name="observacion" value="N" hidden="true"/>
                            <input type="number" class="form-control" id="peso" name="peso" step=".01"/>
                        </div>                       
                        
                    </div>
                </div>
                <div class="row">                   
                   
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="control-label">PROCEDIMIENTO:</label>
                            <textarea rows="6" type="text" class="form-control" id="tratamiento" name="tratamiento"></textarea>
                        </div>
                    </div>
                </div>               
                <div class="row">                    
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="control-label">MEDICACION RECETADA:</label>
                            <textarea rows="6" type="text" class="form-control" id="receta" name="receta"></textarea>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>