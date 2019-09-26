<?php 

class Login 
{ private $post;

  //produccion
  // private $urlAPIAGK_login='https://www.aguakan.com/api/web.php?';

//test
   private $urlAPIAGK_login='https://www.aguakan.com/git/api/webt.php?';
   
  
//_-------------------------------------------------------------------------------------------   
     public function init($post,$accion)
    {
      $this->post=$post;
       
      switch ($accion) {
        case 'existeUsuario':
          return $this->validaSiexiste();
          break;
          case 'permisos':
          return $this->permisos();
          break;
          case 'logout':
          echo $this->logout();
          break;
          
        default:
          echo json_encode( array('status' =>"No hay accion"));
          break;
      }
    }
   
//_-------------------------------------------------------------------------------------------
     private function validaSiexiste()
    {
      session_start();
      //$cifrar=Funciones::cifrar($this->post["p"]);
      //$Descifrado=Funciones::descifrar($cifrar);
      $cifrar=md5($this->post["p"]);
      //$Descifrado=Funciones::descifrar($cifrar);
      $usuario=$this->post["user"];
      $passw=$this->post["pass"];

$cadena["tb"]="LuE";
$cadena["u"]=$usuario;
$cadena["p"]=$cifrar;
$status=0;
$acce= json_decode($this->apiAGK_login('login',array('mail'=>$usuario,'pass'=>$passw)));
if (isset($acce[0]->status)&& $acce[0]->status==1) {
  $status=1;
  $msg ="el usuario existe";
  $_SESSION['usuarioLogueadodpm']=true;//
  if($acce[0]->servicios->dpm->admin==1 || $acce[0]->servicios->dpm->operativo==1)
  {// || $acce[0]->servicios->lgn->supervisor==1 || $acce[0]->servicios->lgn->invitado==1 ){
    $_SESSION['usuarioLogueadodpm']='ok';//poner nombre de esta sesion en el theme-3-master de la vista
  $_SESSION['DatosusuarioLogueadodpm']=$acce;
  }
  else{
    $status=0;
  $msg ="El usuario existe pero no tiene permisos";
  }
}else{
  $msg= "El usuario no Existe";
  $status=0;
}

  return  json_encode( array('status'=>$status,'msg'=>$msg,'data' =>$acce));

        
    }
//_-------------------------------------------------------------------------------------------

private function apiAGK_login($action,  $data){
 $get='urlget=';
    $build=array();
 switch ($action) {
  case 'login':
  $get.='lgn/1.0/lgn/';
  $build = array('action' => $action,'login' => $data['mail'],'pass'=>$data['pass'],'auth'=>'auth'  );
    break;
    default:
    # code...
    break;
 }
 $urlLogin=$this->urlAPIAGK_login.$get;
$curl = curl_init($urlLogin);      
      curl_setopt($curl, CURLOPT_CONNECTTIMEOUT,8);
      curl_setopt($curl, CURLOPT_POST,true);  
      curl_setopt($curl, CURLOPT_POSTFIELDS, $build); 
      curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
      $response = curl_exec ($curl);  
      curl_close($curl);  
      return $response;   
}

//_-------------------------------------------------------------------------------------------
private function permisos(){
session_start();
$status=0;
$msg="";
$respuesta=0;
$nameSesion="usuarioLogueadodpm";//tambien debe de estar declarada en ajax.php
if (isset($_SESSION[$nameSesion])) {
  $msg="permisos del usuario";
  $status=1;
  $respuesta=$_SESSION['DatosusuarioLogueadodpm'];
}else{
  $msg="usuario no registrado o sesion caducada";
}
return  json_encode( array('status'=>$status,'msg'=>$msg,'permisos' =>$respuesta));
}
//_-------------------------------------------------------------------------------------------

//_-------------------------------------------------------------------------------------------
    private function logout(){
session_start();
session_destroy();
return  json_encode( array('logout'=>1));
    }
//_-------------------------------------------------------------------------------------------
    
}//termina clase Login

//_-------------------------------------------------------------------------------------------//_-------------------------------------------------------------------------------------------//_-------------------------------------------------------------------------------------------//_-------------------------------------------------------------------------------------------
class Ajax extends Login
{
private $post;
private $action;


private $mensajeError="La aplicacion esta desabilitada por el administrador de sistema, favor de ponerse en contacto con el departamento de TI para mas informacion";
private $mensajePermisos="No tiene suficientes permisos para realizar esta accion, pongase en contacto con el administrador del sistema";

//produccion
//  private $urlAPIAGK='https://www.aguakan.com/api/web.php?';

//test
private $urlAPIAGK='https://www.aguakan.com/git/api/webt.php?';
 private $urlAPIempleado='http://192.168.223.100/Intranet/Modulos/dir/dataDirectorio/empleado.php?data';

