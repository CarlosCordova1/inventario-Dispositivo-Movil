function AjaxURL(){
    return 'include/ajax/ajax.php';
}
 function gifLoad(){
  return '<img class="img-responsive center-block" src="assets/img/load.gif" alt="Load" height="150" width="150">';
 }

function loadDepositos(){
   $(".imprimeDepositos").html("");
  $.ajax({
      url : AjaxURL(),
    data : { action : "showdepositos"},
     type : 'POST',
    dataType : 'html',
    beforeSend : function(xhr, status) {
     $(".imprimeDepositos").html(gifLoad());
    //  alert("Datos buscado");
  
    },
    success : function(html) {
    //$("#pageContentRegistrado").html(html);
    $(".imprimeDepositos").html(html);
      //alert("Datos buscado");
     // console.log(html);
     // $(".resultData").html(html);
 
    },
     error : function(xhr, status) {
        $(".imprimeDepositos").html('Disculpe, existió un problema al mostrar los Depositos');
       //$(".resultData").html('');
    },
 
    complete : function(xhr, status) {
        //alert('Petición realizada');
       //  console.log(status);
    }
});

}
//----------------------------------
function loadEntidadesExternas(){
  $.ajax({
      url : AjaxURL(),
    data : { action : "showdEntidadesExternas"},
     type : 'POST',
    dataType : 'html',
    beforeSend : function(xhr, status) {
     $(".imprimeEntidades").html(gifLoad());
    //  alert("Datos buscado");
  
    },
    success : function(html) {
    //$("#pageContentRegistrado").html(html);
    $(".imprimeEntidades").html(html);
      //alert("Datos buscado");
     // console.log(html);
     // $(".resultData").html(html);
 
    },
     error : function(xhr, status) {
        $(".imprimeEntidades").html('Disculpe, existió un problema al mostrar las Entidades Externas');
       //$(".resultData").html('');
    },
 
    complete : function(xhr, status) {
        //alert('Petición realizada');
    }
});

}
//------------------------------------------
function loadNuevoDeposito(){
  $.ajax({
      url : AjaxURL(),
    data : { action : "showdNuevoDeposito"},
     type : 'POST',
    dataType : 'html',
    beforeSend : function(xhr, status) {
     $(".imprimeNuevoDeposito").html(gifLoad());
    //  alert("Datos buscado");
  
    },
    success : function(html) {
    //$("#pageContentRegistrado").html(html);
    $(".imprimeNuevoDeposito").html(html);
      //alert("Datos buscado");
     // console.log(html);
     // $(".resultData").html(html);
 
    },
     error : function(xhr, status) {
        $(".imprimeNuevoDeposito").html('Disculpe, existió un problema al mostrar formulario  Nuevo Deposito');
       //$(".resultData").html('');
    },
 
    complete : function(xhr, status) {
        //alert('Petición realizada');
    }
});

}

//----------------------------------
function loadDepositoExterno(){
  $.ajax({
      url : AjaxURL(),
    data : { action : "showdDepositoExterno"},
     type : 'POST',
    dataType : 'html',
    beforeSend : function(xhr, status) {
     $(".imprimeDepositoExterno").html(gifLoad());
    //  alert("Datos buscado");
  
    },
    success : function(html) {
    //$("#pageContentRegistrado").html(html);
    $(".imprimeDepositoExterno").html(html);
      //alert("Datos buscado");
     // console.log(html);
     // $(".resultData").html(html);
 
    },
     error : function(xhr, status) {
        $(".imprimeDepositoExterno").html('Disculpe, existió un problema al mostrar los depositos Externos');
       //$(".resultData").html('');
    },
 
    complete : function(xhr, status) {
        //alert('Petición realizada');
    }
});

}
//------------------------------------------
//----------------------------------
function loadDepositoExternoLote(){
  $.ajax({
      url : AjaxURL(),
    data : { action : "showdDepositoExternoLote"},
     type : 'POST',
    dataType : 'html',
    beforeSend : function(xhr, status) {
     $(".imprimeDepositoExternolote").html(gifLoad());
    //  alert("Datos buscado");
  
    },
    success : function(html) {
    //$("#pageContentRegistrado").html(html);
    $(".imprimeDepositoExternolote").html(html);
      //alert("Datos buscado");
     // console.log(html);
     // $(".resultData").html(html);
 
    },
     error : function(xhr, status) {
        $(".imprimeDepositoExternolote").html('Disculpe, existió un problema al mostrar la bitácora');
       //$(".resultData").html('');
    },
 
    complete : function(xhr, status) {
        //alert('Petición realizada');
    }
});

}
//------------------------------------------
//----------------------------------
function loadArFileWindows(){
  $.ajax({
      url : AjaxURL(),
    data : { action : "showdfilewindows"},
     type : 'POST',
    dataType : 'html',
    beforeSend : function(xhr, status) {
     $(".imprimearchivo").html(gifLoad());
    //  alert("Datos buscado");
  
    },
    success : function(html) {
    //$("#pageContentRegistrado").html(html);
    $(".imprimearchivo").html(html);
      //alert("Datos buscado");
     // console.log(html);
     // $(".resultData").html(html);
 
    },
     error : function(xhr, status) {
        $(".imprimearchivo").html('Disculpe, existió un problema al mostrar los archivos');
       //$(".resultData").html('');
    },
 
    complete : function(xhr, status) {
        //alert('Petición realizada');
    }
});

}
//------------------------------------------

