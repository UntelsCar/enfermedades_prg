<?php 
session_start();
include_once('../modelo/usuario.php');
$usuario_model = new usuario();


if (isset($_POST['b_ingresar']) and strlen($_POST['loginUser']) > 0 and strlen($_POST['loginPassword']) >= 0) {
    
	$user = trim($_POST['loginUser']);
	$password = trim($_POST['loginPassword']);
    $datos = $usuario_model->getUser($user, $password);

    if (isset($datos)){
        if($datos['clave'] == $password){
            unset($_SESSION['clave']);
            include_once('../vista/inicioView.php');
	        $inicioView = new inicioView;
            $inicioView -> inicio();
        }else{
            include_once('../vista/compartidos/mensajeSistema.php');
	        $objMsj = new mensajeSistema;
	        $objMsj->mensajeSistemaShow("Error: contraseña incorrecta <br>", "../index.php");
        }
    }else{
        include_once('../vista/compartidos/mensajeSistema.php');
	    $objMsj = new mensajeSistema;
	    $objMsj->mensajeSistemaShow("Error: usuario no encontrado <br>", "../index.php");
    }

} else {
	include_once('../compartido/mensajeSistema.php');
	$objMsj = new mensajeSistema;
	$objMsj->mensajeSistemaShow("Error: Se ha detectado un acceso no autorizado<br>o los valores ingresados en la autenticacion no son validos <br>", "../index.php");
}


