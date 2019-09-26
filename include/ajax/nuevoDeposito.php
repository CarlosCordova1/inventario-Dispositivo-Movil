<?php 
if($data1){
      ?>   


<div class="container">
  <ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="#nuevo">Nuevo</a></li>
    <li><a data-toggle="tab" href="#menueditar">editar</a></li>
  </ul>

  <div class="tab-content">
    <div id="nuevo" class="tab-pane fade in active">
      <h3>Crear nuevo deposito</h3>
      <div class="row">
              <div class="col-md-3 col-xs-3"> </div>
              
              <div class="col-md-6 col-xs-12">            
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
                    <br />
                    <form class="form-horizontal form-label-left input_mask">
                        <div class="form-group">
                        <label for="Puntodecobranza" class="control-label col-md-4 col-sm-4 col-xs-12">Punto de cobranza</label>
                      <div class="col-md-8 col-sm-8 col-xs-12 form-group has-feedback">
                        <input type="text" class="form-control has-feedback-left" id="Puntodecobranza" placeholder="Punto de cobranza">
                        <span class="fa fa-list-alt form-control-feedback left" aria-hidden="true"></span>
                      </div>
                       </div>
                     
                      <div class="form-group">
                        <label for="cuentadeBanco" class="control-label col-md-4 col-sm-4 col-xs-12">Cuenta de Banco Asociada</label>
                      <div class="col-md-8 col-sm-8 col-xs-12 form-group has-feedback">
                        <input type="text" class="form-control has-feedback-left" id="cuentadeBanco" placeholder="Cuenta de Banco Asociada">
                        <span class="fa fa-list-alt form-control-feedback left" aria-hidden="true"></span>
                      </div>
                       </div>

                    <div class="form-group">
                        <label for="montodeldeposito" class="control-label col-md-4 col-sm-4 col-xs-12">Monto del deposito</label>
                      <div class="col-md-8 col-sm-8 col-xs-12 form-group has-feedback">
                        <input type="text"  maxlength="15" class="form-control has-feedback-left" id="montodeldeposito" placeholder="Monto del deposito">
                        <span class="fa fa-money form-control-feedback left" aria-hidden="true"></span>
                      </div>
                       </div>
                     
                   <div class="form-group">
                        <label for="Referencia" class="control-label col-md-4 col-sm-4 col-xs-12">Referencia</label>
                      <div class="col-md-8 col-sm-8 col-xs-12 form-group has-feedback">
                        <input type="text"  maxlength="50" class="form-control has-feedback-left" id="Referencia" placeholder="Referencia">
                        <span class="fa fa-eye form-control-feedback left" aria-hidden="true"></span>
                      </div>
                       </div>
                       <div class="form-group">
                        <label for="entidad" class="control-label col-md-4 col-sm-4 col-xs-12">Persona o entidad depositante</label>
                      <div class="col-md-8 col-sm-8 col-xs-12 form-group has-feedback">
                        <input type="text" class="form-control has-feedback-left disabled" id="entidad" placeholder="Persona o entidad depositante" disabled="disabled" >
                        <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                      </div>
                       </div>
                        <div class="form-group">
                        <label for="FolioCartaporte" class="control-label col-md-4 col-sm-4 col-xs-12">Folio Carta porte</label>
                      <div class="col-md-8 col-sm-8 col-xs-12 form-group has-feedback">
                        <input type="text" class="form-control has-feedback-left" id="FolioCartaporte" placeholder="Folio Carta porte"  maxlength="30"  >
                        <span class="fa fa-flash form-control-feedback left" aria-hidden="true"></span>
                      </div>
                       </div>
                       <div class="form-group">
                        <label for="FolioSello" class="control-label col-md-4 col-sm-4 col-xs-12">Folio Sello</label>
                      <div class="col-md-8 col-sm-8 col-xs-12 form-group has-feedback">
                        <input type="text"  maxlength="30" class="form-control has-feedback-left" id="FolioSello" placeholder="Folio Sello"   >
                        <span class="fa fa-flash form-control-feedback left" aria-hidden="true"></span>
                      </div>
                       </div>
                       <div class="form-group">
                        <label for="FechaDeposito" class="control-label col-md-4 col-sm-4 col-xs-12">Fecha Deposito</label>
                      <div class="col-md-8 col-sm-8 col-xs-12 form-group has-feedback">
                        <input type="text" class="form-control has-feedback-left" id="FechaDeposito" placeholder="Fecha Deposito" maxlength="12"  >
                        <span class="fa fa-calendar form-control-feedback left" aria-hidden="true"></span>
                      </div>
                       </div>
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
                        <div class="col-md-6 col-sm-6 col-xs-12"></div>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <!--<button type="button" class="btn btn-primary">Cancel</button>-->
               <button class="btn btn-primary" type="reset">Reset  <span class="fa fa-refresh"></span></button>
                          <button type="button" id="guardarNuevoDeposito" class="btn btn-success">Guardar
                          <span class="fa fa-floppy-o"></span>
                          </button>
                        </div>
                      </div>

                    </form>
                  </div>
                </div>
                </div>
                <div class="col-md-3 col-xs-3"> </div>
                </div>
    </div> <!--end nuevo menu-->
    <div id="menueditar" class="tab-pane fade">
      <h3>Editar deposito</h3>
      <div class="row">
              <div class="col-md-3 col-xs-3"> </div>
              
              <div class="col-md-6 col-xs-12">            
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


                          

<div class="input-group">
                  <input id="numdeposito" type="number" value="" min="0" max="999999" maxlength="999999" size="6"  class="form-control" placeholder="Buscar Deposito...">
                    <span class="input-group-btn">
                      <button id="buscarDeposito"  class="btn btn-default" type="button"><i class="fa fa-search"></i></button>
                    </span>
                  </div>

     




                  </div>
                  <div class="x_content">
                   <form class="form-horizontal form-label-left input_mask">
                        <div class="form-group">
                        <label for="EditPuntodecobranza" class="control-label col-md-4 col-sm-4 col-xs-12">Punto de cobranza</label>
                      <div class="col-md-8 col-sm-8 col-xs-12 form-group has-feedback">
                        <input type="text" class="form-control has-feedback-left" id="EditPuntodecobranza" placeholder="Punto de cobranza">
                        <span class="fa fa-list-alt form-control-feedback left" aria-hidden="true"></span>
                      </div>
                       </div>
                     
                      <div class="form-group">
                        <label for="EditcuentadeBanco" class="control-label col-md-4 col-sm-4 col-xs-12">Cuenta de Banco Asociada</label>
                      <div class="col-md-8 col-sm-8 col-xs-12 form-group has-feedback">
                        <input type="text" class="form-control has-feedback-left" id="EditcuentadeBanco" placeholder="Cuenta de Banco Asociada">
                        <span class="fa fa-list-alt form-control-feedback left" aria-hidden="true"></span>
                      </div>
                       </div>

                    <div class="form-group">
                        <label for="Editmontodeldeposito" class="control-label col-md-4 col-sm-4 col-xs-12">Monto del deposito</label>
                      <div class="col-md-8 col-sm-8 col-xs-12 form-group has-feedback">
                        <input type="text"  maxlength="15" class="form-control has-feedback-left" id="Editmontodeldeposito" placeholder="Monto del deposito">
                        <span class="fa fa-money form-control-feedback left" aria-hidden="true"></span>
                      </div>
                       </div>
                     
                   <div class="form-group">
                        <label for="EditReferencia" class="control-label col-md-4 col-sm-4 col-xs-12">Referencia</label>
                      <div class="col-md-8 col-sm-8 col-xs-12 form-group has-feedback">
                        <input type="text"  maxlength="50" class="form-control has-feedback-left" id="EditReferencia" placeholder="Referencia">
                        <span class="fa fa-eye form-control-feedback left" aria-hidden="true"></span>
                      </div>
                       </div>
                       <div class="form-group">
                        <label for="Editentidad" class="control-label col-md-4 col-sm-4 col-xs-12">Persona o entidad depositante</label>
                      <div class="col-md-8 col-sm-8 col-xs-12 form-group has-feedback">
                        <input type="text" class="form-control has-feedback-left disabled" id="Editentidad" placeholder="Persona o entidad depositante" disabled="disabled" >
                        <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                      </div>
                       </div>
                        <div class="form-group">
                        <label for="EditFolioCartaporte" class="control-label col-md-4 col-sm-4 col-xs-12">Folio Carta porte</label>
                      <div class="col-md-8 col-sm-8 col-xs-12 form-group has-feedback">
                        <input type="text" class="form-control has-feedback-left" id="EditFolioCartaporte" placeholder="Folio Carta porte"  maxlength="30"  >
                        <span class="fa fa-flash form-control-feedback left" aria-hidden="true"></span>
                      </div>
                       </div>
                       <div class="form-group">
                        <label for="EditFolioSello" class="control-label col-md-4 col-sm-4 col-xs-12">Folio Sello</label>
                      <div class="col-md-8 col-sm-8 col-xs-12 form-group has-feedback">
                        <input type="text"  maxlength="30" class="form-control has-feedback-left" id="EditFolioSello" placeholder="Folio Sello"   >
                        <span class="fa fa-flash form-control-feedback left" aria-hidden="true"></span>
                      </div>
                       </div>
                       <div class="form-group">
                        <label for="EditFechaDeposito" class="control-label col-md-4 col-sm-4 col-xs-12">Fecha Deposito</label>
                      <div class="col-md-8 col-sm-8 col-xs-12 form-group has-feedback">
                        <input type="text" class="form-control has-feedback-left" id="EditFechaDeposito" placeholder="Fecha Deposito" maxlength="12"  >
                        <span class="fa fa-calendar form-control-feedback left" aria-hidden="true"></span>
                      </div>
                       </div>
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
                        <div class="col-md-6 col-sm-6 col-xs-12"></div>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <!--<button type="button" class="btn btn-primary">Cancel</button>-->
               <button class="btn btn-primary" type="reset">Reset  <span class="fa fa-refresh"></span></button>
                          <button type="button" id="EditDeposito" class="btn btn-success">Editar
                          <span class="fa fa fa-edit"></span>
                          </button>
                        </div>
                      </div>

                    </form>
                  </div>
                </div>
                </div>
                <div class="col-md-3 col-xs-3"> </div>
                </div>
    </div><!--end menueditar-->
    
  </div>
</div>






<script src="assets/gentelella-master/build/js/custom.js"></script>
 <script  type="text/javascript" >
   $(document).ready(function(v) {
     


$("#guardarNuevoDeposito").click(function(event) {
  /* Act on the event */
 var puntoCobranza =$("#Puntodecobranza").val().trim();
var CuentaBanco =$("#cuentadeBanco").val().trim();
var Monto =$("#montodeldeposito").val().trim();
var Referencia =$("#Referencia").val().trim();
var FolioCarta =$("#FolioCartaporte").val().trim(); 
var FolioSello =$("#FolioSello").val().trim(); 
var FechaDeposito =$("#FechaDeposito").val().trim(); 
 new PNotify({ title: 'Alerta', text: 'guardar!',type: 'success',styling: 'bootstrap3'});
 
 var datos = {
    
"puntoCobranza":puntoCobranza,
"CuentaBanco":CuentaBanco,
"Monto":Monto,
"Referencia":Referencia,
"FolioCarta":FolioCarta,
"FolioSello":FolioSello,
"FechaDeposito":FechaDeposito
   
   };
  agregarDeposito (datos); 

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
 
  BuscarDeposito (numdeposito); 

});

$( "#numdeposito" ).keypress(function(e) {
  if(e.which == 13) {
    $("#buscarDeposito").click();
        event.preventDefault();
    }

});
 $("#numdeposito").focus();



   });


function agregarDeposito (datos){
 $.ajax({
      url : AjaxURL(),
    data : { action : "agregarDeposito",
    puntoCobranza:datos.puntoCobranza,
    CuentaBanco:datos.CuentaBanco,
    Monto:datos.Monto,
    Referencia:datos.Referencia,
    FolioCarta:datos.FolioCarta,
    FolioSello:datos.FolioSello,
    FechaDeposito:datos.FechaDeposito
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