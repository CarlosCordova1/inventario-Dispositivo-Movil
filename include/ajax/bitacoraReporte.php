<?php 
if($data1){
  date_default_timezone_set('America/Cancun');
      ?>   


<div class="container">
  <ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="#nuevo">Reporte</a></li>
    <!--<li><a data-toggle="tab" href="#menueditar">Nuevo Deposito Externo</a></li>-->
  </ul>

  <div class="tab-content">
    <div id="nuevo" class="tab-pane fade in active">
      <h3></h3>
       <div class="row">
             
              
              <div class="col-md-12 col-xs-12">            
            <div class="x_panel">
                  <div class="x_title">
                    <div class="clearfix"></div>

                  </div>
                  <div class="x_content">
                   <form class="form-horizontal form-label-left input_mask">
                        <div class="row">
                          <div class="col-md-6 col-xs-12"> 
                        <div class="form-group">
                        <label for="carcamo" class="control-label col-md-4 col-sm-4 col-xs-12">Carcamo</label>
                      <div class="col-md-8 col-sm-8 col-xs-12 form-group has-feedback">
                         <select id="carcamo" class="form-control has-feedback-left" required>
                          <option data-cuenta="0"   value="0">--</option>
                            <?php 
                            foreach ($carcamos as $key => $value) { 
                             
                              ?>
                            <option data-cuenta="<?php echo $value->CTACONT ?>" 
                              data-idcuenta="<?php echo $value->ID ?>" 
                              <?php echo $selected ?>
                            value="<?php echo $value->ID ?>"><?php echo $value->NOMBRE." (".$value->DESCRIPCION .")"?></option>
                            <?php }  ?>
                          </select>

                       
                        <span class="fa fa-list-alt form-control-feedback left" aria-hidden="true"></span>
                      </div>
                       </div>
                     </div>
                      <div class="col-md-6 col-xs-12"> 
   <div class="form-group">
    <label for="reportrange" class="control-label col-md-4 col-sm-4 col-xs-12">Fecha</label>
                      <div class="col-md-8 col-sm-8 col-xs-12 form-group has-feedback">
                        <input type="text" class="form-control has-feedback-left" id="reportrange" placeholder="Fecha" maxlength="12"  >
                        <span class="fa fa-calendar form-control-feedback left" aria-hidden="true"></span>
                      </div>
                       </div>

                      </div>
                      </div>


                    
                       


                        <div class="row">
                          <div class="col-md-6 col-xs-12"> 
                       <div class="form-group">
                        <label for="turno_1" class="control-label col-md-4 col-sm-4 col-xs-12">Turno</label>
                      <div class="col-md-8 col-sm-8 col-xs-12 form-group has-feedback">
                         <select id="turno_1" class="form-control has-feedback-left" required>
                          <option     value="0">Todo</option>
                       
                          <option     value="1">Primero</option>
                          <option     value="2">Segundo</option>
                          <option     value="3">Tercero</option>
                                           
                          </select>

                       
                        <span class="fa fa-list-alt form-control-feedback left" aria-hidden="true"></span>
                      </div>
                       </div>
                        </div>

                           <div class="col-md-6 col-xs-12"> 
                            <div class="form-group">
                        <label for="operador" class="control-label col-md-4 col-sm-4 col-xs-12">Operador Carcamo</label>
                      <div class="col-md-8 col-sm-8 col-xs-12 form-group has-feedback">
                         <select id="operador" class="form-control has-feedback-left" required>
                          <option data-cuenta="0"   value="0">Todo</option>
                            <?php 
                            foreach ($operador as $key => $value) { 
                             
                              ?>
                            <option data-cuenta="<?php echo $value->CTACONT ?>" 
                              data-idcuenta="<?php echo $value->IDTCBN ?>" 
                              <?php echo $selected ?>
                            value="<?php echo $value->idOper ?>"><?php echo $value->operador." (".$value->rol .")"?></option>
                            <?php }  ?>
                          </select>

                       
                        <span class="fa fa-list-alt form-control-feedback left" aria-hidden="true"></span>
                      </div>
                       </div>
                       </div>
                       <div class="col-md-6 col-xs-12"></div>
                        <div class="col-md-6 col-xs-12">
                             <div class="form-group">
                        <div class="col-md-10 col-sm-10 col-xs-12"></div>
                        <div class="col-md-2 col-sm-2 col-xs-12">
                          <!--<button type="button" class="btn btn-primary">Cancel</button>-->
             
                          <button type="button"  class="btn btn-success BuscarCarcamo">Buscar
                          <span class="fa fa-search"></span>
                          </button>
                        </div>
                      </div>
                         </div>
                        </div>
                     <!-- <div class="ln_solid"></div>-->

                   

                    </form>
                     </div>

<div class="tabla_search"> </div>


                  </div>
                </div>
                </div>
               
                </div><br>
    
  

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
  .panel-heading{ 
    background-color: #19b591 !important;
    border-color: #118851 !important;
" }
</style>

 <script  type="text/javascript" >
   $(document).ready(function(v) {


$(".BuscarCarcamo").click(function(event) {
      
      var turno = $("#turno_1").val();
 var carcamo = $("#carcamo").val();
 var operador = $("#operador").val();
 var reportrange = $("#reportrange").val();
console.log(turno);
//console.log(carcamo);
//console.log(operador);
//console.log(reportrange);
var fecha=reportrange.split('-');
console.log(fecha);
 
  if (carcamo==0) {
  new PNotify({  title: 'Alerta', text: 'Seleccione un Carcamo',type: 'warning',styling: 'bootstrap3' }); 
  }
  else{
BuscarCarcamo(carcamo,fecha[0].trim(),fecha[1].trim(),turno,operador,reportrange);
  
  }
 
 

});





   });


  


function BuscarCarcamo (carcamo,fecha1,fecha2,turno,operador,reportrange){

 $.ajax({
      url : AjaxURL(),
    data : { action : "buscarCarcamo_tabla",
       carcamo:carcamo,fecha1:fecha1,fecha2:fecha2,turno:turno,operador:operador
  },
     type : 'POST',
 
    dataType : 'HTML',
 
    beforeSend : function(xhr, status) {
    $(".tabla_search").html(gifLoad());
    },
    success : function(json) {
    //$("#pageContentRegistrado").html(html);
    $(".tabla_search").html(json);
     $("#reportrange").val(reportrange);
    // console.log(json);
     if (json.status==0) {
      new PNotify({ title: 'Alerta', text: 'Deposito no encontrado!',type: 'error',styling: 'bootstrap3'});
     }
 
 
 
    },
 

    error : function(xhr, status) {
       alert('Disculpe, existió un problema al Buscar Carcamo');
       //$("#testuno").html('');
        console.log(status);
    },
 
    complete : function(xhr, status) {
        //alert('Petición realizada');
    }
});

}

 </script>
<?php 
}
else{
  echo "Acceso no permitido...";
}
?>  