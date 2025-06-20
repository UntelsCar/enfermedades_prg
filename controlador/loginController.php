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

            $_SESSION['idusuario'] = $datos['idusuario'];
            $_SESSION['usuario'] = $datos['usuario'];
            $_SESSION['rol'] = $datos['rol'];
            $_SESSION['estado'] = $datos['estado'];

            if ($datos['rol'] == 'm' && !empty($datos['idmedico'])) {
                $_SESSION['param_idmedico'] = $datos['idmedico'];
                }

            if ($datos['rol'] == 'p' && !empty($datos['idpaciente'])) {
                $_SESSION['param_idpaciente'] = $datos['idpaciente'];
                }
                include_once('../vista/inicioView.php');
                $inicioView = new inicioView;
                $inicioView->inicio();
            } else {

                $_SESSION['usuario'] = $datos['usuario'];
                $_SESSION['error_contraseña'] = "La contraseña es incorrecta";
                include_once('../vista/loginView.php');
                $Login = new Login;
                $Login->loginView();
                }
        } else {

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
    echo("No te metas en mi programa");
}


