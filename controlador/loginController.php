<?php 
session_start();
include_once('../modelo/usuario.php');
$usuario_model = new usuario();


if (isset($_POST['b_ingresar']) ) {
    
	$user = trim($_POST['loginUser']);
	$password = trim($_POST['loginPassword']);
    $datos = $usuario_model->getUser($user, $password);

    if ($datos){
        // Verificar contraseña con password_verify
        if (password_verify($password, $datos['clave'])) {
            // Guardar variables de sesión
            $_SESSION['idusuario'] = $datos['idusuario'];
            $_SESSION['usuario'] = $datos['usuario'];
            $_SESSION['rol'] = $datos['rol'];
            $_SESSION['estado'] = $datos['estado'];
            // Si es médico
            if ($datos['rol'] == 'm' && !empty($datos['idmedico'])) {
                $_SESSION['param_idmedico'] = $datos['idmedico'];
                }
            // Si es paciente
            if ($datos['rol'] == 'p' && !empty($datos['idpaciente'])) {
                $_SESSION['param_idpaciente'] = $datos['idpaciente'];
                }
                include_once('../vista/inicioView.php');
                $inicioView = new inicioView;
                $inicioView->inicio();
            } else {
                // Contraseña incorrecta
                include_once(__DIR__ ."/../../vista/compartidos/mensajeSistema.php" );
                $mensaje = new mensajeSistema;
                $mensaje->mensajeError(); 
                }
        } else {
            // Usuario no encontrado
            include_once(__DIR__ ."/../vista/compartidos/mensajeSistema.php" );
            $mensaje = new mensajeSistema;
            $mensaje->mensajeError();
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


