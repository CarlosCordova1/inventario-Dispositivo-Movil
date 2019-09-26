<?php 
if($data1){
  date_default_timezone_set('America/Cancun');
      ?>   


<div class="container">
  <ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="#nuevocsv">Agregar Registros</a></li>
    <!--<li><a data-toggle="tab" href="#nuevoarchivo">Nuevo Archivo</a></li>-->
  </ul>

  <div class="tab-content">
    <div id="nuevocsv" class="tab-pane fade in active">
      <h3></h3>
    
 <div class="row">
              <div class="col-md-2 col-xs-2"> </div>
              
              <div class="col-md-8 col-xs-12">            
            <div class="x_panel">
                  <div class="x_title">
                    <div class="clearfix"></div>

                  </div>
                  <div class="x_content">
                   <form class="form-horizontal form-label-left input_mask">

                       <div class="form-group">
                        <label for="turno" class="control-label col-md-4 col-sm-4 col-xs-12">Turno</label>
                      <div class="col-md-8 col-sm-8 col-xs-12 form-group has-feedback">
                         <select id="turno" class="form-control has-feedback-left" required>
                          <?php 
                              if ($vturno==1) {
                               echo '<option     value="1">Primero</option>';
                              }
                               if ($vturno==2) {
                               echo '<option     value="2">Segundo</option>';
                              }
                               if ($vturno==3) {
                               echo '<option     value="3">Tercero</option>';
                              }
                          ?>                                           
                          </select>

                       
                        <span class="fa fa-list-alt form-control-feedback left" aria-hidden="true"></span>
                      </div>
                       </div>




                        <div class="form-group">
                        <label for="Puntodecobranza" class="control-label col-md-4 col-sm-4 col-xs-12">Carcamo</label>
                      <div class="col-md-8 col-sm-8 col-xs-12 form-group has-feedback">
                        <input type="text" class="form-control has-feedback-left" id="Puntodecobranza" list="lista1"  maxlength="100"  >
                         <datalist id="lista1"  required>
                          <!--<option data-cuenta="0"   value="0">-->
                            <?php 
                            foreach ($carcamos as $key => $value) { 
                             
                              ?>
                            <option data-cuenta="<?php echo $value->CTACONT ?>" 
                              data-idcuenta="<?php echo $value->ID ?>" 
                              <?php echo $selected ?>
                            data-val="<?php echo $value->ID ?>" value="<?php echo $value->NOMBRE." (".$value->DESCRIPCION .")"?> ">
                            <?php }  ?>
                          </datalist>

                       
                        <span class="fa fa-list-alt form-control-feedback left" aria-hidden="true"></span>
                      </div>
                       </div>

                            <div class="form-group">
                        <label for="Puntodecobranza2" class="control-label col-md-4 col-sm-4 col-xs-12">Operador Carcamo</label>
                      <div class="col-md-8 col-sm-8 col-xs-12 form-group has-feedback">
                         <input type="text" class="form-control has-feedback-left" id="Puntodecobranza2" list="lista2"  maxlength="100"  >
                         <datalist id="lista2"   required>
                          <!--<option data-cuenta="0"   value="0">--</option>-->
                            <?php 
                            foreach ($operador as $key => $value) { 
                             
                              ?>
                            <option data-cuenta="<?php echo $value->CTACONT ?>" 
                              data-idcuenta="<?php echo $value->idOper ?>" 
                              <?php echo $selected ?>
                            data-val="<?php echo $value->idOper ?>" value="<?php echo $value->operador." (".$value->rol .")"?>">
                            <?php }  ?>
                          </datalist>

                       
                        <span class="fa fa-list-alt form-control-feedback left" aria-hidden="true"></span>
                      </div>
                       </div>

                          <div class="imprimeVariables"></div>
                                                <div class="form-group">
                        <label for="message" class="control-label col-md-4 col-sm-4 col-xs-12">Observaciones (Opcional)</label>
                      <div class="col-md-8 col-sm-8 col-xs-12 form-group has-feedback">
                        <textarea class="form-control" id="message" maxlength="2000" rows="3" placeholder='Observaciones (Opcional)'></textarea>
                         
                      </div>
                       </div>

                        
                     


                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-8 col-sm-8 col-xs-12"></div>
                        <div class="col-md-4 col-sm-4 col-xs-12">
                          <!--<button type="button" class="btn btn-primary">Cancel</button>-->
               <button class="btn btn-primary" id="resetNuevo" type="reset">Reset  <span class="fa fa-refresh"></span></button>
                          <button type="button"  class="btn btn-success guardarNuevoBitacora">Guardar
                          <span class="fa fa-floppy-o"></span>
                          </button>
                        </div>
                      </div>

                    </form>
                  </div>
                </div>
                </div>
                <div class="col-md-2 col-xs-2"> </div>
                </div>

    </div> <!--end nuevo menu-->

    
  </div>
</div>


 <!-- bootstrap-daterangepicker -->

    <link href="assets/gentelella-master/vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
    <!-- bootstrap-datetimepicker -->
    <link href="assets/gentelella-master/vendors/bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.css" rel="stylesheet">
    <!-- Ion.RangeSlider -->


<?php /*/ ?>
 <!-- jQuery -->
    <script src="assets/gentelella-master/vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="assets/gentelella-master/vendors/bootstrap/dist/js/bootstrap.min.js"></script>

 <script src="assets/gentelella-master/vendors/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="assets/gentelella-master/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script src="assets/gentelella-master/vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="assets/gentelella-master/vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
    <script src="assets/gentelella-master/vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script src="assets/gentelella-master/vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="assets/gentelella-master/vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="assets/gentelella-master/vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
    <script src="assets/gentelella-master/vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
    <script src="assets/gentelella-master/vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="assets/gentelella-master/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
    <script src="assets/gentelella-master/vendors/datatables.net-scroller/js/dataTables.scroller.min.js"></script>

 <script src="assets/gentelella-master/vendors/jszip/dist/jszip.min.js"></script>
    <script src="assets/gentelella-master/vendors/pdfmake/build/pdfmake.min.js"></script>
    <script src="assets/gentelella-master/vendors/pdfmake/build/vfs_fonts.js"></script>
<?php /*/ ?>

<!-- bootstrap-daterangepicker -->
    <script src="assets/gentelella-master/vendors/moment/min/moment-with-locales.js"></script>
    <script src="assets/gentelella-master/vendors/bootstrap-daterangepicker/daterangepicker.js"></script>
    <!-- bootstrap-datetimepicker -->    
    <script src="assets/gentelella-master/vendors/bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js"></script>
<script src="assets/gentelella-master/vendors/mjolnic-bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js"></script>

<!--<script src="js/numeric.js"></script>-->
<script type="text/javascript" src="assets/Inputmask-4.x/dist/jquery.inputmask.bundle.js" charset="utf-8"></script>
<script src="assets/gentelella-master/build/js/custom.js"></script>

<style type="text/css">
  #montodeldeposito{ text-align: left !important; }
</style>

 <script  type="text/javascript" >
   $(document).ready(function(v) {

 $("#Puntodecobranza").change(function(index, el) {
var val2 = $('#Puntodecobranza').val();
    var idcuenta2 = $('#lista1 option').filter(function() {
        return this.value == val2;
    }).data('idcuenta');

   //var carcamo= $(this).val();
   var carcamo= idcuenta2;
   console.log(carcamo);
    //console.log($( "#Puntobanco option:selected" ).data("cuenta"));
    buscarCarcamo(carcamo);
  });

 
   });// end document.ready

 
//--------------------------------------------------------------------

function buscarCarcamo (datos){
  //console.log(datos);
 $.ajax({
      url : AjaxURL(),
    data : { action : "buscarCarcamo",
    carcamo:datos
  },
     type : 'POST',
    dataType : 'HTML',
    beforeSend : function(xhr, status) {
    $(".imprimeVariables").html(gifLoad());
  // $('#myModalloadIntegrando').modal('show');
      
    },
    success : function(json) {
    $(".imprimeVariables").html(json);
 
 
    },
 

    error : function(xhr, status) {
       alert('Disculpe, existió un problema al buscar Carcamo');
       $(".imprimeVariables").html('');
       //$("#testuno").html('');
    // console.log(status);
    // $('#myModalloadIntegrando').modal('hide');
    },
 
    complete : function(xhr, status) {
      //  $('#myModalloadIntegrando').modal('hide');
    }
});

}
//--------------------------------------------------------------------

 

 </script>
<?php 
}
else{
  echo "Acceso no permitido...";
}
?>  