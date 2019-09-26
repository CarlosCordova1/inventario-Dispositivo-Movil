<?php 
if($data1){
//echo "<br>idtcfd  ".$idtcfd; 
//echo "<br>uso  ".$uso; 
      ?>   


<div class="col-sm-12">
                   <div class="logo"></div>
<div class="login-block">
    <!--<h3>Permisos</h3>-->
   <!--  <h3> Uso:  <b class="txtUso"></b> </h3>-->

   <div class="row x_panel ">
            
                   <div class="x_title">
                   <h2>Claves de acceso</h2>
                    <div class="clearfix"></div>
                </div>
             <div class="x_panel ">

                    


   <div class="row">
    <div class="col-sm-12">
      <div class="input-group">
      <span class="input-group-addon"><i class="fa fa-unlock-alt fa-2" aria-hidden="true"></i></span>
    <input type="password" class="form-control" value="" maxlength="100" placeholder="Usuario" id="REFpassuser">
    </div>
    </div>
    </div><br>
    <div class="row">
    <div class="col-sm-12">
      <div class="input-group">
      <span class="input-group-addon"><i class="fa fa-unlock-alt fa-2" aria-hidden="true"></i></span>
    <input type="password" class="form-control" value="" maxlength="100" placeholder="Contraseña" id="REFpassword">
    </div>
    </div>
    </div><br>
 
   <!--  <div class="row">
    <div class="col-sm-12">
         <div class="form-group">
                        <label for="turnologin" class="control-label col-md-4 col-sm-4 col-xs-12">Turno</label>
                      <div class="col-md-8 col-sm-8 col-xs-12 form-group has-feedback">
                         <select id="turnologin" class="form-control has-feedback-left" required>
                          <option     value="0">--</option>
                       
                         <option     value="1">Primero</option>
                          <option     value="2">Segundo</option>
                          <option     value="3">Tercero</option>
                                           
                          </select>

                       
                        <span class="fa fa-list-alt form-control-feedback left" aria-hidden="true"></span>
                      </div>
                       </div>
    </div>
    </div><br> -->





 <div class="row">
     <div class="col-sm-12">
      <button type="submit" id="loginREF" class="btn btn-primary" >Acceder</button>
    </div> 
    </div>   
</div>

  </div>
     </div>

</div>




 <script src="assets/gentelella-master/build/js/custom.js"></script>

 <script  type="text/javascript" >
   $(document).ready(function(v) {
<?php 
if ($user!="") {
 ?>
 $("#userLogin").html(  ' Bienvenido: <strong><?php echo $user?></strong> <a class="logout" href="#"> Logout </a>');
  $("#userLogin2").html('');
 <?php
}
?>


    $("#REFpassuser").focus();
$("#loginREF").click(function(event) {
  /* Act on the event */
var user =$("#REFpassuser").val().trim();
var pass =$("#REFpassword").val().trim();
var vaTurno =$("#turnologin").val();

var conex ='false';//$("#REFconexion").is(":checked");

//alert("user "+ user+" ---> pass "+ pass+" ---> conex  --> "+ conex );
if ( user=="" || pass=="") {
  alert("Campos vacios. porfavor ingrese sus datos");
} /*else if ( vaTurno=="" || vaTurno=="0") {
  alert("Elige un Turno");
}*/
  else{
    validaAcceso( user, pass,  conex,vaTurno);
  }
 
});



$( "#REFpassuser, #REFpassword" ).keypress(function(e) {
  if(e.which == 13) {
    $("#loginREF").click();
        event.preventDefault();
    }

});




   });


function validaAcceso (user, pass,  conex,vturno){
//alert('cargarModalUso  idtcfd ->  '+id+' uso select -> '+usoselect+" name -> "+usoselectName);


 $.ajax({
      url : AjaxURL(),
    data : { action : "validaconexionREF",user : user,pass : pass,conex : conex,vturno:vturno},
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
      $("#userLogin").html('');
     console.log(json);
     if (json.status==0) {
       new PNotify({
                                  title: 'Alerta',
                                  text: "Error: "+json.msg,
                                  type: 'error',
                                  styling: 'bootstrap3'
                              });
     }
     else if (json.status==1){
      //console.log(json.API[0].update);
      
 new PNotify({
                                  title: 'Alerta',
                                  text: 'Acceso Correcto!',
                                  type: 'success',
                                  styling: 'bootstrap3'
                              });

        <?php 
        if ( $logindata=="nuevoDeposito") { 
        ?>
        //loadNuevoDeposito();
         <?php 
         } elseif ($logindata="EntidadExterna") {
          ?>
        //loadModalVicular();
         <?php 
         }
        ?>

        //$("#userLogin").html(  ' Bienvenido: <strong>'+json.user+'</strong> <a href="#"> Logout </a>');
        //$("#userLogin2").html('');
         //$("#myModalLogin").modal("hide");
          window.location.reload(true);
     }else{
        //console.log(json.API[0].update);
        new PNotify({
                                  title: 'Alerta',
                                  text: "Error: "+json.msg,
                                  type: 'error',
                                  styling: 'bootstrap3'
                              });
     }
      //$(".modal_CambiarUso").html(html);
      //$(".txtUso").html(usoselectName);
 
    },
 

    error : function(xhr, status) {
      console.log(status);
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