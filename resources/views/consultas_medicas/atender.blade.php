<div>
    <div class="col-md-12 color_letra_ver">                
            <div class="row">
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
            </div>
    </div>
  <!-- Nav tabs -->
 

  <ul class="nav nav-tabs" role="tablist" id="myTabs">
    <li role="presentation" class="active"><a href="#vacunasantiparasitario" aria-controls="vacunasantiparasitario" role="tab" data-toggle="tab">Vacunas y Antiparasitario</a></li>
    <li role="presentation"><a href="#reconocimientos" aria-controls="reconocimientos" role="tab" data-toggle="tab">Reconocimientos</a></li>
    <li role="presentation"><a href="#cirugias" aria-controls="cirugias" role="tab" data-toggle="tab">Cirugías</a></li>
    <li role="presentation"><a href="#hospitalizar" aria-controls="hospitalizar" role="tab" data-toggle="tab">Hospitalización</a></li>
  </ul>
  <!-- Tab panes -->
  <form id="form_consulta">
        <input id="id" name="id" type="text" hidden="true" />
        <input id="tipo" name="tipo" type="text" value="REC" hidden="true" />
        <div class="row sinpadding">  
                <div class="col-md-12"> 
                    <div class="form-group">
                        <label class="control-label">DOCTOR:</label>
                        <select id="doctorConsulta" name="doctorConsulta"  class="form-control" data-style="select-with-transition">                               
                        </select>
                    </div>
                </div>
             </div>
             
   <div class="tab-content">
     <div role="tabpanel" class="tab-pane active" id="vacunasantiparasitario"> 
         <!--vacunas -->
         
         <div class="row sinpadding">            
             <div class="col-md-6">
                    <div class="form-group">
                        <label class="control-label">FECHA VACUNA:</label>
                        <input type="text" placeholder="dd/mm/aaaa" class="form-control datepicker" id="fechavacuna" name="fechavacuna">                            
                    </div>
             </div>
             <div class="col-md-6">
                    <div class="form-group">
                        <label class="control-label">TIPO:</label>
                        <select id="tipovacuna" name="tipovacuna" class="form-control" data-style="select-with-transition">
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
                            <option value="VIRBAC CANIGEN MHA2PPi / L">VIRBAC CANIGEN MHA2PPi / L</option> 
                            <option value="VIRBAC FELIGEN CPR - RABIGEN MONO">VIRBAC FELIGEN CPR - RABIGEN MONO</option>
                            <option value="DEFENSOR">DEFENSOR</option>                                                                                                           
                        </select>                             
                    </div>
            </div>                         
        </div>
        <div class="row">
            <div class="col-md-6">
                    <div class="form-group">
                        <label class="control-label">DIAS REVACUNAR:</label>                           
                        <select id="diasrevacuna" name="diasrevacuna" class="form-control" data-style="select-with-transition">
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
                    <input type="text" placeholder="dd/mm/aaaa" class="form-control datepicker" id="fechavacunasiguiente" name="fechavacunasiguiente">                            
                </div>
            </div>
                       
        </div>
        <h3>DESPARASITACION</h3>
        <!-- parasitar-->
            <div class="row sinpadding">
                <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">FECHA DESPARASITACION:</label>
                            <input type="text" placeholder="dd/mm/aaaa" class="form-control datepicker" id="fechadesparasitacion" name="fechadesparasitacion">                            
                        </div>
                </div>
                <div class="col-md-6">
                        <div class="form-group">
                        <label class="control-label">PESO Kg:</label>
                            <input type="number" class="form-control" id="pesodesparasitacion" name="pesodesparasitacion" step=".01"/>
                        </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">DESCRIPCION:</label>
                            <select id="descripciondesparacitacion" name="descripciondesparacitacion" class="form-control" data-style="select-with-transition">
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
                        <select id="posologia" name="posologia" class="form-control" data-style="select-with-transition">
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
                        <input type="text" class="form-control" id="dosis" name="dosis"/>
                    </div>
                </div>                   
            </div>
            <div class="row">
                <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">DIAS A DESPARASITAR:</label>                           
                                <select id="diasdesparacitar" name="diasdesparacitar" class="form-control" data-style="select-with-transition">
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
                        <input type="text" placeholder="dd/mm/aaaa" class="form-control datepicker" id="fechasigueintedesparasitacion" name="fechasigueintedesparasitacion">                            
                    </div>
                </div>
            </div>
        <!-- fin parasitar-->
    </div>    
     <div role="tabpanel" class="tab-pane" id="reconocimientos">
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
                                                    <input type="text" placeholder="dd/mm/aaaa" class="form-control datepicker" id="fecharegistra" name="fecharegistra">                            
                                                </div>
                                            </div>
                                </div>
                                <div class="row sinpadding">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">ANAMNESIS:</label>
                                            <textarea rows="6" type="text" class="form-control" id="sintomas" name="sintomas"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">PESO Kg:</label>
                                            <input type="number" class="form-control" id="peso" name="peso" step=".01"/>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">TEMPERATURA ºC:</label>
                                            <input type="number" class="form-control" id="temperatura" name="temperatura"/>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">DIAGNOSTICO:</label>
                                            <textarea rows="6" type="text" class="form-control" id="diagnostico" name="diagnostico"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="control-label">TRATAMIENTO:</label>
                                            <textarea rows="6" type="text" class="form-control" id="trata" name="trata"></textarea>
                                        </div>
                                    </div>                                   
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">PRUEBAS REALIZADAS:</label>
                                            <textarea rows="6" type="text" class="form-control" id="examenes" name="examenes"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">RESULTADOS:</label>
                                            <textarea rows="6" type="text" class="form-control" id="observacion" name="observacion"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">MEDICAMENTOS:</label>
                                            <textarea rows="6" type="text" class="form-control" id="tratamiento" name="tratamiento">1. Amoxicilina 500mg</textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">INDICACIONES:</label>
                                            <textarea rows="6" type="text" class="form-control" id="receta" name="receta">1. Tomar 200mg cada 8 horas.</textarea>
                                        </div>
                                    </div>
                                </div>
                            
                        </div>
                    </div>
                </div>
     </div>
     <div role="tabpanel" class="tab-pane" id="cirugias">
            <div class="row sinpadding">    
                    <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">FECHA CIRUGIA:</label>
                                <input type="text" placeholder="dd/mm/aaaa" class="form-control datepicker" id="fechacirugia" name="fechacirugia">                            
                            </div>
                    </div>                                  
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">PESO CIRUGIA Kg:</label>                           
                            <input type="number" class="form-control" id="pesocirugia" name="pesocirugia" step=".01"/>
                        </div> 
                    </div>
            </div>
            <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="control-label">PROCEDIMIENTO:</label>
                            <textarea rows="6" type="text" class="form-control" id="procedimientocirugia" name="procedimientocirugia"></textarea>
                        </div>
                    </div>
            </div>               
            <div class="row">                    
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="control-label">MEDICACION RECETADA:</label>
                            <textarea rows="6" type="text" class="form-control" id="recetacirugia" name="recetacirugia"></textarea>
                        </div>
                    </div>
            </div>
     </div>
     <div role="tabpanel" class="tab-pane" id="hospitalizar">
            <div class="row sinpadding">    
                    <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">FECHA HOSPITALIZACION:</label>
                                <input type="text" placeholder="dd/mm/aaaa" class="form-control datepicker" id="fechahospitalizacion" name="fechahospitalizacion">                            
                            </div>
                    </div>                                  
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">PESO HOSPITALIZACION Kg:</label>
                            <input type="number" class="form-control" id="pesohospitalizar" name="pesohospitalizar" step=".01"/>
                        </div>
                    </div>                   
                </div>
                <div class="row">  
                    <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">TEMPERATURA ºC:</label>
                                    <input type="number" class="form-control" id="temperaturahospitalizar" name="temperaturahospitalizar" step=".01"/>                                  
                                </div>                            
                    </div>                  
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">DIAGNOSTICO:</label>
                            <textarea rows="6" type="text" class="form-control" id="diagnosticohospitalizar" name="diagnosticohospitalizar"></textarea>
                        </div>
                    </div>                    
                </div>               
                <div class="row">   
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">MEDICAMENTOS:</label>
                            <textarea rows="6" type="text" class="form-control" id="tratamientohotpitalizar" name="tratamientohotpitalizar"></textarea>
                        </div>
                    </div>                 
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="control-label">MEDICACION RECETADA:</label>
                            <textarea rows="6" type="text" class="form-control" id="recetahospitalizar" name="recetahospitalizar"></textarea>
                        </div>
                    </div>
                </div>

     </div>
   </div>
   <div class="row sinpadding">  
        <div class="col-md-12"> 
            <div class="form-group">
                <label class="control-label">FECHA SIGUIENTE CITA:</label>
                <input type="text" placeholder="dd/mm/aaaa" class="form-control datepicker" id="fechasiguientecita" name="fechasiguientecita"> 
                </select>
            </div>
        </div>
     </div>
     
 </form>
</div>
