<?php 
if($data1){
//echo "<br>idtcfd  ".$idtcfd; 
//echo "<br>uso  ".$uso; 
      ?>   

<div class="col-md-3 col-xs-12"> </div>
<div class="col-md-6 col-xs-12"> 
                   <div class="logo"></div>
<div class="login-block">
    <!--<h3>Permisos</h3>-->
   <!--  <h3> Uso:  <b class="txtUso"></b> </h3>-->

   <div class="row x_panel ">
            
                   <div class="x_title">
                   <h2>Folio: <?php echo $idasignacion?></h2>
                    <div class="clearfix"></div>
                </div>
             <div class="x_panel ">

                    

       <div class="row">
          <div class="col-md-12 col-xs-12">
          <div class="form-group">
                        <label for="dm_m_status2" class="control-label col-md-4 col-sm-4 col-xs-12">Estatus entrega</label>
                      <div class="col-md-8 col-sm-8 col-xs-12 form-group has-feedback">
                         <select id="dm_m_status2"   class="form-control has-feedback-left equipotext " required>
                          <option data-cuenta="0"   value="0">--</option>
                            <?php 
                            foreach ($carcamos[0]->estatus as $key => $value) { 
                                  ?>
                             <option data-cuenta="<?php echo $value->idtvar?>" 
                               
                            value="<?php echo $value->idtvar ?>"><?php echo $value->valor ?>
                             
                            </option>
                            <?php }  ?>
                          </select>

                       
                        <span class="fa fa-list-alt form-control-feedback left" aria-hidden="true"></span>
                      </div>
                       </div>

</div>
    </div><br>  
   <div class="row">
    <div class="col-md-12 col-xs-12">    
                                               <div class="form-group">
                        <label for="message3" class="control-label col-md-4 col-sm-4 col-xs-12">Observaciones (Opcional)</label>
                      <div class="col-md-8 col-sm-8 col-xs-12 form-group has-feedback">
                        <textarea class="form-control" id="message3" maxlength="300" rows="3" placeholder='Observaciones (Opcional)'></textarea>
                         
                      </div>
                       </div></div>
    </div><br>
  
   





 <div class="row">
    
     <div class="col-md-12 col-xs-12"> 
      <!--<button type="submit" id="loginREF" class="btn btn-primary" >Desasin</button>-->
       <button type="button" id="guardardesasignacion" class="btn btn-success pull-right">Guardar
                          <span class="fa fa-floppy-o"></span>
                          </button>
    </div> 

    </div>  
    
</div>

  </div>
     </div>

</div>
<div class="col-md-3 col-xs-12"> </div>




 <script src="assets/gentelella-master/build/js/custom.js"></script>

 <script  type="text/javascript" >
   $(document).ready(function(v) {

   // $("#REFpassuser").focus();
$("#guardardesasignacion").click(function(event) {
  var id="<?php echo $idasignacion?>";
  var equipo="<?php echo $idquipo?>";
var message3 =$("#message3").val().trim();

var vaTurno =$("#dm_m_status2").val();

var conex ='false';//$("#REFconexion").is(":checked");

//alert("user "+ user+" ---> pass "+ pass+" ---> conex  --> "+ conex );
if ( vaTurno=="0") {
new PNotify({  title: 'Alerta', text: 'Seleccione un estatus',type: 'warning',styling: 'bootstrap3' });
} /*else if ( vaTurno=="" || vaTurno=="0") {
  alert("Elige un Turno");
}*/
  else{
   agregarAsinacion( id, equipo,  vaTurno,message3);
  }
 
});



   });


function agregarAsinacion (id, equipo,  estatus ,message3){
//alert('cargarModalUso  idtcfd ->  '+id+' uso select -> '+usoselect+" name -> "+usoselectName);


 $.ajax({
      url : AjaxURL(),
    data : { action : "insertarasinacion",id : id,equipo : equipo,estatus : estatus,message3:message3},
     type : 'POST',
 
    dataType : 'JSON',
 
    beforeSend : function(xhr, status) {
     //$(".modal_CambiarUso").html(gifLoad());
    //  alertify.log("Datos buscado");
      
    },
    success : function(html) {
     console.log(html);
 if(html.status==1){
if(html.api[0].status==1){
new PNotify({ title: 'Insert', text: html.api[0].msg,  type: 'success', styling: 'bootstrap3'    });
} else{
    new PNotify({ title: 'Error Insert', text:  html.api[0].msg,  type: 'error', styling: 'bootstrap3'          });
}
}else{
      
new PNotify({ title: 'Error API', text: 'Error API',  type: 'error', styling: 'bootstrap3'          });
}
 
    },
 

    error : function(xhr, status) {
      console.log(status);
       alert('Disculpe, existió un problema al registrar dato');
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