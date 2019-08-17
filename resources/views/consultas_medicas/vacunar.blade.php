<div class="col-md-12">
    <div class="row">
        <div class="col-md-12">
                <div class="row">
                    <div class="table-responsive">
                        <table class="table">
                                <th>Paciente:</th>
                                <td id="paciente1"></td>
                                <th>Edad:</th>
                                <td id="edad1"></td>
                                <th>Visitas:</th>
                                <td id="visitas1"></td>
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
                <form id="form_vacunas">
                <div class="row sinpadding">
                    <input id="id1" name="id1" type="text" hidden="true" />
                    <input id="tipo" name="tipo" type="text" hidden="true" value="VAC" />
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">DIAS REVACUNAR:</label>                           
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
                            <label class="control-label">TIPO:</label>
                            <select id="examenes" name="examenes" class="form-control" data-style="select-with-transition">
                                <option value="">-- Seleccione --</option>
                                <option value="PFIZER 5L">PFIZER 5L</option> 
                                <option value="PFIZER 5L4">PFIZER 5L4</option>                                                                                                            
                            </select>                             
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">FECHA VACUNA:</label>
                            <input type="text" placeholder="dd/mm/aaaa" class="form-control datepicker" id="tratamiento" name="tratamiento">                            
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">FECHA SIGUIENTE VACUNA:</label>
                            <input type="text" placeholder="dd/mm/aaaa" class="form-control datepicker" id="observacion" name="observacion">                            
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>