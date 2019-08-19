<div>

  <!-- Nav tabs -->
  <ul class="nav nav-tabs" role="tablist" id="myTabs">
    <li role="presentation" class="active"><a href="#vacunasantiparasitario" aria-controls="vacunasantiparasitario" role="tab" data-toggle="tab">Vacunas y Antiparasitario</a></li>
    <li role="presentation"><a href="#reconocimientos" aria-controls="reconocimientos" role="tab" data-toggle="tab">Reconocimientos</a></li>
    <li role="presentation"><a href="#cirugias" aria-controls="cirugias" role="tab" data-toggle="tab">Cirugías</a></li>
    <li role="presentation"><a href="#cosas" aria-controls="cosas" role="tab" data-toggle="tab">Hospitalización</a></li>
  </ul>

  <!-- Tab panes -->
  <div class="tab-content">
    <div role="tabpanel" class="tab-pane active" id="vacunasantiparasitario">..vacunasantiparasitario.</div>
    <div role="tabpanel" class="tab-pane" id="reconocimientos">
            <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-12">
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
                                <form id="form_consulta">
                                <div class="row sinpadding">
                                    <input id="id" name="id" type="text" hidden="true" />
                                    <input id="tipo" name="tipo" type="text" value="REC" hidden="true" />
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">ANAMNESIS:</label>
                                            <textarea rows="6" type="text" class="form-control" id="sintomas" name="sintomas"></textarea>
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
                                            <label class="control-label">TRATAMIENTO:</label>
                                            <textarea rows="6" type="text" class="form-control" id="tratamiento" name="tratamiento"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">RECETA:</label>
                                            <textarea rows="6" type="text" class="form-control" id="receta" name="receta"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
    </div>
    <div role="tabpanel" class="tab-pane" id="cirugias">.cirugias..</div>
    <div role="tabpanel" class="tab-pane" id="cosas">..cosas.</div>
  </div>

</div>
