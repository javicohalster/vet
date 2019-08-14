<div class="col-md-12">
    <div class="row">
        <div class="col-md-8">
            <div class="tab-content">
                <div class="tab-pane active" id="add_1">
                    <form class="form" id="form_add_paciente">
                        <div class="row sinpadding">
                            <div class="col-md-12">
                                <div class="form-group label-floating">
                                    <label class="control-label">C.I:</label>
                                    <input type="text" class="form-control" id="rut_add" name="rut_add">
                                </div>
                            </div>
                        </div>
                        <div class="row ">
                            <div class="col-md-12">
                                <div class="form-group label-floating">
                                    <label class="control-label">Nombre Mascota:</label>
                                    <input type="text" class="form-control" id="nombres_add" name="nombres_add">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group label-floating">
                                    <label class="control-label">Propietario:</label>
                                    <input type="text" class="form-control" id="apellidos_add" name="apellidos_add">
                                </div>
                            </div>
                        </div>
                        <div class="row sinpadding">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="control-label">Nacimiento:</label>
                                    <input type="text" placeholder="dd/mm/aaaa" class="form-control datepicker" id="nacimiento_add" name="nacimiento_add">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group label-floating">
                                    <label class="control-label">Email:</label>
                                    <input type="email" class="form-control" id="email_add" name="email_add">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group label-floating">
                                    <label class="control-label">Teléfono:</label>
                                    <input type="text" class="form-control" id="telefono_add" name="telefono_add">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group label-floating">
                                    <label class="control-label">Dirección:</label>
                                    <input type="text" class="form-control" id="direccion_add" name="direccion_add">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="genero_add" value="MACHO">MACHO
                                        </label>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="genero_add" value="HEMBRA">HEMBRA
                                        </label>
                                    </div>
                                </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="alergia_add" value="SI">ESTERILIZADO
                                        </label>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="alergia_add" value="NO">NO ESTERILIZADO
                                        </label>
                                    </div>
                                </div>
                        </div>
                    </div>
                    
                <div class="tab-pane" id="add_2">
                        <div class="row sinpadding">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="control-label">Especie</label>
                                        <select id="medicamento_add" name="medicamento_add" class="form-control" data-style="select-with-transition">
                                                <option value="">-- Seleccione --</option>
                                                <option value="CANINA">CANINA</option> 
                                                <option value="FELINA">FELINA</option>
                                                <option value="OTRA">OTRA</option>                                               
                                          </select>                                                              
                                    </div>
                                </div>
                        </div>
                        <div class="row sinpadding">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label class="control-label">Raza</label>
                                    <select id="sangre_add" name="sangre_add" class="form-control" data-style="select-with-transition">
                                        <option value="">-- Seleccione --</option>
                                         @foreach($razas as $raza)
                                            <option value="{{ $raza->nombre }}">{{ $raza->nombre }}</option>
                                        @endforeach
                                  </select>                                   
                                </div>
                            </div>
                        </div>
                        
                        <div class="row sinpadding">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label class="control-label">Color</label>
                                    <input id="vih_add" name="vih_add" type="text" class="form-control" />                                    
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group label-floating">
                                    <label class="control-label">Peso</label>
                                    <input id="peso_add" name="peso_add" type="number" class="form-control" />                    
                                </div>
                            </div>
                        </div>
                        <!--<div class="row">
                            <div class="col-md-12">
                                <div class="form-group label-floating">
                                    <label class="control-label">Estatura</label>
                                    <input id="altura_add" name="altura_add" type="number" class="form-control" />                    
                                </div>
                            </div>
                        </div>-->
                        <!--<div class="row">
                            <div class="col-md-12">
                                <div class="form-group label-floating">
                                    <label class="control-label">Alergia</label>
                                    <input id="alergia_add" name="alergia_add" type="text" class="form-control" />             
                                </div>
                            </div>
                        </div>-->                        
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group label-floating">
                                    <label class="control-label">Enfermedad</label>
                                    <input id="enfermedad_add" name="enfermedad_add" type="text" class="form-control" />            
                                </div>
                            </div>
                        </div>
                        
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="row">
                <ul class="nav nav-pills nav-pills-icons nav-pills-info nav-stacked" role="tablist">
                    <li class="active">
                        <a href="#add_1" role="tab" data-toggle="tab">
                            <i class="material-icons">info</i>Básica
                        </a>
                    </li>
                    @role(['administrador', 'doctor']) <!-- al terminar esta sección debemos manejar estos datos con abilidades y persmisos a cada perfil "administrador", "doctor", 
                    "recepcionista", "paciente"-->
                    <li>
                        <a href="#add_2" role="tab" data-toggle="tab">
                            <i class="material-icons">fingerprint</i>Personal
                        </a>
                    </li>
                    @endrole
                </ul>
            </div>
        </div>
    </div>
</div>
<script>
      	

        $(document).ready(function(){
        /* Evento que se ejecuta cada vez que se selecciona un elemento en el 
        primer select */
        $("#medicamento_add").change(function(){
             if($("#medicamento_add").val() == 'FELINA'){
                $('#sangre_add').empty();
                $('#sangre_add').append("<option value='NUEVO'>NUEVO</option>");
                $('#sangre_add').append("<option value='NUEVO1'>NUEVO1</option>");
             }
           
        });
    });
</script>