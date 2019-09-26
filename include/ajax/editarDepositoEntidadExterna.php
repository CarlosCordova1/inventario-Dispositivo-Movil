<?php 
if($data1){
      ?>   
          
           <div class="row">

              <div class="col-md-2 col-xs-2"> </div>
              
              <div class="col-md-8 col-xs-12">            
            <div class="x_panel">
              <h2>Desvincular deposito a facturar</h2>
                <h2>Numero: <?php echo $idtdep?></h2>
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
                     <form class="form-horizontal form-label-left input_mask">
				<?php /*?>
                        <div class="form-group">
                        <label for="CJ_tipodeposito" class="control-label col-md-4 col-sm-4 col-xs-12">Tipo de deposito</label>
                      <div class="col-md-8 col-sm-8 col-xs-12 form-group has-feedback">
                         <select id="CJ_tipodeposito" class="form-control has-feedback-left disabled" disabled="disabled" required>

                           
                              <?php 

                               $depositoval=array(
                                "CAT"=>'Cajero automatico',
                                "DTV"=>'Depósitos para trasportar valor',
                                "DST"=>'Reg de deposito pago efectuado',
                                "EEX"=>'Entidad Externa'
                               );
                                foreach ($depositoval as $key => $value) {
                                
                                 if ($tipodeposito==$key) {
                                   echo  '<option selected value="'.$key.'" >'.$value."</option>";
                                 }
                                 else{
                                        echo  '<option  value="'.$key.'" >'.$value."</option>";
                                 }
                                }
                                ?> 

                          </select>

                       
                        <span class="fa fa-list-alt form-control-feedback left" aria-hidden="true"></span>
                      </div>
                       </div>



                        <div class="form-group">
                        <label for="CJ_Puntodecobranza" class="control-label col-md-4 col-sm-4 col-xs-12">Punto de cobranza</label>
                      <div class="col-md-8 col-sm-8 col-xs-12 form-group has-feedback">
        
                      <select id="CJ_Puntodecobranza" class="form-control has-feedback-left "  required>
                        <option data-cuenta="0"   value="0">--</option>
                            <?php 
                            $idbanco='';
                            foreach ($api[0]->PuntoCobranza as $key => $value) { 
                                if ( $tipodeposito==$value->TPO) {
                                  # code...
                                
                              $selected='';

                                      if ($idpuntocobro==$value->ID) {
                                        $selected='selected';
                                         $idbanco=$value->IDTCBN;
                                      }
                              ?>
                            <option data-cuenta="<?php echo $value->CUENTABANCO ?>"
                              data-idcuenta="<?php echo $value->IDTCBN ?>"
                             <?php echo $selected?>
                            value="<?php echo $value->ID ?>"><?php echo $value->IDTCSS ." (".$value->UBICACION .")"?></option>
                            <?php } 
                            }
                             ?>
                          </select>

                       
                        <span class="fa fa-list-alt form-control-feedback left" aria-hidden="true"></span>
                      </div>
                       </div>

          <div class="form-group">
                        <label for="CJ_Puntobanco" class="control-label col-md-4 col-sm-4 col-xs-12">Banco</label>
                      <div class="col-md-8 col-sm-8 col-xs-12 form-group has-feedback">
                         <select id="CJ_Puntobanco" disabled="disabled" class="form-control has-feedback-left disabled" required>
                          <option data-cuenta="0"   value="0">--</option>
                            <?php 
                            foreach ($banco[0]->Bancos as $key => $value) { 
                              $selected='';

                                      if ($idbanco==$value->ID) {
                                        $selected='selected';                                         
                                      }
                              ?>
                             <option data-cuenta="<?php echo $value->CUENTABANCO?>" 
                              <?php echo $selected ?>
                            value="<?php echo $value->ID ?>"><?php echo $value->cuenta ?>
                                -- <?php echo $value->TPOCTA ?>
                            </option>
                            <?php }  ?>
                          </select>

                       
                        <span class="fa fa-list-alt form-control-feedback left" aria-hidden="true"></span>
                      </div>
                       </div>




                     
                      <div class="form-group">
                        <label for="CJ_cuentadeBanco" class="control-label col-md-4 col-sm-4 col-xs-12">Cuenta de Banco Asociada</label>
                      <div class="col-md-8 col-sm-8 col-xs-12 form-group has-feedback">
                        <input type="text" disabled="disabled" class="form-control has-feedback-left disabled" id="CJ_cuentadeBanco" value="<?php echo $cuenta ?>" placeholder="Cuenta de Banco Asociada">
                        <span class="fa fa-list-alt form-control-feedback left" aria-hidden="true"></span>
                      </div>
                       </div>

                    <div class="form-group">
                        <label for="EET_montodeldeposito" class="control-label col-md-4 col-sm-4 col-xs-12">Monto del deposito</label>
                      <div class="col-md-8 col-sm-8 col-xs-12 form-group has-feedback">
                        <input type="text"   maxlength="15" class="form-control has-feedback-left" value="<?php echo $monto?>"   id="EET_montodeldeposito" placeholder="Monto del deposito">
                        <span class="fa fa-money form-control-feedback left" aria-hidden="true"></span>
                      </div>
                       </div>

                       <div class="form-group">
                        <label for="CJ_montoVinculado" class="control-label col-md-4 col-sm-4 col-xs-12">Monto Vinculado</label>
                      <div class="col-md-8 col-sm-8 col-xs-12 form-group has-feedback">
                        <input type="text" disabled="disabled" maxlength="15" class="form-control has-feedback-left disabled" value="<?php echo number_format($montovinculado,2)?>"  id="CJ_montoVinculado" placeholder="Monto Vinculado">
                        <span class="fa fa-money form-control-feedback left" aria-hidden="true"></span>
                      </div>
                       </div>

                     
                        <div class="form-group">
                        <label for="EET_Referencia" class="control-label col-md-4 col-sm-4 col-xs-12">Referencia</label>
                      <div class="col-md-8 col-sm-8 col-xs-12 form-group has-feedback">
                        <input type="text" 
                            <?php 
                           if($tipodeposito=="CAT" ||$tipodeposito== "DTV"){
                              echo 'disabled="disabled"';
                            }
                            ?>
                         value="<?php echo $referencia?>" maxlength="100"   class="form-control has-feedback-left" id="EET_Referencia" placeholder="Referencia">
                        <span class="fa fa-eye form-control-feedback left" aria-hidden="true"></span>
                      </div>
                       </div>
                       <div class="form-group">
                        <label for="EET_Referencia2" class="control-label col-md-4 col-sm-4 col-xs-12">Confirmar Referencia</label>
                      <div class="col-md-8 col-sm-8 col-xs-12 form-group has-feedback">
                        <input type="text" 
                         <?php 
                            if($tipodeposito=="CAT" ||$tipodeposito== "DTV"){
                              echo 'disabled="disabled"';
                            }
                            ?>
                        value="<?php echo $referencia?>" maxlength="100"   class="form-control has-feedback-left" id="EET_Referencia2" placeholder="Confirmar Referencia">
                        <span class="fa fa-eye form-control-feedback left" aria-hidden="true"></span>
                      </div>
                       </div>


                       
                       <div class="form-group">
                        <label for="EET_entidad" class="control-label col-md-4 col-sm-4 col-xs-12">Persona o entidad depositante</label>
                      <div class="col-md-8 col-sm-8 col-xs-12 form-group has-feedback">
                        <input type="text"
                           disabled="disabled" 
                         maxlength="50" value="<?php echo $entidad?>" class="form-control has-feedback-left disabled" id="EET_entidad" placeholder="Persona o entidad depositante"  >
                        <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                      </div>
                       </div>
                      
                        <div class="form-group">
                        <label for="CJ_FolioCartaporte" class="control-label col-md-4 col-sm-4 col-xs-12">Folio Carta porte</label>
                      <div class="col-md-8 col-sm-8 col-xs-12 form-group has-feedback">
                        <input type="text" 
                           <?php 
                           if($tipodeposito=="DST" ||$tipodeposito== "EEX"){
                              echo 'disabled="disabled"';
                            }
                            ?>
                         class="form-control has-feedback-left" id="CJ_FolioCartaporte" placeholder="Folio Carta porte" value="<?php  echo $foliocarta?>"  maxlength="30"  >
                        <span class="fa fa-flash form-control-feedback left" aria-hidden="true"></span>
                      </div>
                       </div>
                       <div class="form-group">
                        <label for="CJ_FolioSello" class="control-label col-md-4 col-sm-4 col-xs-12">Folio Sello</label>
                      <div class="col-md-8 col-sm-8 col-xs-12 form-group has-feedback">
                        <input type="text"  
                          <?php 
                           if($tipodeposito=="DST" ||$tipodeposito== "EEX"){
                              echo 'disabled="disabled"';
                            }
                            ?>
                        value="<?php  echo $folioSello?>" maxlength="30" class="form-control has-feedback-left" id="CJ_FolioSello" placeholder="Folio Sello"   >
                        <span class="fa fa-flash form-control-feedback left" aria-hidden="true"></span>
                      </div>
                       </div>
                      
                       <div class="form-group">
                        <label for="CJ_FechaDeposito" class="control-label col-md-4 col-sm-4 col-xs-12">Fecha Deposito</label>
                      <div class="col-md-8 col-sm-8 col-xs-12 form-group has-feedback">
                        <input type="text" value="<?php echo $fechaoperacion?>" class="form-control has-feedback-left" id="CJ_FechaDeposito" placeholder="Fecha Deposito" maxlength="12"  >
                        <span class="fa fa-calendar form-control-feedback left" aria-hidden="true"></span>
                      </div>
                       </div>
                         <div class="form-group">
                        <label for="message2" class="control-label col-md-4 col-sm-4 col-xs-12">Observaciones (Opcional)</label>
                      <div class="col-md-8 col-sm-8 col-xs-12 form-group has-feedback">
                        <textarea class="form-control" id="message2" maxlength="2000" rows="3" placeholder='Observaciones (Opcional)'><?php echo $observaciones?></textarea>
                         
                      </div>
                       </div>
					   <?php */?>
<!--
                    <div class="form-group">
                       <label class="control-label col-md-4 col-sm-4 col-xs-12">Aceptacion<span class="required">*</span></label>
                        <div class="col-md-4 col-sm-4 col-xs-12">
                          <div class="checkbox">                           
                              <input type="radio" class="flat" checked name="iCheck"> Efectivo
                            </div>
                          </div>
                          <div class="col-md-4 col-sm-4 col-xs-12">
                          <div class="checkbox">
                             <input type="radio" class="flat" checked name="iCheck"> Cheque
                                  </div>
                          
                        </div>
                          <label class="control-label col-md-4 col-sm-4 col-xs-12"></label>
                        <div class="col-md-4 col-sm-4 col-xs-12">
                          <div class="checkbox">
                           <input type="radio" class="flat" checked name="iCheck"> Tarjeta Credito
                            </div>
                          </div>
                           <div class="col-md-4 col-sm-4 col-xs-12">
                          <div class="checkbox">
                           <input type="radio" class="flat" checked name="iCheck"> Tarjeta Debito
                            
                          </div>
                          
                        </div>
                      </div>
                      -->


                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-10 col-sm-10 col-xs-12">
                           <?php 
                           //if($tipodeposito=="EEX" && $estado=='VIN'){
                            if($tipodeposito=="EEX"){
                            
                              ?>
                              <button type="button" id="CJ_DepositoDesvincular" class="btn btn-warning">Desvincular
                          <span class="fa fa-exclamation-triangle"></span>
                          </button>
                              <?php
                            }
                            ?>
                        </div>
                        <div class="col-md-2 col-sm-2 col-xs-12">
                          <!--<button type="button" class="btn btn-primary">Cancel</button>-->
              <!-- <button class="btn btn-primary" type="reset">Reset  <span class="fa fa-refresh"></span></button>-->
                         <!-- <button type="button" id="CJ_DepositoGuardar" class="btn btn-success">Guardar
                          <span class="fa fa-floppy-o"></span>
                          </button>-->
                        </div>
                      </div>

                    </form>
                 
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

<!-- bootstrap-daterangepicker -->
    <script src="assets/gentelella-master/vendors/moment/min/moment-with-locales.js"></script>
    <script src="assets/gentelella-master/vendors/bootstrap-daterangepicker/daterangepicker.js"></script>
    <!-- bootstrap-datetimepicker -->    
    <script src="assets/gentelella-master/vendors/bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js"></script>
<script src="assets/gentelella-master/vendors/mjolnic-bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js"></script>  
        <!-- end table -->
<script type="text/javascript" src="assets/Inputmask-4.x/dist/jquery.inputmask.bundle.js" charset="utf-8"></script>
 
        <script src="assets/gentelella-master/build/js/custom.js"></script>
 <!--<script src="assets/gentelella-master/build/js/custom_other.js"></script>-->

<style type="text/css">
  #EET_montodeldeposito{ text-align: left !important; }
</style>

 <script  type="text/javascript" >
   $(document).ready(function(v) {
 
$("#EET_montodeldeposito").inputmask("currency", {
      //colorMask: true
  });
$('#CJ_FechaDeposito').datetimepicker({ locale: 'es'});

  $("#CJ_Puntodecobranza").change(function(index, el) {
   $("#CJ_cuentadeBanco").val( $( "#CJ_Puntodecobranza option:selected" ).data("cuenta"));

var value =$( "#CJ_Puntodecobranza option:selected" ).data("idcuenta");
console.log(value);
if (value==null) { value=0;}
if (typeof value === 'undefined') { value=0;}
if (value == '') { value=0;}
//alert(value);
$('#CJ_Puntobanco option[value=0]').attr('selected','selected');
    $('#CJ_Puntobanco option').removeAttr('selected');

   $('#CJ_Puntobanco option[value='+value+']').attr('selected','selected');


   // console.log($(this).data("cuenta"));
    //console.log($( "#CJ_Puntodecobranza option:selected" ).data("cuenta"));
  });

 $("#CJ_Puntobanco").change(function(index, el) {
   $("#CJ_cuentadeBanco").val( $( "#CJ_Puntobanco option:selected" ).data("cuenta"));
   // console.log($(this).data("cuenta"));
    //console.log($( "#Puntobanco option:selected" ).data("cuenta"));
  });



$("#CJ_DepositoDesvincular").click(function(event) {
  
   var re = confirm("¿Esta seguro de realizar esta accion?");
if (re == true) {
   var idtdep =<?php echo $idtdep?>;
   cambiarStatusVincualdoopcionEdicion(idtdep);
  // alert(idtdep);
   } else {
      new PNotify({  title: 'Alerta', text: 'Accion Cancelada',
                                  type: 'warning',
                                  styling: 'bootstrap3'
                              });
}
});
  //---------------------------------------------------------------------------




$("#CJ_DepositoGuardar").click(function(event) {
  /* Act on the event */
  var id =<?php echo $idtdep?>;
   var tipodeposito ='<?php echo $tipodeposito?>';
 var puntoCobranza =$("#CJ_Puntodecobranza option:selected").val();
 idbanco=$("#CJ_Puntobanco option:selected").val();
var Monto =$("#EET_montodeldeposito").val().trim();

 var  Referencia =$("#EET_Referencia").val().trim();
 var  Referencia2 =$("#EET_Referencia2").val().trim();
if (tipodeposito=="EEX" || tipodeposito=="DST") {

  if (Referencia=="") {
    Referencia=" ";
  }
}

var FolioCarta =$("#CJ_FolioCartaporte").val().trim(); 
var FolioSello =$("#CJ_FolioSello").val().trim(); 
var EET_entidad =$("#EET_entidad").val().trim(); 
var FechaDeposito =$("#CJ_FechaDeposito").val().trim(); 
 
 var message2 =$("#message2").val().trim(); 
 
 var datos = {
  "id":id,
   "tipodeposito":tipodeposito,  
"puntoCobranza":puntoCobranza,
"idbanco":idbanco,
"Monto":Monto,
"Referencia":Referencia,
"FolioCarta":FolioCarta,
"FolioSello":FolioSello,
"EET_entidad":EET_entidad,
"FechaDeposito":FechaDeposito,
message2:message2
   
   };

if (tipodeposito=="DST" || tipodeposito=="EEX") {
FolioCarta="1";
FolioSello="1";
}


   var r = confirm("¿Esta seguro de realizar esta accion?");
if (r == true) {
   // txt = "You pressed OK!";
      console.log (datos);
 if (Referencia!=Referencia2 ) {
  alert("La referencia no coincide");
new PNotify({  title: 'Alerta', text: 'Accion Cancelada',type: 'warning',styling: 'bootstrap3' });
$("#EET_Referencia").focus();
} 
else if (puntoCobranza=="0" || puntoCobranza=="" ) {
  alert("Agregue un punto de cobranza");
new PNotify({  title: 'Alerta', text: 'Accion Cancelada',type: 'warning',styling: 'bootstrap3' });
$("#CJ_Puntodecobranza").focus();
}
else if (idbanco=="" || idbanco=='0') {
  alert("Selecciones un banco");
new PNotify({  title: 'Alerta', text: 'Accion Cancelada',type: 'warning',styling: 'bootstrap3' });
$("#CJ_Puntobanco").focus();
}
else if (EET_entidad=="") {
  alert("Agregue una entidad");
new PNotify({  title: 'Alerta', text: 'Accion Cancelada',type: 'warning',styling: 'bootstrap3' });
$("#EET_entidad").focus();
}
else if (FolioCarta=="") {
  alert("Agregue Folio Carta Porte");
new PNotify({  title: 'Alerta', text: 'Accion Cancelada',type: 'warning',styling: 'bootstrap3' });
$("#CJ_FolioCartaporte").focus();
}
else if (FolioSello=="") {
  alert("Agregue Sello");
new PNotify({  title: 'Alerta', text: 'Accion Cancelada',type: 'warning',styling: 'bootstrap3' });
$("#CJ_FolioSello").focus();
}
else if (FechaDeposito=="") {
  alert("Agregue una fecha");
new PNotify({  title: 'Alerta', text: 'Accion Cancelada',type: 'warning',styling: 'bootstrap3' });
$("#CJ_FechaDeposito").focus();
} 


else{
EET_ActualizarDeposito (datos); 
 // new PNotify({ title: 'Alerta', text: 'Actualizar...!',type: 'success',styling: 'bootstrap3'});
}




} else {
      new PNotify({  title: 'Alerta', text: 'Accion Cancelada',
                                  type: 'warning',
                                  styling: 'bootstrap3'
                              });
}
  
 //console.log(datos);

});



   });

function EET_ActualizarDeposito (datos){
 // console.log(datos);
 $.ajax({
      url : AjaxURL(),
    data : { action : "EET_ActualizarDeposito",
    puntoCobranza:datos.puntoCobranza,
      id :datos.id,
      tipodeposito:datos.tipodeposito,
    idbanco:datos.idbanco,
    Monto:datos.Monto,
    Referencia:datos.Referencia,
    EET_entidad:datos.EET_entidad,
    FolioSello:datos.FolioSello,
    FolioCarta:datos.FolioCarta,
    FechaDeposito:datos.FechaDeposito,
    message2:datos.message2
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
       new PNotify({ title: 'Alerta', text: 'Deposito Actualizado!',type: 'success',styling: 'bootstrap3'});
       new PNotify({ title: 'Alerta', text: 'Actualice la tabla para ver los cambios!',type: 'info',styling: 'bootstrap3'});
       //$("#actEntidad").click();
     }else{
        //console.log(json.API[0].update);
         alert("Error: "+json.msg);
     }
      //$(".modal_CambiarUso").html(html);
      //$(".txtUso").html(usoselectName);
 
    },
 

    error : function(xhr, status) {
       alert('Disculpe, existió un problema al actualizar deposito');
       //$("#testuno").html('');
    },
 
    complete : function(xhr, status) {
        //alert('Petición realizada');
    }
});

}
//--------------------------------------------------------------------
//------------------------------------------
function cambiarStatusVincualdoopcionEdicion(idDeposito){
  $.ajax({
      url : AjaxURL(),
    data : { action : "vincularloteEcaOpcionEditar",
    idDeposito: idDeposito ,
    },
     type : 'POST',
    dataType : 'json',
    beforeSend : function(xhr, status) {
    // $(".loginmain").html(gifLoad());
    //  alert("Datos buscado");
  
    },
    success : function(json) {
    //$("#pageContentRegistrado").html(html);
    //$(".loginmain").html(html);
      //alert("Datos buscado");
      console.log(json);
       var a=new PNotify({title: 'Desvinculado', type: 'warning', styling: 'bootstrap3'});
      
    },
     error : function(xhr, status) {
      //  $(".loginmain").html('Disculpe, existió un problema al mostrar login');
      var a=new PNotify({title: 'Error al Desvincular', type: 'error', styling: 'bootstrap3'});
        console.log(status);
    },
 
    complete : function(xhr, status) {
        //alert('Petición realizada');
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