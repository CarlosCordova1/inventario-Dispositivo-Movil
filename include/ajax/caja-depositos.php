<?php 
if($data1){
      ?>   
<!--<table   class="table table-striped table-bordered dt-responsive nowrap datatable-responsive" cellspacing="0" width="100%">-->
   <table  class="table table-striped table-bordered datatable-buttons" width="100%">
                      <thead>
                        <tr>
                          <th>No</th>                      
                          <th>Punto de<br> cobranza</th>
                          <th>Cuenta <br>Banco</th>
                          <!--<th>CTACONT</th>-->
                          <th>Monto del<br> deposito</th>
                          <th>Monto <br>Vinculado</th>
                          <th>Referencia</th>
                          <!--<th>persona o entidad<br> depositante</th>-->
                          <th>Agente</th>
                          <th>Folio Carta<br> Porte</th>
                          <th>Folio Sello<br> Plastico</th>
                          <!--<th>Fecha de<br> operacion</th>-->
                          <th>Fecha de<br> Creacion</th>
                          <th>Fecha de<br> Actualizacion</th>
                          <th>Estado</th>
                          <th>Imprimir</th>

                          <?php if ($user!="") {
                           echo '<th>Opcion</th>';
                          }?>
                          <th>Observaciones</th>
                          
                      </thead>
                      <tbody>
                          <?php 
                          foreach ($val as  $seccion) {
                          foreach ($seccion[0]->Deposito as $key => $value) { ?>
                          <tr class="enlace">
                           <th><?php echo $value->ID?></th>                      
                          <th><?php echo $value->Cobranza?></th> 
                         <th><?php echo $value->CUENTABANCO?></th> 
                        <!-- <th> <?php //echo $value->CTACONT?></th> -->
                         <th><?php echo  number_format($value->Monto,2)?></th> 
                         <th><?php echo  number_format($value->MontoVinculado,2)?></th> 
                          <th><?php echo $value->referencia?></th> 
                         <!-- <th><?php //echo $value->depositante?></th>-->
                          <th> <p data-toggle="tooltip" data-placement="bottom" title="<?php echo $value->depositante?>" > <?php echo $value->agente?> </p></th>
                          <th><?php echo $value->foliocarta?></th> 
                          <th><?php echo $value->folioSello?></th> 
                          <!--<th><?php //echo $value->fechaoperacion?></th> -->
                          <th><?php echo $value->fechacreac?></th>
                         <th><?php echo $value->fechaauc?></th>
                           <th><?php echo $value->EDO?></th>
                           <th>
                            <?php if ($user!="") { ?>
                            <a class="imprimir" href="#" data-toggle="modal" 
                            data-imprimir="<?php echo $value->ID?>" 
                            data-target="#myModalFicha" > Imprimir </a>
                            <?php } ?>
                             </th>
                           <?php if ($user!="") {
                           echo '<th>
                           <span class="myModalEditar_cajera" > <a href="" data-toggle="modal" 
                           
                           data-idtdep="'.$value->ID.'" 
                           data-idpuntocobro="'.$value->IDpuntocobro.'" 
                           data-monto="'.$value->Monto.'"
                           data-referencia="'.$value->referencia.'" 
                           data-entidad="'.$value->depositante.'" 
                           data-fechaoperacion="'.$value->fechaoperacion.'"
                           data-idbanco="'.$value->IDBANCO.'"
                           data-cuenta="'.$value->CUENTABANCO.'"
                            data-foliocarta="'.$value->foliocarta.'" 
                            data-folioSello="'.$value->folioSello.'" 
                             data-observaciones="'.$value->OBSERVACIONES.'" 
                            data-target="#myModalEditar_cajera" > Editar </a> </span></th>';
                          }?>
                            <th>
                            <p data-toggle="tooltip" data-placement="bottom" title="<?php echo substr($value->OBSERVACIONES,0,100)?>" >
                            <?php echo  $value->OBSERVACIONES?> </p></th>
                           </tr>
                             <?php } } ?>
                      </tbody>
                    </table>
       <script src="assets/gentelella-master/build/js/custom.js"></script> 
 <!--<script src="assets/gentelella-master/build/js/custom_other.js"></script>-->

 <script  type="text/javascript" >
   $(document).ready(function(v) {
 //table.destroy();
   });
 </script>
<?php 
}
else{
  echo "Acceso no permitido...";
}
?>  