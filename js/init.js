$(document).ready(function() {
loadArFileWindows();
 //loadDepositos();
 $("#Depositos,#actDepo").click(function(event) {
$(".imprimeDepositoExterno,.imprimeNuevoDeposito  ,.imprimeDepositoExterno ,.imprimeDepositos ,.imprimeEntidades,.VincularEntidadExterna").html('');

  //$datatable.destroy();
//$('.datatable').destroy();
//var $datatable = $('.datatable-checkbox').destroy();

 loadDepositos();
  /*/var a=new PNotify({
                                  title: 'Regular Success',
                                  text: 'That thing that you were trying to do worked!',
                                  type: 'success',
                                  styling: 'bootstrap3'
                              });
/*/

 });
$("#EntidadesExternas,#actEntidad").click(function(event) {
$(".imprimeDepositoExterno,.imprimeNuevoDeposito  ,.imprimeDepositoExterno ,.imprimeDepositos ,.imprimeEntidades,.imprimeDepositoExternolote,.VincularEntidadExterna").html('');

  loadEntidadesExternas();
 /*/  new PNotify({
                                  title: 'Regular Success',
                                  text: 'That thing that you were trying to do worked!',
                                  type: 'info',
                                  styling: 'bootstrap3'
                              });/*/
});

$("#DepositoExternas,#DepExternolote").click(function(event) {
   $(".imprimeDepositoExterno,.imprimeNuevoDeposito  ,.imprimeDepositoExterno ,.imprimeDepositos ,.imprimeEntidades,.imprimeDepositoExternolote,.VincularEntidadExterna").html('');

  loadDepositoExterno();
 /*/  new PNotify({
                                  title: 'Regular Success',
                                  text: 'That thing that you were trying to do worked!',
                                  type: 'info',
                                  styling: 'bootstrap3'
                              });/*/
});

$("#archivo,#archivotabla").click(function(event) {
   $(".imprimeDepositoExterno,.imprimeNuevoDeposito  ,.imprimeDepositoExterno ,.imprimeDepositos ,.imprimeEntidades,.imprimeDepositoExternolote,.VincularEntidadExterna").html('');

  loadArFileWindows();
 /*/  new PNotify({
                                  title: 'Regular Success',
                                  text: 'That thing that you were trying to do worked!',
                                  type: 'info',
                                  styling: 'bootstrap3'
                              });/*/
});


$("#DepositoExternaslote,#DepExternolotevincula").click(function(event) {
   $(".imprimeDepositoExterno,.imprimeNuevoDeposito  ,.imprimeDepositoExterno ,.imprimeDepositos ,.imprimeEntidades,.imprimeDepositoExternolote,.VincularEntidadExterna").html('');

  loadDepositoExternoLote();
 /*/  new PNotify({
                                  title: 'Regular Success',
                                  text: 'That thing that you were trying to do worked!',
                                  type: 'info',
                                  styling: 'bootstrap3'
                              });/*/
});


 $(".myModalLogin").click(function(event) {
  //loadNuevoDeposito();
  loadLoginMain();
    /*/ new PNotify({
                                  title: 'Regular Success',
                                  text: 'login',
                                  type: 'success',
                                  styling: 'bootstrap3'
                              });/*/
 });

 $("body").on("click",".logout",function(event) {
loadLogOutMain();

    new PNotify({
                                  title: 'Regular Success',
                                  text: 'Sesion Cerrada',
                                  type: 'info',
                                  styling: 'bootstrap3'
                              });
});
 
   $("body").on("keypress",".equipotext",function(event) {

 if (event.which === 13) {
    //  new PNotify({ title: 'Regular Success',  text: 'press enter', type: 'info', styling: 'bootstrap3'  });
  $(this).parent().parent(".form-group").next().find(".equipotext").focus();
 // console.log( $(this));
/*/
 $(this).trigger({
    type: 'keypress',
    which: 9
});
/*/
    //return false;    
  }
  
}); 




  $("body").on("click",".guardarNuevoBitacora2",function(event) {
//var equipo = [];
var text =[];
var nempleado =[];
var nuevoequipo =[];
$("body").find( ".equipotext" ).each(function( index ) {
  console.log( "equipotext -> "+index + ": value -> " + $( this ).val()+" id -> "+$( this ).attr('id') );
  var id=$( this ).attr('id') ; var value= $( this ).val();
    text.push({ value :value,id :id});
});

$("body").find( ".equipotext2" ).each(function( index ) {
  console.log( "equipotext2 -> "+index + ": value -> " + $( this ).val()+" id -> "+$( this ).attr('id') );
  var id=$( this ).attr('id') ; var value= $( this ).val();
    nempleado.push({ value :value,id :id});
});
$("body").find( ".equipotext3" ).each(function( index ) {
  console.log( "equipotext3 -> "+index + ": value -> " + $( this ).val()+" id -> "+$( this ).attr('id') );
  var id=$( this ).attr('id') ; var value= $( this ).val();
    nuevoequipo.push({ value :value,id :id});
});


 var val = $('#Puntodecobranza').val();
    var idcuenta = $('#lista1 option').filter(function() {
        return this.value == val;
    }).data('idcuenta');

     var val22 = $('#Puntodecobranza2').val();
    var idcuenta22 = $('#lista2 option').filter(function() {
        return this.value == val22;
    }).data('idcuenta');
//console.log("idcuenta   "+idcuenta);
   //var r = confirm("¿Esta seguro de realizar esta accion?");
   //if (r == true) {
 
  // new PNotify({  title: 'Alerta', text: 'Se envia datos',type: 'success',styling: 'bootstrap3' });
   console.log("all data");
   var data ={
   dm_m_tipo2 : $("#dm_m_tipo2").val(),
 //carcamo : $("#Puntodecobranza").val(),
 carcamo : idcuenta,
 //operador : $("#Puntodecobranza2").val(),
 operador : idcuenta22,
 nameoperador:val22,
 observaciones : $("#message2").val(),
 //equipo :  equipo,
 text :  text,
 nempleado :  nempleado,
 nuevoequipo :  nuevoequipo,
};
  console.log(data);
if (data.dm_m_tipo2==0 || data.dm_m_tipo2=="") {
    new PNotify({  title: 'Tipo Movil', text: 'Seleccione un tipo',type: 'warning',styling: 'bootstrap3' });
}/*else if(data.carcamo==0 || data.carcamo=="" || data.carcamo ===undefined) {
   new PNotify({  title: 'Carcamo', text: 'Seleccione un Carcamo',type: 'warning',styling: 'bootstrap3' });
}
else if(data.operador==0 || data.operador=="" || data.operador ===undefined) {
   new PNotify({  title: 'Operador', text: 'Seleccione un operador',type: 'warning',styling: 'bootstrap3' });
}
*/else{

if ( data.dm_m_tipo2=="RADIO") {

  if ( nuevoequipo[0].value.trim() =="") {//dm_r_id
    new PNotify({  title: '', text: 'Agregue un ID',type: 'info',styling: 'bootstrap3' });

  }else{


  var r = confirm("¿Esta seguro de realizar esta accion?");
if (r == true) {
   enviarDatos_bitacora2(data);
} else {
  new PNotify({  title: 'Accion Cancelada', text: 'No se guardo datos',type: 'warning',styling: 'bootstrap3' });
}
  }
   
    


}//-----------------------------

else if ( data.dm_m_tipo2=="MOVIL") {
   
   
if ( nuevoequipo[0].value.trim() =="") {//dm_m_serie
    new PNotify({  title: '', text: 'Agregue una Serie',type: 'info',styling: 'bootstrap3' });

  }
else{

  var r = confirm("¿Esta seguro de realizar esta accion?");
if (r == true) {
   enviarDatos_bitacora2(data);
} else {
  new PNotify({  title: 'Accion Cancelada', text: 'No se guardo datos',type: 'warning',styling: 'bootstrap3' });
}

}

}//---------------------------

else if ( data.dm_m_tipo2=="SIM") {

  if ( nuevoequipo[0].value.trim() =="") {//dm_r_id
    new PNotify({  title: '', text: 'Agregue un SIM',type: 'info',styling: 'bootstrap3' });

  }

else{


  var r = confirm("¿Esta seguro de realizar esta accion?");
if (r == true) {
   enviarDatos_bitacora2(data);
} else {
  new PNotify({  title: 'Accion Cancelada', text: 'No se guardo datos',type: 'warning',styling: 'bootstrap3' });
}
  }
   
    


}//-----------------------------
else{
   new PNotify({  title: 'Tipo Movil', text: 'No hay tipo',type: 'warning',styling: 'bootstrap3' });
}

 
  //new PNotify({  title: 'pruebas', text: 'no se guardo datos',type: 'warning',styling: 'bootstrap3' });
}
/*/}
else{
  new PNotify({  title: 'Alerta', text: 'Accion Cancelada',type: 'warning',styling: 'bootstrap3' }); 
}/*/


 });


 






  $("body").on("click",".guardarNuevoBitacora",function(event) {
//var equipo = [];
var text =[];

/*$("body").find( ".equipo" ).each(function( index ) {
  //console.log( index + ": " + $( this ).text() );
  var checked=$(this).find("input[type='radio']:checked").val();
  var name=$(this).find("input[type='radio']:checked").attr('name');
   console.log( "equipo -> "+index + ", name=> "+ name +" checked  -> " + checked );
   equipo.push ({value: checked,id: name});

});
*/
$("body").find( ".equipotext" ).each(function( index ) {
  console.log( "equipotext -> "+index + ": value -> " + $( this ).val()+" id -> "+$( this ).attr('id') );
  var id=$( this ).attr('id') ; var value= $( this ).val();
    text.push({ value :value,id :id});
});


 var val = $('#Puntodecobranza').val();
    var idcuenta = $('#lista1 option').filter(function() {
        return this.value == val;
    }).data('idcuenta');

     var val22 = $('#Puntodecobranza2').val();
    var idcuenta22 = $('#lista2 option').filter(function() {
        return this.value == val22;
    }).data('idcuenta');
//console.log("idcuenta   "+idcuenta);
   //var r = confirm("¿Esta seguro de realizar esta accion?");
   //if (r == true) {
 
  // new PNotify({  title: 'Alerta', text: 'Se envia datos',type: 'success',styling: 'bootstrap3' });
   console.log("all data");
   var data ={
   dm_m_tipo : $("#dm_m_tipo").val(),
 //carcamo : $("#Puntodecobranza").val(),
 carcamo : idcuenta,
 //operador : $("#Puntodecobranza2").val(),
 operador : idcuenta22,
 nameoperador:val22,
 observaciones : $("#message").val(),
 //equipo :  equipo,
 text :  text,
};
  console.log(data);
if (data.dm_m_tipo==0 || data.dm_m_tipo=="") {
    new PNotify({  title: 'Tipo Movil', text: 'Seleccione un tipo',type: 'warning',styling: 'bootstrap3' });
}/*else if(data.carcamo==0 || data.carcamo=="" || data.carcamo ===undefined) {
   new PNotify({  title: 'Carcamo', text: 'Seleccione un Carcamo',type: 'warning',styling: 'bootstrap3' });
}
else if(data.operador==0 || data.operador=="" || data.operador ===undefined) {
   new PNotify({  title: 'Operador', text: 'Seleccione un operador',type: 'warning',styling: 'bootstrap3' });
}
*/else{

if ( data.dm_m_tipo=="RADIO") {

  if ( text[0].value.trim() =="") {//dm_r_id
    new PNotify({  title: '', text: 'Agregue un ID',type: 'info',styling: 'bootstrap3' });

  }else if ( text[1].value.trim() =="") {//dm_r_serie
    new PNotify({  title: '', text: 'Agregue una Serie',type: 'info',styling: 'bootstrap3' });

  }else if ( text[4].value =="0") {//dm_r_serie
    new PNotify({  title: '', text: 'Seleccione un Estatus',type: 'info',styling: 'bootstrap3' });

  }else{


  var r = confirm("¿Esta seguro de realizar esta accion?");
if (r == true) {
   enviarDatos_bitacora(data);
} else {
  new PNotify({  title: 'Accion Cancelada', text: 'No se guardo datos',type: 'warning',styling: 'bootstrap3' });
}
  }
   
    


}//-----------------------------
else if ( data.dm_m_tipo=="MOVIL") {
   
   
if ( text[0].value.trim() =="") {//dm_m_serie
    new PNotify({  title: '', text: 'Agregue una Serie',type: 'info',styling: 'bootstrap3' });

  }else if ( text[1].value.trim() =="") {//dm_m_imei
    new PNotify({  title: '', text: 'Agregue una IMEI',type: 'info',styling: 'bootstrap3' });

  }else if ( text[2].value =="0") {//dm_m_company
    new PNotify({  title: '', text: 'Agregue una Compañia',type: 'info',styling: 'bootstrap3' });

  }
  else if ( text[3].value =="0") {//dm_m_status
    new PNotify({  title: '', text: 'Agregue un Estatus',type: 'info',styling: 'bootstrap3' });

  }
else{

  var r = confirm("¿Esta seguro de realizar esta accion?");
if (r == true) {
   enviarDatos_bitacora(data);
} else {
  new PNotify({  title: 'Accion Cancelada', text: 'No se guardo datos',type: 'warning',styling: 'bootstrap3' });
}

}

}//---------------------------

else if ( data.dm_m_tipo=="SIM") {

  if ( text[0].value.trim() =="") {//dm_r_id
    new PNotify({  title: '', text: 'Agregue un SIM',type: 'info',styling: 'bootstrap3' });

  }

 else if ( text[4].value =="0") {//dm_m_company
    new PNotify({  title: '', text: 'Agregue una Compañia',type: 'info',styling: 'bootstrap3' });

  }
  else if ( text[5].value =="0") {//dm_r_serie
    new PNotify({  title: '', text: 'Seleccione un Estatus',type: 'info',styling: 'bootstrap3' });

  }else{


  var r = confirm("¿Esta seguro de realizar esta accion?");
if (r == true) {
   enviarDatos_bitacora(data);
} else {
  new PNotify({  title: 'Accion Cancelada', text: 'No se guardo datos',type: 'warning',styling: 'bootstrap3' });
}
  }
   
    


}//-----------------------------
else{
   new PNotify({  title: 'Tipo Movil', text: 'No hay tipo',type: 'warning',styling: 'bootstrap3' });
}

 
  //new PNotify({  title: 'pruebas', text: 'no se guardo datos',type: 'warning',styling: 'bootstrap3' });
}
/*/}
else{
  new PNotify({  title: 'Alerta', text: 'Accion Cancelada',type: 'warning',styling: 'bootstrap3' }); 
}/*/


 });

$("body").on("click",".modal_desasignar",function(event) {
var idasignacion=$(this).data("value");
var idquipo=$(this).data("equipo");

console.log(idasignacion);
console.log(idquipo);
loadDesasignar(idasignacion,idquipo);

});

$("body").on("click",".modal_imprime_resguardo",function(event) {
var idasignacion=$(this).data("value");
var idquipo=$(this).data("equipo");

console.log(idasignacion);
console.log(idquipo);
loadResguardo(idasignacion,idquipo);

});

$("body").on("click",".modal_importar_file",function(event) {
var idasignacion=$(this).data("value");
var idquipo=$(this).data("equipo");

console.log(idasignacion);
console.log(idquipo);
loadfile(idasignacion,idquipo);

});
 
 
} );// end $(document).ready