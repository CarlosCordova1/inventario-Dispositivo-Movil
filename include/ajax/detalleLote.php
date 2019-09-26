<?php 
if($data1){
      ?>   
      <h2>Detalle lote (# <?php echo number_format($lote,0)?>).  Total de Pagos (# <?php echo number_format($totalpagos,0)?>)</h2>
        
      <div class="panel-body" style="max-height: 500px; overflow-y: scroll;">
      		<table   class="table table-striped table-bordered bulk_action datatable-checkbox2">
                      <thead>
                        <tr>
                         
                            <th class="column-title">Cliente</th>
                            <th class="column-title">Fecha de Carga</th>
                            <th class="column-title">Total</th>
							<th class="column-title">Saldo</th>
                             
                        </tr>
                      </thead>


                      <tbody>
                       <?php 
                            foreach ($val as  $seccion) {
                              # code...
                            
                       foreach ($seccion[0]->PagoLoteDetalle as $key => $value) { ?>
                          <tr class="">
                                            
                            <td class=" "><?php echo $value->cliente?></td>
                            <td class=" "><?php echo $value->FCHCAR?></td>
                            <td class="  ">$ <?php echo number_format($value->total,2)?></td>
							 <td class="  ">$ <?php echo number_format($value->saldo,2)?></td>
                           
                          </tr>
                      <?php } 
                          }
                      ?>
                        
                      </tbody>
                    </table>  
  </div>
        
        <!-- end table -->

        <script src="assets/gentelella-master/build/js/custom.js"></script>
 <!--<script src="assets/gentelella-master/build/js/custom_other.js"></script>-->

 <script  type="text/javascript" >

 </script>
<?php 
}
else{
  echo "Acceso no permitido...";
}
?>  