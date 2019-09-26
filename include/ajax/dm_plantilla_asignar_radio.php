                    <!--     <div class="col-md-6 col-xs-12"> 
                        <div class="form-group">
                        <label for="Puntodecobranza" class="control-label col-md-4 col-sm-4 col-xs-12">Compañia</label>
                      <div class="col-md-8 col-sm-8 col-xs-12 form-group has-feedback">
                        <input type="text" class="form-control has-feedback-left equipotext" id="Puntodecobranza" list="lista1"  maxlength="100"  >
                         <datalist id="lista1"  required>
                          
                            <?php 
                            foreach ($carcamos[0]->company as $key => $value) { 
                             
                              ?>
                            <option data-cuenta="<?php echo $value->idtvar ?>" 
                              data-idcuenta="<?php echo $value->idtvar ?>" 
                              <?php echo $selected ?>
                            data-val="<?php echo $value->idtvar ?>" value="<?php echo $value->valor." (".$value->idtvar .")"?> ">
                            <?php }  ?>
                          </datalist>

                       
                        <span class="fa fa-list-alt form-control-feedback left" aria-hidden="true"></span>
                      </div>
                       </div> </div>-->
                       <?php 
                        
                       foreach ($data as $key=> $data2) {
                         # code...
                        ?>
                         <div class="clearfix"></div>
                            <div class="x_title">
                    <div class="clearfix"></div>
                          </div>
                          <div class="clearfix"></div>
                          <div class="col-md-6 col-xs-12"><div class="form-group">
                        <label for="dm_a_noempleado_<?php echo $data2->noEmpleado[0]?>" class="control-label col-md-4 col-sm-4 col-xs-12">NoEmpleado</label>
                      <div class="col-md-8 col-sm-8 col-xs-12 form-group has-feedback">
                        <input type="text"  disabled="disabled" class="form-control has-feedback-left equipotext2 disabled" id="dm_a_noempleado_<?php echo $data2->noEmpleado[0]?>" value="<?php echo $data2->noEmpleado[0]?>"  placeholder="NoEmpleado">
                        <span class="fa fa-list-alt form-control-feedback left" aria-hidden="true"></span>
                      </div>
                       </div></div>


                          <div class="col-md-6 col-xs-12"><div class="form-group">
                        <label for="dm_a_user_<?php echo $data2->noEmpleado[0]?>" class="control-label col-md-4 col-sm-4 col-xs-12">User</label>
                      <div class="col-md-8 col-sm-8 col-xs-12 form-group has-feedback">
                        <input type="text"  disabled="disabled" class="form-control has-feedback-left equipotext disabled" id="dm_a_user_<?php echo $data2->noEmpleado[0]?>" value="<?php echo $data2->Nombre[0]." ".$data2->apellido[0]?>"  placeholder="User">
                        <span class="fa fa-list-alt form-control-feedback left" aria-hidden="true"></span>
                      </div>
                       </div></div>
                 
                     <div class="col-md-6 col-xs-12"><div class="form-group">
                        <label for="dm_a_estatus_<?php echo $data2->noEmpleado[0]?>" class="control-label col-md-4 col-sm-4 col-xs-12">Estatus</label>
                      <div class="col-md-8 col-sm-8 col-xs-12 form-group has-feedback">
                        <input type="text" disabled="disabled"  class="form-control has-feedback-left equipotext disabled" id="dm_a_estatus_<?php echo $data2->noEmpleado[0]?>" value="<?php echo $data2->status[0]?>"    placeholder="Estatus">
                        <span class="fa fa-list-alt form-control-feedback left" aria-hidden="true"></span>
                      </div>
                       </div></div>
                         <div class="col-md-6 col-xs-12"><div class="form-group">
                        <label for="dm_a_zona_<?php echo $data2->noEmpleado[0]?>" class="control-label col-md-4 col-sm-4 col-xs-12">Zona</label>
                      <div class="col-md-8 col-sm-8 col-xs-12 form-group has-feedback">
                        <input type="text" disabled="disabled"  class="form-control has-feedback-left equipotext disabled" id="dm_a_zona_<?php echo $data2->noEmpleado[0]?>" value="<?php echo $data2->zona[0]?>"  placeholder="Zona">
                        <span class="fa fa-list-alt form-control-feedback left" aria-hidden="true"></span>
                      </div>
                       </div></div>
                     <div class="col-md-6 col-xs-12"><div class="form-group">
                        <label for="dm_a_area_<?php echo $data2->noEmpleado[0]?>" class="control-label col-md-4 col-sm-4 col-xs-12">Area</label>
                      <div class="col-md-8 col-sm-8 col-xs-12 form-group has-feedback">
                        <input type="text" disabled="disabled"  class="form-control has-feedback-left equipotext disabled" id="dm_a_area_<?php echo $data2->noEmpleado[0]?>" value="<?php echo $data2->area[0]?>"  placeholder="Area">
                        <span class="fa fa-list-alt form-control-feedback left" aria-hidden="true"></span>
                      </div>
                       </div></div>
                        <div class="col-md-6 col-xs-12"><div class="form-group">
                        <label for="dm_a_depa_<?php echo $data2->noEmpleado[0]?>" class="control-label col-md-4 col-sm-4 col-xs-12">Departamento</label>
                      <div class="col-md-8 col-sm-8 col-xs-12 form-group has-feedback">
                        <input type="text" disabled="disabled"  class="form-control has-feedback-left equipotext disabled" id="dm_a_depa_<?php echo $data2->noEmpleado[0]?>" value="<?php echo $data2->departamento[0]?>"  placeholder="Departamento">
                        <span class="fa fa-list-alt form-control-feedback left" aria-hidden="true"></span>
                      </div>
                       </div></div>

                         <?php 
                        
                       
                       } ?>
                  
                   <div class="clearfix"></div>
                            <div class="x_title">
                    <div class="clearfix"></div>
                          </div>
                          <div class="clearfix"></div>

                 

                       <div class="col-md-6 col-xs-12"> 
                        <div class="form-group">
                        <label for="dm_a_equiponuevo" class="control-label col-md-4 col-sm-4 col-xs-12">ID</label>
                      <div class="col-md-8 col-sm-8 col-xs-12 form-group has-feedback">
                        <input type="text" placeholder="N# ID" class="form-control has-feedback-left equipotext3" id="dm_a_equiponuevo" list="lista1nuevo"  maxlength="100"  >
                         <datalist id="lista1nuevo"  required>
                          
                            <?php 
                            foreach ($carcamos[0]->radioactivo as $key => $value) { 
                             
                              ?>
                            <option data-cuenta="<?php echo $value->IDMOVIL ?>" 
                              data-idcuenta="<?php echo $value->IDMOVIL ?>" 
                              <?php echo $selected ?>
                            data-val="<?php echo $value->IDMOVIL ?>" value="<?php echo $value->IDMOVIL?>">
                            <?php }  ?>
                          </datalist>

                       
                        <span class="fa fa-list-alt form-control-feedback left" aria-hidden="true"></span>
                      </div>
                       </div> </div> 

                             <div class="col-md-6 col-xs-12"> 
                          <div class="form-group">
                        <label for="dm_a_fechaentrega" class="control-label col-md-4 col-sm-4 col-xs-12">Fecha Entrega</label>
                      <div class="col-md-8 col-sm-8 col-xs-12 form-group has-feedback">
                        <input type="text" maxlength="30"   class="form-control has-feedback-left equipotext " id="dm_a_fechaentrega"  placeholder="Fecha Entrega">
                        <span class="fa fa-calendar form-control-feedback left" aria-hidden="true"></span>
                      </div>
                       </div>
                        </div>                                   
                    
                        <div class="col-md-6 col-xs-12"> <div class="form-group">
                        <label for="dm_a_ubicacion" class="control-label col-md-4 col-sm-4 col-xs-12">Ubicacion</label>
                      <div class="col-md-8 col-sm-8 col-xs-12 form-group has-feedback">
                        <input type="text"   class="form-control has-feedback-left equipotext " id="dm_a_ubicacion"   placeholder="Ubicacion">
                        <span class="fa fa-list-alt form-control-feedback left" aria-hidden="true"></span>
                      </div>
                       </div></div>

                    

                      <div class="col-md-6 col-xs-12">    
                                               <div class="form-group">
                        <label for="message2" class="control-label col-md-4 col-sm-4 col-xs-12">Observaciones (Opcional)</label>
                      <div class="col-md-8 col-sm-8 col-xs-12 form-group has-feedback">
                        <textarea class="form-control" id="message2" maxlength="300" rows="3" placeholder='Observaciones (Opcional)'></textarea>
                         
                      </div>
                       </div></div>
                                              <!-- bootstrap-daterangepicker -->
    <script src="assets/gentelella-master/vendors/moment/min/moment-with-locales.js"></script>
    <script src="assets/gentelella-master/vendors/bootstrap-daterangepicker/daterangepicker.js"></script>
    <!-- bootstrap-datetimepicker -->    
    <script src="assets/gentelella-master/vendors/bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js"></script>
<script src="assets/gentelella-master/vendors/mjolnic-bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js"></script>

 <script  type="text/javascript" >
   $(document).ready(function(v) {
                         $('#dm_a_plazoforzoso,#dm_a_fechaentrega').datetimepicker({ locale: 'es'});

                       });

                          </script>