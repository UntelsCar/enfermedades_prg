<?php 
session_start();
include_once('../modelo/usuario.php');
$usuario_model = new usuario();
unset($_SESSION['error_contraseña']);
unset($_SESSION['error_usuario']);

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
                //Contra incorrecta
                $_SESSION['usuario'] = $datos['usuario'];
                $_SESSION['error_contraseña'] = "La contraseña es incorrecta";
                include_once('../vista/loginView.php');
                $Login = new Login;
                $Login->loginView();
                }
        } else {
            // Usuario no encontrado
            $_SESSION['error_usuario'] = "El usuario es incorrecto";
            include_once('../vista/loginView.php');
            $Login = new Login;
            $Login->loginView();
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


