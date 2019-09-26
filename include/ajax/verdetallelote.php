<?php 
if($data1){
      ?>   
     
<!-- table -->
      
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
                          <th class="column-title">LOTE</th>
                          <th class="column-title">DEPOSITO</th>
						   <th class="column-title">CLIENTE</th>
						    <th class="column-title">FORMAPAGO</th>
							 <th class="column-title">MODELOFACTURA</th>
							  <th class="column-title">FACTURA</th>
                            <th class="column-title">TOTAL</th>
							 <th class="column-title">PAGO</th>
							 <th class="column-title">IMPORTEPAGO</th>
							 <th class="column-title">ESTADO</th>
                           
                        </tr>
                      </thead>
                      <tbody>
                       <?php
                       $sumavin=0;
                        foreach ($api[0]->Lotes as $key => $value) { ?>
                          <tr class="">
                            <td class=" "><?php echo $value->LOTE?></td>
							<td class=" "><?php echo $value->DEPOSITO?></td>
							<td class=" "><?php echo $value->CLIENTE?></td>
							<td class=" "><?php echo $value->FORMAPAGO?></td>
							<td class=" "><?php echo $value->MODELOFACTURA?></td>
							<td class=" "><?php echo $value->FACTURA?></td>
							<td class="  "><?php echo number_format($value->TOTAL,2)?></td>
							 
							<td class=" "><?php echo $value->PAGO?></td>
							<td class="  ">$<?php echo number_format($value->IMPORTEPAGO,2)?></td>
							<td class=" "><?php echo $value->ESTADO?></td> 
                             
                          </tr>
                      <?php } ?>
                      



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