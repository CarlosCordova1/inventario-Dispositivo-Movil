                  
                          <div class="col-md-6 col-xs-12"> 
                         
                        <div class="form-group">
                        <label for="dm_r_id" class="control-label col-md-4 col-sm-4 col-xs-12">ID</label>
                      <div class="col-md-8 col-sm-8 col-xs-12 form-group has-feedback">
                        <input type="text"   class="form-control has-feedback-left equipotext " id="dm_r_id" maxlength="30"  placeholder="ID">
                        <span class="fa fa-list-alt form-control-feedback left" aria-hidden="true"></span>
                      </div>
                       </div>
                        </div>
                       <div class="col-md-6 col-xs-12"> 
                          <div class="form-group">
                        <label for="dm_r_serie" class="control-label col-md-4 col-sm-4 col-xs-12">Serie</label>
                      <div class="col-md-8 col-sm-8 col-xs-12 form-group has-feedback">
                        <input type="text"    class="form-control has-feedback-left equipotext " id="dm_r_serie" maxlength="30" placeholder="Serie">
                        <span class="fa fa-list-alt form-control-feedback left" aria-hidden="true"></span>
                      </div>
                       </div>
                        </div> 
 
                          <div class="col-md-6 col-xs-12"> <div class="form-group">
                        <label for="dm_r_marca" class="control-label col-md-4 col-sm-4 col-xs-12">Marca</label>
                      <div class="col-md-8 col-sm-8 col-xs-12 form-group has-feedback">
                        <input type="text"   class="form-control has-feedback-left equipotext " id="dm_r_marca" maxlength="30" placeholder="Marca">
                        <span class="fa fa-list-alt form-control-feedback left" aria-hidden="true"></span>
                      </div>
                       </div></div>
                             <div class="col-md-6 col-xs-12"> <div class="form-group">
                        <label for="dm_r_modelo" class="control-label col-md-4 col-sm-4 col-xs-12">Modelo</label>
                      <div class="col-md-8 col-sm-8 col-xs-12 form-group has-feedback">
                        <input type="text"   class="form-control has-feedback-left equipotext " id="dm_r_modelo" maxlength="30" placeholder="Modelo">
                        <span class="fa fa-list-alt form-control-feedback left" aria-hidden="true"></span>
                      </div>
                       </div></div>
                                       <div class="col-md-6 col-xs-12">
          <div class="form-group">
                        <label for="dm_r_status" class="control-label col-md-4 col-sm-4 col-xs-12">Estatus</label>
                      <div class="col-md-8 col-sm-8 col-xs-12 form-group has-feedback">
                         <select id="dm_r_status"   class="form-control has-feedback-left equipotext " required>
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
                            <div class="col-md-6 col-xs-12"> 
                          <div class="form-group">
                        <label for="dm_r_fecharef" class="control-label col-md-4 col-sm-4 col-xs-12">Fecha Recepcion</label>
                      <div class="col-md-8 col-sm-8 col-xs-12 form-group has-feedback">
                        <input type="text" maxlength="30"   class="form-control has-feedback-left equipotext " id="dm_r_fecharef"  placeholder="Fecha Recepcion">
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
                         $('#dm_r_fecharef').datetimepicker({ locale: 'es'});

                       });

                          </script>