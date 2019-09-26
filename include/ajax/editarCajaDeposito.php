<?php 
if($data1){
      ?>   
          
           <div class="row">

              <div class="col-md-2 col-xs-2"> </div>
              
              <div class="col-md-8 col-xs-12">            
            <div class="x_panel">
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
                        <div class="form-group">
                        <label for="CJ_Puntodecobranza" class="control-label col-md-4 col-sm-4 col-xs-12">Punto de cobranza</label>
                      <div class="col-md-8 col-sm-8 col-xs-12 form-group has-feedback">

                      <select id="CJ_Puntodecobranza"  disabled="disabled" class="form-control has-feedback-left disabled" required>
                            <?php 
                            foreach ($api[0]->PuntoCobranza as $key => $value) { 
                              $selected='';
                                      if ($idpuntocobro==$value->ID) {
                                        $selected='selected';
                                      }
                              ?>
                            <option data-cuenta="<?php echo $value->CTACONT ?>" <?php echo $selected ?>
                            value="<?php echo $value->ID ?>"><?php echo $value->IDTCSS ?></option>
                            <?php }  ?>
                          </select>

                       
                        <span class="fa fa-list-alt form-control-feedback left" aria-hidden="true"></span>
                      </div>
                       </div>

                      <div class="form-group">
                        <label for="CJ_banco" 
                        class="control-label col-md-4 col-sm-4 col-xs-12">Banco</label>
                      <div class="col-md-8 col-sm-8 col-xs-12 form-group has-feedback">

                      <select id="CJ_banco"  disabled="disabled"  class="form-control has-feedback-left disabled" required>
                            <?php 
                            foreach ($api2[0]->Bancos as $key => $value) { 
                              $selected='';
                                      if ($idbanco==$value->ID) {
                                        $selected='selected';
                                      }
                              ?>
                            <option data-cuenta="<?php echo $value->CUENTABANCO ?>" <?php echo $selected ?>
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
                        <input type="text"  disabled="disabled" class="form-control has-feedback-left disabled" id="CJ_cuentadeBanco" value="<?php echo $cuenta ?>" placeholder="Cuenta de Banco Asociada">
                        <span class="fa fa-list-alt form-control-feedback left" aria-hidden="true"></span>
                      </div>
                       </div>

                    <div class="form-group">
                        <label for="CJ_montodeldeposito" class="control-label col-md-4 col-sm-4 col-xs-12">Monto del deposito</label>
                      <div class="col-md-8 col-sm-8 col-xs-12 form-group has-feedback">
                        <input type="text" 
                        <?php if ($CANICHANGE=="FALSE"){ ?>
                        disabled="disabled"
                         <?php } ?>
                         maxlength="15" class="form-control has-feedback-left" value="<?php echo number_format($monto,2)?>"  id="CJ_montodeldeposito" placeholder="Monto del deposito">
                        <span class="fa fa-money form-control-feedback left" aria-hidden="true"></span>
                      </div>
                       </div>
                     
                        <div class="form-group">
                        <label for="CJ_Referencia" class="control-label col-md-4 col-sm-4 col-xs-12">Referencia</label>
                      <div class="col-md-8 col-sm-8 col-xs-12 form-group has-feedback">
                        <input type="text" value="<?php echo $referencia?>" maxlength="50"  disabled="disabled" class="form-control has-feedback-left disabled" id="CJ_Referencia" placeholder="Referencia">
                        <span class="fa fa-eye form-control-feedback left" aria-hidden="true"></span>
                      </div>
                       </div>
                       
                       <div class="form-group">
                        <label for="CJ_entidad" class="control-label col-md-4 col-sm-4 col-xs-12">Persona o entidad depositante</label>
                      <div class="col-md-8 col-sm-8 col-xs-12 form-group has-feedback">
                        <input type="text" value="<?php echo $entidad?>" class="form-control has-feedback-left disabled" id="CJ_entidad" placeholder="Persona o entidad depositante" disabled="disabled" >
                        <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                      </div>
                       </div>
                        <div class="form-group">
                        <label for="CJ_FolioCartaporte" class="control-label col-md-4 col-sm-4 col-xs-12">Folio Carta porte</label>
                      <div class="col-md-8 col-sm-8 col-xs-12 form-group has-feedback">
                        <input type="text" class="form-control has-feedback-left" id="CJ_FolioCartaporte" placeholder="Folio Carta porte" value="<?php echo $foliocarta?>"  maxlength="30"  >
                        <span class="fa fa-flash form-control-feedback left" aria-hidden="true"></span>
                      </div>
                       </div>
                       <div class="form-group">
                        <label for="CJ_FolioSello" class="control-label col-md-4 col-sm-4 col-xs-12">Folio Sello</label>
                      <div class="col-md-8 col-sm-8 col-xs-12 form-group has-feedback">
                        <input type="text" value="<?php echo $folioSello?>" maxlength="30" class="form-control has-feedback-left" id="CJ_FolioSello" placeholder="Folio Sello"   >
                        <span class="fa fa-flash form-control-feedback left" aria-hidden="true"></span>
                      </div>
                       </div>
                         <div class="form-group">
                        <label for="CJ_message2" class="control-label col-md-4 col-sm-4 col-xs-12">Observaciones (Opcional)</label>
                      <div class="col-md-8 col-sm-8 col-xs-12 form-group has-feedback">
                        <textarea class="form-control" id="CJ_message2" maxlength="2000" rows="3" placeholder='Observaciones (Opcional)'><?php echo $observaciones?></textarea>
                         
                      </div>
                       </div>

                     
                      <!-- <div class="form-group">
                        <label for="CJ_FechaDeposito" class="control-label col-md-4 col-sm-4 col-xs-12">Fecha Deposito</label>
                      <div class="col-md-8 col-sm-8 col-xs-12 form-group has-feedback">
                        <input type="text" value="<?php //echo $fechaoperacion?>" class="form-control has-feedback-left" id="CJ_FechaDeposito" placeholder="Fecha Deposito" maxlength="12"  >
                        <span class="fa fa-calendar form-control-feedback left" aria-hidden="true"></span>
                      </div>
                       </div>-->
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
                        <div class="col-md-10 col-sm-10 col-xs-12"></div>
                        <div class="col-md-2 col-sm-2 col-xs-12">
                          <!--<button type="button" class="btn btn-primary">Cancel</button>-->
              <!-- <button class="btn btn-primary" type="reset">Reset  <span class="fa fa-refresh"></span></button>-->
                          <button type="button" id="CJ_DepositoGuardar" class="btn btn-success">Guardar
                          <span class="fa fa-floppy-o"></span>
                          </button>
                        </div>
                      </div>

                    </form>
                 
                </div>
                </div>
                <div class="col-md-2 col-xs-2"> </div>
                </div>

                </div>
             
        
        <!-- end table -->
<script type="text/javascript" src="assets/Inputmask-4.x/dist/jquery.inputmask.bundle.js" charset="utf-8"></script>
        <script src="assets/gentelella-master/build/js/custom.js"></script>
 <!--<script src="assets/gentelella-master/build/js/custom_other.js"></script>-->
<style type="text/css">
  #CJ_montodeldeposito{ text-align: left !important; }
</style>
 <script  type="text/javascript" >
   $(document).ready(function(v) {

         
    $("#CJ_montodeldeposito").inputmask("currency", {//colorMask: true
  });

  $("#CJ_banco").change(function(index, el) {
   $("#CJ_cuentadeBanco").val( $( "#CJ_banco option:selected" ).data("cuenta"));
   // console.log($(this).data("cuenta"));
    console.log($( "#CJ_banco option:selected" ).data("cuenta"));
  });

 $("#CJ_Puntodecobranza").change(function(index, el) {
   $("#CJ_cuentadeBanco").val( $( "#CJ_Puntodecobranza option:selected" ).data("cuenta"));
   // console.log($(this).data("cuenta"));
    console.log($( "#CJ_Puntodecobranza option:selected" ).data("cuenta"));
  });

$("#CJ_DepositoGuardar").click(function(event) {
  
  var montoValor=<?php echo $MNTDEP?>;
    var puedecambiarmonto='<?php echo $CANICHANGE?>';

var montodeepsi =$("#CJ_montodeldeposito").val().trim(); 
    console.log(" montoValor MNTDEP  "+montoValor);
     //console.log(" montodeepsi  "+montodeepsi);

  //console.log(" montodeepsi  "+montodeepsi);
  var res = montodeepsi.replace("$", "");
  montodeepsi =  Number(res.replace(",", ""));
  console.log(" montodeepsi  "+montodeepsi);

  var id =<?php echo $idtdep?>;
 var puntoCobranza =$("#CJ_Puntodecobranza option:selected").val();
  var idbanco =$("#CJ_banco option:selected").val();
//var CuentaBanco =$("#cuentadeBanco").val().trim();
//var Monto =$("#montodeldeposito").val().trim();
//var Referencia =$("#Referencia").val().trim();
var FolioCarta =$("#CJ_FolioCartaporte").val().trim(); 
var FolioSello =$("#CJ_FolioSello").val().trim(); 
//var FechaDeposito =$("#CJ_FechaDeposito").val().trim(); 

var message2 =$("#CJ_message2").val().trim(); 

var FechaDeposito =0; 
 //new PNotify({ title: 'Alerta', text: 'Actualizar...!',type: 'success',styling: 'bootstrap3'});
 



   var r = confirm("¿Esta seguro de realizar esta accion?");
if (r == true) {
   // txt = "You pressed OK!";
                 if (puedecambiarmonto=="TRUE") {
               

              if (montodeepsi >= montoValor) {
                var Monto =montodeepsi;
                   var datos = {
                        "id":id,  
                      "puntoCobranza":puntoCobranza,
                      "idbanco":idbanco,
                      "Monto":Monto,
                      //"Referencia":Referencia,
                      "FolioCarta":FolioCarta,
                      "FolioSello":FolioSello,
                      "FechaDeposito":FechaDeposito,
                      "message":message2,
                      "puedecambiarmonto":puedecambiarmonto   
                         };
                  CJ_ActualizarDeposito (datos);
              }else{
                alert("El nuevo monto debe ser mayor a "+formatearNumero2(montoValor));
                new PNotify({  title: 'Alerta', text: 'Accion Cancelada', type: 'warning',styling: 'bootstrap3'                             });
              }


               }
               else  {
                 var Monto =montodeepsi;
                    var datos = {
                        "id":id,  
                      "puntoCobranza":puntoCobranza,
                      "idbanco":idbanco,
                      "Monto":Monto,
                      //"Referencia":Referencia,
                      "FolioCarta":FolioCarta,
                      "FolioSello":FolioSello,
                      "FechaDeposito":FechaDeposito,
                      "message":message2 ,
                       "puedecambiarmonto":puedecambiarmonto   
                         };
                  CJ_ActualizarDeposito (datos); 
               }


} else {
      new PNotify({  title: 'Alerta', text: 'Accion Cancelada', type: 'warning',styling: 'bootstrap3'                             });
}
  
 //console.log(datos);

});



   });

function formatearNumero2(nStr) {
  return parseFloat(nStr).toLocaleString('en') 
    
}

function CJ_ActualizarDeposito (datos){
 $.ajax({
      url : AjaxURL(),
    data : { action : "CJ_ActualizarDeposito",
    puntoCobranza:datos.puntoCobranza,
      id :datos.id,
    idbanco:datos.idbanco,
    Monto:datos.Monto,
    //Referencia:datos.Referencia,
    FolioCarta:datos.FolioCarta,
    FolioSello:datos.FolioSello,
    FechaDeposito:datos.FechaDeposito,
    message:datos.message,
     puedecambiarmonto:datos.puedecambiarmonto 
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
       $("#actDepo").click();
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

 </script>
<?php 
}
else{
  echo "Acceso no permitido...";
}
?>  