//------------------------------------------
 
//------------------------------------------

 

//------------------------------------------
function loadLoginMain(){
   $(".VincularEntidadExterna").html("");
   $(".imprimeNuevoDeposito").html("");
  $.ajax({
      url : AjaxURL(),
    data : { action : "showLogin",showformlogin:"nuevoDeposito"},
     type : 'POST',
    dataType : 'html',
    beforeSend : function(xhr, status) {
     $(".loginmain").html(gifLoad());
    //  alert("Datos buscado");
  
    },
    success : function(html) {
    //$("#pageContentRegistrado").html(html);
    $(".loginmain").html(html);
      //alert("Datos buscado");
     // console.log(html);
     // $(".resultData").html(html);
 
    },
     error : function(xhr, status) {
        $(".loginmain").html('Disculpe, existió un problema al mostrar login');
       //$(".resultData").html('');
    },
 
    complete : function(xhr, status) {
        //alert('Petición realizada');
    }
});

}
//------------------------------------------
function loadLogOutMain(){
  $.ajax({
      url : AjaxURL(),
    data : { action : "LoginOut",showformlogin:"nuevoDeposito"},
     type : 'POST',
    dataType : 'json',
    beforeSend : function(xhr, status) {
    // $(".loginmain").html(gifLoad());
    //  alert("Datos buscado");
  
    },
    success : function(html) {
    //$("#pageContentRegistrado").html(html);
    //$(".loginmain").html(html);
      //alert("Datos buscado");
     // console.log(html);
     // $(".resultData").html(html);
     window.location.reload(true);

 
    },
     error : function(xhr, status) {
      //  $(".loginmain").html('Disculpe, existió un problema al mostrar login');
       //$(".resultData").html('');
    },
 
    complete : function(xhr, status) {
        //alert('Petición realizada');
    }
});

}
//------------------------------------------
 

