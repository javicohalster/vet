<div class="col-md-12">
    <div class="row">
        <div class="col-md-12">
                <div class="row">
                    <div class="table-responsive">
                        <table class="table">
                                <th>Paciente:</th>
                                <td id="paciente4"></td>
                                <th>Edad:</th>
                                <td id="edad4"></td>
                                <th>Visitas:</th>
                                <td id="visitas4"></td>
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
                <form id="form_parasitario">
                <div class="row sinpadding">
                    <input id="id4" name="id4" type="text" hidden="true" />
                    <input id="tipo" name="tipo" type="text" hidden="true" value="PAR" />
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">DIAS A DESPARACITAR:</label>                           
                            <select id="sintomas" name="sintomas" class="form-control" data-style="select-with-transition">
                                    <option value="">-- Seleccione --</option>
                                    <option value="15">15</option> 
                                    <option value="18">18</option>
                                    <option value="21">21</option> 
                                    <option value="30">30</option>
                                    <option value="120">120</option> 
                                    <option value="365">365</option>                                                                               
                              </select>   
                            
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">DESCRIPCION:</label>
                            <select id="examenes" name="examenes" class="form-control" data-style="select-with-transition">
                                <option value="">-- Seleccione --</option>
                                <option value="ALCOBEST 25%">ALCOBEST 25%</option> 
                                <option value="CANICUR">CANICUR</option>                                                                                                             
                            </select>                             
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">POSOLOGIA:</label>
                            <select id="diagnostico" name="diagnostico" class="form-control" data-style="select-with-transition">
                                <option value="">-- Seleccione --</option>
                                <option value="ORAL">ORAL</option> 
                                <option value="INTRAMUSCULAR">INTRAMUSCULAR</option>   
                                <option value="SUBCUTANEA">SUBCUTANEA</option>                                                                                                           
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                        <label class="control-label">PESO Kg:</label>
                            <input type="number" class="form-control" id="peso" name="peso"/>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">DOSIS:</label>
                            <input type="number" class="form-control" id="temperatura" name="temperatura"/>
                        </div>
                    </div>                   
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">FECHA:</label>
                            <input type="text" placeholder="dd/mm/aaaa" class="form-control datepicker" id="tratamiento" name="tratamiento">                            
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">FECHA SIGUIENTE:</label>
                            <input type="text" placeholder="dd/mm/aaaa" class="form-control datepicker" id="observacion" name="observacion">                            
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>