<?php
class usuario
{

public function getUser($user, $password)
    {   
        include_once(__DIR__ . '/conexion.php');
        $OBJConexion = new Conexion;
        $conexion = $OBJConexion->conectarbd();

        $consultaLogin = "SELECT u.idusuario, u.usuario, u.rol, u.estado, u.clave, m.idmedico, p.idpaciente
            FROM usuario u
            LEFT JOIN medico m ON u.idusuario = m.idusuario
            LEFT JOIN paciente p ON u.idusuario = p.idusuario
            WHERE u.usuario = ? AND u.estado = 'a'";

        $stmt = $conexion->prepare($consultaLogin);
        $stmt->bind_param("s", $user);
        $stmt->execute();
        $resultado = $stmt->get_result();
        $usuario = $resultado->fetch_assoc();

        return $usuario;
    }
}
?>