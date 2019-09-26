<?php 
if($data1){
  date_default_timezone_set('America/Cancun');
      ?>   


<div class="container">
  <ul class="nav nav-tabs">
     <!-- <li class="active"><a data-toggle="tab" href="#listado">Listado</a></li>-->
    <li class="active" ><a data-toggle="tab" href="#nuevocsv">Agregar Movil</a></li>
    <li ><a data-toggle="tab" href="#dm_Asignar">Asignar</a></li>
  
  </ul>

  <div class="tab-content">

    <!--  <div id="listado" class="tab-pane fade in active"> 
 
 <div class="panel panel-default">
    <div class="panel-heading"></div>
    <div class="panel-body">
  <ul class="nav nav-tabs">
      <li class="active"><a data-toggle="tab" href="#listado4">Movil</a></li>
    <li ><a data-toggle="tab" href="#listado3">Asignado</a></li> 
  </ul>
   <div class="container">
   
  
      <div class="tab-content">
      
   <div id="listado4" class="tab-pane in active">listado2 listado2listado2listado2listado2 listado2</div>
    <div id="listado3" class="tab-pane fade">listado2 sda sd as d asd asdasd asdasdasd listado2</div>
</div>
</div>
</div>
</div>

      </div> -->

    <div id="nuevocsv" class="tab-pane  in active">
      <h3></h3>
    
 <div class="row">
    <div class="col-md-2 col-xs-12">  </div>       
 <div class="col-md-8 col-xs-12"> 
  <div class="container">
   
  <div class="panel panel-default">
    <div class="panel-heading">Movil</div>
    <div class="panel-body">
         <form class="form-horizontal form-label-left input_mask">
<!-- <div class="col-md-6 col-sm-6 col-xs-12">
                   <div class="form-group">
                        <label for="Puntodecobranza23" class="control-label col-md-4 col-sm-4 col-xs-12">Tipo</label>
                      <div class="col-md-8 col-sm-8 col-xs-12 form-group has-feedback">
                         <input type="text" class="form-control has-feedback-left" id="Puntodecobranza23" list="lista23"  maxlength="30"  >
                         <datalist id="lista23"   required>
                       
                            <?php 
                            foreach ($carcamos[0]->tipomovil as $key => $value) { 
                             
                              ?>
                            <option data-cuenta="<?php echo $value->idtvar ?>" 
                              data-idcuenta="<?php echo $value->idtvar ?>" 
                              <?php echo $selected ?>
                            data-val="<?php echo $value->idtvar ?>" value="<?php echo $value->valor." (".$value->idtvar .")"?>">
                            <?php }  ?>
                          </datalist>

                       
                        <span class="fa fa-list-alt form-control-feedback left" aria-hidden="true"></span>
                      </div>
                </div>
</div>-->

<div class="col-md-6 col-sm-6 col-xs-12">
 <div class="form-group">
                        <label for="dm_m_tipo" class="control-label col-md-4 col-sm-4 col-xs-12">Tipo</label>
                      <div class="col-md-8 col-sm-8 col-xs-12 form-group has-feedback">
                         <select id="dm_m_tipo"   class="form-control has-feedback-left " required>
                          <option data-cuenta="0"   value="0">--</option>
                            <?php 
                           foreach ($carcamos[0]->tipomovil as $key => $value) { 
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



 <div class="col-md-6 col-sm-6 col-xs-12"></div> 

                    
 <div class="imprimeVariables"></div>
                      
                         
                       

                            <div class="x_panel">
                 <!-- <div class="x_title">
                    <div class="clearfix"></div>

                  </div>-->
                  <div class="x_content">
                   <form class="form-horizontal form-label-left input_mask">
                         

                      <!--<div class="ln_solid"></div>-->
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
                 </form>
    </div>
  </div>
</div>
 </div>
    <div class="col-md-2 col-xs-12">  </div>  


                </div> <!-- end row -->

    </div> <!--end nuevo menu-->

     <div id="dm_Asignar" class="tab-pane fade">
      <h3></h3>
    
 <div class="row">
<div class="col-md-2 col-xs-12">  </div>       
 <div class="col-md-8 col-xs-12"> 
     <div class="container">
  
  <div class="panel panel-default">
    <div class="panel-heading">Usuario</div>
    <div class="panel-body">
        <form class="form-horizontal form-label-left input_mask">
          

  <!--              <div class="col-md-6 col-sm-6 col-xs-12">
 <div class="form-group">
                        <label for="dm_empleado" class="control-label col-md-4 col-sm-4 col-xs-12">N empleado</label>
                      <div class="col-md-8 col-sm-8 col-xs-12 form-group has-feedback">
                         <select id="dm_empleado"   class="form-control has-feedback-left " required>
                          <option data-cuenta="0"   value="0">--</option>
                            <?php 
                           foreach ($empleado->cancunActivo as $key => $value) { 

                                  ?>
                             <option data-cuenta="<?php echo $value->noEmpleado[0]?>" 
                               
                            value="<?php echo $value->noEmpleado[0] ?>"><?php  echo $value->noEmpleado[0];?>
                             
                            </option>
                            <?php }  ?>
                          </select>

                       
                        <span class="fa fa-list-alt form-control-feedback left" aria-hidden="true"></span>
                      </div>
                       </div>

</div>-->

<div class="col-md-4 col-sm-4 col-xs-12">
 <div class="form-group">
                        <label for="dm_m_tipo2" class="control-label col-md-4 col-sm-4 col-xs-12">Tipo</label>
                      <div class="col-md-8 col-sm-8 col-xs-12 form-group has-feedback">
                         <select id="dm_m_tipo2"   class="form-control has-feedback-left " required>
                          <option data-cuenta="0"   value="0">--</option>
                            <?php 
                           foreach ($carcamos[0]->tipomovil as $key => $value) { 
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


 
                    <div class="col-md-6 col-sm-6 col-xs-12">
                   <div class="form-group">
                        <label for="dm_empleado" class="control-label col-md-4 col-sm-4 col-xs-12">N Empleado</label>
                      <div class="col-md-8 col-sm-8 col-xs-12 form-group has-feedback">
                         <input type="text" class="form-control has-feedback-left" id="dm_empleado"   maxlength="30"  >
                       <?php /*?>
                         <datalist id="lista23"   required>
                       
                            <?php 
                            foreach ($empleado->cancunActivo as $key => $value) { 
                             
                              ?>
                            <option data-cuenta="<?php echo $value->noEmpleado[0] ?>" 
                              data-idcuenta="<?php echo $value->noEmpleado[0] ?>" 
                              <?php echo $selected ?>
                            data-val="<?php echo $value->noEmpleado[0]?>" value="<?php echo $value->noEmpleado[0]?>">
                            <?php } 
                             ?>

                             <?php 
                            foreach ($empleado->cancunActivo as $key => $value) { 
                             
                              ?>
                            <option data-cuenta="<?php echo $value->noEmpleado[0] ?>" 
                              data-idcuenta="<?php echo $value->noEmpleado[0] ?>" 
                              <?php echo $selected ?>
                            data-val="<?php echo $value->noEmpleado[0]?>" value="<?php echo $value->noEmpleado[0]?>">
                            <?php } 
                             ?>

                             <?php 
                            foreach ($empleado->playaActivo as $key => $value) { 
                             
                              ?>
                            <option data-cuenta="<?php echo $value->noEmpleado[0] ?>" 
                              data-idcuenta="<?php echo $value->noEmpleado[0] ?>" 
                              <?php echo $selected ?>
                            data-val="<?php echo $value->noEmpleado[0]?>" value="<?php echo $value->noEmpleado[0]?>">
                            <?php } 
                             ?>

                             <?php 
                            foreach ($empleado->playaInactivo as $key => $value) { 
                             
                              ?>
                            <option data-cuenta="<?php echo $value->noEmpleado[0] ?>" 
                              data-idcuenta="<?php echo $value->noEmpleado[0] ?>" 
                              <?php echo $selected ?>
                            data-val="<?php echo $value->noEmpleado[0]?>" value="<?php echo $value->noEmpleado[0]?>">
                            <?php } 
                             ?>




                          </datalist>
                          <?php */?>

                       
                        <span class="fa fa-list-alt form-control-feedback left" aria-hidden="true"></span>
                      </div>
                </div>
</div>


                      <div class="col-md-2 col-sm-2 col-xs-12">
                          <!--<button type="button" class="btn btn-primary">Cancel</button>-->
             
                          <button type="button"  class="btn btn-success BuscarCarcamo22">Buscar
                          <span class="fa fa-search"></span>
                          </button>
                        </div>




                  
        </form>
                   <div class="x_panel">
                <!--  <div class="x_title">
                    <div class="clearfix"></div>

                  </div>-->
                  <div class="x_content">
                   <form class="form-horizontal form-label-left input_mask">
                         <div class="imprimeVariables2"></div>

                    <!--  <div class="ln_solid"></div>-->
                      <div class="form-group">
                        <div class="col-md-8 col-sm-8 col-xs-12"></div>
                        <div class="col-md-4 col-sm-4 col-xs-12">
                          <!--<button type="button" class="btn btn-primary">Cancel</button>-->
               <button class="btn btn-primary" id="resetNuevo" type="reset">Reset  <span class="fa fa-refresh"></span></button>
                          <button type="button"  class="btn btn-success guardarNuevoBitacora2">Guardar
                          <span class="fa fa-floppy-o"></span>
                          </button>
                        </div>
                      </div>

                    </form>
                  </div>
                </div>
    </div>
  </div>
</div>
</div>
<div class="col-md-2 col-xs-12">  </div>       


 </div> <!-- end row -->
  </div><!-- end tab container-->
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


/*
 $("#Puntodecobranza23").change(function(index, el) {
var val2 = $('#Puntodecobranza23').val();
    var idcuenta2 = $('#lista23 option').filter(function() {
        return this.value == val2;
    }).data('idcuenta');

   //var carcamo= $(this).val();
   var carcamo= idcuenta2;
   console.log(carcamo);
    //console.log($( "#Puntobanco option:selected" ).data("cuenta"));
    buscarCarcamo(carcamo);
  });
 */
 $("#dm_m_tipo").change(function(index, el) {

//var val2 = $('#CJ_Puntobanco').val();
    //var idcuenta2 = $('#lista23 option').filter(function() {
      //  return this.value == val2;
    //}).data('idcuenta');

   var carcamo= $(this).val();


   //var carcamo= idcuenta2;
   console.log(carcamo);
    //console.log($( "#Puntobanco option:selected" ).data("cuenta"));
    buscarCarcamo(carcamo);
  });

 $(".BuscarCarcamo22").click(function(event) {
  var carcamo= $("#dm_empleado").val();

   var tipo=$("#dm_m_tipo2").val();
   //var carcamo= idcuenta2;
   console.log(carcamo);
    //console.log($( "#Puntobanco option:selected" ).data("cuenta"));
    if (carcamo!="" && tipo!="0") {
 
   //var carcamo= idcuenta2;
   console.log(carcamo);
    //console.log($( "#Puntobanco option:selected" ).data("cuenta"));
    buscarCarcamo2(carcamo,tipo);
 } 
 });

 
  $("#dm_m_tipo2").change(function(index, el) {
//var val2 = $('#dm_empleado').val();
   //  var idcuenta2 = $('#lista23 option').filter(function() {
   //      return this.value == val2;
   //  }).data('idcuenta');
 var tipo=$("#dm_m_tipo2").val();
   var carcamo= $("#dm_empleado").val();
  // var carcamo= idcuenta2;
   console.log(carcamo);
    //console.log($( "#Puntobanco option:selected" ).data("cuenta"));
    if (carcamo!="") {
  buscarCarcamo2(carcamo,tipo);
}
   // return false; 

  });
   
 $("#dm_empleado").on('keypress',function(e) {
    if(e.which == 13) {
       var carcamo= $("#dm_empleado").val();

   var tipo=$("#dm_m_tipo2").val();
 if (carcamo!="" && tipo!="0") {
 
   //var carcamo= idcuenta2;
   console.log(carcamo);
    //console.log($( "#Puntobanco option:selected" ).data("cuenta"));
    buscarCarcamo2(carcamo,tipo);
 } 
 return false; 
    }

});
 
   });// end document.ready

 //--------------------------------------------------------------------

function buscarCarcamo2 (dato,tipo){
  //console.log(datos);
 $.ajax({
      url : AjaxURL(),
    data : { action : "buscarCarcamo2",
    carcamo:dato,tipo:tipo
  },
     type : 'POST',
    dataType : 'HTML',
    beforeSend : function(xhr, status) {
    $(".imprimeVariables2").html(gifLoad());
  // $('#myModalloadIntegrando').modal('show');
      
    },
    success : function(json) {
    $(".imprimeVariables2").html(json);
 
 
    },
 

    error : function(xhr, status) {
       alert('Disculpe, existió un problema al buscar empleado');
       $(".imprimeVariables2").html('');
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