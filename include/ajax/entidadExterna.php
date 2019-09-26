<?php 
if($data1){
  date_default_timezone_set('America/Cancun');
      ?>   


<div class="container">
  <ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="#nuevo">Deposito</a></li>
    <li><a data-toggle="tab" href="#menueditar">Nuevo Deposito</a></li>
  </ul>

  <div class="tab-content">
    <div id="nuevo" class="tab-pane fade in active">
      <h3>Tipo de depositos</h3>
    
  <!--  <table   class="table table-striped table-bordered dt-responsive nowrap datatable-responsive datatable-buttons" cellspacing="0" width="100%">-->
      <table  class="table table-striped table-bordered datatable-buttons nowrap" cellspacing="0" width="100%">

                      <thead>
                        <tr>
                         <th >No</th> 
                         <th>Tipo <br> deposito</th>                      
                        <th>Punto de<br> cobranza</th>
                          <th>Cuenta<br> Banco</th>
                         <!-- <th>CTACONT</th>-->
                          <th>Monto del<br> deposito</th>
                          <th>Monto <br>Vinculado</th>
                          <th>Referencia</th>
                          <th>Agente</th>
                           <th>Folio Carta<br> Porte</th>
                          <th>Folio Sello<br> Plastico</th> 
                          <th>Fecha de<br> operacion</th>
                          <th>Fecha de<br> Creacion</th>
                          <th>Fecha de<br> Actualizacion</th>
                          <th>Estado</th>
                          <th>Editar</th>
                          <th>Imprimir</th>
                          <th>Vincular</th>
                          <th>Observaciones</th>
                          </tr>
                      </thead>
   <tbody>
                          <?php 
                             foreach ($val as  $seccion) {
                          foreach ($seccion[0]->Deposito as $key => $value) { ?>
                          <tr class="enlace">
                           <th><?php echo $value->ID?></th>
                           <th>
                             <?php 
                              //temp.put('DTV',ind.DTV);
                             //  temp.put('DST',ind.DST);
                           if($value->TPODEP=="EEX"){echo '<p data-toggle="tooltip" data-placement="bottom" title="Entidad Externa" >  '. $value->TPODEP .'</p>';}
                           else if($value->TPODEP=="CAT"){echo '<p data-toggle="tooltip" data-placement="bottom" title="Cajero automatico" >  '. $value->TPODEP .'</p>';}
                           else if($value->TPODEP=="DTV"){echo '<p data-toggle="tooltip" data-placement="bottom" title="Depósitos para trasportar valor" >  '. $value->TPODEP .'</p>';}
                            else if($value->TPODEP=="DST"){echo '<p data-toggle="tooltip" data-placement="bottom" title="Reg de deposito pago efectuado" >  '. $value->TPODEP .'</p>';}
                                else{
                              echo $value->TPODEP;
                            }
                           ?>
                           </th>                       
                          <th><?php echo $value->Cobranza?></th> 
                         <th><?php echo $value->CUENTABANCO?></th> 
                         <!--<th><?php //echo $value->CTACONT?></th> -->
                         <th><?php echo number_format($value->Monto,2)?></th> 
                        <th><?php echo  number_format($value->MontoVinculado,2)?></th> 
                          <th><?php echo $value->referencia?></th> 
                          <th><p data-toggle="tooltip" data-placement="bottom" title="<?php echo $value->depositante?>" > <?php echo $value->agente?> </p> </th>
                           <th><?php echo $value->foliocarta?></th> 
                          <th><?php echo $value->folioSello?></th>  
                          <th><?php echo $value->fechaoperacion?></th> 
                          <th><?php echo $value->fechacreac?></th>
                         <th><?php echo $value->fechaauc?></th>
                           <th><?php echo $value->EDO?></th>
                             <th>
                            <a href="#" data-toggle="modal"  
                                id="editarDepositoEntidadExterna"
                            data-idtdep="<?php echo $value->ID?>" 
                           data-idpuntocobro="<?php echo $value->IDpuntocobro?>" 
                           data-monto="<?php echo $value->Monto?>"
                           data-montovinculado="<?php echo $value->MontoVinculado?>"
                           data-referencia="<?php echo $value->referencia?>" 
                           data-entidad="<?php echo $value->depositante?>" 
                           data-fechaoperacion="<?php echo $value->fechaoperacion?>"
                           data-idbanco="<?php echo $value->IDBANCO?>"
                           data-cuenta="<?php echo $value->CTACONT?>"
                            data-foliocarta="<?php echo $value->foliocarta?>" 
                            data-folioSello="<?php echo $value->folioSello?>"
                            data-tipodeposito="<?php echo $value->TPODEP?>"
                            data-observaciones="<?php echo $value->OBSERVACIONES?>"
                            data-estado="<?php echo $value->EDO?>"
                             

                             data-target="#myModalEditar_cajera" > Editar </a>
                          
                           </th> 

                          <th>
                            <?php 
                              //CTV
                              //CAT
                              //DTV
                            if ($value->TPODEP=="CTV" || $value->TPODEP=="CAT" || $value->TPODEP=="DTV") { ?>
                            <a class="imprimir" href="#" data-toggle="modal" 
                            data-imprimir="<?php echo $value->ID?>" 
                            data-target="#myModalFicha" > Imprimir </a>
                            <?php } ?>
                             </th>

                           <th >
                            <?php if($value->TPODEP=="EEX") {?>
                            <a href="#"                            
                             data-toggle="modal" 
                             class="VincularDepositoEntidadExterna"
                              data-value="<?php echo $value->ID?>"
                               data-montodeposito="<?php echo $value->Monto?>" 
                              data-target="#myModal" > Vincular </a>
                           <?php } ?>
                           </th> 

                           <th>
                            <p data-toggle="tooltip" data-placement="bottom" title="<?php echo substr($value->OBSERVACIONES,0,100)?>" >
                            <?php echo  $value->OBSERVACIONES?> </p></th>
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
                   <form class="form-horizontal form-label-left input_mask">

                       <div class="form-group">
                        <label for="tipodeposito" class="control-label col-md-4 col-sm-4 col-xs-12">Tipo de deposito</label>
                      <div class="col-md-8 col-sm-8 col-xs-12 form-group has-feedback">
                         <select id="tipodeposito" class="form-control has-feedback-left" required>
                          <option     value="0">--</option>
                          <?php
                            if($perm->permisos[0]->servicios->ref->admin==1){
                           ?>
                           <option     value="CAT"> Cajero automatico </option>
                           <option     value="DTV"> Depósitos para trasportar valor (Morralla)</option>
                           <option     value="DST"> Reg de deposito pago efectuado </option>
                          <?php /* ?> <option     value="EEX"> Entidad Externa </option>
                           <?php */ ?>
                                 <?php }
                                 else if ($perm->permisos[0]->servicios->ref->operativo==1) {
                                   ?> 
                                    <option     value="CAT"> Cajero automatico </option>
                           <option     value="DTV"> Depósitos para trasportar valor (Morralla)</option>
                                   <?php
                                 }
                                 ?>                       
                          </select>

                       
                        <span class="fa fa-list-alt form-control-feedback left" aria-hidden="true"></span>
                      </div>
                       </div>




                        <div class="form-group">
                        <label for="Puntodecobranza" class="control-label col-md-4 col-sm-4 col-xs-12">Punto de cobranza</label>
                      <div class="col-md-8 col-sm-8 col-xs-12 form-group has-feedback">
                         <select id="Puntodecobranza" class="form-control has-feedback-left" required>
                          <option data-cuenta="0"   value="0">--</option>
                            <?php 
                            foreach ($PuntoCobranza[0]->PuntoCobranza as $key => $value) { 
                             
                              ?>
                            <option data-cuenta="<?php echo $value->CTACONT ?>" 
                              data-idcuenta="<?php echo $value->IDTCBN ?>" 
                              <?php echo $selected ?>
                            value="<?php echo $value->ID ?>"><?php echo $value->IDTCSS." (".$value->UBICACION .")"?></option>
                            <?php }  ?>
                          </select>

                       
                        <span class="fa fa-list-alt form-control-feedback left" aria-hidden="true"></span>
                      </div>
                       </div>

                     
                    <div class="form-group">
                        <label for="Puntobanco" class="control-label col-md-4 col-sm-4 col-xs-12">Banco</label>
                      <div class="col-md-8 col-sm-8 col-xs-12 form-group has-feedback">
                         <select id="Puntobanco" disabled="disabled" class="form-control has-feedback-left disabled" required>
                          <option data-cuenta="0"   value="0">--</option>
                            <?php 
                            foreach ($banco[0]->Bancos as $key => $value) { 
                                                           ?>
                             <option data-cuenta="<?php echo $value->CTACONT ?>" 
                            value="<?php echo $value->ID ?>"><?php echo $value->cuenta ?>
                                -- <?php echo $value->TPOCTA ?>
                            </option>
                            <?php }  ?>
                          </select>

                       
                        <span class="fa fa-list-alt form-control-feedback left" aria-hidden="true"></span>
                      </div>
                       </div>
                  

                      <div class="form-group">
                        <label for="cuentadeBanco" class="control-label col-md-4 col-sm-4 col-xs-12">Cuenta de Banco Asociada</label>
                      <div class="col-md-8 col-sm-8 col-xs-12 form-group has-feedback">
                        <input type="text" disabled="disabled" class="form-control has-feedback-left disabled" id="cuentadeBanco" placeholder="Cuenta de Banco Asociada">
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
                        <input type="text"  maxlength="100" class="form-control has-feedback-left" id="Referencia" placeholder="Referencia">
                        <span class="fa fa-eye form-control-feedback left" aria-hidden="true"></span>
                      </div>
                       </div>
                        
                        <div class="form-group">
                        <label for="Referencia2" class="control-label col-md-4 col-sm-4 col-xs-12">Confirmar Referencia</label>
                      <div class="col-md-8 col-sm-8 col-xs-12 form-group has-feedback">
                        <input type="text"  maxlength="100" class="form-control has-feedback-left" id="Referencia2" placeholder="Confirmar Referencia">
                        <span class="fa fa-eye form-control-feedback left" aria-hidden="true"></span>
                      </div>
                       </div>

                       <div class="form-group">
                        <label for="entidad" class="control-label col-md-4 col-sm-4 col-xs-12">Persona o entidad depositante</label>
                      <div class="col-md-8 col-sm-8 col-xs-12 form-group has-feedback">
                        <input type="text" disabled="disabled" value="<?php echo $perm->permisos[0]->display_name?>" class="form-control has-feedback-left disabled" id="entidad" placeholder="Persona o entidad depositante"  maxlength="50"  >
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
                        <label for="FechaDeposito"  class="control-label col-md-4 col-sm-4 col-xs-12">Fecha Deposito</label>
                      <div class="col-md-8 col-sm-8 col-xs-12 form-group has-feedback">
                        <input type="text" value="<?php echo date("d/m/Y H:i:s")?>" class="form-control has-feedback-left date"  id="FechaDeposito" placeholder="Fecha Deposito" maxlength="12"  >
                        <span class="fa fa-calendar form-control-feedback left" aria-hidden="true"></span>
                      </div>
                       </div>

                       <div class="form-group">
                        <label for="message" class="control-label col-md-4 col-sm-4 col-xs-12">Observaciones (Opcional)</label>
                      <div class="col-md-8 col-sm-8 col-xs-12 form-group has-feedback">
                        <textarea class="form-control" id="message" maxlength="2000" rows="3" placeholder='Observaciones (Opcional)'></textarea>
                         
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
                        <div class="col-md-8 col-sm-8 col-xs-12"></div>
                        <div class="col-md-4 col-sm-4 col-xs-12">
                          <!--<button type="button" class="btn btn-primary">Cancel</button>-->
               <button class="btn btn-primary" id="resetNuevo" type="reset">Reset  <span class="fa fa-refresh"></span></button>
                          <button type="button" id="guardarNuevoDeposito" class="btn btn-success">Guardar
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