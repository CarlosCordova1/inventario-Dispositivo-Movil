                     <div class="col-md-6 col-xs-12">  
                       <div class="form-group">
                        <label for="dm_m_sim" class="control-label col-md-4 col-sm-4 col-xs-12">SIM</label>
                      <div class="col-md-8 col-sm-8 col-xs-12 form-group has-feedback">
                        <input type="text"    class="form-control has-feedback-left equipotext " id="dm_m_sim" maxlength="30" placeholder="SIM">
                        <span class="fa fa-list-alt form-control-feedback left" aria-hidden="true"></span>
                      </div>
                       </div>
                     </div> 
                   
                    <div class="col-md-6 col-xs-12"> 
                          <div class="form-group">
                        <label for="dm_m_tel" class="control-label col-md-4 col-sm-4 col-xs-12">Telefono</label>
                      <div class="col-md-8 col-sm-8 col-xs-12 form-group has-feedback">
                        <input type="text"   class="form-control has-feedback-left equipotext " id="dm_m_tel" maxlength="30" placeholder="Telefono">
                        <span class="fa fa-list-alt form-control-feedback left" aria-hidden="true"></span>
                      </div>
                       </div>
                        </div>
                            <div class="col-md-6 col-xs-12"> 
                         <div class="form-group">
                        <label for="dm_m_idcompleto" class="control-label col-md-4 col-sm-4 col-xs-12">ID completo</label>
                      <div class="col-md-8 col-sm-8 col-xs-12 form-group has-feedback">
                        <input type="text"   class="form-control has-feedback-left equipotext " id="dm_m_idcompleto" maxlength="30" placeholder="ID completo">
                        <span class="fa fa-list-alt form-control-feedback left" aria-hidden="true"></span>
                      </div>
                       </div>
                         </div>
                               <div class="col-md-6 col-xs-12"> 
                         <div class="form-group">
                        <label for="dm_m_marcarapida" class="control-label col-md-4 col-sm-4 col-xs-12">Marcacion Rapida</label>
                      <div class="col-md-8 col-sm-8 col-xs-12 form-group has-feedback">
                        <input type="text"   class="form-control has-feedback-left equipotext " id="dm_m_marcarapida" maxlength="30" placeholder="Marcacion Rapida">
                        <span class="fa fa-list-alt form-control-feedback left" aria-hidden="true"></span>
                      </div>
                       </div>
                         </div>

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
                        <label for="dm_s_status" class="control-label col-md-4 col-sm-4 col-xs-12">Estatus</label>
                      <div class="col-md-8 col-sm-8 col-xs-12 form-group has-feedback">
                         <select id="dm_s_status"   class="form-control has-feedback-left equipotext " required>
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



                       
                      </div>
                       </div></div>


  <div class="col-md-6 col-xs-12"> 
                          <div class="form-group">
                        <label for="dm_s_fecharef" class="control-label col-md-4 col-sm-4 col-xs-12">Fecha Recepcion</label>
                      <div class="col-md-8 col-sm-8 col-xs-12 form-group has-feedback">
                        <input type="text" maxlength="30"   class="form-control has-feedback-left equipotext " id="dm_s_fecharef"  placeholder="Fecha Recepcion">
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
                         $('#dm_s_fecharef').datetimepicker({ locale: 'es'});

                       });

                          </script>