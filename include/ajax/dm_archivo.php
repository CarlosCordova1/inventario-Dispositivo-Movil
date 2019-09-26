<?php 
if($data1){
  date_default_timezone_set('America/Cancun');
      ?>   


<div class="container">

      <div class="row">
              <div class="col-md-2 col-xs-2"> </div>
              
              <div class="col-md-8 col-xs-12">            
            <div class="x_panel">
                  <div class="x_title">
                  Folio: <?php echo $idasignacion;?>
                    <div class="clearfix"></div>

                  </div>
                  <div class="x_content">
				  <?php   include_once("loadFile.php")?>
       
                  </div>
                </div>
                </div>
                <div class="col-md-2 col-xs-2"> </div>
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

$(".enviarfilex7").click(function(event) {
    var r = confirm("¿Esta seguro de realizar esta accion?");
  var lote=$(this).data("value");
if (r == true) {
  enviardatos(lote);
  
}
else{
  new PNotify({  title: 'Alerta', text: 'Accion Cancelada',type: 'warning',styling: 'bootstrap3' }); 
}
});

$(".verfilevalidacion_desestimar").click(function(event) {
    var r = confirm("¿Esta seguro de realizar esta accion?");
  var lote=$(this).data("value");
if (r == true) {
  desestimarlote(lote);
  
}
else{
  new PNotify({  title: 'Alerta', text: 'Accion Cancelada',type: 'warning',styling: 'bootstrap3' }); 
}
});

   });// end document.ready

function desestimarlote (datos){
  console.log(datos);
 $.ajax({
      url : AjaxURL(),
    data : { action : "desestimarlote",
    lote:datos
  },
     type : 'POST',
    dataType : 'JSON',
    beforeSend : function(xhr, status) {
    // $(".integrando").html(gifLoad());
  // $('#myModalloadIntegrando').modal('show');
      
    },
    success : function(json) {
    
     // alertify.success("Datos buscado");
     console.log(json);
     if (json.status==0) {
      alert(json.msg);

    new PNotify({  title: 'Error', text: 'Accion Cancelada',type: 'warning',styling: 'bootstrap3' }); 
     }
     else if (json.status==1){
       
       if (json.API[0].status==1){
        new PNotify({ title: 'Alerta', text: 'Lote desestimado!',type: 'danger',styling: 'bootstrap3'});
     }else{
       
         alert("Error: "+json.API[0].msg);
        new PNotify({  title: 'Alerta', text: 'Accion Cancelada',type: 'warning',styling: 'bootstrap3' }); 
     }
      
       //$("#resetNuevo").click();
     }else{
        //console.log(json.API[0].update);
         alert("Error: "+json.msg);
     new PNotify({  title: 'Alerta', text: 'Accion Cancelada',type: 'warning',styling: 'bootstrap3' }); 
     }
      //$(".modal_CambiarUso").html(html);
      //$(".txtUso").html(usoselectName);
 
    },
 

    error : function(xhr, status) {
       alert('Disculpe, existió un problema al intentar desestimar lote');
       //$("#testuno").html('');
    // console.log(status);
     $('#myModalloadIntegrando').modal('hide');
    },
 
    complete : function(xhr, status) {
      //  $('#myModalloadIntegrando').modal('hide');
    }
});

}
//--------------------------------------------------------------------

function enviardatos (datos){
  console.log(datos);
 $.ajax({
      url : AjaxURL(),
    data : { action : "procesarlotex7",
    lote:datos
  },
     type : 'POST',
    dataType : 'JSON',
    beforeSend : function(xhr, status) {
     $(".integrando").html(gifLoad());
   $('#myModalloadIntegrando').modal('show');
      
    },
    success : function(json) {
    
     // alertify.success("Datos buscado");
     console.log(json);
     if (json.status==0) {
      alert(json.msg);

    new PNotify({  title: 'Error', text: 'Accion Cancelada',type: 'warning',styling: 'bootstrap3' }); 
     }
     else if (json.status==1){
       
       if (json.API[0].status==1){
        new PNotify({ title: 'Alerta', text: 'Lote Procesado!',type: 'success',styling: 'bootstrap3'});
     }else{
       
         alert("Error: "+json.API[0].msg);
        new PNotify({  title: 'Alerta', text: 'Accion Cancelada',type: 'warning',styling: 'bootstrap3' }); 
     }
      
       //$("#resetNuevo").click();
     }else{
        //console.log(json.API[0].update);
         alert("Error: "+json.msg);
     new PNotify({  title: 'Alerta', text: 'Accion Cancelada',type: 'warning',styling: 'bootstrap3' }); 
     }
      //$(".modal_CambiarUso").html(html);
      //$(".txtUso").html(usoselectName);
 
    },
 

    error : function(xhr, status) {
       alert('Disculpe, existió un problema al intentar procesar');
       //$("#testuno").html('');
     console.log(status);
     $('#myModalloadIntegrando').modal('hide');
    },
 
    complete : function(xhr, status) {
        $('#myModalloadIntegrando').modal('hide');
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