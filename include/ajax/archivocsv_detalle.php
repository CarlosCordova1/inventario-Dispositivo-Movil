<?php 
if($data1){
  date_default_timezone_set('America/Cancun');
      ?>   


<div class="container">
  <ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="#nuevocsv1">Detalles</a></li>
 <!--   <li><a data-toggle="tab" href="#nuevoarchivo1">Nuevo Archivo</a></li>-->
  </ul>
<br>
  <div class="tab-content">
    <div id="nuevocsv" class="tab-pane fade in active">
     
    
  <!--  <table   class="table table-striped table-bordered dt-responsive nowrap datatable-responsive datatable-buttons" cellspacing="0" width="100%">-->
      <table  class="table table-striped table-bordered datatable-buttons nowrap datatable-responsive"  cellspacing="0" width="100%">
                      <thead>
                        <tr>
						 <th >#</th> 
                         <th data-toggle="tooltip" title="Id del registro" >IDTDAT</th> 
                        <th data-toggle="tooltip" title="Id de la etapa: 1-Registro validado, 2-Registro con error, 3-Registro ingresado en x7" >IDTETP</th>
                         <th data-toggle="tooltip" title="Fecha de carga" >FECHA</th>
						  <th data-toggle="tooltip" title="Numero del cliente x7">IDTCLT</th>
                          <th data-toggle="tooltip" title="Numero de contrato x7">IDTCTR</th>
						   <th data-toggle="tooltip" title="Apellido" >CLT_NOM</th>
						    <th data-toggle="tooltip" title="Nombre" >CLT_PRN</th>
							<th data-toggle="tooltip" title="Ciudad" >CLT_ADRSTR1</th>
							<th data-toggle="tooltip" title="Zona" >CLT_ADRSTR2</th>
							<th data-toggle="tooltip" title="SM" >CLT_ADRSTR3</th>
							<th data-toggle="tooltip" title="MZ" >CLT_ADRSTR4</th>
							<th data-toggle="tooltip" title="Lote" >CLT_ADRSTR5</th>
							<th data-toggle="tooltip" title="Calle" >CLT_ADRSTR6</th>
							<th data-toggle="tooltip" title="NoExt" >CLT_ADRSTR7</th>
							<th data-toggle="tooltip" title="Edificio" >CLT_ADRSTR8</th>
							<th data-toggle="tooltip" title="NoInt" >CLT_ADRSTR9</th>
							<th data-toggle="tooltip" title="Fraccionamiento" >CLT_ADRSTR10</th>
							
							
							<th data-toggle="tooltip" title="Categoria del cliente" >CLT_IDTCTGCLT</th>
<th data-toggle="tooltip" title="Sensibilidad" >CLT_IDTCODSNS</th>
<th data-toggle="tooltip" title="Centro operacional" >CLT_IDTCNTOPR</th>
<th data-toggle="tooltip" title="RFC" >CLT_A1</th>
<th data-toggle="tooltip" title="Envio de factura electronica" >CLT_C2</th>
<th data-toggle="tooltip" title="correo" >CLT_MAIL</th>
<th data-toggle="tooltip" title="Dirección fiscal" >CLT_CHPLIB5</th>
<th data-toggle="tooltip" title="Telefono de domicilio" >CLT_TLD</th>
<th data-toggle="tooltip" title="Celular" >CLT_TLP</th>
<th data-toggle="tooltip" title="Nivel socieconomico" >CLT_T1</th>
<th data-toggle="tooltip" title="Parentesco" >CLT_T2</th>
<th data-toggle="tooltip" title="Edo Economico del predio" >CLT_T3</th>
<th data-toggle="tooltip" title="Id del modo de pago" >CPTCLT_IDTMODRGL</th>
<th data-toggle="tooltip" title="Id del banco" >CPTCLT_IDTBNQ</th>
<th data-toggle="tooltip" title="Titular de la cuenta" >CPTCLT_PRPCPTBNC</th>
<th data-toggle="tooltip" title="Numero de cuenta" >CPTCLT_NUMCPTBNC</th>
<th data-toggle="tooltip" title="Id del tipo de habitación" >PNTLVR_IDTTYPHBT</th>
<th data-toggle="tooltip" title="Punto geografico" >PNTLVR_IDTDCPGGR</th>
<th data-toggle="tooltip" title="Ocupado o vacio" >PNTLVR_OCC</th>
<th data-toggle="tooltip" title="Ciudad" >PNTLVR_ADRSTR1</th>
<th data-toggle="tooltip" title="Zona" >PNTLVR_ADRSTR2</th>
<th data-toggle="tooltip" title="Sm" >PNTLVR_ADRSTR3</th>
<th data-toggle="tooltip" title="Mz" >PNTLVR_ADRSTR4</th>
<th data-toggle="tooltip" title="lote" >PNTLVR_ADRSTR5</th>
<th data-toggle="tooltip" title="Calle" >PNTLVR_ADRSTR6</th>
<th data-toggle="tooltip" title="NoExt" >PNTLVR_ADRSTR7</th>
<th data-toggle="tooltip" title="Edificio" >PNTLVR_ADRSTR8</th>
<th data-toggle="tooltip" title="NoInt" >PNTLVR_ADRSTR9</th>
<th data-toggle="tooltip" title="Fraccionamiento" >PNTLVR_ADRSTR10</th>
<th data-toggle="tooltip" title="Tipo de suministro" >PNTLVR_T2</th>
<th data-toggle="tooltip" title="Ronda" >PNTCPG_IDTTRNTYP</th>
<th data-toggle="tooltip" title="Fecha de conexion" >PNTCPG_DATCNN</th>
<th data-toggle="tooltip" title="Diametro" >PNTCPG_DMT</th>

<th data-toggle="tooltip" title="ciudad" >PNTCPG_ADRSTR1</th>
<th data-toggle="tooltip" title="zona" >PNTCPG_ADRSTR2</th>
<th data-toggle="tooltip" title="sm" >PNTCPG_ADRSTR3</th>
<th data-toggle="tooltip" title="mz" >PNTCPG_ADRSTR4</th>
<th data-toggle="tooltip" title="Lote" >PNTCPG_ADRSTR5</th>
<th data-toggle="tooltip" title="Calle" >PNTCPG_ADRSTR6</th>
<th data-toggle="tooltip" title="No.ext" >PNTCPG_ADRSTR7</th>
<th data-toggle="tooltip" title="edificio" >PNTCPG_ADRSTR8</th>
<th data-toggle="tooltip" title="NoInt" >PNTCPG_ADRSTR9</th>
<th data-toggle="tooltip" title="fraccionamiento" >PNTCPG_ADRSTR10</th>
<th data-toggle="tooltip" title="Estado del inmueble" >PNTCPG_T1</th>
<th data-toggle="tooltip" title="Estructura predio" >PNTCPG_T2</th>
<th data-toggle="tooltip" title="Tipo de conexion" >PNTCPG_T3</th>
<th data-toggle="tooltip" title="Ubicación del cuodro o medidor" >PNTCPG_T4</th>

<th data-toggle="tooltip" title="Fecha de suscripción" >CTR_DATSCR</th>
<th data-toggle="tooltip" title="Fin del periodo facturado" >CTR_FINDRNPRDFCT</th>
<th data-toggle="tooltip" title="Giro comercial" >CTR_T1</th>
<th data-toggle="tooltip" title="Tipo de contrato" >CTR_CODTYPCTR</th>
<th data-toggle="tooltip" title="Fecha de inicio de clausula" >AVTCTR_DATDBT</th>
<th data-toggle="tooltip" title="Factura tipo" >AVTCTR_IDTFACTYP</th>
<th data-toggle="tooltip" title="Uso" >AVTCTR_IDTACV</th>

<th data-toggle="tooltip" title="Consumo estimado" >AVTCTR_CHP01</th>
<th data-toggle="tooltip" title="Servicio agua" >AVTCTR_CHP11</th>
<th data-toggle="tooltip" title="Servicio alcantarillado" >AVTCTR_CHP12</th>
<th data-toggle="tooltip" title="Id del modelo de factura" >IDTMODFACMAN</th>
						
                          </tr>
                      </thead>
   <tbody>
                          <?php 
						  $a=0;
                           
                          foreach ($api_detalle[0]->lotesfile_detalle as $key => $value) { ?>
                          <tr class="enlace">
						   <th><?php echo ++$a?></th>
                           <th> <?php echo $value->IDTDAT?></th>
                          <th><?php echo $value->IDTETP?></th> 
							<th><?php echo $value->FECHA?></th> 
						     <th > <?php echo $value->IDTCLT?></th>
							  <th  > <?php echo $value->IDTCTR?></th>
							   <th class="editable" data-value="CLT_NOM" data-iddato="<?php echo $value->IDTDAT?>"  ><span class="edit"><?php echo $value->CLT_NOM?></span> <span class="update"> </span></th>
							   <th class="editable" data-value="CLT_PRN" data-iddato="<?php echo $value->IDTDAT?>" ><span class="edit"><?php echo $value->CLT_PRN?></span> <span class="update"> </span></th>
							   <th class="editable_select" data-value="CLT_ADRSTR1" data-iddato="<?php echo $value->IDTDAT?>" ><span class="edit_select"><?php echo $value->CLT_ADRSTR1?></span> <span class="update_select"> </span></th>
							<th class="editable_select" data-value="CLT_ADRSTR2" data-iddato="<?php echo $value->IDTDAT?>" ><span class="edit_select"><?php echo $value->CLT_ADRSTR2?></span> <span class="update_select"> </span></th>
							<th class="editable_select" data-value="CLT_ADRSTR3" data-iddato="<?php echo $value->IDTDAT?>"><span class="edit_select"><?php echo $value->CLT_ADRSTR3?></span> <span class="update_select"> </span></th>
							<th class="editable" data-value="CLT_ADRSTR4" data-iddato="<?php echo $value->IDTDAT?>" ><span class="edit"><?php echo $value->CLT_ADRSTR4?></span> <span class="update"> </span></th>
							<th class="editable" data-value="CLT_ADRSTR5" data-iddato="<?php echo $value->IDTDAT?>" ><span class="edit"><?php echo $value->CLT_ADRSTR5?></span> <span class="update"> </span></th>
							<th class="editable_select" data-value="CLT_ADRSTR6" data-iddato="<?php echo $value->IDTDAT?>" ><span class="edit_select"><?php echo $value->CLT_ADRSTR6?></span> <span class="update_select"> </span></th>
							<th class="editable" data-value="CLT_ADRSTR7" data-iddato="<?php echo $value->IDTDAT?>" ><span class="edit"><?php echo $value->CLT_ADRSTR7?></span> <span class="update"> </span></th>
							<th class="editable_select" data-value="CLT_ADRSTR8" data-iddato="<?php echo $value->IDTDAT?>" ><span class="edit_select"><?php echo $value->CLT_ADRSTR8?></span> <span class="update_select"> </span></th>
							<th class="editable" data-value="CLT_ADRSTR9" data-iddato="<?php echo $value->IDTDAT?>" ><span class="edit"><?php echo $value->CLT_ADRSTR9?></span> <span class="update"> </span></th>
							<th class="editable_select" data-value="CLT_ADRSTR10" data-iddato="<?php echo $value->IDTDAT?>" ><span class="edit_select"><?php echo $value->CLT_ADRSTR10?></span> <span class="update_select"> </span></th>
							
<th class="editable_select" data-value="CLT_IDTCTGCLT" data-iddato="<?php echo $value->IDTDAT?>" ><span class="edit_select"><?php echo $value->CLT_IDTCTGCLT?></span> <span class="update_select"> </span></th>
<th class="editable_select" data-value="CLT_IDTCODSNS" data-iddato="<?php echo $value->IDTDAT?>" ><span class="edit_select"><?php echo $value->CLT_IDTCODSNS?></span> <span class="update_select"> </span></th>
<th class="editable_select" data-value="CLT_IDTCNTOPR" data-iddato="<?php echo $value->IDTDAT?>" ><span class="edit_select"><?php echo $value->CLT_IDTCNTOPR?></span> <span class="update_select"> </span></th>

<th class="editable" data-value="CLT_A1" data-iddato="<?php echo $value->IDTDAT?>"  ><span class="edit"><?php echo $value->CLT_A1?></span> <span class="update"> </span></th>
<th class="editable_select" data-value="CLT_C2"data-iddato="<?php echo $value->IDTDAT?>"  ><span class="edit_select"><?php echo $value->CLT_C2?></span> <span class="update_select"> </span></th>
<th class="editable" data-value="CLT_MAIL"data-iddato="<?php echo $value->IDTDAT?>"  ><span class="edit"><?php echo $value->CLT_MAIL?></span> <span class="update"> </span></th>
<th class="editable" data-value="CLT_CHPLIB5" data-iddato="<?php echo $value->IDTDAT?>" ><span class="edit"><?php echo $value->CLT_CHPLIB5?></span> <span class="update"> </span></th>
<th class="editable" data-value="CLT_TLD" data-iddato="<?php echo $value->IDTDAT?>" ><span class="edit"><?php echo $value->CLT_TLD?></span> <span class="update"> </span></th>
<th class="editable" data-value="CLT_TLP" data-iddato="<?php echo $value->IDTDAT?>" ><span class="edit"><?php echo $value->CLT_TLP?></span> <span class="update"> </span></th>
<th class="editable_select" data-value="CLT_T1" data-iddato="<?php echo $value->IDTDAT?>"  ><span class="edit_select"><?php echo $value->CLT_T1?></span> <span class="update_select"> </span></th>
<th class="editable_select" data-value="CLT_T2" data-iddato="<?php echo $value->IDTDAT?>"  ><span class="edit_select"><?php echo $value->CLT_T2?></span> <span class="update_select"> </span></th>

<th class="editable_select" data-value="CLT_T3"  data-iddato="<?php echo $value->IDTDAT?>" ><span class="edit_select"><?php echo $value->CLT_T3?></span> <span class="update_select"> </span></th>
<th class="editable_select" data-value="CPTCLT_IDTMODRGL"  data-iddato="<?php echo $value->IDTDAT?>" ><span class="edit_select"><?php echo $value->CPTCLT_IDTMODRGL?></span> <span class="update_select"> </span></th>
<th class="editable_select" data-value="CPTCLT_IDTBNQ" data-iddato="<?php echo $value->IDTDAT?>"  ><span class="edit_select"><?php echo $value->CPTCLT_IDTBNQ?></span> <span class="update_select"> </span></th>
<th class="editable" data-value="CPTCLT_PRPCPTBNC" data-iddato="<?php echo $value->IDTDAT?>" ><span class="edit"><?php echo $value->CPTCLT_PRPCPTBNC?></span> <span class="update"> </span></th>
<th class="editable" data-value="CPTCLT_NUMCPTBNC"  data-iddato="<?php echo $value->IDTDAT?>" ><span class="edit"><?php echo $value->CPTCLT_NUMCPTBNC?></span> <span class="update"> </span></th>
<th class="editable_select" data-value="PNTLVR_IDTTYPHBT" data-iddato="<?php echo $value->IDTDAT?>"  ><span class="edit_select"><?php echo $value->PNTLVR_IDTTYPHBT?></span> <span class="update_select"> </span></th>
<th class="editable_select" data-value="PNTLVR_IDTDCPGGR" data-iddato="<?php echo $value->IDTDAT?>"  ><span class="edit_select"><?php echo $value->PNTLVR_IDTDCPGGR?></span> <span class="update_select"> </span></th>
<th class="editable_select" data-value="PNTLVR_OCC" data-iddato="<?php echo $value->IDTDAT?>"  ><span class="edit_select"><?php echo $value->PNTLVR_OCC?></span> <span class="update_select"> </span></th>

<th class="editable_select" data-value="PNTLVR_ADRSTR1" data-iddato="<?php echo $value->IDTDAT?>"  ><span class="edit_select"><?php echo $value->PNTLVR_ADRSTR1?></span> <span class="update_select"> </span></th>
<th class="editable_select" data-value="PNTLVR_ADRSTR2"  data-iddato="<?php echo $value->IDTDAT?>" ><span class="edit_select"><?php echo $value->PNTLVR_ADRSTR2?></span> <span class="update_select"> </span></th>
<th class="editable_select" data-value="PNTLVR_ADRSTR3"  data-iddato="<?php echo $value->IDTDAT?>" ><span class="edit_select"><?php echo $value->PNTLVR_ADRSTR3?></span> <span class="update_select"> </span></th>
<th class="editable" data-value="PNTLVR_ADRSTR4" data-iddato="<?php echo $value->IDTDAT?>"  ><span class="edit"><?php echo $value->PNTLVR_ADRSTR4?></span> <span class="update"></span></th>
<th class="editable" data-value="PNTLVR_ADRSTR5" data-iddato="<?php echo $value->IDTDAT?>"  ><span class="edit"><?php echo $value->PNTLVR_ADRSTR5?></span> <span class="update"> </span></th>
<th class="editable_select" data-value="PNTLVR_ADRSTR6"  data-iddato="<?php echo $value->IDTDAT?>" ><span class="edit_select"><?php echo $value->PNTLVR_ADRSTR6?></span> <span class="update_select"> </span></th>
<th class="editable" data-value="PNTLVR_ADRSTR7"  data-iddato="<?php echo $value->IDTDAT?>" ><span class="edit"><?php echo $value->PNTLVR_ADRSTR7?></span> <span class="update"></span></th>
<th class="editable_select" data-value="PNTLVR_ADRSTR8"  data-iddato="<?php echo $value->IDTDAT?>" ><span class="edit_select"><?php echo $value->PNTLVR_ADRSTR8?></span><span class="update_select"> </span></th>
<th class="editable" data-value="PNTLVR_ADRSTR9"  data-iddato="<?php echo $value->IDTDAT?>" ><span class="edit"><?php echo $value->PNTLVR_ADRSTR9?></span> <span class="update"> </span></th>
<th class="editable_select" data-value="PNTLVR_ADRSTR10" data-iddato="<?php echo $value->IDTDAT?>"  ><span class="edit_select"><?php echo $value->PNTLVR_ADRSTR10?></span><span class="update_select"> </span></th>
<th class="editable_select" data-value="PNTLVR_T2" data-iddato="<?php echo $value->IDTDAT?>"  ><span class="edit_select"><?php echo $value->PNTLVR_T2?></span><span class="update_select"> </span></th>
<th class="editable_select" data-value="PNTCPG_IDTTRNTYP"  data-iddato="<?php echo $value->IDTDAT?>" ><span class="edit_select"><?php echo $value->PNTCPG_IDTTRNTYP?></span><span class="update_select"> </span></th>
<th class="editable" data-value="PNTCPG_DATCNN" data-iddato="<?php echo $value->IDTDAT?>"  ><span class="edit"><?php echo $value->PNTCPG_DATCNN?></span> <span class="update"> </span></th>
<th class="editable" data-value="PNTCPG_DMT"  data-iddato="<?php echo $value->IDTDAT?>" ><span class="edit"><?php echo $value->PNTCPG_DMT?></span> <span class="update"> </span></th>


<th class="editable_select" data-value="PNTCPG_ADRSTR1" data-iddato="<?php echo $value->IDTDAT?>"  ><span class="edit_select"><?php echo $value->PNTCPG_ADRSTR1?></span><span class="update_select"> </span></th>
<th class="editable_select" data-value="PNTCPG_ADRSTR2" data-iddato="<?php echo $value->IDTDAT?>"  ><span class="edit_select"><?php echo $value->PNTCPG_ADRSTR2?></span><span class="update_select"> </span></th>
<th class="editable_select" data-value="PNTCPG_ADRSTR3"  data-iddato="<?php echo $value->IDTDAT?>" ><span class="edit_select"><?php echo $value->PNTCPG_ADRSTR3?></span><span class="update_select"> </span></th>

<th class="editable" data-value="PNTCPG_ADRSTR4"  data-iddato="<?php echo $value->IDTDAT?>"  ><span class="edit"> <?php echo $value->PNTCPG_ADRSTR4?></span> <span class="update"> </span></th>
<th class="editable" data-value="PNTCPG_ADRSTR5" data-iddato="<?php echo $value->IDTDAT?>"  ><span class="edit"><?php echo $value->PNTCPG_ADRSTR5?></span> <span class="update"> </span></th>
<th class="editable_select" data-value="PNTCPG_ADRSTR6" data-iddato="<?php echo $value->IDTDAT?>"  ><span class="edit_select"><?php echo $value->PNTCPG_ADRSTR6?></span><span class="update_select"> </span></th>
<th class="editable" data-value="PNTCPG_ADRSTR7"  data-iddato="<?php echo $value->IDTDAT?>" ><span class="edit"><?php echo $value->PNTCPG_ADRSTR7?></span> <span class="update"> </span></th>
<th class="editable_select" data-value="PNTCPG_ADRSTR8" data-iddato="<?php echo $value->IDTDAT?>"  ><span class="edit_select"><?php echo $value->PNTCPG_ADRSTR8?></span><span class="update_select"> </span></th>
<th class="editable" data-value="PNTCPG_ADRSTR9" data-iddato="<?php echo $value->IDTDAT?>"  ><span class="edit"><?php echo $value->PNTCPG_ADRSTR9?></span> <span class="update"> </span></th>
<th class="editable_select" data-value="PNTCPG_ADRSTR10"  data-iddato="<?php echo $value->IDTDAT?>" ><span class="edit_select"><?php echo $value->PNTCPG_ADRSTR10?></span><span class="update_select"> </span></th>
<th class="editable_select" data-value="PNTCPG_T1"  data-iddato="<?php echo $value->IDTDAT?>" ><span class="edit_select"><?php echo $value->PNTCPG_T1?></span><span class="update_select"> </span></th>
<th class="editable" data-value="PNTCPG_T2" data-iddato="<?php echo $value->IDTDAT?>"  ><span class="edit"><?php echo $value->PNTCPG_T2?></span> <span class="update"> </span></th>
<th class="editable" data-value="PNTCPG_T3"  data-iddato="<?php echo $value->IDTDAT?>" ><span class="edit"><?php echo $value->PNTCPG_T3?></span> <span class="update"> </span></th>
<th class="editable_select" data-value="PNTCPG_T4" data-iddato="<?php echo $value->IDTDAT?>"  ><span class="edit_select"><?php echo $value->PNTCPG_T4?></span><span class="update_select"> </span></th>

<th class="editable" data-value="CTR_DATSCR" data-iddato="<?php echo $value->IDTDAT?>"  ><span class="edit"><?php echo $value->CTR_DATSCR?></span> <span class="update"> </span></th>
<th class="editable" data-value="CTR_FINDRNPRDFCT" data-iddato="<?php echo $value->IDTDAT?>"  ><span class="edit"><?php echo $value->CTR_FINDRNPRDFCT?></span> <span class="update"> </span></th>
<th class="editable_select" data-value="CTR_T1" data-iddato="<?php echo $value->IDTDAT?>"  ><span class="edit_select"><?php echo $value->CTR_T1?></span><span class="update_select"> </span></th>
<th class="editable_select" data-value="CTR_CODTYPCTR"  data-iddato="<?php echo $value->IDTDAT?>" ><span class="edit_select"><?php echo $value->CTR_CODTYPCTR?></span><span class="update_select"> </span></th>
<th class="editable" data-value="AVTCTR_DATDBT" data-iddato="<?php echo $value->IDTDAT?>"  ><span class="edit"><?php echo $value->AVTCTR_DATDBT?></span> <span class="update"> </span></th>
<th class="editable_select" data-value="AVTCTR_IDTFACTYP"  data-iddato="<?php echo $value->IDTDAT?>" ><span class="edit_select"><?php echo $value->AVTCTR_IDTFACTYP?></span><span class="update_select"> </span></th>
<th class="editable_select" data-value="AVTCTR_IDTACV"  data-iddato="<?php echo $value->IDTDAT?>" ><span class="edit_select"><?php echo $value->AVTCTR_IDTACV?></span><span class="update_select"> </span></th>

<th class="editable" data-value="AVTCTR_CHP01" data-iddato="<?php echo $value->IDTDAT?>"  ><span class="edit"><?php echo $value->AVTCTR_CHP01?></span> <span class="update"> </span></th>
<th class="editable_select" data-value="AVTCTR_CHP11"  data-iddato="<?php echo $value->IDTDAT?>" ><span class="edit_select"><?php echo $value->AVTCTR_CHP11?></span> <span class="update_select"> </span></th>
<th class="editable_select" data-value="AVTCTR_CHP12" data-iddato="<?php echo $value->IDTDAT?>"  ><span class="edit_select"><?php echo $value->AVTCTR_CHP12?></span> <span class="update_select"> </span></th>
<th class="editable_select" data-value="IDTMODFACMAN" data-iddato="<?php echo $value->IDTDAT?>"  ><span class="edit_select"><?php echo $value->IDTMODFACMAN?></span> <span class="update_select"> </span></th>

							   
 
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
</style>

 <script  type="text/javascript" >
   $(document).ready(function(v) {
	 $('[data-toggle="tooltip"]').tooltip(); 

  $( "tbody .editable" ).dblclick(function() {
	  
	  $(this).find(".edit").attr("contenteditable","true");
	  var text=$(this).find(".edit").html();
	  if(text==""){
		  $(this).find(".edit").html("text");
	  } 
	  
	   $(this).find(".update").html("");
	  $(this).find(".update").append('<a class="updatedato" data-toggle="tooltip" data-placement="bottom" title="Actualizar"   href="#"><i style=" color:#000;" class="fa fa-refresh"></i></a>');
	  });
	  
	  $( "tbody .editable_select .edit_select" ).dblclick(function() {
		  var campo=$(this).parents(".editable_select").data("value");
		  var iddato=$(this).parents(".editable_select").data("iddato");
	  
	  //$(this).find(".edit_select").attr("contenteditable","true");
	  var text=$(this).parents(".editable_select").find(".edit_select").html();
	  $(this).parents(".editable_select").find(".edit_select").html("");
	    $(this).parents(".editable_select").find(".update_select").html("");
	
loadcatalogo(campo,text,$(this).parents(".editable_select"),iddato);

	  });  
	  

		
   });// end document.ready

function loadcatalogo(value,vtext,objeto,iddato){
	console.log(iddato);
	  $.ajax({
      url : AjaxURL(),
    data : { action : "loadcatalogo",catalogo:value,iddato:iddato },
     type : 'POST',
    dataType : 'JSON',
    beforeSend : function(xhr, status) {
    // $(".fichaDeposito").html(gifLoad());
 objeto.find(".update_select").html('<select>'+
	  '<option >Cargando...</option>'+'</select>');
     
    },
    success : function(html) {
		console.log(html);
if(html.status==1){
var optioon='<option value="'+vtext+'">'+vtext+'</option>';
var a='<a class="updatedato2" data-toggle="tooltip" data-placement="bottom" title="Actualizar"   href="#"><i style=" color:#000;" class="fa fa-refresh"></i></a>';
//console.log(html.api[0].catalogo);
//new PNotify({ title: 'Regular Success', text: value+'  '+vtext,  type: 'info', styling: 'bootstrap3'          });
  
$.each(html.api[0].catalogo, function(key,val) {
  //console.log(val.idtcodsns);
optioon+='<option value="'+val.id+'">'+val.lib+'</option>';
});
 
objeto.find(".update_select").html('<select>'+optioon+'</select> '+a);
}else{
objeto.find(".update_select").html('<select>'+
	  '<option >error...</option>'+'</select>');
new PNotify({ title: 'Error', text: value+'  '+vtext,  type: 'error', styling: 'bootstrap3'          });
}

    },
     error : function(xhr, status) {
      // $(".fichaDeposito").html('Disculpe, existió un problema al mostrar la ficha de deposito');
	  console.log("error");
        console.log(status);
    },
 
    complete : function(xhr, status) {
      
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