//------------------------------------------
 
 
//----------------------------------
function loadfichaDeposito(ficha){
  $.ajax({
      url : AjaxURL(),
    data : { action : "showdfichaDeposito",ficha:ficha },
     type : 'POST',
    dataType : 'html',
    beforeSend : function(xhr, status) {
     $(".fichaDeposito").html(gifLoad());
    //  alert("Datos buscado");
  
    },
    success : function(html) {
    //$("#pageContentRegistrado").html(html);
    $(".fichaDeposito").html(html);
      //alert("Datos buscado");
     // console.log(html);
     // $(".resultData").html(html);
 
    },
     error : function(xhr, status) {
        $(".fichaDeposito").html('Disculpe, existió un problema al mostrar la ficha de deposito');
       //$(".resultData").html('');
    },
 
    complete : function(xhr, status) {
        //alert('Petición realizada');
    }
});

}
 function enviarDatos_bitacora(dataval){
    
    //new PNotify({ title: 'Update', text: update+'  '+value+' '+type,  type: 'info', styling: 'bootstrap3'    });
      $.ajax({
      url : AjaxURL(),
    data : { action : "guardarDatoBitacora",dataval:JSON.stringify(dataval) },
     type : 'POST',
    dataType : 'JSON',
    beforeSend : function(xhr, status) {
    // $(".fichaDeposito").html(gifLoad());
 //objeto.find(".update_select").html('<select>'+
   //   '<option >Cargando...</option>'+'</select>');
     
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
      console.log("error");
        console.log(status);
        //alert('Disculpe, existió un problema al actualizar el dato');
        new PNotify({ title: 'Error de conexión', text: 'Disculpe, existió un problema al insertar los datos',  type: 'error', styling: 'bootstrap3'          });
    },
 
    complete : function(xhr, status) {
      
    }
});
      
}
function enviarDatos_bitacora2(dataval){
    
    //new PNotify({ title: 'Update', text: update+'  '+value+' '+type,  type: 'info', styling: 'bootstrap3'    });
      $.ajax({
      url : AjaxURL(),
    data : { action : "guardarDatoBitacora2",dataval:JSON.stringify(dataval) },
     type : 'POST',
    dataType : 'JSON',
    beforeSend : function(xhr, status) {
    // $(".fichaDeposito").html(gifLoad());
 //objeto.find(".update_select").html('<select>'+
   //   '<option >Cargando...</option>'+'</select>');
     
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
      console.log("error");
        console.log(status);
        //alert('Disculpe, existió un problema al actualizar el dato');
        new PNotify({ title: 'Error de conexión', text: 'Disculpe, existió un problema al insertar los datos',  type: 'error', styling: 'bootstrap3'          });
    },
 
    complete : function(xhr, status) {
      
    }
});
      
}
//------------------------------------------
function loadDesasignar(idasignacion,idquipo){
   //$(".VincularEntidadExterna").html("");
   //$(".imprimeNuevoDeposito").html("");
  $.ajax({
      url : AjaxURL(),
    data : { action : "desasignar",idasignacion:idasignacion,idquipo:idquipo},
     type : 'POST',
    dataType : 'html',
    beforeSend : function(xhr, status) {
     $(".dm_Desasignar").html(gifLoad());
    //  alert("Datos buscado");
  
    },
    success : function(html) {
    //$("#pageContentRegistrado").html(html);
    $(".dm_Desasignar").html(html);
      //alert("Datos buscado");
     // console.log(html);
     // $(".resultData").html(html);
 
    },
     error : function(xhr, status) {
        $(".dm_Desasignar").html('Disculpe, existió un problema al mostrar la pagina "Desasginar"');
       //$(".resultData").html('');
    },
 
    complete : function(xhr, status) {
        //alert('Petición realizada');
    }
});

}
//------------------------------------------

//------------------------------------------
function loadResguardo(idasignacion,idquipo){
   //$(".VincularEntidadExterna").html("");
   //$(".imprimeNuevoDeposito").html("");
  $.ajax({
      url : AjaxURL(),
    data : { action : "resguardo",idasignacion:idasignacion,idquipo:idquipo},
     type : 'POST',
    dataType : 'html',
    beforeSend : function(xhr, status) {
     $(".fichaResguardo").html(gifLoad());
    //  alert("Datos buscado");
  
    },
    success : function(html) {
    //$("#pageContentRegistrado").html(html);
    $(".fichaResguardo").html(html);
      //alert("Datos buscado");
     // console.log(html);
     // $(".resultData").html(html);
 
    },
     error : function(xhr, status) {
        $(".fichaResguardo").html('Disculpe, existió un problema al mostrar la pagina "Resguardo"');
       //$(".resultData").html('');
    },
 
    complete : function(xhr, status) {
        //alert('Petición realizada');
    }
});

}
//------------------------------------------
//------------------------------------------
function loadfile(idasignacion,idquipo){
   //$(".VincularEntidadExterna").html("");
   //$(".imprimeNuevoDeposito").html("");
  $.ajax({
      url : AjaxURL(),
    data : { action : "fileuploadmodal",idasignacion:idasignacion,idquipo:idquipo},
     type : 'POST',
    dataType : 'html',
    beforeSend : function(xhr, status) {
     $(".Verfileload").html(gifLoad());
    //  alert("Datos buscado");
  
    },
    success : function(html) {
    //$("#pageContentRegistrado").html(html);
    $(".Verfileload").html(html);
      //alert("Datos buscado");
     // console.log(html);
     // $(".resultData").html(html);
 
    },
     error : function(xhr, status) {
        $(".Verfileload").html('Disculpe, existió un problema al mostrar la pagina "archivos"');
       //$(".resultData").html('');
    },
 
    complete : function(xhr, status) {
        //alert('Petición realizada');
    }
});

}
//------------------------------------------