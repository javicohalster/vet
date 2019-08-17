<div class="col-md-12">
    <div class="row">
        <div class="col-md-12">
                <div class="row">
                    <div class="table-responsive">
                        <table class="table">
                                <th>Paciente:</th>
                                <td id="paciente2"></td>
                                <th>Edad:</th>
                                <td id="edad2"></td>
                                <th>Visitas:</th>
                                <td id="visitas2"></td>
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
                <form id="form_hospitalizar">
                <div class="row sinpadding">
                    <input id="id2" name="id2" type="text" hidden="true" />
                    <input id="tipo" name="tipo" type="text" value="HOS" hidden="true" />                   
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="control-label">PESO Kg:</label>
                            <input type="number" class="form-control" id="peso" name="peso" step=".01"/>
                        </div>
                        
                        <div class="form-group">
                            <label class="control-label">TEMPERATURA ºC:</label>
                            <input type="number" class="form-control" id="temperatura" name="temperatura" step=".01"/>
                        </div>
                    
                    </div>
                </div>
                <div class="row">                    
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">DIAGNOSTICO:</label>
                            <textarea rows="6" type="text" class="form-control" id="diagnostico" name="diagnostico"></textarea>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">TRATAMIENTO:</label>
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