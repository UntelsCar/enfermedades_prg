<?php 
class usuario{

    private function EjecutarConexion()
	{
		include_once('conexion.php');
		$OBJConexion = new Conexion;
		return $OBJConexion->conectarbd();
	}
    public function getUser($user, $password)
	{
        //session_start();

		// Realizar la conexión
		$conexion = $this->EjecutarConexion();

		$consultaLogin = "SELECT idusuario, usuario, rol, estado, clave FROM usuario WHERE usuario = '$user' AND estado = 'a'";
		$resultado = mysqli_query($conexion, $consultaLogin);

		// Comprobar si se encontraron resultados && (md5($password) == $usuario['clave'])
		if (($usuario = mysqli_fetch_assoc($resultado))) {

            $_SESSION['idusuario'] = $usuario['idusuario'];
            $_SESSION['usuario'] = $usuario['usuario'];
            $_SESSION['rol'] = $usuario['rol'];
            $_SESSION['estado'] = $usuario['estado'];
            $_SESSION['clave'] = $usuario['clave'];

            mysqli_close($conexion);//chequear
		    return $usuario;
		} else {
			mysqli_close($conexion);//chequear
		    return null;
		}
		
	}
}

 ?>