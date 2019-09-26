<?php
session_start();
//include_once('functions.php');

//$usuario=loginJoomla();
$usuario=true;
/*/
if (!empty($_GET['iniciarsesion'])){
  if (empty($usuario))
  {
    echo 0; exit;
  } else {
    echo 1; exit;
  }
}/*/
?>
  <!DOCTYPE html>
  <html lang="en">
    <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Dispositivos Movil</title>
  
    <!-- Bootstrap -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
  
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->



<!-- Bootstrap -->
    <link href="assets/gentelella-master/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="assets/gentelella-master/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="assets/gentelella-master/vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="assets/gentelella-master/vendors/iCheck/skins/flat/green.css" rel="stylesheet">
    <link href="assets/gentelella-master/vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
  <link href="assets/gentelella-master/vendors/iCheck/skins/flat/green.css" rel="stylesheet">

<!-- alertify -->
<!--<link rel="stylesheet" href="assets/alertify.js-0.3.11/themes/alertify.core.css" />
  <link rel="stylesheet" href="assets/alertify.js-0.3.11/themes/alertify.default.css" id="toggleCSS" />
-->

 <!-- PNotify -->
    <link href="assets/gentelella-master/vendors/pnotify/dist/pnotify.css" rel="stylesheet">
    <link href="assets/gentelella-master/vendors/pnotify/dist/pnotify.buttons.css" rel="stylesheet">
    <link href="assets/gentelella-master/vendors/pnotify/dist/pnotify.nonblock.css" rel="stylesheet">


<!-- Datatables -->
    <link href="assets/gentelella-master/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="assets/gentelella-master/vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
    <link href="assets/gentelella-master/vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
    <link href="assets/gentelella-master/vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
    <link href="assets/gentelella-master/vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">


    <!-- Custom Theme Style -->
    <link href="assets/gentelella-master/build/css/custom.min.css" rel="stylesheet">

    </head>
    <body>
      <div class="row x_panel ">
            
                   <div class="x_title">
                   <h2></h2>
                 <ul class="nav navbar-right panel_toolbox">
                     <!-- <li class="pull-right" ><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>-->
                     
                      <!--<li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>-->
                    </ul>
                    <div class="clearfix"></div>
                </div>
                    
            <div class="x_content">
              <div class="row">
               <div class="col-md-12 col-sm-12 col-xs-12 form-group">
                

    <div class="container">
      <nav class="navbar navbar-default">
        <div class="container-fluid">
          <div class="navbar-header" style="    background: #FD6C9E !important;">
            <a class="navbar-brand" href="#">Dispositivos Movil</a>
          </div>
          <div>
            <ul class="nav nav-tabs">
			<li class="active" id = "archivo"><a data-toggle="tab" href="#archivo1">Agregar</a></li>
				<li id = "DepositoExternaslote"><a data-toggle="tab" href="#menu1">Reporte</a></li>
             <!-- <li id = "DepositoExternas"><a data-toggle="tab" href="#menu2">Deposito</a></li>-->
            
              </ul>
          </div>
                    <div>
                      <span  id="userLogin" style="float:right;"></span>
                      <span data-toggle="tooltip" data-placement="top" title="Iniciar Sesion" id="userLogin2" style="float:right;"> <a href="#"  data-toggle="modal" data-target="#myModalLogin"  class="myModalLogin" > Login </a></span>
                      <span class="fa fa-user right" style="margin-right: 5px;margin-top: 2px;" aria-hidden="true"> </span>
                    </div>
        </div>
      </nav>
  
  
      <div class="panel-group x_content" >
        <div class="tab-content">
			<div id="archivo1" class="tab-pane  active">
            <div class="panel panel-primary" >
            <div class="panel-heading" style="
    background-color: #FD6C9E !important;
    border-color: #118851 !important;
