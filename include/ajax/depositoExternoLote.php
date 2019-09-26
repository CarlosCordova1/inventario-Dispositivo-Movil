<?php 
if($data1){
  date_default_timezone_set('America/Cancun');
      ?>   


<div class="container">
  <ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="#nuevo">Lotes de facturación</a></li>
    <!--<li><a data-toggle="tab" href="#menueditar">Nuevo Deposito Externo</a></li>-->
  </ul>

  <div class="tab-content">
    <div id="nuevo" class="tab-pane fade in active">
      <h3>Lotes de facturación</h3>
    
  <!--  <table   class="table table-striped table-bordered dt-responsive nowrap datatable-responsive datatable-buttons" cellspacing="0" width="100%">-->
      <table  class="table table-striped table-bordered datatable-buttons nowrap" cellspacing="0" width="100%">

                      <thead>
                        <tr>
						 <th >#</th> 
                         <th >Lote</th> 
                                            
                        <th>ID Deposito</th>
                         
                          <th>Total</th>
                          <th>Fecha de<br> Creacion</th>
                         <th>Total documento</th>
                          <th>Mas detalles</th>
						
                          </tr>
                      </thead>
   <tbody>
                          <?php 
						  $a=0;
                             foreach ($val as  $seccion) {
                          foreach ($seccion[0]->Deposito as $key => $value) { ?>
                          <tr class="enlace">
						   <th><?php echo ++$a?></th>
                           <th><?php echo $value->ID?></th>
                                         
                          <th><?php echo $value->IDTDEP?></th> 
                          <th><?php echo number_format($value->total,2)?></th> 
                         
                          <th><?php echo $value->FECHA?></th>
									<th><?php echo number_format($value->count)?></th> 

                           <th >
                            
                            <a href="#"                            
                             data-toggle="modal" 
                             class="VincularDepositoEntidadExternaver"
                              data-value="<?php echo $value->ID?>"
                               data-montodeposito="<?php echo $value->Monto?>" 
                              data-target="#myModalver" > Ver detalle</a> 
                              <?php if($value->totalfact!=0) {?>
                              <br>
                              <a href="<?php echo $this->urlpdf.$value->ID?>" target="_blank"                            
                                > ver facturas </a>
                                  <?php } ?>
                         
                           </th> 
 
                           </tr>
                             <?php } } ?>
                      </tbody>
                    </table>

    </div> <!--end nuevo menu-->
    <div id="menueditar" class="tab-pane fade">
      <!--<h3>Nuevo deposito</h3>--><br>
      <div class="row">
              <div class="col-md-2 col-xs-2"> </div>
              
              <div class="col-md-8 col-xs-12">            
            <div class="x_panel">
                  <div class="x_title">
                    
                   <!-- <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="#">Settings 1</a>
                          </li>
                          <li><a href="#">Settings 2</a>
                          </li>
                        </ul>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>-->
                    <div class="clearfix"></div>

                  </div>
                  <div class="x_content">
       
                  </div>
                </div>
                </div>
                <div class="col-md-2 col-xs-2"> </div>
                </div>
    </div><!--end menueditar-->
    
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

$("#montodeldeposito").inputmask("currency", {
      //colorMask: true
  });
$('#FechaDeposito').datetimepicker({ locale: 'es'});


   // $("#montodeldeposito").numeric(",");


  var PuntoCobranza = $.parseJSON('<?php echo json_encode($PuntoCobranza[0]->PuntoCobranza)?>');
 $("#tipodeposito").change(function(index, el) {
  var tipodeposito=$(this).val();
  console.log(tipodeposito);
if (tipodeposito=="0") {
$("#Referencia,#Referencia2").removeAttr('disabled');
$("#FolioCartaporte,#FolioSello").removeAttr('disabled');
$("#Referencia,#Referencia2").val("");
$("#FolioCartaporte,#FolioSello").val("");
}
else if (tipodeposito=="CAT" || tipodeposito=="DTV") {
    $("#Referencia,#Referencia2").attr('disabled','disabled');
    $("#Referencia,#Referencia2").val("");
    
}
else{
$("#Referencia,#Referencia2").removeAttr('disabled');
}


if (tipodeposito=="EEX" || tipodeposito=="DST") {
    
    $("#FolioCartaporte,#FolioSello").attr('disabled','disabled');
    $("#Referencia,#Referencia2").removeAttr('disabled');

    $("#Referencia,#Referencia2").val("");
$("#FolioCartaporte,#FolioSello").val("");
}
else{
$("#FolioCartaporte,#FolioSello").removeAttr('disabled');
}






  // $("#cuentadeBanco").val( $( "#Puntodecobranza option:selected" ).data("cuenta"));
//var value =$( "#Puntodecobranza option:selected" ).data("idcuenta");
/*console.log(value);
if (value==null) { value=0;}
if (typeof value === 'undefined') { value=0;}
if (value == '') { value=0;}
*/
//console.log(PuntoCobranza);

var optionselect='<option data-cuenta="0"   value="0">--</option>';
$('#Puntodecobranza').html( '' );
$.each(PuntoCobranza, function(i, item) {
   // console.log(PuntoCobranza[i].TPO);
   // <option data-cuenta="0"   value="0">--</option>

    if (tipodeposito==0) {
       // console.log(PuntoCobranza[i].TPO);
        optionselect+='<option data-cuenta="'+PuntoCobranza[i].CTACONT+'" data-idcuenta="'+PuntoCobranza[i].IDTCBN+'"   value="'+PuntoCobranza[i].ID+'"> '+PuntoCobranza[i].IDTCSS+' ('+PuntoCobranza[i].UBICACION+') </option>';
    }
    else if (PuntoCobranza[i].TPO==tipodeposito) {
        //console.log(PuntoCobranza[i].TPO);
        optionselect+='<option data-cuenta="'+PuntoCobranza[i].CTACONT+'" data-idcuenta="'+PuntoCobranza[i].IDTCBN+'"   value="'+PuntoCobranza[i].ID+'"> '+PuntoCobranza[i].IDTCSS+' ('+PuntoCobranza[i].UBICACION+') </option>';
    }
})
 $('#Puntodecobranza').append( optionselect );

//alert($( this).val());
//$('#Puntobanco option[value=0]').attr('selected','selected');
  //  $('#Puntobanco option').removeAttr('selected');

   //$('#Puntobanco option[value='+value+']').attr('selected','selected');
   // console.log($(this).data("cuenta"));
   // console.log($( "#Puntodecobranza option:selected" ).data("cuenta"));
  });



 $("#Puntodecobranza").change(function(index, el) {
   $("#cuentadeBanco").val( $( "#Puntodecobranza option:selected" ).data("cuenta"));
var value =$( "#Puntodecobranza option:selected" ).data("idcuenta");
console.log(value);
if (value==null) { value=0;}
if (typeof value === 'undefined') { value=0;}
if (value == '') { value=0;}
//alert(value);
$('#Puntobanco option[value=0]').attr('selected','selected');
    $('#Puntobanco option').removeAttr('selected');

   $('#Puntobanco option[value='+value+']').attr('selected','selected');
   // console.log($(this).data("cuenta"));
   // console.log($( "#Puntodecobranza option:selected" ).data("cuenta"));
  });

  $("#Puntobanco").change(function(index, el) {
   $("#cuentadeBanco").val( $( "#Puntobanco option:selected" ).data("cuenta"));
   // console.log($(this).data("cuenta"));
    //console.log($( "#Puntobanco option:selected" ).data("cuenta"));
  });



$("#guardarNuevoDeposito").click(function(event) {
  /* Act on the event */
  var tipodeposito =$("#tipodeposito").val().trim();
 var puntoCobranza =$("#Puntodecobranza").val().trim();
var idBanco =$("#Puntobanco").val().trim();
var Monto =$("#montodeldeposito").val().trim();
  var Referencia =$("#Referencia").val().trim();
  var Referencia2 =$("#Referencia2").val().trim();
var message=$("#message").val().trim();


  if (tipodeposito=="EEX" || tipodeposito=="DST") {
  
 if (Referencia=="") {
    Referencia=" ";
  }

}

var FolioCarta =$("#FolioCartaporte").val().trim(); 
var FolioSello =$("#FolioSello").val().trim(); 
var entidad =$("#entidad").val().trim(); 
var FechaDeposito =$("#FechaDeposito").val().trim(); 
 //new PNotify({ title: 'Alerta', text: 'guardar!',type: 'success',styling: 'bootstrap3'});
 
 var datos = {
  "tipodeposito":tipodeposito,  
"puntoCobranza":puntoCobranza,
 "entidad":entidad,
"Monto":Monto,
"Referencia":Referencia,
"idBanco":idBanco,
"FolioCartaporte":FolioCarta,
"FolioSello":FolioSello,
"FechaDeposito":FechaDeposito,
"message":message
   
   };
   console.log(datos);
  

if (tipodeposito=="DST" || tipodeposito=="EEX") {
FolioCarta="1";
FolioSello="1";
}


   var r = confirm("¿Esta seguro de realizar esta accion?");
if (r == true) {
 if (tipodeposito=="0" || tipodeposito=="" ) {
  alert("Agregue un tipo de deposito");
new PNotify({  title: 'Alerta', text: 'Accion Cancelada',type: 'warning',styling: 'bootstrap3' });
$("#tipodeposito").focus();
}
else if (puntoCobranza=="0" || puntoCobranza=="" ) {
  alert("Agregue un punto de cobranza");
new PNotify({  title: 'Alerta', text: 'Accion Cancelada',type: 'warning',styling: 'bootstrap3' });
$("#puntoCobranza").focus();
}
else if (idBanco=="0" || idBanco=="" ) {
  alert("Agregue un banco");
new PNotify({  title: 'Alerta', text: 'Accion Cancelada',type: 'warning',styling: 'bootstrap3' });
$("#Puntobanco").focus();
}

else if (Referencia!=Referencia2) {
  alert("Las referencia no coincide");
new PNotify({  title: 'Alerta', text: 'Accion Cancelada',type: 'warning',styling: 'bootstrap3' });
$("#Referencia").focus();
} 
else if (entidad=="") {
  alert("Agregue una entidad");
new PNotify({  title: 'Alerta', text: 'Accion Cancelada',type: 'warning',styling: 'bootstrap3' });
$("#entidad").focus();
}
else if (FolioCarta=="") {
  alert("Agregue Folio Carta Porte");
new PNotify({  title: 'Alerta', text: 'Accion Cancelada',type: 'warning',styling: 'bootstrap3' });
$("#FolioCartaporte").focus();
}
else if (FolioSello=="") {
  alert("Agregue Sello");
new PNotify({  title: 'Alerta', text: 'Accion Cancelada',type: 'warning',styling: 'bootstrap3' });
$("#FolioSello").focus();
}


else if (FechaDeposito=="") {
  alert("Agregue una fecha");
new PNotify({  title: 'Alerta', text: 'Accion Cancelada',type: 'warning',styling: 'bootstrap3' });
$("#FechaDeposito").focus();
}
else{
  agregarDeposito (datos);
  //new PNotify({ title: 'Alerta', text: 'Agregar' ,type: 'success',styling: 'bootstrap3'});
}

 
} else {
      new PNotify({  title: 'Alerta', text: 'Accion Cancelada',type: 'warning',styling: 'bootstrap3' });
}


});


$(".facturar").click(function(event) {
    var r = confirm("¿Esta seguro de realizar esta accion?");
	var deposito=$(this).data("value");
if (r == true) {
	facturarLote(deposito);
	
}
else{
	new PNotify({  title: 'Alerta', text: 'Accion Cancelada',type: 'warning',styling: 'bootstrap3' }); 
}
 

});




$("#buscarDeposito").click(function(event) {
  /* Act on the event */


  var numdeposito =$("#numdeposito").val().trim();
/*/ var puntoCobranza =$("#Puntodecobranza").val().trim();
var CuentaBanco =$("#cuentadeBanco").val().trim();
var Monto =$("#montodeldeposito").val().trim();
var Referencia =$("#Referencia").val().trim();
var FolioCarta =$("#FolioCartaporte").val().trim(); 
var FolioSello =$("#FolioSello").val().trim(); 
var FechaDeposito =$("#FechaDeposito").val().trim(); /*/
 //new PNotify({ title: 'Alerta', text: 'buscar -> '+numdeposito ,type: 'success',styling: 'bootstrap3'});
 
  //BuscarDeposito (numdeposito); 

});

$( "#numdeposito" ).keypress(function(e) {
  if(e.which == 13) {
    $("#buscarDeposito").click();
        event.preventDefault();
    }

});
 $("#numdeposito").focus();



   });


   function facturarLote (datos){
  console.log(datos);
 $.ajax({
      url : AjaxURL(),
    data : { action : "facturarLote",
    lote:datos
  },
     type : 'POST',
    dataType : 'JSON',
    beforeSend : function(xhr, status) {
     $(".facturando").html(gifLoad());
   $('#myModalload').modal('show');
      
    },
    success : function(json) {
    
     // alertify.success("Datos buscado");
     console.log(json);
     if (json.status==0) {
      alert(json.msg);
	  new PNotify({  title: 'Alerta', text: 'Accion Cancelada',type: 'warning',styling: 'bootstrap3' }); 
     }
     else if (json.status==1){
       
       if (json.API[0].status==1){
		    new PNotify({ title: 'Alerta', text: 'Deposito Facturado!',type: 'success',styling: 'bootstrap3'});
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
       alert('Disculpe, existió un problema al intentar facturar');
       //$("#testuno").html('');
	   console.log(status);
	   $('#myModalload').modal('hide');
    },
 
    complete : function(xhr, status) {
        $('#myModalload').modal('hide');
    }
});

}
//--------------------------------------------------------------------

   
function agregarDeposito (datos){
  console.log(datos);
 $.ajax({
      url : AjaxURL(),
    data : { action : "agregarDeposito",
    tipodeposito:datos.tipodeposito,
    puntoCobranza:datos.puntoCobranza,
    entidad:datos.entidad,
    Monto:datos.Monto,
    Referencia:datos.Referencia,
    idBanco:datos.idBanco,
    FolioCartaporte:datos.FolioCartaporte,
     FolioSello:datos.FolioSello,
    FechaDeposito:datos.FechaDeposito,
    message:datos.message
  },
     type : 'POST',
 
    dataType : 'JSON',
 
    beforeSend : function(xhr, status) {
     //$(".modal_CambiarUso").html(gifLoad());
    //  alertify.log("Datos buscado");
      
    },
    success : function(json) {
    //$("#pageContentRegistrado").html(html);
    //$("#soloLectura").html("");
     // alertify.success("Datos buscado");
     console.log(json);
     if (json.status==0) {
      alert(json.msg);
     }
     else if (json.status==1){
      //console.log(json.API[0].update);
       //alert("Deposito Agregado");
       new PNotify({ title: 'Alerta', text: 'Deposito Agregado!',type: 'success',styling: 'bootstrap3'});
       $("#resetNuevo").click();
     }else{
        //console.log(json.API[0].update);
         alert("Error: "+json.msg);
     }
      //$(".modal_CambiarUso").html(html);
      //$(".txtUso").html(usoselectName);
 
    },
 

    error : function(xhr, status) {
       alert('Disculpe, existió un problema al agregar deposito');
       //$("#testuno").html('');
    },
 
    complete : function(xhr, status) {
        //alert('Petición realizada');
    }
});

}
//--------------------------------------------------------------------




function BuscarDeposito (datos){

$("#EditPuntodecobranza").val('');
$("#EditcuentadeBanco").val('');
$("#Editmontodeldeposito").val('');
$("#EditReferencia").val('');
$("#EditFolioCartaporte").val(''); 
$("#EditFolioSello").val(''); 
$("#EditFechaDeposito").val('');


 $.ajax({
      url : AjaxURL(),
    data : { action : "BuscarDeposito",
       Deposito:datos
  },
     type : 'POST',
 
    dataType : 'JSON',
 
    beforeSend : function(xhr, status) {
   new PNotify({ title: 'Alerta', text: 'buscando...',type: 'info',styling: 'bootstrap3'});
      
    },
    success : function(json) {
    //$("#pageContentRegistrado").html(html);
    //$("#soloLectura").html("");
     // alertify.success("Datos buscado");
     console.log(json);
     if (json.status==0) {
      new PNotify({ title: 'Alerta', text: 'Deposito no encontrado!',type: 'error',styling: 'bootstrap3'});
     }
     else if (json.status==1){
      //console.log(json.API[0].Deposito[1].depositante);
       //alert("Deposito Agregado");
       new PNotify({ title: 'Alerta', text: 'Deposito buscado!',type: 'success',styling: 'bootstrap3'});
         $("#EditPuntodecobranza").val(json.API[0].Deposito[1].Cobranza);
$("#EditcuentadeBanco").val(json.API[0].Deposito[1].Banco);
$("#Editmontodeldeposito").val(json.API[0].Deposito[1].Monto);
$("#EditReferencia").val(json.API[0].Deposito[1].referencia);
$("#EditFolioCartaporte").val(json.API[0].Deposito[1].foliocarta); 
$("#EditFolioSello").val(json.API[0].Deposito[1].folioSello); 
$("#EditFechaDeposito").val(json.API[0].Deposito[1].fechaoperacion);


     }else{
        //console.log(json.API[0].update);
         alert("Error: "+json.msg);
     }
      //$(".modal_CambiarUso").html(html);
      //$(".txtUso").html(usoselectName);
 
    },
 

    error : function(xhr, status) {
       alert('Disculpe, existió un problema al Buscar deposito');
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