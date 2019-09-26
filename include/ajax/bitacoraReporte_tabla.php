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
                           <th>Carcamo</th>       
                        <th>Fecha</th>
                       
                         <th>Hora</th>
                          <th>Turno</th>
                          <th>Operador<br>CCO</th>
                          <th>Operador<br>Carcamo</th>
                           <?php 
                           foreach ($api[0]->bitacora as $key => $value) { 
                               foreach ($value->equipo as $key2 =>  $value2) {
                                       echo  "<th>".$value2->equipo."</th>" ; 
                                                               
                                }  ?>
                            <?php  
                             break;
                              }
                                ?>
                           <?php /* ?>
                          <th>Equipo</th>
<th>ACUEDUCTO VUELTAS</th>
<th>CLORO DIGITAL</th>
<th>CL.RES.PPM</th>
<th>GASTO LINEA</th>
<th>GASTO LINEA DE 20IN</th>
<th>GASTO LINEA 8IN</th>
<th>GASTO LPS</th>
<th>GASTO PTO. jUAREZ LPS 24IN</th>
<th>GASTO REF. CTM LPS 14IN</th>
<th>GASTO R94 Y UM LPS 12</th>
<th>LPS.</th>
<th>LPS.PTA.Z.URBANA</th>
<th>LPS.SM.3</th>
<th>LPS.ZONA TURISTICA</th>
<th>MEDIDOR DIGITAL GASTO</th>
<th>MEDIDOR DIGITAL PRESION</th>
<th>NIVEL%</th>
<th>POZO MANTTO</th>
<th>POZO RESERVA</th>
<th>POZO SERVICIO</th>
<th>PRESION</th>
<th>PRESION ACUEDUCTO</th>
<th>PRESION DIGITAL</th>
<th>PRESION KG/CM</th>
<th>PRESION LINEA DE 12IN</th>
<th>PRESION SM.3</th>
<th>RECIRCULACION VUELTAS</th>
<th>RECIRCULACION Z.TURISTICA</th>
<th>RINCONADAS DEL MAR EQUIP</th>
<th>RINCONADAS DEL MAR PRES.KG/CM2.</th>

 <?php */ ?>

                           <td>Observaciones</td>
                       					
                          </tr>
                      </thead>
   <tbody>
                          <?php 
						  $a=0;
                            //var_dump($api);
              //echo json_encode($api[0]->bitacora);
                          foreach ($api[0]->bitacora as $key => $value) { $a++; ?>
                          <tr class="enlace">
						  
                           <th><?php echo $a?></th>
                            <th><?php echo $value->VIDTCAR?></th>              
                          <th><?php echo $value->FECHA?></th>
                          <th><?php echo $value->hora?></th> 
                          <th><?php echo  $value->TURNO?></th> 
                          <th><?php echo  $value->namecco?></th> 
                          <th><?php echo  $value->apeoperador."<br>".$value->nameoperador?></th>
                           <?php 
                            foreach ($value->equipo as $key2 =>  $value2) {
                              if ($value2->edo=="") {
                                   echo  "<th>".$value2->medida."</th>" ; 
                              }else{
                                    echo  "<th>".$value2->edo."</th>" ; 
                              }
                                   
                                                               
                                }
                               ?>
                            

                           
                         <?php /* ?>
                          <th>
                            <table class="table table-striped table-bordered ">
                          <thead>  <tr>
                              
                              <?php
                                     
                               foreach ($value->equipo as $key2 =>  $value2) {
                                  
                                  echo '<td>'.$value2->equipo.'</td>';
                                }?>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                               <?php  
                               foreach ($value->equipo as $key2 =>  $value2) {
                                 
                                  echo '<td>'.$value2->edo.'</td>';
                                }?>
                            </tr>
                          </tbody>
                          </table>
                        </th> 
                           <th> <?php  
                               foreach ($value->medida as $key2 =>  $value2) {
                              if ($value2->equipo=='ACUEDUCTO VUELTAS') {
                                   echo  $value2->medida ; break;
                                 }                                 
                                }?>
                                  
                                </th>
                          <th> <?php  
                               foreach ($value->medida as $key2 =>  $value2) {
                              if ($value2->equipo=='CLORO DIGITAL') {
                                   echo  $value2->medida ; break;
                                 }                                 
                                }?>
                               </th>
                           <th> <?php  
                               foreach ($value->medida as $key2 =>  $value2) {
                              if ($value2->equipo=='CL.RES.PPM') {
                                   echo  $value2->medida ; break;
                                 }                                 
                                }?>
                               </th>
                            
                                <th> <?php  
                               foreach ($value->medida as $key2 =>  $value2) {
                              if ($value2->equipo=='GASTO LINEA') {
                                   echo  $value2->medida ; break;
                                 }                                 
                                }?>
                               </th>
                                <th> <?php  
                               foreach ($value->medida as $key2 =>  $value2) {
                              if ($value2->equipo=='GASTO LINEA DE 20IN') {
                                   echo  $value2->medida ; break;
                                 }                                 
                                }?>
                               </th> 
                                 <th> <?php  
                               foreach ($value->medida as $key2 =>  $value2) {
                              if ($value2->equipo=='GASTO LINEA 8IN') {
                                   echo  $value2->medida ; break;
                                 }                                 
                                }?>
                               </th> 
                              <th> <?php  
                               foreach ($value->medida as $key2 =>  $value2) {
                              if ($value2->equipo=='GASTO LPS') {
                                   echo  $value2->medida ; break;
                                 }                                 
                                }?>
                               </th> 
                               <th> <?php  
                               foreach ($value->medida as $key2 =>  $value2) {
                              if ($value2->equipo=='GASTO PTO. jUAREZ LPS 24IN') {
                                   echo  $value2->medida ; break;
                                 }                                 
                                }?>
                               </th>
                               <th> <?php  
                               foreach ($value->medida as $key2 =>  $value2) {
                              if ($value2->equipo=='GASTO REF. CTM LPS 14IN') {
                                   echo  $value2->medida ; break;
                                 }                                 
                                }?>
                               </th>
                               <th> <?php  
                               foreach ($value->medida as $key2 =>  $value2) {
                              if ($value2->equipo=='GASTO R94 Y UM LPS 12') {
                                   echo  $value2->medida ; break;
                                 }                                 
                                }?>
                               </th>
                               <th> <?php  
                               foreach ($value->medida as $key2 =>  $value2) {
                              if ($value2->equipo=='LPS.') {
                                   echo  $value2->medida ; break;
                                 }                                 
                                }?>
                               </th>
                               <th> <?php  
                               foreach ($value->medida as $key2 =>  $value2) {
                              if ($value2->equipo=='LPS.PTA.Z.URBANA') {
                                   echo  $value2->medida ; break;
                                 }                                 
                                }?>
                               </th>
                                 <th> <?php  
                               foreach ($value->medida as $key2 =>  $value2) {
                              if ($value2->equipo=='LPS.SM.3') {
                                   echo  $value2->medida ; break;
                                 }                                 
                                }?>
                               </th>
                                 <th> <?php  
                               foreach ($value->medida as $key2 =>  $value2) {
                              if ($value2->equipo=='LPS.ZONA TURISTICA') {
                                   echo  $value2->medida ; break;
                                 }                                 
                                }?>
                               </th>
                                 <th> <?php  
                               foreach ($value->medida as $key2 =>  $value2) {
                              if ($value2->equipo=='MEDIDOR DIGITAL GASTO') {
                                   echo  $value2->medida ; break;
                                 }                                 
                                }?>
                               </th>
                                 <th> <?php  
                               foreach ($value->medida as $key2 =>  $value2) {
                              if ($value2->equipo=='MEDIDOR DIGITAL PRESION') {
                                   echo  $value2->medida ; break;
                                 }                                 
                                }?>
                               </th>
                                   <th> <?php  
                               foreach ($value->medida as $key2 =>  $value2) {
                              if ($value2->equipo=='NIVEL%') {
                                   echo  $value2->medida ; break;
                                 }                                 
                                }?>
                               </th>

                                   <th> <?php  
                               foreach ($value->medida as $key2 =>  $value2) {
                              if ($value2->equipo=='POZO MANTTO') {
                                   echo  $value2->medida ; break;
                                 }                                 
                                }?>
                               </th>
                                   <th> <?php  
                               foreach ($value->medida as $key2 =>  $value2) {
                              if ($value2->equipo=='POZO RESERVA') {
                                   echo  $value2->medida ; break;
                                 }                                 
                                }?>
                               </th>
                                      <th> <?php  
                               foreach ($value->medida as $key2 =>  $value2) {
                              if ($value2->equipo=='POZO SERVICIO') {
                                   echo  $value2->medida ; break;
                                 }                                 
                                }?>
                               </th>
                                      <th> <?php  
                               foreach ($value->medida as $key2 =>  $value2) {
                              if ($value2->equipo=='PRESION') {
                                   echo  $value2->medida ; break;
                                 }                                 
                                }?>
                               </th>
                                      <th> <?php  
                               foreach ($value->medida as $key2 =>  $value2) {
                              if ($value2->equipo=='PRESION ACUEDUCTO') {
                                   echo  $value2->medida ; break;
                                 }                                 
                                }?>
                               </th>
                                      <th> <?php  
                               foreach ($value->medida as $key2 =>  $value2) {
                              if ($value2->equipo=='PRESION DIGITAL') {
                                   echo  $value2->medida ; break;
                                 }                                 
                                }?>
                               </th>
                                    <th> <?php  
                               foreach ($value->medida as $key2 =>  $value2) {
                              if ($value2->equipo=='PRESION KG/CM') {
                                   echo  $value2->medida ; break;
                                 }                                 
                                }?>
                               </th>
                                      <th> <?php  
                               foreach ($value->medida as $key2 =>  $value2) {
                              if ($value2->equipo=='PRESION LINEA DE 12IN') {
                                   echo  $value2->medida ; break;
                                 }                                 
                                }?>
                               </th>
                                         <th> <?php  
                               foreach ($value->medida as $key2 =>  $value2) {
                              if ($value2->equipo=='PRESION SM.3') {
                                   echo  $value2->medida ; break;
                                 }                                 
                                }?>
                               </th>
                                         <th> <?php  
                               foreach ($value->medida as $key2 =>  $value2) {
                              if ($value2->equipo=='RECIRCULACION VUELTAS') {
                                   echo  $value2->medida ; break;
                                 }                                 
                                }?>
                               </th>
                                         <th> <?php  
                               foreach ($value->medida as $key2 =>  $value2) {
                              if ($value2->equipo=='RECIRCULACION Z.TURISTICA') {
                                   echo  $value2->medida ; break;
                                 }                                 
                                }?>
                               </th>
                                         <th> <?php  
                               foreach ($value->medida as $key2 =>  $value2) {
                              if ($value2->equipo=='RINCONADAS DEL MAR EQUIP') {
                                   echo  $value2->medida ; break;
                                 }                                 
                                }?>
                               </th>
                                         <th> <?php  
                               foreach ($value->medida as $key2 =>  $value2) {
                              if ($value2->equipo=='RINCONADAS DEL MAR PRES.KG/CM2.') {
                                   echo  $value2->medida ; break;
                                 }                                 
                                }?>
                               </th>
                                <?php */ ?>


                         
                        <td><?php echo  $value->OBSERVACIONES?></td>
								 
 
                           </tr>
                             <?php }  ?>
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