"  >Registro
            <span  style="float:right; "><a  data-toggle="tooltip" data-placement="bottom" title="Actualizar tabla" id="archivotabla" href="#" ><i style=" color:#FFF;" class="fa fa-refresh"></i></a></span> 
            </div>
            <div class="panel-body">
              <div class="imprimearchivo"></div>          
            </div><!-- termina panel-body-->
          </div>
          </div><!-- id="menu2" -->
		  
			<div id="menu1" class="tab-pane">
            <div class="panel panel-primary" id="panel-hist">
            <div class="panel-heading"   style="
    background-color: #FD6C9E !important;
    border-color: #118851 !important;
"  >Reporte
            <span  style="float:right;  "><a  data-toggle="tooltip" data-placement="bottom" title="Actualizar tabla" id="DepExternolotevincula" href="#" ><i style=" color:#FFF;" class="fa fa-refresh"></i></a></span> 
            </div>
            <div class="panel-body">
              <div class="imprimeDepositoExternolote"></div>          
            </div><!-- termina panel-body-->
          </div>
          </div><!-- id="menu2" -->
	  
	  
          <div id="menu2" class="tab-pane fade">
            <div class="panel panel-primary" id="panel-hist">
            <div class="panel-heading">Vincular deposito
            <span  style="float:right; "><a  data-toggle="tooltip" data-placement="bottom" title="Actualizar tabla" id="DepExternolote" href="#" ><i style=" color:#FFF;" class="fa fa-refresh"></i></a></span> 
            </div>
            <div class="panel-body">
              <div class="imprimeDepositoExterno"></div>          
            </div><!-- termina panel-body-->
          </div>
          </div><!-- id="menu2" -->


                       
        </div>
  
      </div>
      
    </div>
  </div>
  </div>
    

</div>  </div><!-- x_panel -->
    


<!-- jQuery -->
    <script src="assets/gentelella-master/vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="assets/gentelella-master/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
     <!-- FastClick -->
    <script src="assets/gentelella-master/vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress 
    <script src="assets/gentelella-master/vendors/nprogress/nprogress.js"></script>-->
    
    <!-- bootstrap-progressbar 
    <script src="assets/gentelella-master/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>-->
    <!-- iCheck -->
    <script src="assets/gentelella-master/vendors/iCheck/icheck.min.js"></script>
 
<!-- Datatables -->
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

  <script src="assets/dropzone/dropzone.js"></script>
	
 <!-- PNotify -->
    <script src="assets/gentelella-master/vendors/pnotify/dist/pnotify.js"></script>
    <script src="assets/gentelella-master/vendors/pnotify/dist/pnotify.buttons.js"></script>
    <script src="assets/gentelella-master/vendors/pnotify/dist/pnotify.nonblock.js"></script>
 

    <!-- Custom Theme Scripts -->
   <!-- <script src="assets/gentelella-master/build/js/custom.min.js"></script>-->





<script src="js/functions.js"></script>
    <script src="js/init.js"></script>
   <!-- Modal -->
<div id="myModalvervalidar" class="modal fade" role="dialog" aria-hidden="true" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog modal-lg" style="width: 90% !important;">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Validar Archivo</h4>
      </div>
      <div class="modal-body">
        <div class="vervalidafile"></div>
      </div><!-- end modal-body -->
       <div class="clearfix"></div>
      <div class="modal-footer">
        <button type="button" class="btn btn-warning" data-dismiss="modal">Cerrar</button>
      </div>
    </div>

  </div>
</div><!-- Modal --> 

  <!-- Modal -->
<div id="myModalverfileload" class="modal fade" role="dialog" aria-hidden="true" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog modal-lg" style="width: 90% !important;">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Archivo cargado</h4>
      </div>
      <div class="modal-body">
        <div class="Verfileload"></div>
      </div><!-- end modal-body -->
       <div class="clearfix"></div>
      <div class="modal-footer">
        <button type="button" class="btn btn-warning" data-dismiss="modal">Cerrar</button>
      </div>
    </div>

  </div>
</div><!-- Modal -->
  
<!-- Modal -->
<div id="myModalver" class="modal fade" role="dialog" aria-hidden="true" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog modal-lg" style="width: 90% !important;">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Lotes de facturación</h4>
      </div>
      <div class="modal-body">
        <div class="VincularEntidadExternaver"></div>
      </div><!-- end modal-body -->
       <div class="clearfix"></div>
      <div class="modal-footer">
        <button type="button" class="btn btn-warning" data-dismiss="modal">Cerrar</button>
      </div>
    </div>

  </div>
