<?php 
if($data1){
      ?>   

<table id="datatable-responsive2" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                      <thead>
                        <tr>
                         <th>No</th>                      
                        <th>Punto de<br> cobranza</th>
                          <th>Cuenta de<br> banco</th>
                          <th>Monto del<br> deposito</th>
                          <th>Monto <br>Vinculado</th>
                          <th>Referencia</th>
                          <th>persona o entidad<br> depositante</th>
                          <th>Folio Carta<br> Porte</th>
                          <th>Folio Sello<br> Plastico</th>
                          <th>Fecha de<br> operacion</th>
                          <th>Fecha de<br> Creacion</th>
                          <th>Fecha de<br> Actualizacion</th>
                          <th>Estado</th>
                          <th>Vincular</th>
                          
                      </thead>
   <tbody>
                        	<?php foreach ($api[0]->Deposito as $key => $value) { ?>
                        	<tr class="enlace">
                           <th><?php echo $value->ID?></th>                      
                          <th><?php echo $value->Cobranza?></th> 
                         <th><?php echo $value->Banco?></th> 
                         <th><?php echo $value->Monto?></th> 
                         <th> </th>
                          <th><?php echo $value->referencia?>
                            <a href="" data-toggle="modal" class="modal<?php echo $value->ID+$value->referencia?>" data-value="<?php echo $value->ID+$value->referencia?>" data-target="#myModal" > Editar </a>
                            <script  type="text/javascript" >
                               $(document).ready(function(v) {
                              $(".modal<?php echo $value->ID+$value->referencia?>").click(function(event) {
                   new PNotify({ title: 'Alerta', text: 'Editar!',type: 'success',styling: 'bootstrap3'});
  
                              });

                              //loadLoginEntidadExterna();
                                     });
                            </script>

                          </th> 
                          <th> </th>
                          <th><?php echo $value->foliocarta?></th> 
                          <th><?php echo $value->folioSello?></th> 
                          <th><?php echo $value->fechaoperacion?></th> 
                          <th><?php echo $value->fechacreac?></th>
                         <th><?php echo $value->fechaauc?></th>
                           <th><?php echo $value->EDO?></th>
                           <th><a href="" data-toggle="modal" class="modal<?php echo $value->ID?>" data-value="<?php echo $value->ID?>" data-target="#myModal" > Vincular </a>
                           	<script  type="text/javascript" >
                           		 $(document).ready(function(v) {
                           		$(".modal<?php echo $value->ID?>").click(function(event) {
	  							// new PNotify({ title: 'Alerta', text: 'value!'+$(this).data('value'),type: 'success',styling: 'bootstrap3'});
  
															});

                           		loadLoginEntidadExterna();
                           					 });
                           	</script>
                           </th> 
                           </tr>
                             <?php } ?>
                      </tbody>
                    </table>

<script src="assets/gentelella-master/build/js/custom.js"></script>

 <script  type="text/javascript" >
   $(document).ready(function(v) {
    
   });


function validaAcceso (user, pass,  conex,idtcfd, uso){


 $.ajax({
      url : AjaxURL(),
    data : { action : "validaconexionUSO",user : user,pass : pass,conex : conex,idtcfd : idtcfd,uso : uso},
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
     else if (json.API[0].update=="ok"){
      //console.log(json.API[0].update);
       alert("Datos Actualizados");
     }else{
        //console.log(json.API[0].update);
         alert("Error: "+json.API[0].update);
     }
      //$(".modal_CambiarUso").html(html);
      //$(".txtUso").html(usoselectName);
 
    },
 

    error : function(xhr, status) {
       alert('Disculpe, existió un problema al validar Acceso');
       //$("#testuno").html('');
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