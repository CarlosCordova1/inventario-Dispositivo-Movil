<?php 
if($data1){
  date_default_timezone_set('America/Cancun');
      ?>   

<br>
  <div class="x_title">
                    <div class="clearfix"></div>

                  </div>
<div class="container">
  <div class="tab-content">
    
  <!--  <table   class="table table-striped table-bordered dt-responsive nowrap datatable-responsive datatable-buttons" cellspacing="0" width="100%">-->
      <table  class="table table-striped table-bordered datatable-buttons nowrap" cellspacing="0" width="100%">

                      <thead>
                        <tr>
						             <th ># </th> 
                           <th>TIPO</th>       
                        <th>FECHA INGRESO</th>                       
                         <th>FECHA<BR> RECEPCION</th>
                         
                         <th>ULTIMA<BR> ACTUALIZACION</th>
                             <th>N EMPLEADO</th>
                                    <th>NOMBRE</th>
                                    <th>USERSTATUS</th>
                                    <th>USERZONA</th>
                                    <th>AREA</th>
                                    <th>DEPARTAMENTO</th>
                                    <th>SIM</th>
                                     <th>TELEFONO</th>
                                  
                                    <th>ESTATUS</th>
                                    <th>DETALLES</th>
                                       <th>USERS</th>
                           <th>OBSERVACIONES <br>ENTREGA</th>  
                            <th>OBSERVACIONES <br>DEVOLUCION</th>                    					
                          </tr>
                      </thead>
   <tbody>
                          <?php 
						  $a=0;
                            //var_dump($api);
              //echo json_encode($api[0]->bitacora);
                          foreach ($api[0]->bitacora as $key => $value) { $a++; ?>
                          <tr class="enlace">
						  
                           <td><?php echo $a?></td>
                            <td><?php echo $value->IDTDMP?></td>              
                          <td><?php echo $value->FECHA." ".$value->hora?></td>  
                          <td><?php echo $value->FECHAENTREGA?></td>
                           
                           <td><?php echo $value->FECHAUPD?></td>
                        <td><?php echo $value->IDTEMPLEADO?></td>
                           <td><?php echo $value->NOMBRE?></td>
                           <td><?php echo $value->USERSTATUS?></td>
                           <td><?php echo $value->USERZONA?></td>
                           <td><?php echo $value->USERAREA?></td>
                           <td><?php echo $value->USERDEPA?></td>
                           <td><?php echo $value->SIM?></td>
                            <td><?php echo $value->TELEFONO?></td>
                   
                             <td><?php echo $value->EDO2?></td>
                               <th>
                               <p> <a href="#"                            
                             data-toggle="modal" 
                             class="modal_imprime_resguardo"
                              data-value="<?php echo $value->IDTEVA?>"
                               data-equipo="<?php echo $value->IDTEQU?>" 
                              data-target="#myModal_resguardo" >Imprimir Resguardo</a> </p>
                              <p> <a href="#"                            
                             data-toggle="modal" 
                             class="modal_importar_file"
                              data-value="<?php echo $value->IDTEVA?>"
                               data-equipo="<?php echo $value->IDTEQU?>" 
                              data-target="#myModalverfileload" >Importar Archivo</a> </p>
                              <?php if($value->EDO=='NVO') {?>
                               <p> <a href="#"                            
                             data-toggle="modal" 
                             class="modal_desasignar"
                              data-value="<?php echo $value->IDTEVA?>"
                               data-equipo="<?php echo $value->IDTEQU?>" 
                              data-target="#myModal" >Desasignar</a> </p>
                                  <?php } ?>
                                    </th>
                                       <th>
                         <P> <b>ASIGNO:</b> <?php echo $value->USERLOGIN?></P>  
                           <P><b>DESASIGNO:</b> <?php echo $value->USERLOGIN2?></P>
                           </th>  
                        <td><?php echo  $value->OBSERVACIONES?></td>
                        <td><?php echo  $value->COMENTARIOS?></td>
                           </tr>
                             <?php }  ?>
                      </tbody>
                    </table>

    </div> <!--end nuevo menu-->
 
    
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
  .panel-heading{ 
    background-color: #19b591 !important;
    border-color: #118851 !important;
 }
</style>

 
<?php 
}
else{
  echo "Acceso no permitido...";
}
?>  