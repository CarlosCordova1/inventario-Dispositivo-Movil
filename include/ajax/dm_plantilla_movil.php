                     <!--<div class="col-md-6 col-xs-12">  
                       <div class="form-group">
                        <label for="dm_m_sim" class="control-label col-md-4 col-sm-4 col-xs-12">SIM</label>
                      <div class="col-md-8 col-sm-8 col-xs-12 form-group has-feedback">
                        <input type="text"    class="form-control has-feedback-left equipotext " id="dm_m_sim" maxlength="30" placeholder="SIM">
                        <span class="fa fa-list-alt form-control-feedback left" aria-hidden="true"></span>
                      </div>
                       </div>
                     </div> -->
                       <div class="col-md-6 col-xs-12"> 
                          <div class="form-group">
                        <label for="dm_m_serie" class="control-label col-md-4 col-sm-4 col-xs-12">Serie</label>
                      <div class="col-md-8 col-sm-8 col-xs-12 form-group has-feedback">
                        <input type="text" maxlength="30"   class="form-control has-feedback-left equipotext " id="dm_m_serie"  placeholder="Serie">
                        <span class="fa fa-list-alt form-control-feedback left" aria-hidden="true"></span>
                      </div>
                       </div>
                        </div> 


                   
                          <div class="col-md-6 col-xs-12"> 
                         
                        <div class="form-group">
                        <label for="dm_m_imei" class="control-label col-md-4 col-sm-4 col-xs-12">IMEI</label>
                      <div class="col-md-8 col-sm-8 col-xs-12 form-group has-feedback">
                        <input type="text"   class="form-control has-feedback-left equipotext " maxlength="30" id="dm_m_imei"  placeholder="IMEI">
                        <span class="fa fa-list-alt form-control-feedback left" aria-hidden="true"></span>
                      </div>
                       </div>
                        </div>
                  
                        <!--<div class="col-md-6 col-xs-12"> 
                          <div class="form-group">
                        <label for="dm_m_tel" class="control-label col-md-4 col-sm-4 col-xs-12">Telefono</label>
                      <div class="col-md-8 col-sm-8 col-xs-12 form-group has-feedback">
                        <input type="text"   class="form-control has-feedback-left equipotext " id="dm_m_tel" maxlength="30" placeholder="Telefono">
                        <span class="fa fa-list-alt form-control-feedback left" aria-hidden="true"></span>
                      </div>
                       </div>
                        </div>-->
                       <!--  <div class="col-md-6 col-xs-12"> 
                         <div class="form-group">
                        <label for="dm_m_idcompleto" class="control-label col-md-4 col-sm-4 col-xs-12">ID completo</label>
                      <div class="col-md-8 col-sm-8 col-xs-12 form-group has-feedback">
                        <input type="text"   class="form-control has-feedback-left equipotext " id="dm_m_idcompleto" maxlength="30" placeholder="ID completo">
                        <span class="fa fa-list-alt form-control-feedback left" aria-hidden="true"></span>
                      </div>
                       </div>
                         </div>-->

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

                       <div class="col-md-6 col-xs-12">
          <div class="form-group">
                        <label for="dm_m_company" class="control-label col-md-4 col-sm-4 col-xs-12">Compañia</label>
                      <div class="col-md-8 col-sm-8 col-xs-12 form-group has-feedback">
                         <select id="dm_m_company"   class="form-control has-feedback-left equipotext " required>
                          <option data-cuenta="0"   value="0">--</option>
                            <?php 
                            foreach ($carcamos[0]->company as $key => $value) { 
                                  ?>
                             <option data-cuenta="<?php echo $value->idtvar?>" 
                               
                            value="<?php echo $value->idtvar ?>"><?php echo $value->valor ?>
                             
                            </option>
                            <?php }  ?>
                          </select>

                       
                        <span class="fa fa-list-alt form-control-feedback left" aria-hidden="true"></span>
                      </div>
                       </div>

</div>

                    <div class="col-md-6 col-xs-12">
          <div class="form-group">
                        <label for="dm_m_status" class="control-label col-md-4 col-sm-4 col-xs-12">Estatus</label>
                      <div class="col-md-8 col-sm-8 col-xs-12 form-group has-feedback">
                         <select id="dm_m_status"   class="form-control has-feedback-left equipotext " required>
                          <option data-cuenta="0"   value="0">--</option>
                            <?php 
                            foreach ($carcamos[0]->estatus as $key => $value) { 
                                  ?>
                             <option data-cuenta="<?php echo $value->idtvar?>" 
                               
                            value="<?php echo $value->idtvar ?>"><?php echo $value->valor ?>
                             
                            </option>
                            <?php }  ?>
                          </select>

                       
                        <span class="fa fa-list-alt form-control-feedback left" aria-hidden="true"></span>
                      </div>
                       </div>

