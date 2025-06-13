<?php 
class usuario{

    private function EjecutarConexion()
	{
		include_once(__DIR__ . '/conexion.php');
		$OBJConexion = new Conexion;
		return $OBJConexion->conectarbd();
	}
    public function getUser($user, $password)
	{
		// Realizar la conexión
		$conexion = $this->EjecutarConexion();

		$consultaLogin = "SELECT u.idusuario, u.usuario, u.rol, u.estado, u.clave, m.idmedico 
	                  FROM usuario u 
	                  LEFT JOIN medico m ON u.idusuario = m.idusuario 
	                  WHERE u.usuario = '$user' AND u.estado = 'a'";
		
		$resultado = mysqli_query($conexion, $consultaLogin);

		// Comprobar si se encontraron resultados && (md5($password) == $usuario['clave'])
		if (($usuario = mysqli_fetch_assoc($resultado))) {

            $_SESSION['idusuario'] = $usuario['idusuario'];
            $_SESSION['usuario'] = $usuario['usuario'];
            $_SESSION['rol'] = $usuario['rol'];
            $_SESSION['estado'] = $usuario['estado'];
            $_SESSION['clave'] = $usuario['clave'];
			
			// Guardar idmedico si existe y si el rol es de médico
			if ($usuario['rol'] == 'm' && !empty($usuario['idmedico'])) {
				$_SESSION['param_idmedico'] = $usuario['idmedico'];
			}
			
            mysqli_close($conexion);//chequear
		    return $usuario;
		} else {
			mysqli_close($conexion);//chequear
		    return null;
		}
		
	}
}

 ?>