  function __construct($argument)
  {


  $this->post=$argument;//toda la entrada de datos por $_POST
$this->action=$this->post["action"];


  }
//_-------------------------------------------------------------------------------------------
private function validaStatusApp(){
    $status=false;
       $Acceso= json_decode($this->apiAGK('status',array()));
        if(isset($Acceso[0]->estatusAplicacion) && $Acceso[0]->estatusAplicacion==1){
           $status=true;
        }
             return $status; 
  }
//_-------------------------------------------------------------------------------------------
  private function apiAGK($action,  $data){
 $get='urlget=';
 $urlLogin="";
    $build=array();
 switch ($action) {



 case 'carcamos':
        $get.='dpm/1.0/carcamos';       
            $build = array('action' => $action,
                'auth'=>'auth',
              "switch"=>"",
                 "oratkn"=>$data["oratkn"],
                  "folio"=>$data["folio"],
               );
                         break;

                         case 'operadores':
        $get.='dpm/1.0/operadores';       
            $build = array('action' => $action,
                'auth'=>'auth',
              "switch"=>"",
                 "oratkn"=>$data["oratkn"]);
                         break;

                   case 'variables':
        $get.='dpm/1.0/variables';       
            $build = array('action' => $action,
                'auth'=>'auth',
              "switch"=>"",
                 "idcar"=>$data["carcamo"]);
                         break;

		 case 'showbitacora':
        $get.='dpm/1.0/dpm/';       
            $build = array('action' => $action,
                 "switch"=>"",
                  "carcamo"=>$data["carcamo"] ,
            "fecha1"=>$data["fecha1"] ,
            "fecha2"=>$data["fecha2"] ,
            "turno"=>$data["turno"] ,
            "operador"=>$data["operador"] ,
				         'auth'=>'auth');
        break;
         case 'showbitacora2':
        $get.='dpm/1.0/dpm/';       
            $build = array('action' => $action,
                 "switch"=>"",
                  "carcamo"=>$data["carcamo"] ,
            "fecha1"=>$data["fecha1"] ,
            "fecha2"=>$data["fecha2"] ,
            "turno"=>$data["turno"] ,
            "operador"=>$data["operador"] ,
                 'auth'=>'auth');
        break;
case 'agregarDatoBitacora':
      $get.='dpm/1.0/dpm/';     
      $build = array('action' => $action,
                'auth'=>'auth',
                "oratkn"=>$data["oratkn"],
                "values"=>$data["values"],
               
            );
    break;
    case 'insertDesasinacion':
      $get.='dpm/1.0/dpm/';     
      $build = array('action' => $action,
                'auth'=>'auth',
                "oratkn"=>$data["oratkn"],
              "id"=>$data["id"] ,
         "equipo"=>$data["equipo"] ,
          "estatus"=>$data["estatus"] ,
           "message3"=>$data["message3"]  
               
            );
    break;




    case 'agregarDatoBitacora2':
      $get.='dpm/1.0/dpm/';     
      $build = array('action' => $action,
                'auth'=>'auth',
                "oratkn"=>$data["oratkn"],
                "values"=>$data["values"],
               
            );
    break;  		

    case 'empleado':
      $get.='dpm/1.0/dpm/';     
      $build = array('action' => $action,
                'auth'=>'auth',
                "oratkn"=>$data["oratkn"],
                "values"=>$data["values"],
               
            );
    break;  
        

      
  default:
    //$get.='lct/1.0/lct/';     
    //$build = array('action' => $action);
    break;
 }

$response="";

if($action=="empleado"){
 $response= file_get_contents ($this->urlAPIempleado);

 
}else{
  $urlLogin=$this->urlAPIAGK.$get;
  $curl = curl_init($urlLogin);      
      curl_setopt($curl, CURLOPT_CONNECTTIMEOUT,5);
      curl_setopt($curl, CURLOPT_POST,true);  
      curl_setopt($curl, CURLOPT_POSTFIELDS, $build); 
      curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
      $response = curl_exec ($curl);  
      curl_close($curl);  
    
}

 return $response;

   
}
//_-------------------------------------------------------------------------------------------
  public function init (){
    $this->accion();
  }
//_-------------------------------------------------------------------------------------------
  private function accion (){
    session_start();
/*/
       echo '<div><div class="alert alert-info fade in alert-dismissable">
    <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
    <strong> Informacion!</strong> Se estan realizando actualizaciones!Esperar un par de minutos.
<p>Favor de cerrar su sesion y recargar su pagina presionando las teclas
 <a title="Ver ejemplo" 
href="assets/img/teclado.png" target="_blank"><b>shift + F5</b> </a></p>
     <p>Gracias </p>
     
     </div>
<p><img class="img-responsive center-block" src="assets/img/load.gif" alt="Load" height="112" width="112"></p>
     </div>';
    exit(); 
/*/
        switch ($this->action) {
      
        case 'showLogin':
        $this->showLogin();
         break;
         case 'desasignar':
        $this->desasignar();
        break;
         case 'resguardo':
        $this->resguardo();
          //echo json_encode( array('status' =>"No hay datos para showCuentacliente"));
          break;
                case 'LoginOut':
                session_destroy();
                //$this->showLogin();
                echo json_encode(array("ok"=>'ok'));
                //echo json_encode( array('status' =>"No hay datos para showCuentacliente"));
                break;
                 case 'vincularloteEca':
                  $this->vincularloteEca();
                  //echo json_encode(array("ok"=>'ok'));
                 break;
                  case 'vincularloteEcaOpcionEditar':
                  $this->vincularloteEcaOpcionEditar();
                  //echo json_encode(array("ok"=>'ok'));
                 break;
                
          case 'showdepositos':
            $perm= json_decode(Login::init($this->post,"permisos")); 
            //echo $perm=json_decode(Login::init($this->post,"permisos"));      
           // var_dump($perm)  ;
        if($perm->status==1)
        {
          $this->showdepositos();
        }else if($_SESSION["conexdpm"]=="true"){
  $this->showdepositos();
        }
         else{
     // $this->showdepositos();
    echo '<div class="alert alert-warning fade in alert-dismissable">
    <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
    <strong> warning!</strong> Favor de iniciar sesion</div>';
 }
        
               // echo json_encode(array("ok"=>'ok'));
          break;
				case 'showdDepositoExterno':
                $this->showdDepositoExterno();
                break;
				case 'showdDepositoExternoLote':
                $this->showdDepositoExternoLote();
                break;
				case 'showdfilewindows':
                $this->showdfilewindows();
                break;
				case 'fileupload'://carga archivo 
					//var_dump($_FILES);
					$this->fileupload($_FILES);
					break;
            case 'mostrarFileFolio'://muestra archivo 
          //var_dump($_FILES);
         $this->showFileUpload();
          break;

                case 'showdEntidadesExternas':
                $this->showdEntidadesExternas();
                break;
                case 'showdNuevoDeposito':
                $this->showdNuevoDeposito();
                break;
                 case 'showdModalVincular':
                $this->showdModalVincular();
                break;
				 case 'showdModalVincularver':
                $this->showdModalVincularver();
                break;
                case 'showdModaleditarCaja':
                $this->showdModaleditarCaja();
                break;
                case 'showdModaleditarEntidadExterna':
                $this->showdModaleditarEntidadExterna();
                break;
				        case 'fileuploadmodal':
                $this->showdModalVerfile();
                break;
				case 'showdModalVerificafile':
                $this->showdModalVerificafile();
                break;
				       case 'loadcatalogo':
                $this->loadcatalogo();
                break;
                  case 'guardarDatoBitacora':
                $this->guardarDatoBitacora();
                break;
                			
                 case 'guardarDatoBitacora2':
                $this->guardarDatoBitacora2();
                break;
                 case 'CJ_ActualizarDeposito':
                $this->CJ_ActualizarDeposito();
                break;
                 case 'EET_ActualizarDeposito':
                $this->EET_ActualizarDeposito();
                break;
                case 'showdLoteDetalle':
                $this->showdLoteDetalle();
                break;
                 case 'showdfichaDeposito':
                $this->showdfichaDeposito();
                break;

                  case 'buscarCarcamo_tabla':
                $this->buscarCarcamo_tabla();
                break;
                case 'buscarCarcamo_tabla2':
                $this->buscarCarcamo_tabla2();
                break;
                case 'insertarasinacion':
                $this->insertarasinacion();
                break;
          case 'validaconexionREF':
            //Login::init($this->post,"lgr");
           $perm=json_decode(Login::init($this->post,"existeUsuario")); 
            //echo $perm=json_decode(Login::init($this->post,"permisos"));        
        if($perm->status==1)
        {//|| $perm->permisos[0]->servicios->lgn->supervisor==1){
        //echo json_encode(array("status"=>1,"msg"=>'ok',"perm"=>$perm));
          $this->validaconexionREF($perm);
        }else if ($_SESSION["conexdpm"]=="true" )//&& $this->post["conex"]=="true")
             {
          $this->validaconexionREFsesion();
        }

        else{
          echo json_encode(array("status"=>0,"msg"=>"Permisos no valido para la aplicacion","perm"=>$perm));
        }
        
          //echo json_encode( array('status' =>"No hay datos para mostrar"));
          break;
 //--------------------------------------------------------------------------------------------
           case 'procesarlotex7':
              $this->procesarlotex7();
                break;
//--------------------------------------------------------------------------------------------
 //--------------------------------------------------------------------------------------------
           case 'desestimarlote':
              $this->desestimarlote();
                break;
//--------------------------------------------------------------------------------------------
//--------------------------------------------------------------------------------------------
           case 'buscarCarcamo':
              $this->buscarCarcamo();
                break;
//--------------------------------------------------------------------------------------------
           case 'buscarCarcamo2':
              $this->buscarCarcamo2();
                break;
//--------------------------------------------------------------------------------------------
           //case 'imprimir_pdf':
           // echo $this->imprimir_pdf();
           //     break;
//--------------------------------------------------------------------------------------------

        default:
        echo "No hay accion";
        break;
    }

    
  }
//_-------------------------------------------------------------------------------------------
 
//_-------------------------------------------------------------------------------------------
private function insertarasinacion(){
session_start();
  $id=$this->post["id"];
  $equipo=$this->post["equipo"];
  $estatus=$this->post["estatus"];
  $message3=$this->post["message3"]; 
  $perm= json_decode(Login::init($this->post,"permisos")); 
    $oratkn=$perm->permisos[0]->oratkn; 
$api= json_decode( $this->apiAGK(
    'insertDesasinacion',
    array("auth"=>"ss",
        "oratkn"=>$oratkn,
        "id"=>$id ,
         "equipo"=>$equipo ,
          "estatus"=>$estatus ,
           "message3"=>$message3     
    )));




$status=0;
$user="";
if( $perm->permisos[0]->servicios->ref->operativo==1){
$status=1;
$user=$perm->permisos[0]->display_name;
}
if ($api) {
   echo  json_encode(array("post"=>$this->post,"perm"=>$perm,
  'oratkn'=>$oratkn,"api"=>$api,"status"=>1,"user"=>$user,"data"=>$data,"carcamo"=>$data->carcamo,"sesion"=>$_SESSION[$data->carcamo]));
 }
 else{


 echo  json_encode(array("post"=>$this->post,"perm"=>$perm,
  'oratkn'=>$oratkn,"api"=>$api,"status"=>0,"user"=>$user));
}
}
//_-------------------------------------------------------------------------------------------

//_-------------------------------------------------------------------------------------------
private function buscarCarcamo(){
session_start();
  $carcamo=$this->post["carcamo"]; 

 // $variable= json_decode( $this->apiAGK('variables',array("auth"=>"ss" ,'carcamo'=>$carcamo  )));

$carcamos= json_decode( $this->apiAGK('carcamos',array("auth"=>"ss" ,'oratkn'=>$oratkn  )));

   if($carcamo=='RADIO'){
    include_once("dm_plantilla_radio.php");
   
  }
  else if($carcamo=='MOVIL'){
    include_once("dm_plantilla_movil.php");
  
  }
    else if($carcamo=='SIM'){
    include_once("dm_plantilla_sim.php");
 
  }
else {
   echo '<br><br><div class="row">
<br><div class="alert alert-warning fade in alert-dismissable">
    <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
    <strong>No hay plantilla definida</strong>
</div></div>';  
}

  ?>
                      <script type="text/javascript" src="assets/Inputmask-4.x/dist/jquery.inputmask.bundle.js" charset="utf-8"></script>
<script src="assets/gentelella-master/build/js/custom.js"></script>
<?php if (isset($_SESSION[$carcamo])) {

 ?>
<script type="text/javascript">

$(document).ready(function(e) {
  //var voper= 
  $("#Puntodecobranza2").val("<?php echo $_SESSION[$carcamo]["nameoperador"]?>");
  // new PNotify({ title: 'Regular ok',  text: 'operador '+voper, type: 'info', styling: 'bootstrap3'  });

/*/
  $('.equipotext').on('keypress', function(event) {
 if (event.which === 13) {
     new PNotify({ title: 'Regular Success',  text: 'press enter2', type: 'info', styling: 'bootstrap3'  });
  $(this).next().focus();
 // console.log( $(this));
    //return false;    
  }});
  /*/

  });
</script>
<?php 

} ?>



  <?php
 
}
//_-------------------------------------------------------------------------------------------


//_-------------------------------------------------------------------------------------------
private function buscarCarcamo2(){
session_start();
  $carcamo=$this->post["carcamo"]; 
  $users=$this->post["carcamo"];
$users = explode(",", $users);

 $tipo=$this->post["tipo"]; 



 // $variable= json_decode( $this->apiAGK('variables',array("auth"=>"ss" ,'carcamo'=>$carcamo  )));

$carcamos= json_decode( $this->apiAGK('carcamos',array("auth"=>"ss" ,'oratkn'=>$oratkn  )));


   if($tipo!='' && $tipo!='0'){
    $empleado= json_decode( $this->apiAGK('empleado',array("auth"=>"ss" ,'oratkn'=>$oratkn ) ));
$data=array();
foreach ($users as   $user) {

 foreach ($empleado->cancunActivo as $key => $value) { 
  if ((string)$value->noEmpleado[0] ===(string)$user) {
   $data[]=$value;
  }
 }
  foreach ($empleado->cancunInactivo as $key => $value) { 
  if ((string)$value->noEmpleado[0] ===(string)$user) {
   $data[]=$value;
  }
 }
  foreach ($empleado->playaActivo as $key => $value) { 
  if ((string)$value->noEmpleado[0] ===(string)$user) {
   $data[]=$value;
  }
 }
  foreach ($empleado->playaInactivo as $key => $value) { 
  if ((string)$value->noEmpleado[0] ===(string)$user) {
   $data[]=$value;
  }
 }

}
                             
    //  echo "-->".$carcamo;                     
     
//var_dump($data);
if (!empty($data)) {
  //var_dump($data);
  if ($tipo=="MOVIL") {
   include_once("dm_plantilla_asignar.php");
  } else if ($tipo=="RADIO") {
   include_once("dm_plantilla_asignar_radio.php");
  }else if ($tipo=="SIM") {
   include_once("dm_plantilla_asignar_sim.php");
  }
  else{
    echo '<br><br><div class="row">
<br><div class="alert alert-warning fade in alert-dismissable">
    <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
    <strong>No hay plantilla definida</strong>
</div></div>'; 
  }
 
}
  
   ?>
   <?php
  }
 
else {
   echo '<br><br><div class="row">
<br><div class="alert alert-warning fade in alert-dismissable">
    <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
    <strong>No hay plantilla definida</strong>
</div></div>';  
}

  ?>
                      <script type="text/javascript" src="assets/Inputmask-4.x/dist/jquery.inputmask.bundle.js" charset="utf-8"></script>
<script src="assets/gentelella-master/build/js/custom.js"></script>
<?php if (isset($_SESSION[$carcamo])) {

 ?>
<script type="text/javascript">

$(document).ready(function(e) {
  //var voper= 
  $("#Puntodecobranza2").val("<?php echo $_SESSION[$carcamo]["nameoperador"]?>");
  // new PNotify({ title: 'Regular ok',  text: 'operador '+voper, type: 'info', styling: 'bootstrap3'  });

/*/
  $('.equipotext').on('keypress', function(event) {
 if (event.which === 13) {
     new PNotify({ title: 'Regular Success',  text: 'press enter2', type: 'info', styling: 'bootstrap3'  });
  $(this).next().focus();
 // console.log( $(this));
    //return false;    
  }});
  /*/

  });
</script>
<?php 

} ?>



  <?php
 
}
//_-------------------------------------------------------------------------------------------



//_-------------------------------------------------------------------------------------------
private function procesarlotex7(){
/*session_start();
  $lote=$this->post["lote"]; 
  $perm= json_decode(Login::init($this->post,"permisos")); 
    $oratkn=$perm->permisos[0]->oratkn; 
$api= json_decode( $this->apiAGK(
    'lotetox7',
    array("auth"=>"ss",
        "oratkn"=>$oratkn,
        "lote"=>$lote     
    )));
$status=0;
$user="";
if($perm->permisos[0]->servicios->ref->admin==1 || $perm->permisos[0]->servicios->ref->operativo==1){
$status=1;
$user=$perm->permisos[0]->display_name;
}
if(isset($api[0]->status) && $api[0]->status ==1){
 echo  json_encode(array("post"=>$this->post,"perm"=>$perm,'oratkn'=>$oratkn,"API"=>$api,"status"=>$status,"user"=>$user));
}
else{
  echo  json_encode(array("post"=>$this->post,"perm"=>$perm,'oratkn'=>$oratkn,"API"=>$api,"status"=>0,"msg"=>'ocurrio un error en tiempo de ejecución, procesar nuevamente',"user"=>$user));
}
*/
}
//_-------------------------------------------------------------------------------------------



//_-------------------------------------------------------------------------------------------
public function imprimir_pdf($folio){
  //session_start();
  $perm= json_decode(Login::init($this->post,"permisos"));
  $oratkn=$perm->permisos[0]->oratkn; 
 return json_decode($this->apiAGK('carcamos',array("auth"=>"ss" ,'oratkn'=>$oratkn,'folio'=>$folio  )));

}
//_-------------------------------------------------------------------------------------------


//_-------------------------------------------------------------------------------------------
private function validaconexionREF($perm){
  //$data1=true;
session_start();
$_SESSION["conexdpm"]=$this->post["conex"];
$_SESSION["dpm_turno"]=$this->post["vturno"];
  $idtopr=$this->post["idtopr"]; 
  $Referencia=$this->post["Referencia"]; 
   $conex=$this->post["conex"];
  $oratkn=$perm->data[0]->oratkn; 
    $status=0;
    $user="";
if ($perm->status==1) {
     $status=1;
     $user=$perm->data[0]->display_name;
}

//$api= json_decode( $this->apiAGK('updateSPEIw',array("auth"=>"ss","oratkn"=>$oratkn,"idtopr"=>$idtopr,"Referencia"=>$Referencia)));
  //var_dump($this->post);
 $api=array("post"=>$this->post,"perm"=>$perm,'oratkn'=>$oratkn,"API"=>$api);
 echo json_encode(array("API"=>$api,"status"=> $status,"user"=>$user));

}
//_-------------------------------------------------------------------------------------------
//_-------------------------------------------------------------------------------------------
private function validaconexionREFsesion(){
  //$data1=true;
session_start();
$_SESSION["conexdpm"]=$this->post["conex"];

//$_SESSION["cco_turno"]=$this->post["vturno"];



  $idtopr=$this->post["idtopr"]; 
  $Referencia=$this->post["Referencia"]; 
   $conex=$this->post["conex"];

    $perm= json_decode(Login::init($this->post,"permisos")); 
  $oratkn=$perm->permisos[0]->oratkn; 
$api= json_decode( $this->apiAGK('updateq',array("auth"=>"ss","oratkn"=>$oratkn,"idtopr"=>$idtopr,"Referencia"=>$Referencia)));
$status=0;
$user="";
if($perm->permisos[0]->servicios->ref->admin==1){
$status=1;
$user=$perm->permisos[0]->display_name;
}

  //var_dump($this->post);
 echo  json_encode(array("post"=>$this->post,"perm"=>$perm,'oratkn'=>$oratkn,"API"=>$api,"status"=>$status,"user"=>$user));
 //echo json_encode(array("API"=>$api));

}
//_-------------------------------------------------------------------------------------------
private function showdepositos(){
$data1=true;

//$variables= json_decode( $this->apiAGK('BuscarVariables',array("auth"=>"ss" )));


$apicount= json_decode( $this->apiAGK('ShowDepositoCoun',array("auth"=>"ss" ,"Externa"=>"NO"  )));



//$api= json_decode( $this->apiAGK('ShowDeposito',array("auth"=>"ss" ,"Externa"=>"NO"  )));
 
 //var_dump($apicount[0]->Depositocount->{1}->CTVC);//TPODEP 
// echo "<br>ssss";
 //temp.put('CTV',ind.CTV);
          //   temp.put('CTVA',ind.CTVA);
           //   temp.put('CTVC',ind.CTVC);

$totalregistros=$apicount[0]->Depositocount->{1}->CTV+$apicount[0]->Depositocount->{1}->CTVA+$apicount[0]->Depositocount->{1}->CTVC;
//echo "<br> total registros -> ".$totalregistros;



 $perm= json_decode(Login::init($this->post,"permisos")); 
 $oratkn=$perm->permisos[0]->oratkn; 
 //echo json_encode($perm);
 //echo $oratkn;

$externa="NO";
if($perm->permisos[0]->servicios->ref->operativo==1)
{
$externa="CA";
}

$total=$totalregistros;
$seccion=25;
$paginas = round($total/$seccion)+1;
//echo "<br>paginas -> ".$paginas;
$val=array();
for($f=0; $f<$paginas ; $f++) {
 $MIN=($seccion*$f)+1;
    $MAX=$seccion*$f+$seccion;
   // echo "<br>f  -> menor ". $MIN."  mayor -> ".$MAX;
$val[] =  json_decode( $this->apiAGK('ShowDeposito',array("auth"=>"ss" ,
  "Externa"=>$externa,
  "oratkn"=>$oratkn,
    "min"=>$MIN,"max"=>$MAX
  )));


}
//var_dump($val);

$user="";
if($perm->permisos[0]->servicios->ref->admin==1 || $perm->permisos[0]->servicios->ref->operativo==1){
$user=$perm->permisos[0]->display_name;
}

//echo json_encode($api);
 if (!isset($apicount->code)) {
   include_once("caja-depositos.php");
 }
 else{
    echo '<div class="alert alert-danger fade in alert-dismissable">
    <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
    <strong>Danger!</strong> Ocurrio un error. <br>'.json_encode($api). '
</div>';
 }


}
//_-------------------------------------------------------------------------------------------

//_-------------------------------------------------------------------------------------------
private function showdEntidadesExternas(){
$data1=true;

$perm= json_decode(Login::init($this->post,"permisos")); 

    $oratkn=$perm->permisos[0]->oratkn; 


$apicount= json_decode( $this->apiAGK('ShowDepositoCoun',array("auth"=>"ss" ,"Externa"=>"NO"  )));
//var_dump($apicount[0]->Depositocount->{1}->DEEX);//TPODEP 
//echo json_encode($apicount);//CTVA 
     //temp.put('DTV',ind.DTV);
    //  temp.put('DST',ind.DST);

/*
"EEX": 6,
        "DTV": 2,
        "DST": 2,
        "CAT": 6
*/

$externa="";
if($perm->permisos[0]->servicios->ref->operativo==1){
$externa="SI";
}
if($perm->permisos[0]->servicios->ref->admin==1){
$externa="SI0";
}

//$totalregistros= $apicount[0]->Depositocount->{1}->EEX+$apicount[0]->Depositocount->{1}->DTV+$apicount[0]->Depositocount->{1}->DST+$apicount[0]->Depositocount->{1}->CAT; 

$totalregistros= $apicount[0]->Depositocount->{1}->DTV+$apicount[0]->Depositocount->{1}->DST+$apicount[0]->Depositocount->{1}->CAT;
//echo 'total registros -- >  '.$totalregistros;
$total=$totalregistros;
$seccion=30;
$paginas = round($total/$seccion)+1;
//echo "<br>paginas -> ".$paginas;
$val=array();
for($f=0; $f<$paginas ; $f++) {
 $MIN=($seccion*$f)+1;
    $MAX=$seccion*$f+$seccion;
  //  echo "<br>f  -> menor ". $MIN."  mayor -> ".$MAX;
$val[] =  json_decode( $this->apiAGK('ShowDeposito',array("auth"=>"ss" ,
  "Externa"=>$externa,
  "oratkn"=>$oratkn,
    "min"=>$MIN,"max"=>$MAX
  )));

}
//var_dump($val);




 
$PuntoCobranza= json_decode( $this->apiAGK(
    'BuscarPuntoCobranza',
    array("auth"=>"ss",
        "oratkn"=>$oratkn,
            //"Deposito"=>$Deposito
    )));
$banco= json_decode( $this->apiAGK(
    'BuscarBancos',
    array("auth"=>"ss",
       // "oratkn"=>$oratkn,
            //"Deposito"=>$Deposito
    )));

$user="";
if($perm->permisos[0]->servicios->ref->admin==1 || $perm->permisos[0]->servicios->ref->operativo==1){
$user=$perm->permisos[0]->display_name;
}


    if ($user!="") {
        //$api= json_decode( $this->apiAGK('ShowDeposito',array("auth"=>"ss" ,"Externa"=>"SI"  )));
     // var_dump($val);
if ($val) {
//include_once("entidadesExternas.php");
//include_once("nuevoDeposito.php");
       include_once("entidadExterna.php");
   }
        else{
    echo '<div class="alert alert-danger fade in alert-dismissable">
    <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
    <strong>Danger!</strong> Ocurrio un error. <br>'.json_encode($api). '
</div>';
 
    }
}
else{
        echo '<div class="alert alert-info fade in alert-dismissable">
    <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
    <strong>Info! </strong>Iniciar Sesion con cuenta de administrador para esta seccion</div>';
    }

 

}
//_-------------------------------------------------------------------------------------------


//_-------------------------------------------------------------------------------------------
private function showdDepositoExterno(){
$data1=true;

$perm= json_decode(Login::init($this->post,"permisos")); 

    $oratkn=$perm->permisos[0]->oratkn; 


$apicount= json_decode( $this->apiAGK('ShowDepositoCoun',array("auth"=>"ss" ,"Externa"=>"NO"  )));
//var_dump($apicount[0]->Depositocount->{1}->DEEX);//TPODEP 
//echo json_encode($apicount);//CTVA 
     //temp.put('DTV',ind.DTV);
    //  temp.put('DST',ind.DST);

/*
"EEX": 6,
        "DTV": 2,
        "DST": 2,
        "CAT": 6
*/

$externa="";
if($perm->permisos[0]->servicios->ref->operativo==1){
$externa="SI";
}
if($perm->permisos[0]->servicios->ref->admin==1){
$externa="SI0";
}

//$totalregistros= $apicount[0]->Depositocount->{1}->EEX+$apicount[0]->Depositocount->{1}->DTV+$apicount[0]->Depositocount->{1}->DST+$apicount[0]->Depositocount->{1}->CAT; 

$totalregistros= $apicount[0]->Depositocount->{1}->EEX;

//echo 'total registros -- >  '.$totalregistros;
$total=$totalregistros;
$seccion=30;
$paginas = round($total/$seccion)+1;
//echo "<br>paginas -> ".$paginas;
$val=array();
for($f=0; $f<$paginas ; $f++) {
 $MIN=($seccion*$f)+1;
    $MAX=$seccion*$f+$seccion;
  //  echo "<br>f  -> menor ". $MIN."  mayor -> ".$MAX;
$val[] =  json_decode( $this->apiAGK('ShowDepositoExterno',array("auth"=>"ss" ,
  "Externa"=>$externa,  "oratkn"=>$oratkn,"min"=>$MIN,"max"=>$MAX )));

}
//var_dump($val);




 
$PuntoCobranza= json_decode( $this->apiAGK(
    'BuscarPuntoCobranzaExterno',
    array("auth"=>"ss",
        "oratkn"=>$oratkn,
            //"Deposito"=>$Deposito
    )));
$banco= json_decode( $this->apiAGK(
    'BuscarBancos',
    array("auth"=>"ss",
       // "oratkn"=>$oratkn,
            //"Deposito"=>$Deposito
    )));

$user="";
if($perm->permisos[0]->servicios->ref->admin==1 || $perm->permisos[0]->servicios->ref->operativo==1){
$user=$perm->permisos[0]->display_name;
}


    if ($user!="") {
        //$api= json_decode( $this->apiAGK('ShowDeposito',array("auth"=>"ss" ,"Externa"=>"SI"  )));
     // var_dump($val);
if ($val) {
//include_once("entidadesExternas.php");
//include_once("nuevoDeposito.php");
       include_once("depositoExterno.php");
   }
        else{
    echo '<div class="alert alert-danger fade in alert-dismissable">
    <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
    <strong>Danger!</strong> Ocurrio un error. <br>'.json_encode($api). '
</div>';
 
    }
}
else{
        echo '<div class="alert alert-info fade in alert-dismissable">
    <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
    <strong>Info! </strong>Iniciar Sesion con cuenta de administrador para esta seccion</div>';
    }

 

}
//_-------------------------------------------------------------------------------------------
//_-------------------------------------------------------------------------------------------
private function showdDepositoExternoLote(){
$data1=true;

$perm= json_decode(Login::init($this->post,"permisos")); 

    $oratkn=$perm->permisos[0]->oratkn; 

$user="";
//if($perm->permisos[0]->servicios->ref->admin==1 ||
if( $perm->permisos[0]->servicios->dpm->operativo==1){
$user=$perm->permisos[0]->display_name;
}

//echo json_encode($perm);
//var_dump(Login::init($this->post,"permisos"));
    $oratkn=$perm->permisos[0]->oratkn; 
$carcamos= json_decode( $this->apiAGK('carcamos',array("auth"=>"ss" ,'oratkn'=>$oratkn  )));
$operador= json_decode( $this->apiAGK('operadores',array("auth"=>"ss" ,'oratkn'=>$oratkn  )));


    if ($user!="") {
        $api= true;//json_decode( $this->apiAGK('showbitacora',array("auth"=>"ss"   )));
      //var_dump($api);
if ($api) {
//include_once("entidadesExternas.php");
//include_once("nuevoDeposito.php");
       //include_once("depositoExterno.php");
	   // include_once("depositoExternoLote.php");
      //include_once("bitacoraReporte.php");
      include_once("dm_bitacoraReporte.php");
   }
        else{
    echo '<div class="alert alert-danger fade in alert-dismissable">
    <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
    <strong>Danger!</strong> Ocurrio un error. <br>'.json_encode($api). '
</div>';
 
    }
}
else{
        echo '<div class="alert alert-info fade in alert-dismissable">
    <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
    <strong>Info! </strong>Iniciar Sesion con cuenta de operador para esta seccion</div>';
    }

 

}
//_-------------------------------------------------------------------------------------------
//_-------------------------------------------------------------------------------------------
private function showdfilewindows(){
  session_start();
$data1=true;

$perm= json_decode(Login::init($this->post,"permisos")); 
$vturno=$_SESSION["dpm_turno"];
//echo json_encode($_SESSION);
//echo json_encode($perm);
//var_dump(Login::init($this->post,"permisos"));
    $oratkn=$perm->permisos[0]->oratkn; 
$carcamos= json_decode( $this->apiAGK('carcamos',array("auth"=>"ss" ,'oratkn'=>$oratkn  )));
//$operador= json_decode( $this->apiAGK('operadores',array("auth"=>"ss" ,'oratkn'=>$oratkn  )));
//echo "<br>".$this->apiAGK('carcamos',array("auth"=>"ss" ,'oratkn'=>$oratkn  ));
//var_dump($carcamos);

$empleado= json_decode( $this->apiAGK('empleado',array("auth"=>"ss" ,'oratkn'=>$oratkn ) ));

//var_dump($empleado->cancunActivo);

$user="";
//if($perm->permisos[0]->servicios->cco->admin==1 ||
if ( $perm->permisos[0]->servicios->dpm->operativo==1){
$user=$perm->permisos[0]->display_name;
}

//if ($apicount) {

	//echo json_encode($apicount);
  if($user!=""){
  // include_once("bitacora.php"); 
   include_once("dm_bitacora.php");
 }else{
   echo '<div class="alert alert-warning fade in alert-dismissable">
    <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
    <strong>Alerta!</strong> Favor de iniciar sesion para ingresar a esta seccion
</div>';
 }
	    /*
   }
        else{
    echo '<div class="alert alert-danger fade in alert-dismissable">
    <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
    <strong>Danger!</strong> Ocurrio un error. <br>'.json_encode($api). '
</div>';
    }
    */

}
//_-------------------------------------------------------------------------------------------
private function fileupload($file){
  $folio=$this->post["folio"];
$dir_subida = str_replace("include/ajax", "documentos/", dirname(__FILE__)).$folio."/" ;

$fichero_subido = $dir_subida . basename($file['archivo']['name']);

if (is_dir($dir_subida)) {
  if (move_uploaded_file($file['archivo']['tmp_name'], $fichero_subido)) {
    echo "El fichero <b>".$file['archivo']['name']."</b> es válido y se subió con éxito.\n";
} else {
    echo "Erroralcargarficheros";
      }

}else{

if(!mkdir($dir_subida, 0777, true)) {
   echo 'Fallo al crear las carpetas...';

}else{
  if (move_uploaded_file($file['archivo']['tmp_name'], $fichero_subido)) {
    echo "El fichero <b>".$file['archivo']['name']."</b> es válido y se subió con éxito.\n";
} else {
    echo "Erroralcargarficheros";
}
}

}



}


private function createlog($name,$contenido){
date_default_timezone_set('America/Cancun');
	$nombre_archivo = "../documentos/log/".$name."_".date("d_m_Y_H:i:s")."_log.json"; 
    if(file_exists($nombre_archivo))
    {
       // echo $mensaje = "<br>El Archivo $nombre_archivo se ha modificado";
    }
 
    else
    {
        //echo $mensaje = "<br>El Archivo $nombre_archivo se ha creado";
    }
 
    if($archivo = fopen($nombre_archivo, "w+"))
    {
        if(fwrite($archivo,$contenido. "\n"))
        {
            //echo "<br>Se ha ejecutado correctamente";
        }
        else
        {
          //  echo "<br>Ha habido un problema al crear el archivo";
        }
 
        fclose($archivo);
    }else{
    	//echo '<br> no se pudo abrir ';
    }
   
}

//_-------------------------------------------------------------------------------------------
private function showdNuevoDeposito(){
$data1=true;
//include_once("nuevoDeposito.php");
echo '<div class="alert alert-danger fade in alert-dismissable">
    <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
    <strong>Danger!</strong>Se cambio la definicion :/</div>';

}
//_-------------------------------------------------------------------------------------------
//_-------------------------------------------------------------------------------------------
private function showdModalVincular(){
$data1=true;
$perm= json_decode(Login::init($this->post,"permisos")); 

$identificador=$this->post["identificador"];//deposito
$monto=$this->post["monto"];//deposito

   $oratkn=$perm->permisos[0]->oratkn; 
$api= json_decode( $this->apiAGK(
    'BuscarLotes',
    array("auth"=>"ss",
        "oratkn"=>$oratkn,
            "Id"=>$identificador
    )));

//var_dump($api);

$user="";
if($perm->permisos[0]->servicios->ref->admin==1){
$user=$perm->permisos[0]->display_name;
}

if ($user!="") {
include_once("vincularECA.php");
}else{
    echo '<div class="alert alert-info fade in alert-dismissable">
    <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
    <strong>Info! </strong> Iniciar Sesion para hacer este cambio/</div>';
}
}
//_-------------------------------------------------------------------------------------------
//_-------------------------------------------------------------------------------------------
private function showdModalVincularver(){
$data1=true;
$perm= json_decode(Login::init($this->post,"permisos")); 

$identificador=$this->post["identificador"];//deposito
$monto=$this->post["monto"];//deposito

   $oratkn=$perm->permisos[0]->oratkn; 
$api= json_decode( $this->apiAGK(
    'BuscarLotesverdetalle',
    array("auth"=>"ss",
        "oratkn"=>$oratkn,
            "Id"=>$identificador
    )));

//var_dump($api);

$user="";
if($perm->permisos[0]->servicios->ref->admin==1){
$user=$perm->permisos[0]->display_name;
}

if ($user!="") {
//include_once("vincularECA.php");
include_once("verdetallelote.php");
}else{
    echo '<div class="alert alert-info fade in alert-dismissable">
    <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
    <strong>Info! </strong> Iniciar Sesion para hacer este cambio/</div>';
}
}
//_-------------------------------------------------------------------------------------------

//_-------------------------------------------------------------------------------------------
private function showdLoteDetalle(){
$data1=true;
$perm= json_decode(Login::init($this->post,"permisos")); 
$lote=$this->post["lote"];
$totalpagos=$this->post["totalpagos"];
$seccion=100;
$paginas = round($totalpagos/$seccion)+1;
//echo "<br>paginas -> ".$paginas;
$val=array();
 $oratkn=$perm->permisos[0]->oratkn;
for($f=0; $f<$paginas ; $f++) {
    $MIN=($seccion*$f)+1;
    $MAX=$seccion*$f+$seccion;
    //echo "<br>f  -> menor ". $MIN."  mayor -> ".$MAX;
    $val[]= json_decode( $this->apiAGK(
    'BuscarLotesDetalle',
    array("auth"=>"ss",
       "oratkn"=>$oratkn,
            "lote"=>$lote,
            "min"=>$MIN,"max"=>$MAX
    )));
}


/*/
   
$api= json_decode( $this->apiAGK(
    'BuscarLotesDetalle',
    array("auth"=>"ss",
       "oratkn"=>$oratkn,
            "lote"=>$lote,
            "min"=>$MIN,"max"=>$MAX
    )));
/*/
//echo '<br>';
//var_dump($val);

$user="";
if($perm->permisos[0]->servicios->ref->admin==1){
$user=$perm->permisos[0]->display_name;
}

if ($user!="") {
include_once("detalleLote.php");
}else{
    echo '<div class="alert alert-info fade in alert-dismissable">
    <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
    <strong>Info! </strong> Iniciar Sesion para hacer este cambio/</div>';
}
}
//_-------------------------------------------------------------------------------------------






//_-------------------------------------------------------------------------------------------
private function showdModaleditarCaja(){
$data1=true;
 $perm= json_decode(Login::init($this->post,"permisos")); 

    $oratkn=$perm->permisos[0]->oratkn; 
$api= json_decode( $this->apiAGK(
    'BuscarPuntoCobranza',
    array("auth"=>"ss",
        "oratkn"=>$oratkn,
            //"Deposito"=>$Deposito
    )));

$api2= json_decode( $this->apiAGK(
    'BuscarBancos',
    array("auth"=>"ss",
       // "oratkn"=>$oratkn,
            //"Deposito"=>$Deposito
    )));
$user="";
if($perm->permisos[0]->servicios->ref->admin==1 || $perm->permisos[0]->servicios->ref->operativo==1){
$user=$perm->permisos[0]->display_name;
}
$idtdep=$this->post["id"];
$monto= $this->post["monto"];
$referencia= $this->post["referencia"];
$entidad= $this->post["entidad"];
$fechaoperacion=$this->post["fechaoperacion"];
$idbanco=$this->post["idbanco"];
$cuenta=$this->post["cuenta"];
$foliocarta=$this->post["foliocarta"];
$folioSello=$this->post["folioSello"];
$idpuntocobro=$this->post["idpuntocobro"];
$observaciones=$this->post["observaciones"];
 

 $apiultimoDeposito= json_decode( $this->apiAGK('ValidaUltimoDeposito',array("auth"=>"ss" ,"Id"=>$idtdep)));

//echo $apiultimoDeposito[0]->validaUltimoDepositocaja
$CANICHANGE=$apiultimoDeposito[0]->validaUltimoDepositocaja->CANICHANGE;
$MNTDEP=0;
if (isset($apiultimoDeposito[0]->validaUltimoDepositocaja->MNTDEP)) {
  $MNTDEP=$apiultimoDeposito[0]->validaUltimoDepositocaja->MNTDEP;
}

 //echo json_encode($apiultimoDeposito[0]->validaUltimoDepositocaja);

if ($user!="") {
include_once("editarCajaDeposito.php");
}else{
    echo '<div class="alert alert-info fade in alert-dismissable">
    <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
    <strong>Info! </strong> Iniciar Sesion para hacer este cambio/</div>';
}
}
//_-------------------------------------------------------------------------------------------

private function string_sanitize($string, $force_lowercase = true, $abc = false) {
    $strip = array("~", "`", "!", "@", "#", "$", "%", "^", "&", "*", "(", ")", "=", "+", "[", "{", "]",
                   "}", "\\", "|", ";", ":", "\"", "'", "&#8216;", "&#8217;", "&#8220;", "&#8221;", "&#8211;", "&#8212;",
                   "â€”", "â€“", ",", "<", ".", ">", "/", "?");
    $clean = trim(str_replace($strip, "", strip_tags($string)));
  //  $clean = preg_replace('/\s+/', "-", $clean);
    $clean = ($abc) ? preg_replace("/[^a-zA-Z0-9]/", "", $clean) : $clean ;
    return ($force_lowercase) ?
        (function_exists('mb_strtolower')) ?
            mb_strtolower($clean, 'UTF-8') :
            strtolower($clean) :
        $clean;
}



//_-------------------------------------------------------------------------------------------
private function guardarDato(){
$data1=true;
 $perm= json_decode(Login::init($this->post,"permisos")); 

$update= strtoupper ($this->string_sanitize($this->post["update"]));
$value= strtoupper ($this->string_sanitize($this->post["value"]));
$type= strtoupper ($this->string_sanitize($this->post["type"]));
$iddato= strtoupper ($this->string_sanitize($this->post["iddato"]));

    $oratkn=$perm->permisos[0]->oratkn; 
$api_detalle= json_decode( $this->apiAGK(    'updatefiledato',
    array("auth"=>"ss",        "oratkn"=>$oratkn, "update"=>$update, "value"=>$value, "type"=>$type,"iddato"=>$iddato
    )));

 
$user="";
if($perm->permisos[0]->servicios->ref->admin==1 || $perm->permisos[0]->servicios->ref->operativo==1){
$user=$perm->permisos[0]->display_name;
}
  

if ($user!="" and $api_detalle==true) {

echo json_encode (array("status"=>1,""=>"okas","post"=>$this->post,"api"=>$api_detalle));
}else{
    echo json_encode (array("status"=>0,""=>"No se pudo cargar el catalogo"));
}
}
//_-------------------------------------------------------------------------------------------
//_-------------------------------------------------------------------------------------------
private function loadcatalogo(){
$data1=true;
 $perm= json_decode(Login::init($this->post,"permisos")); 

$catalogo= $this->post["catalogo"];
$iddato= $this->post["iddato"];

    $oratkn=$perm->permisos[0]->oratkn; 
$api_detalle= json_decode( $this->apiAGK(    'showlotecatalogo',    array("auth"=>"ss", "iddato"=>$iddato,       "oratkn"=>$oratkn,    "catalogo"=>$catalogo
    )));

 
$user="";
if($perm->permisos[0]->servicios->ref->admin==1 || $perm->permisos[0]->servicios->ref->operativo==1){
$user=$perm->permisos[0]->display_name;
}
  

if ($user!="" and $api_detalle==true) {

echo json_encode (array("status"=>1,""=>"okas","post"=>$this->post,"api"=>$api_detalle));
}else{
    echo json_encode (array("status"=>0,""=>"No se pudo cargar el catalogo"));
}
}
//_-------------------------------------------------------------------------------------------

//_-------------------------------------------------------------------------------------------
private function showdModalVerificafile(){
$data1=true;
 $perm= json_decode(Login::init($this->post,"permisos")); 

$lote= $this->post["lote"];

    $oratkn=$perm->permisos[0]->oratkn; 
//$api_detalle= json_decode( $this->apiAGK(    'showlotefile_detalle',    array("auth"=>"ss",        "oratkn"=>$oratkn,    "lote"=>$lote
  //  )));

    $api_detalle2= json_decode( $this->apiAGK(    'showlotefile_validar',    array("auth"=>"ss",        "oratkn"=>$oratkn,    "lote"=>$lote  )));

 //echo json_encode( $api_detalle2);

$user="";
if($perm->permisos[0]->servicios->ref->admin==1 || $perm->permisos[0]->servicios->ref->operativo==1){
$user=$perm->permisos[0]->display_name;
}
  

if ($user!="" and $api_detalle2==true) {
include_once("archivocsv_valida.php");
}else{
    echo '<div class="alert alert-info fade in alert-dismissable">
    <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
    <strong>Info! </strong> Iniciar Sesion con cuenta de administrador para esta seccion</div>';
}
}
//_-------------------------------------------------------------------------------------------
//_-------------------------------------------------------------------------------------------
private function showdModalVerfile(){
$data1=true;
 $idasignacion =  $this->post["idasignacion"]; 
   $idquipo =  $this->post["idquipo"]; 
 $perm= json_decode(Login::init($this->post,"permisos")); 

$lote= $this->post["lote"];

    $oratkn=$perm->permisos[0]->oratkn; 
$api_detalle= json_decode( $this->apiAGK(    'showlotefile_detalle',    array("auth"=>"ss",        "oratkn"=>$oratkn,    "lote"=>$lote
    )));

 
$user="";
//if($perm->permisos[0]->servicios->ref->admin==1 || 
  if($perm->permisos[0]->servicios->dpm->operativo==1){
$user=$perm->permisos[0]->display_name;
}
  

if ($user!="") {
//include_once("archivocsv_detalle.php");
include_once("dm_archivo.php");
}else{
    echo '<div class="alert alert-info fade in alert-dismissable">
    <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
    <strong>Info! </strong> Iniciar Sesion con cuenta de administrador para esta seccion</div>';
}
}
//_-------------------------------------------------------------------------------------------
private function showFileUpload(){

        
$folio= $this->post["idasignacion"];
$directorio = str_replace("include/ajax", "documentos/", dirname(__FILE__)).$folio."/" ;
$otro_dir=$_SERVER['HTTP_REFERER']."documentos/".$folio."/";
 //$otro_dir="http://aguakan.com/git/test/ConveniosLPS_db_ORACLE/documentos/".$folio."/";

//echo "<br>direc".$directorio;
//echo "<br>otro_dir".$otro_dir;
 $archivos = '';
if (is_dir($directorio)) {
   $gestor_dir = opendir($directorio);
  

 $permisos= json_decode( Login::init($this->post,"permisos"));
            $var=$permisos->permisos;
            //var_dump($permisos);
            //if($permisos->status==1 && $var[0]->PuedeEliminarArchivo==1){
              if($permisos->permisos[0]->servicios->dpm->admin==1){
               while (false !== ($nombre_fichero = readdir($gestor_dir))) {
      $ficheros[] = $nombre_fichero;
      $rutaArchivo = $otro_dir.''.$nombre_fichero;
      //$archivos .='<br><a target="_blank" href="'.$rutaArchivo.'" >'.$nombre_fichero.'</a>';
      if($nombre_fichero!="." && $nombre_fichero!=".."){
         $archivos .='<div class="well well-sm">
         <div class="row">
  <div class="col-sm-8"><a title="ver archivo" href="'.$rutaArchivo.'" target="_blank">'.$nombre_fichero.'</a></div>
  <div class="col-sm-4">
  <button type="button" data-file="'.$nombre_fichero.'" class="btn btn-danger pull-right disabled ">Eliminar <span class="badge"><i class="fa fa-trash-o" aria-hidden="true"></i></span></button></div>
</div> </div>';
/*/$archivos .='<div class="well well-sm">
         <div class="row">
  <div class="col-sm-8"><a title="ver archivo" href="'.$rutaArchivo.'" target="_blank">'.$nombre_fichero.'</a></div>
  <div class="col-sm-4">
  <button type="button" data-file="'.$nombre_fichero.'" class="btn btn-danger pull-right eliminarFiliUpload">Eliminar <span class="badge"><i class="fa fa-trash-o" aria-hidden="true"></i></span></button></div>
</div> </div>';/*/
      }
     
  }
            } else{
               while (false !== ($nombre_fichero = readdir($gestor_dir))) {
      $ficheros[] = $nombre_fichero;
      $rutaArchivo = $otro_dir.''.$nombre_fichero;
      //$archivos .='<br><a target="_blank" href="'.$rutaArchivo.'" >'.$nombre_fichero.'</a>';
      if($nombre_fichero!="." && $nombre_fichero!=".."){
         $archivos .='<div class="well well-sm">
         <div class="row">
  <div class="col-sm-8"><a title="ver archivo" href="'.$rutaArchivo.'" target="_blank">'.$nombre_fichero.'</a></div>
  <div class="col-sm-4">
  <button type="button" disabled="disabled" class="btn btn-danger pull-right disabled">Eliminar <span class="badge"><i class="fa fa-trash-o" aria-hidden="true"></i></span></button></div>
</div> </div>';
      }
     
  }
            }
              


 
 
//echo $archivos;
?>
      <?php if($archivos!=""){

          ?>
           <div class="js-upload-finished">
            <h3>Archivos cargados</h3>
            <div class="list-group">
              <?php echo $archivos; ?>
              </div>
          </div>
          <?php }
else{
  ?>
  <div class="js-upload-finished">
           
            <div class="list-group">
             <div class="alert alert-warning">
    <strong>No hay archivos!</strong> 
  </div>
              </div>
          </div>
  <?php
}
          ?>
         

<?php
}
else{
  ?>
  <div class="js-upload-finished">
           
            <div class="list-group">
             <div class="alert alert-warning">
    <strong>No hay archivos!</strong> 
  </div>
              </div>
          </div>
  <?php
}
 
      
}

//_-------------------------------------------------------------------------------------------
private function showdModaleditarEntidadExterna(){
$data1=true;
 $perm= json_decode(Login::init($this->post,"permisos")); 

    $oratkn=$perm->permisos[0]->oratkn; 
$api= json_decode( $this->apiAGK(
    'BuscarPuntoCobranza',
    array("auth"=>"ss",
        "oratkn"=>$oratkn,
            //"Deposito"=>$Deposito
    )));
$banco= json_decode( $this->apiAGK(
    'BuscarBancos',
    array("auth"=>"ss",
       // "oratkn"=>$oratkn,
            //"Deposito"=>$Deposito
    )));


$user="";
if($perm->permisos[0]->servicios->ref->admin==1 || $perm->permisos[0]->servicios->ref->operativo==1){
$user=$perm->permisos[0]->display_name;
}
$idtdep=$this->post["id"];
$monto= $this->post["monto"];
$referencia= $this->post["referencia"];
$entidad= $this->post["entidad"];
$fechaoperacion=$this->post["fechaoperacion"];
$idbanco=$this->post["idbanco"];
$cuenta=$this->post["cuenta"];
$foliocarta=$this->post["foliocarta"];
$folioSello=$this->post["folioSello"];
$idpuntocobro=$this->post["idpuntocobro"];
$montovinculado=$this->post["montovinculado"];
$tipodeposito=$this->post["tipodeposito"];
$observaciones=$this->post["observaciones"];
$estado=$this->post["estado"];



 //var_dump($this->post);

if ($user!="") {
include_once("editarDepositoEntidadExterna.php");
}else{
    echo '<div class="alert alert-info fade in alert-dismissable">
    <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
    <strong>Info! </strong> Iniciar Sesion con cuenta de administrador para esta seccion</div>';
}
}
//_-------------------------------------------------------------------------------------------

//_-------------------------------------------------------------------------------------------
private function guardarDatoBitacora(){
    session_start();
 $perm= json_decode(Login::init($this->post,"permisos")); 
$values=$this->post["dataval"];
$data = json_decode($values);
//$_SESSION[$data->carcamo]= array ("carcamo"=>$data->carcamo,"operador"=>$data->operador,"nameoperador"=>$data->nameoperador);

    $oratkn=$perm->permisos[0]->oratkn; 
$api= json_decode( $this->apiAGK(
    'agregarDatoBitacora',
    array("auth"=>"ss",
        "oratkn"=>$oratkn,
        "values"=>$values,
     
    )));

 if ($api) {
   echo  json_encode(array("post"=>$this->post,"perm"=>$perm,
  'oratkn'=>$oratkn,"api"=>$api,"status"=>1,"user"=>$user,"data"=>$data,"carcamo"=>$data->carcamo,"sesion"=>$_SESSION[$data->carcamo]));
 }
 else{


 echo  json_encode(array("post"=>$this->post,"perm"=>$perm,
  'oratkn'=>$oratkn,"api"=>$api,"status"=>0,"user"=>$user));
}
}
//_-------------------------------------------------------------------------------------------
//_-------------------------------------------------------------------------------------------
private function guardarDatoBitacora2(){
    session_start();
 $perm= json_decode(Login::init($this->post,"permisos")); 
$values=$this->post["dataval"];
$data = json_decode($values);
//$_SESSION[$data->carcamo]= array ("carcamo"=>$data->carcamo,"operador"=>$data->operador,"nameoperador"=>$data->nameoperador);

    $oratkn=$perm->permisos[0]->oratkn; 
$api= json_decode( $this->apiAGK(
    'agregarDatoBitacora2',
    array("auth"=>"ss",
        "oratkn"=>$oratkn,
        "values"=>$values,
     
    )));

 if ($api) {
   echo  json_encode(array("post"=>$this->post,"perm"=>$perm,
  'oratkn'=>$oratkn,"api"=>$api,"status"=>1,"user"=>$user,"data"=>$data,"carcamo"=>$data->carcamo,"sesion"=>$_SESSION[$data->carcamo]));
 }
 else{


 echo  json_encode(array("post"=>$this->post,"perm"=>$perm,
  'oratkn'=>$oratkn,"api"=>$api,"status"=>0,"user"=>$user));
}
}
//_-------------------------------------------------------------------------------------------

//_-------------------------------------------------------------------------------------------
private function vincularloteEca(){
    session_start();
 $perm= json_decode(Login::init($this->post,"permisos")); 
$idDeposito=$this->post["idDeposito"];
$idlote=$this->post["idlote"];
$checked=$this->post["checked"];
$idEntidad=$this->post["idEntidad"];



    $oratkn=$perm->permisos[0]->oratkn; 
$api= json_decode( $this->apiAGK(
    'agregarvinculoECA',
    array("auth"=>"ss",
        "oratkn"=>$oratkn,
          "idDeposito"=>$idDeposito,
         "idlote"=>$idlote,
          "checked"=>$checked,
          "idEntidad"=>$idEntidad

    )));
$status=0;
$user="";
if($perm->permisos[0]->servicios->ref->admin==1){
$status=1;
$user=$perm->permisos[0]->display_name;
}

 echo  json_encode(array("post"=>$this->post,"perm"=>$perm,'oratkn'=>$oratkn,"API"=>$api,"status"=>$status,"user"=>$user));
}
//_-------------------------------------------------------------------------------------------

//_-------------------------------------------------------------------------------------------
private function vincularloteEcaOpcionEditar(){
    session_start();
 $perm= json_decode(Login::init($this->post,"permisos")); 
$idDeposito=$this->post["idDeposito"];

    $oratkn=$perm->permisos[0]->oratkn; 
$api= json_decode( $this->apiAGK(
    'desvincularECAopcionEditar',
    array("auth"=>"ss",
        "oratkn"=>$oratkn,
          "idDeposito"=>$idDeposito 
    )));
$status=0;
$user="";
if($perm->permisos[0]->servicios->ref->admin==1){
$status=1;
$user=$perm->permisos[0]->display_name;
}

 echo  json_encode(array("post"=>$this->post,"perm"=>$perm,'oratkn'=>$oratkn,"API"=>$api,"status"=>$status,"user"=>$user));
}
//_-------------------------------------------------------------------------------------------


//_-------------------------------------------------------------------------------------------
private function CJ_ActualizarDeposito(){
    session_start();
 $perm= json_decode(Login::init($this->post,"permisos")); 
//$puntoCobranza=$this->post["puntoCobranza"];
$puntoCobranza='0';
$idbanco=$this->post["idbanco"];
$Monto=$this->post["Monto"];
$id=$this->post["id"];
//$Referencia=$this->post["Referencia"];
$FolioCarta=$this->post["FolioCarta"];
$FolioSello=$this->post["FolioSello"];
$FechaDeposito=$this->post["FechaDeposito"];
$message=$this->post["message"];
$puedecambiarmonto=$this->post["puedecambiarmonto"];



    $oratkn=$perm->permisos[0]->oratkn; 
$api= json_decode( $this->apiAGK(
    'CJ_ActualizarDeposito',
    array("auth"=>"ss",
        "oratkn"=>$oratkn,
        "puntoCobranza"=>$puntoCobranza,
         "idbanco"=>$idbanco,
        "Id"=>$id,
         "Monto"=>$Monto,
          "FolioCarta"=>$FolioCarta,
           "FolioSello"=>$FolioSello,
            "FechaDeposito"=>$FechaDeposito,
            "message"=>$message
    )));
$status=0;
$user="";
if($perm->permisos[0]->servicios->ref->admin==1 || $perm->permisos[0]->servicios->ref->operativo==1){
$status=1;
$user=$perm->permisos[0]->display_name;
}

 echo  json_encode(array("post"=>$this->post,"perm"=>$perm,'oratkn'=>$oratkn,"API"=>$api,"status"=>$status,"user"=>$user));
}
//_-------------------------------------------------------------------------------------------

//_-------------------------------------------------------------------------------------------
private function EET_ActualizarDeposito(){
    session_start();
 $perm= json_decode(Login::init($this->post,"permisos")); 
$puntoCobranza=$this->post["puntoCobranza"];
$idbanco=$this->post["idbanco"];

$letras = array("$",","," ");
$onlynumeric = str_replace($letras, "", $this->post["Monto"]);

$Monto=floatval($onlynumeric);

//$Monto=$this->post["Monto"];
$id=$this->post["id"];
$tipodeposito=$this->post["tipodeposito"];
$Referencia=$this->post["Referencia"];
$FolioCarta=$this->post["FolioCarta"];
  $FolioSello=$this->post["FolioSello"];
$EET_entidad=$this->post["EET_entidad"];
$FechaDeposito=$this->post["FechaDeposito"];
$message=$this->post["message2"];




    $oratkn=$perm->permisos[0]->oratkn; 
$api= json_decode( $this->apiAGK(
    'EET_ActualizarDeposito',
    array("auth"=>"ss",
        "oratkn"=>$oratkn,
        "puntoCobranza"=>$puntoCobranza,
         "Monto"=>$Monto,
        "Id"=>$id,
        "tipodeposito"=>$tipodeposito,
         "Referencia"=>$Referencia,
          "idbanco"=>$idbanco,
          "FolioCarta"=>$FolioCarta,
          "FolioSello"=>$FolioSello,
           "EET_entidad"=>$EET_entidad,
            "FechaDeposito"=>$FechaDeposito,
             "message"=>$message
    )));
$status=0;
$user="";
if($perm->permisos[0]->servicios->ref->admin==1 || $perm->permisos[0]->servicios->ref->operativo==1){
$status=1;
$user=$perm->permisos[0]->display_name;
}

 echo  json_encode(array("post"=>$this->post,"perm"=>$perm,'oratkn'=>$oratkn,"API"=>$api,"status"=>$status,"user"=>$user));
}
//_-------------------------------------------------------------------------------------------


//_-------------------------------------------------------------------------------------------
private function buscarCarcamo_tabla(){
$data1=true;
$perm= json_decode(Login::init($this->post,"permisos")); 
    $oratkn=$perm->permisos[0]->oratkn; 
$user="";
//if($perm->permisos[0]->servicios->ref->admin==1 ||
if( $perm->permisos[0]->servicios->dpm->operativo==1){
$user=$perm->permisos[0]->display_name;
}

//echo json_encode($this->post);
//var_dump(Login::init($this->post,"permisos"));
    $oratkn=$perm->permisos[0]->oratkn; 
//$carcamos= json_decode( $this->apiAGK('carcamos',array("auth"=>"ss" ,'oratkn'=>$oratkn  )));
//$operador= json_decode( $this->apiAGK('operadores',array("auth"=>"ss" ,'oratkn'=>$oratkn  )));
    if ($user!="") {
        $api= json_decode( $this->apiAGK('showbitacora',
          array("auth"=>"ss" ,
            "carcamo"=>$this->post["carcamo"] ,
            "fecha1"=>$this->post["fecha1"] ,
            "fecha2"=>$this->post["fecha2"] ,
            "turno"=>$this->post["turno"] ,
            "operador"=>$this->post["operador"] 
            )));
    //echo json_encode($api);
if ($api) {
    if ($this->post["carcamo"]=="MOVIL"){
      include_once("dm_bitacoraReporte_tabla.php");
    }
    if ($this->post["carcamo"]=="RADIO"){
      include_once("dm_bitacoraReporte_tabla_radio.php");
    }
    if ($this->post["carcamo"]=="SIM"){
      include_once("dm_bitacoraReporte_tabla_sim.php");
    }
   }
        else{
    echo '<div class="clearfix"></div><div class="alert alert-danger fade in alert-dismissable">
    <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
    <strong>Danger!</strong> Ocurrio un error. <br>'.json_encode($api). '
</div>';
 
    }
}
else{
        echo '<div class="clearfix"></div><div class="alert alert-info fade in alert-dismissable">
    <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
    <strong>Info! </strong>Iniciar Sesion con cuenta de operador para esta seccion</div>';
    }
}
//_-------------------------------------------------------------------------------------------

//_-------------------------------------------------------------------------------------------
private function buscarCarcamo_tabla2(){
$data1=true;
$perm= json_decode(Login::init($this->post,"permisos")); 
    $oratkn=$perm->permisos[0]->oratkn; 
$user="";
//if($perm->permisos[0]->servicios->ref->admin==1 ||
if( $perm->permisos[0]->servicios->dpm->operativo==1){
$user=$perm->permisos[0]->display_name;
}

//echo json_encode($this->post);
//var_dump(Login::init($this->post,"permisos"));
    $oratkn=$perm->permisos[0]->oratkn; 
//$carcamos= json_decode( $this->apiAGK('carcamos',array("auth"=>"ss" ,'oratkn'=>$oratkn  )));
//$operador= json_decode( $this->apiAGK('operadores',array("auth"=>"ss" ,'oratkn'=>$oratkn  )));
    if ($user!="") {
        $api= json_decode( $this->apiAGK('showbitacora2',
          array("auth"=>"ss" ,
            "carcamo"=>$this->post["carcamo"] ,
            "fecha1"=>$this->post["fecha1"] ,
            "fecha2"=>$this->post["fecha2"] ,
            "turno"=>$this->post["turno"] ,
            "operador"=>$this->post["operador"] 
            )));
    
if ($api) {
    if ($this->post["carcamo"]=="MOVIL"){
      include_once("dm_bitacoraReporte_tabla_asignado.php");
    }
    if ($this->post["carcamo"]=="RADIO"){
      include_once("dm_bitacoraReporte_tabla_asignado_radio.php");
    }
    if ($this->post["carcamo"]=="SIM"){
      include_once("dm_bitacoraReporte_tabla_asignado_sim.php");
    }
   }
        else{
    echo '<div class="clearfix"></div><div class="alert alert-danger fade in alert-dismissable">
    <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
    <strong>Danger!</strong> Ocurrio un error. <br>'.json_encode($api). '
</div>';
 
    }
}
else{
        echo '<div class="clearfix"></div><div class="alert alert-info fade in alert-dismissable">
    <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
    <strong>Info! </strong>Iniciar Sesion con cuenta de operador para esta seccion</div>';
    }
}
//_-------------------------------------------------------------------------------------------

 
//_-------------------------------------------------------------------------------------------
private function showLogin(){
    session_start();
//$_SESSION["conexcnc"]=$this->post["conex"];
        $logindata =  $this->post["showformlogin"]; 
        //value post - >  nuevoDeposito  
        //value post - > EntidadExterna

$perm= json_decode(Login::init($this->post,"permisos"));
$user="";
if($perm->permisos[0]->servicios->dpm->admin==1 || $perm->permisos[0]->servicios->dpm->operativo==1){
$status=1;
$user=$perm->permisos[0]->display_name;
}

    $checked="";
    if (isset($_SESSION["conexdpm"])&& $_SESSION["conexdpm"]=="true") {
        $checked="checked";
    }
    $data1=true;
    //$idtcfd=$this->post["idtcfd"]; 
    //$uso=$this->post["usoselect"]; 
    //var_dump($this->post);

    // echo $perm= Login::init($this->post,"permisos"); 

    include_once("login.php");

}
//_-------------------------------------------------------------------------------------------
//_-------------------------------------------------------------------------------------------
private function desasignar(){
 $idasignacion =  $this->post["idasignacion"]; 
   $idquipo =  $this->post["idquipo"]; 

$perm= json_decode(Login::init($this->post,"permisos"));
$carcamos= json_decode( $this->apiAGK('carcamos',array("auth"=>"ss" ,'oratkn'=>$oratkn  )));
$user="";
if( $perm->permisos[0]->servicios->dpm->operativo==1){
$status=1;
$user=$perm->permisos[0]->display_name;
}
    $data1=true;
    include_once("dm_desasignar.php");

}
//_-------------------------------------------------------------------------------------------
//_-------------------------------------------------------------------------------------------
private function resguardo(){
 $idasignacion =  $this->post["idasignacion"]; 
   $idquipo =  $this->post["idquipo"]; 

$perm= json_decode(Login::init($this->post,"permisos"));
//$carcamos= json_decode( $this->apiAGK('carcamos',array("auth"=>"ss" ,'oratkn'=>$oratkn  )));
$user="";
if( $perm->permisos[0]->servicios->dpm->operativo==1){
$status=1;
$user=$perm->permisos[0]->display_name;
}
    $data1=true;
    include_once("dm_resguardo.php");

}
//_-------------------------------------------------------------------------------------------

//_-------------------------------------------------------------------------------------------
private function showdfichaDeposito(){
       $ficha =  $this->post["ficha"]; 
  include_once("fichaDeposito.php");

}
//_-------------------------------------------------------------------------------------------




//_-------------------------------------------------------------------------------------------

}//end Class ajax



if(
   !empty($_SERVER['HTTP_X_REQUESTED_WITH']) &&
   strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest'
){
   # Ejecuta si la petición es a través de AJAX.
 //echo json_encode($_GET);
   // array_push($_POST,$_GET);
$imprime= new Ajax($_POST);
$imprime->init();

}else if( !empty($_GET)){
   # Ejecuta si la petición es a través de AJAX.
 //echo json_encode($_GET);
   // array_push($_POST,$_GET);
//$imprime= new Ajax($_GET);
//$imprime->init();//se cacha o imprime en el arhivo que incluya el archivo ajax.php
 //echo " Accion no permitida ";
}else{
  //echo "{'Accion': 'no permitida'}";
    echo " Accion no permitida ";
 
}


?>