</div>




                     <div class="col-md-6 col-xs-12">  <div class="form-group">
                        <label for="dm_m_depa" class="control-label col-md-4 col-sm-4 col-xs-12">Departamento</label>
                      <div class="col-md-8 col-sm-8 col-xs-12 form-group has-feedback">
                        <input type="text"   class="form-control has-feedback-left equipotext " id="dm_m_depa" maxlength="30" placeholder="Departamento">
                        <span class="fa fa-list-alt form-control-feedback left" aria-hidden="true"></span>
                      </div>
                       </div> </div>
                        <div class="col-md-6 col-xs-12">  <div class="form-group">
                        <label for="dm_m_centroc" class="control-label col-md-4 col-sm-4 col-xs-12">Centro de Costo</label>
                      <div class="col-md-8 col-sm-8 col-xs-12 form-group has-feedback">
                        <input type="text"   class="form-control has-feedback-left equipotext " id="dm_m_centroc" maxlength="30" placeholder="Centro de Costo">
                        <span class="fa fa-list-alt form-control-feedback left" aria-hidden="true"></span>
                      </div>
                       </div> </div>
                             <div class="col-md-6 col-xs-12"> <div class="form-group">
                        <label for="dm_m_modelo" class="control-label col-md-4 col-sm-4 col-xs-12">Modelo</label>
                      <div class="col-md-8 col-sm-8 col-xs-12 form-group has-feedback">
                        <input type="text"   class="form-control has-feedback-left equipotext " id="dm_m_modelo" maxlength="30"  placeholder="Modelo">
                        <span class="fa fa-list-alt form-control-feedback left" aria-hidden="true"></span>
                      </div>
                       </div></div>
                          <div class="col-md-6 col-xs-12"><div class="form-group">
                        <label for="dm_m_color" class="control-label col-md-4 col-sm-4 col-xs-12">Color</label>
                      <div class="col-md-8 col-sm-8 col-xs-12 form-group has-feedback">
                        <input type="text"   class="form-control has-feedback-left equipotext " id="dm_m_color" maxlength="30" placeholder="Color">
                        <span class="fa fa-list-alt form-control-feedback left" aria-hidden="true"></span>
                      </div>
                       </div></div>
                          <div class="col-md-6 col-xs-12"><div class="form-group">
                        <label for="dm_m_funda" class="control-label col-md-4 col-sm-4 col-xs-12">Funda</label>
                      <div class="col-md-8 col-sm-8 col-xs-12 form-group has-feedback">
                        <input type="text"   class="form-control has-feedback-left equipotext " id="dm_m_funda" maxlength="30"  placeholder="Funda">
                        <span class="fa fa-list-alt form-control-feedback left" aria-hidden="true"></span>
                      </div>
                       </div></div>
                          <div class="col-md-6 col-xs-12"><div class="form-group">
                        <label for="dm_m_mica" class="control-label col-md-4 col-sm-4 col-xs-12">Mica</label>
                      <div class="col-md-8 col-sm-8 col-xs-12 form-group has-feedback">
                        <input type="text"   class="form-control has-feedback-left equipotext " id="dm_m_mica" maxlength="30"  placeholder="Mica">
                        <span class="fa fa-list-alt form-control-feedback left" aria-hidden="true"></span>
                      </div>
                       </div></div>
                          <div class="col-md-6 col-xs-12"><div class="form-group">
                        <label for="dm_m_cargador" class="control-label col-md-4 col-sm-4 col-xs-12">Cargador</label>
                      <div class="col-md-8 col-sm-8 col-xs-12 form-group has-feedback">
                        <input type="text"   class="form-control has-feedback-left equipotext " id="dm_m_cargador" maxlength="30" placeholder="Cargador">
                        <span class="fa fa-list-alt form-control-feedback left" aria-hidden="true"></span>
                      </div>
                       </div></div>

                         <div class="col-md-6 col-xs-12"> 
                          <div class="form-group">
                        <label for="dm_m_fecharef" class="control-label col-md-4 col-sm-4 col-xs-12">Fecha Recepcion</label>
                      <div class="col-md-8 col-sm-8 col-xs-12 form-group has-feedback">
                        <input type="text" maxlength="30"   class="form-control has-feedback-left equipotext " id="dm_m_fecharef"  placeholder="Fecha Recepcion">
                        <span class="fa fa-calendar form-control-feedback left" aria-hidden="true"></span>
                      </div>
                       </div>
                        </div> 
                         <div class="col-md-6 col-xs-12"> 
                          <div class="form-group">
                        <label for="dm_m_plazoforzoso" class="control-label col-md-4 col-sm-4 col-xs-12">Plazo Forzoso</label>
                      <div class="col-md-8 col-sm-8 col-xs-12 form-group has-feedback">
                        <input type="text" maxlength="30"   class="form-control has-feedback-left equipotext " id="dm_m_plazoforzoso"  placeholder="Plazo Forzoso">
                        <span class="fa fa-calendar form-control-feedback left" aria-hidden="true"></span>
                      </div>
                       </div>
                        </div>


                                  <div class="col-md-6 col-xs-12">    
                                               <div class="form-group">
                        <label for="message" class="control-label col-md-4 col-sm-4 col-xs-12">Observaciones (Opcional)</label>
                      <div class="col-md-8 col-sm-8 col-xs-12 form-group has-feedback">
                        <textarea class="form-control" id="message" maxlength="300" rows="3" placeholder='Observaciones (Opcional)'></textarea>
                         
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
                         $('#dm_m_fecharef,#dm_m_plazoforzoso').datetimepicker({ locale: 'es'});

                       });

                          </script>