</div><!-- Modal -->
  
  
  <!-- Modal -->
<div id="myModal" class="modal fade" role="dialog" aria-hidden="true" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog modal-lg" style="width: 90% !important;">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Desasignar</h4>
      </div>
      <div class="modal-body">
        <div class="dm_Desasignar">
          
        </div>
      </div><!-- end modal-body -->
       <div class="clearfix"></div>
      <div class="modal-footer">
        <button type="button" class="btn btn-warning" data-dismiss="modal">Cerrar</button>
      </div>
    </div>

  </div>
</div><!-- Modal -->


<!-- Modal -->
<div id="myModal_resguardo" class="modal fade" role="dialog" aria-hidden="true" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog modal-lg" style="width: 90% !important;">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Resguardo</h4>
      </div>
      <div class="modal-body">
        <div class="fichaResguardo"></div>
      </div><!-- end modal-body -->
       <div class="clearfix"></div>
      <div class="modal-footer">
        <button type="button" class="btn btn-warning" data-dismiss="modal">Cerrar</button>
      </div>
    </div>

  </div>
</div><!-- Modal -->

<!-- Modal -->
<div id="myModalEditar_cajera" class="modal fade" role="dialog" aria-hidden="true" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog modal-lg" style="width: 90% !important;">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Editar</h4>
      </div>
      <div class="modal-body">
        <div class="EditarCaja"></div>
      </div><!-- end modal-body -->
       <div class="clearfix"></div>
      <div class="modal-footer">
        <button type="button" class="btn btn-warning" data-dismiss="modal">Cerrar</button>
      </div>
    </div>

  </div>
</div><!-- Modal -->



  <!-- Modal -->
<div id="myModalLogin" class="modal fade" role="dialog" aria-hidden="true" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Login</h4>
      </div>
      <div class="modal-body">
        <div class="loginmain"></div>
      </div><!-- end modal-body -->
       <div class="clearfix"></div>
      <div class="modal-footer">
        <button type="button" class="btn btn-warning" data-dismiss="modal">Cerrar</button>
      </div>
    </div>

  </div>
</div><!-- Modal -->


 <!-- Modal -->
<div id="myModalloadIntegrando" class="modal fade" role="dialog" aria-hidden="true" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
       <!-- <button type="button" class="close" data-dismiss="modal">&times;</button>-->
        <h4 class="modal-title">Integrando lote a x7...</h4>
      </div>
      <div class="modal-body">
        <div class="integrando"></div>
      </div><!-- end modal-body -->
       <div class="clearfix"></div>
      <div class="modal-footer">
        <!--<button type="button" class="btn btn-warning" data-dismiss="modal">Continuar</button>-->
      </div>
    </div>

  </div>
</div><!-- Modal -->


  <!-- Modal -->
<div id="myModalload" class="modal fade" role="dialog" aria-hidden="true" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
       <!-- <button type="button" class="close" data-dismiss="modal">&times;</button>-->
        <h4 class="modal-title">Facturando...</h4>
      </div>
      <div class="modal-body">
        <div class="facturando"></div>
      </div><!-- end modal-body -->
       <div class="clearfix"></div>
      <div class="modal-footer">
        <!--<button type="button" class="btn btn-warning" data-dismiss="modal">Continuar</button>-->
      </div>
    </div>

  </div>
</div><!-- Modal -->


<?php

if (!isset($_SESSION["initdpm"])) {
  $_SESSION["initdpm"]="ok";
?>
<script type="text/javascript">
  $(document).ready(function(v) {
    
    $(".myModalLogin").click();
    //$("#myModalLogin").modal("show");
  });

</script>
<?php
  }else{
  ?>
  <script type="text/javascript">
  $(document).ready(function(v) {
    //$(".myModalLogin").click();
    loadLoginMain();

  });

</script>
  <?php 
  }
?>
    </body>
  </html>


  <?php 

?>