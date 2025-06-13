<?php 
session_start();
include_once('../modelo/usuario.php');
$usuario_model = new usuario();


if (isset($_POST['b_ingresar']) ) {
    
	$user = trim($_POST['loginUser']);
	$password = trim($_POST['loginPassword']);
    $datos = $usuario_model->getUser($user, $password);

    if ($datos) {
        // Login exitoso
        unset($_SESSION['clave']); // opcional, seguridad

        include_once('../vista/inicioView.php');
        $inicioView = new inicioView;
        $inicioView->inicio();
    } else {
        echo("Error 1");
        // Usuario no encontrado o contraseña incorrecta
        //include_once('../vista/compartidos/mensajeSistema.php');
       // $objMsj = new mensajeSistema;
        //$objMsj->mensajeSistemaShow("Error: usuario o contraseña incorrectos <br>", "../index.php");
    }

}elseif (isset($_POST['b_inicio'])){
        include_once('../vista/inicioView.php');
        $inicioView = new inicioView;
        $inicioView->inicio();

} else {
    echo("Error 2");
	//include_once('../compartido/mensajeSistema.php');
	//$objMsj = new mensajeSistema;
	//$objMsj->mensajeSistemaShow("Error: Se ha detectado un acceso no autorizado<br>o los valores ingresados en la autenticacion no son validos <br>", "../index.php");
}


