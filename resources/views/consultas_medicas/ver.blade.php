<div>
        <div class="col-md-12 color_letra_ver">                
                <div class="row">
                        <div class="table-responsive">
                            <table class="table">
                                    <th>Paciente:</th>
                                    <td id="pacientev"></td>
                                    <th>Edad:</th>
                                    <td id="edadv"></td>
                                    <th>Visitas:</th>
                                    <td id="visitasv"></td>
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
        </div>
      <!-- Nav tabs -->
      <ul class="nav nav-tabs" role="tablist" id="myTabsv">
        <li role="presentation" class="active"><a href="#vacunasantiparasitariov" aria-controls="vacunasantiparasitariov" role="tab" data-toggle="tab">Vacunas y Antiparasitario</a></li>
        <li role="presentation"><a href="#reconocimientosv" aria-controls="reconocimientosv" role="tab" data-toggle="tab">Reconocimientos</a></li>
        <li role="presentation"><a href="#cirugiasv" aria-controls="cirugiasv" role="tab" data-toggle="tab">Cirugías</a></li>
        <li role="presentation"><a href="#hospitalizarv" aria-controls="hospitalizarv" role="tab" data-toggle="tab">Hospitalización</a></li>
      </ul>
      <!-- Tab panes -->
      <form id="form_consultav">
            <input id="idv" name="idv" type="text" hidden="true" />           
            <div class="row sinpadding">  
                    <div class="col-md-12"> 
                        <div class="form-group">
                            <label class="control-label">DOCTOR:</label>
                            <select id="doctorConsultav" name="doctorConsultav"  class="form-control" data-style="select-with-transition">                               
                            </select>
                        </div>
                    </div>
                 </div>
             
       <div class="tab-content">
         <div role="tabpanel" class="tab-pane active" id="vacunasantiparasitariov"> 
             <!--vacunas -->
             
             <div class="row sinpadding">            
                 <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">FECHA VACUNA:</label>
                            <input type="text" placeholder="dd/mm/aaaa" class="form-control datepicker" id="fechavacunav" name="fechavacunav">                            
                        </div>
                 </div>
                 <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">TIPO:</label>
                            <select id="tipovacunav" name="tipovacunav" class="form-control" data-style="select-with-transition">
                                <option value="">-- Seleccione --</option>                               
                                <option value="BIOZOO PUPPY FENCE L5">BIOZOO PUPPY FENCE L5</option>
                                <option value="HIPRADOG PV">HIPRADOG PV</option>
                                <option value="HIPRADOG 7">HIPRADOG 7</option>
                                <option value="PFIZER 5L">PFIZER 5L</option>
                                <option value="PFIZER 5L + RABIGEN MONO">PFIZER 5L + RABIGEN MONO</option>
                                <option value="PFIZER 5L4">PFIZER 5L4</option>
                                <option value="PFIZER 5L4 CV">PFIZER 5L4 CV</option>
                                <option value="PFIZER BRONCHICINE">PFIZER BRONCHICINE</option>
                                <option value="BAGOVAC RABIA">BAGOVAC RABIA</option>
                                <option value="VIRBAC CANIGEN MHA2PPi / LR">VIRBAC CANIGEN MHA2PPi / LR</option>
                                <option value="HIPRADOG 7 - BAGOVAC RABIA">HIPRADOG 7 - BAGOVAC RABIA</option>
                                <option value="PFIZER 5L - BAGOVAC RABIA">PFIZER 5L - BAGOVAC RABIA</option>
                                <option value="PFIZER 5L4 - BAGOVAC RABIA">PFIZER 5L4 - BAGOVAC RABIA</option>
                                <option value="VIRBAC FELIGEN CPR">VIRBAC FELIGEN CPR</option>
                                <option value="VIRBAC FELIGEN CPR - BAGOVAC RABIA">VIRBAC FELIGEN CPR - BAGOVAC RABIA</option> 
                                <option value="PFIZER FELOCELL 3">PFIZER FELOCELL 3</option> 
                                <option value="PFIZER FELOCELL 3 - BAGOVAC RABIA">PFIZER FELOCELL 3 - BAGOVAC RABIA</option> 
                                <option value="VIRBAC RABIGEN MONO">VIRBAC RABIGEN MONO</option> 
                                <option value="VIRBAC FELIGEN CPR - RABIGEN MONO">VIRBAC FELIGEN CPR - RABIGEN MONO</option>
                                <option value="VIRBAC CANIGEN MHA2PPi / L">VIRBAC CANIGEN MHA2PPi / L</option> 
                                <option value="DEFENSOR">DEFENSOR</option>                                                                                                            
                            </select>                             
                        </div>
                </div>                         
            </div>
            <div class="row">
                <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">DIAS REVACUNAR:</label>                           
                            <select id="diasrevacunav" name="diasrevacunav" class="form-control" data-style="select-with-transition">
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
                        <label class="control-label">FECHA VACUNA SIGUIENTE:</label>
                        <input type="text" placeholder="dd/mm/aaaa" class="form-control datepicker" id="fechavacunasiguientev" name="fechavacunasiguientev">                            
                    </div>
                </div>
                           
            </div>
            <h3>DESPARASITACION</h3>
            <!-- parasitar-->
                <div class="row sinpadding">
                    <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">FECHA DESPARASITACION:</label>
                                <input type="text" placeholder="dd/mm/aaaa" class="form-control datepicker" id="fechadesparasitacionv" name="fechadesparasitacionv">                            
                            </div>
                    </div>
                    <div class="col-md-6">
                            <div class="form-group">
                            <label class="control-label">PESO Kg:</label>
                                <input type="number" class="form-control" id="pesodesparasitacionv" name="pesodesparasitacionv" step=".01"/>
                            </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">DESCRIPCION:</label>
                                <select id="descripciondesparacitacionv" name="descripciondesparacitacionv" class="form-control" data-style="select-with-transition">
                                    <option value="">-- Seleccione --</option>
                                    <option value="ALCOBEST 25%">ALCOBEST 25%</option> 
                                    <option value="ALBEX TABLETAS">ALBEX TABLETAS</option>
                                    <option value="IVERMECTINA 1%">IVERMECTINA 1%</option>
                                    <option value="ALBENDAZOL POTENCIADO">ALBENDAZOL POTENCIADO</option>
                                    <option value="PIRANTEL + PRAZIQUANTEL">PIRANTEL + PRAZIQUANTEL</option>
                                    <option value="CESTODAN">CESTODAN</option>                               
                                    <option value="CANICUR">CANICUR</option> 
                                    <option value="FEBENDAZOL">FEBENDAZOL</option>                                                                                                               
                                </select>                             
                            </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">POSOLOGIA:</label>
                            <select id="posologiav" name="posologiav" class="form-control" data-style="select-with-transition">
                                <option value="">-- Seleccione --</option>
                                <option value="ORAL">ORAL</option> 
                                <option value="INTRAMUSCULAR">INTRAMUSCULAR</option>   
                                <option value="SUBCUTANEA">SUBCUTANEA</option>                                                                                                           
                            </select>
                        </div>
                    </div>               
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">DOSIS:</label>
                            <input type="text" class="form-control" id="dosisv" name="dosisv"/>
                        </div>
                    </div>                   
                </div>
                <div class="row">
                    <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">DIAS A DESPARASITAR:</label>                           
                                    <select id="diasdesparacitarv" name="diasdesparacitarv" class="form-control" data-style="select-with-transition">
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
                            <label class="control-label">FECHA SIGUIENTE:</label>
                            <input type="text" placeholder="dd/mm/aaaa" class="form-control datepicker" id="fechasigueintedesparasitacionv" name="fechasigueintedesparasitacionv">                            
                        </div>
                    </div>
                </div>
            <!-- fin parasitar-->
        </div>    
         <div role="tabpanel" class="tab-pane" id="reconocimientosv">
                <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-12">
                                    <!--<div class="row">
                                        <div class="table-responsive">
                                            <table class="table">
                                                    <th>Paciente:</th>
                                                    <td id="paciente"></td>
                                                    <th>Edad:</th>
                                                    <td id="edad"></td>
                                                    <th>Visitas:</th>
                                                    <td id="visitas"></td>
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
                                    </div>-->
    
                                    
                                   
                                    <div class="row sinpadding">  
                                            <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label">FECHA:</label>
                                                        <input type="text" placeholder="dd/mm/aaaa" class="form-control datepicker" id="fecharegistrav" name="fecharegistrav">                            
                                                    </div>
                                                </div>
                                    </div>
                                    <div class="row sinpadding">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label">ANAMNESIS:</label>
                                                <textarea rows="6" type="text" class="form-control" id="sintomasv" name="sintomasv"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label">PESO Kg:</label>
                                                <input type="number" class="form-control" id="pesov" name="pesov" step=".01"/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label">TEMPERATURA ºC:</label>
                                                <input type="number" class="form-control" id="temperaturav" name="temperaturav"/>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label">DIAGNOSTICO:</label>
                                                <textarea rows="6" type="text" class="form-control" id="diagnosticov" name="diagnosticov"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label">PRUEBAS REALIZADAS:</label>
                                                <textarea rows="6" type="text" class="form-control" id="examenesv" name="examenesv"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label">RESULTADOS:</label>
                                                <textarea rows="6" type="text" class="form-control" id="observacionv" name="observacionv"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="control-label">TRATAMIENTO:</label>
                                                <textarea rows="6" type="text" class="form-control" id="tratav" name="tratav"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label">MEDICAMENTOS:</label>
                                                <textarea rows="6" type="text" class="form-control" id="tratamientov" name="tratamientov"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label">RECETA:</label>
                                                <textarea rows="6" type="text" class="form-control" id="recetav" name="recetav"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                
                            </div>
                        </div>
                    </div>
         </div>
         <div role="tabpanel" class="tab-pane" id="cirugiasv">
                <div class="row sinpadding">    
                        <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">FECHA CIRUGIA:</label>
                                    <input type="text" placeholder="dd/mm/aaaa" class="form-control datepicker" id="fechacirugiav" name="fechacirugiav">                            
                                </div>
                        </div>                                  
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">PESO CIRUGIA Kg:</label>                           
                                <input type="number" class="form-control" id="pesocirugiav" name="pesocirugiav" step=".01"/>
                            </div> 
                        </div>
                </div>
                <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="control-label">PROCEDIMIENTO:</label>
                                <textarea rows="6" type="text" class="form-control" id="procedimientocirugiav" name="procedimientocirugiav"></textarea>
                            </div>
                        </div>
                </div>               
                <div class="row">                    
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="control-label">MEDICACION RECETADA:</label>
                                <textarea rows="6" type="text" class="form-control" id="recetacirugiav" name="recetacirugiav"></textarea>
                            </div>
                        </div>
                </div>
         </div>
         <div role="tabpanel" class="tab-pane" id="hospitalizarv">
                <div class="row sinpadding">    
                        <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">FECHA HOSPITALIZACION:</label>
                                    <input type="text" placeholder="dd/mm/aaaa" class="form-control datepicker" id="fechahospitalizacionv" name="fechahospitalizacionv">                            
                                </div>
                        </div>                                  
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">PESO HOSPITALIZACION Kg:</label>
                                <input type="number" class="form-control" id="pesohospitalizarv" name="pesohospitalizarv" step=".01"/>
                            </div>
                        </div>                   
                    </div>
                    <div class="row">  
                        <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">TEMPERATURA ºC:</label>
                                        <input type="number" class="form-control" id="temperaturahospitalizarv" name="temperaturahospitalizarv" step=".01"/>                                  
                                    </div>                            
                        </div>                  
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">DIAGNOSTICO:</label>
                                <textarea rows="6" type="text" class="form-control" id="diagnosticohospitalizarv" name="diagnosticohospitalizarv"></textarea>
                            </div>
                        </div>                    
                    </div>               
                    <div class="row">   
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">TRATAMIENTO:</label>
                                <textarea rows="6" type="text" class="form-control" id="tratamientohotpitalizarv" name="tratamientohotpitalizarv"></textarea>
                            </div>
                        </div>                 
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="control-label">MEDICACION RECETADA:</label>
                                <textarea rows="6" type="text" class="form-control" id="recetahospitalizarv" name="recetahospitalizarv"></textarea>
                            </div>
                        </div>
                    </div>
    
         </div>
       </div>
       <div class="row sinpadding">  
            <div class="col-md-12"> 
                <div class="form-group">
                    <label class="control-label">FECHA SIGUIENTE CITA:</label>
                    <input type="text" placeholder="dd/mm/aaaa" class="form-control datepicker" id="fechasiguientecitav" name="fechasiguientecitav"> 
                    </select>
                </div>
            </div>
         </div>
     </form>
    </div>
    