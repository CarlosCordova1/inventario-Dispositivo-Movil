<?php 
if($data1){
      ?>   
     
     
                <div class="x_panel">
                  <div class="x_title">
                    <div class="clearfix"></div>
                  </div>

                  <div class="x_content vinculardeposito">
                    <div class="table-responsive">

  <div id="myCarousel" class="carousel slide refrescaevento" data-ride="carousel"  data-pause="true">
    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">

      <div class="item active">
          <table   class="table table-striped table-bordered bulk_action2 datatable-checkbox">
                      <thead>
                        <tr>
                          <th>
               <th><input type="checkbox"   class="flat check-all"></th>
              </th>
                          <th class="column-title">Lote</th>
                           <th class="column-title">Modo Pago</th>
                            <th class="column-title">Numero <br>de pagos</th>
                            <th class="column-title">Total</th>
							 <th class="column-title">Saldo</th>
                <th class="column-title no-link last"><span class="nobr">Ver detalle</span></th>
                        </tr>
                      </thead>
                      <tbody>
                       <?php
                       $sumavin=0;
                        foreach ($api[0]->Lotes as $key => $value) { ?>
                          <tr class="">
                           <td>
               <th><input type="checkbox" name='table_records' 
                <?php if ($value->IDTDEP!="") {
                  echo 'checked';
                  $sumavin+=$value->SUMA;
                }?>
                value="<?php echo $value->IDTLTE?>"
                data-suma="<?php echo $value->SUMA?>"
                 data-entidad="<?php echo $value->IDTEEX?>"
                 class="flat"></th>
              </td>
                             
                            <td class=" "><?php echo $value->IDTLTE?></td>
                             <td class=" "><?php echo $value->ENTIDAD?></td>
                            <td class="  "><?php echo number_format($value->total,0)?></td>
                            <td class="  ">$<?php echo number_format($value->SUMA,2)?></td>
							 <td class="  ">$<?php echo number_format($value->saldo,2)?></td>
                            <td class=" last"><a class="parcialvincula" 
                              href="#myCarousel"
                               data-value="<?php echo $value->IDTLTE?>"
                               data-totalpagos="<?php echo $value->total?>" 
                                role="button" data-slide="next">ver detalle <i class="fa fa-forward"></i></a></td>
                          </tr>
                      <?php } ?>
                        <tr class="" style="border: 0px solid #FFF !important;">
                           <td style="border: 0px solid #FFF !important;">
               <th style="border: 0px solid #FFF !important;">Suma: </th>
                        </td>
                             
                            <td class="showsuma" data-total="<?php echo $sumavin?>" style="border: 0px solid #FFF !important;">$<?php echo number_format($sumavin,2)?></td>
                            <td class=" " style="border: 0px solid #FFF !important;">Monto deposito:</td>
                            <td class="showsumaMonto" data-monto="<?php echo $monto?>" style="border: 0px solid #FFF !important;">$<?php echo number_format($monto,2)?></td>
                            <td class="  " style="border: 0px solid #FFF !important;"> </td>
                            <td class="  " style="border: 0px solid #FFF !important;"> </td>
                            <td class="  " style="border: 0px solid #FFF !important;"> </td>
                           
                          </tr>



                      </tbody>
                    </table>
      </div>

      <div class="item">
     <div class="page-title">   
  <div class="col-sm-2">
    <a class="btn btn-default regresarbtn" href="#myCarousel" role="button" data-slide="prev">
           <span class=""> <i class="fa fa-backward"></i> Regresar</span>
              </a>
<br>
            </div>
<div class="col-sm-5"> </div>
  <div class="col-sm-5"> </div>
  <br>
</div>
 <div class="clearfix"></div>
            <div class="showPAgosDelotes"></div>
         </div>

    <!-- Left and right controls -->
  <!--  <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a> -->
  </div>


                    </div>
              
            
                  </div>
                </div>
             
        
        <!-- end table -->

        <script src="assets/gentelella-master/build/js/custom.js"></script>
 <!--<script src="assets/gentelella-master/build/js/custom_other.js"></script>-->

 <script  type="text/javascript" >
   $(document).ready(function(v) {
   var deposito='<?php echo $identificador?>';
   var monto='<?php echo $monto?>';
$('.vinculardeposito').on('ifChecked','.bulk_action2 input.check-all', function () {
   //alert("ifUnchecked all -- > Lote -- >"+$(this).val());
    Checked("all");
});
$('.vinculardeposito').on('ifUnchecked','.bulk_action2 input.check-all', function () {
    //alert("ifChecked  all -- > Lote -- >"+$(this).val());
    Checked("none");
});

  $('.vinculardeposito').on('ifUnchecked','.bulk_action2 input', function () {
     //  alert("ifUnchecked  -- > Lote -- >"+$(this).val()+ " Suma -- >"+$(this).data("suma"));
    //$(this).parent().parent().parent().removeClass('selected');
    if ($(this).val()!="on") {
var total=  parseFloat($(".showsuma").data("total")).toFixed(2);
     var suma=  parseFloat($(this).data("suma")).toFixed(2);
     var identidad= $(this).data("entidad");
     $(".showsuma").html("$ "+formatearNumero(Number(total)-Number(suma)));
      $(".showsuma").data("total",Number(total)-Number(suma));
      cambiarStatusVincualdo(deposito,$(this).val(),"false","Desvinculado",identidad);
    }
    
    
});
$('.vinculardeposito').on('ifChecked','.bulk_action2 input', function () {
     // alert("ifChecked  -- > Lote -- >"+$(this).val()+ " Suma -- >"+$(this).data("suma"));
     
if ($(this).val()!="on") {
  var identidad= $(this).data("entidad");
     var total=  parseFloat($(".showsuma").data("total")).toFixed(2);
     var suma=  parseFloat($(this).data("suma")).toFixed(2);
    
     $(".showsuma").html("$ "+formatearNumero(Number(total)+Number(suma)));
      $(".showsuma").data("total",Number(total)+Number(suma));
      cambiarStatusVincualdo(deposito,$(this).val(),"true","Vinculado",identidad);
    }
});


$("body").on('click','.parcialvincula',function(event) {
  loadLoteDetalle($(this).data("value"), $(this).data("totalpagos"));
});


$("body").on("click",".regresarbtn",function(event) {
//alert($(this).data("value"));
loadModalVicular(deposito,monto);// tambien esta definido en init.js con la clase principal que carha el modal
});
/*
var cuenta=0;
$("body").on("click",".refrescaevento",function(event) {
  console.log(cuenta++);
        $('.datatable-checkbox').iCheck({
                checkboxClass: 'icheckbox_flat-green',
                radioClass: 'iradio_flat-green'
            });
   
  //init_DataTables();
   // init_DataTables2();

});
*/

   });//end document ready

function Checked(checkState) {
    if (checkState === 'all') {
        $(".bulk_action2 input[name='table_records']").iCheck('check');
    }
    if (checkState === 'none') {
        $(".bulk_action2 input[name='table_records']").iCheck('uncheck');
    }
}
function formatearNumero(nStr) {
  return parseFloat(nStr).toLocaleString('en') 
    
}

//------------------------------------------
function cambiarStatusVincualdo(idDeposito,idlote,checked,descripcion,idEntidad){
  $.ajax({
      url : AjaxURL(),
    data : { action : "vincularloteEca",
    idDeposito: idDeposito ,
    idlote: idlote ,
    checked: checked,
    idEntidad:idEntidad },
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
      if (checked=="true") {
         var a=new PNotify({title: 'Lote '+idlote+" "+descripcion, type: 'success', styling: 'bootstrap3'});
      }else{
         var a=new PNotify({title: 'Lote '+idlote+" "+descripcion, type: 'warning', styling: 'bootstrap3'});
      }
  
 
   

 
    },
     error : function(xhr, status) {
      //  $(".loginmain").html('Disculpe, existió un problema al mostrar login');
      var a=new PNotify({title: 'Error al vincular', type: 'error', styling: 'bootstrap3'});
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