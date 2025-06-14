<?php
class usuario
{

    private function EjecutarConexion()
    {
        include_once(__DIR__ . '/conexion.php');
        $OBJConexion = new Conexion;
        return $OBJConexion->conectarbd();
    }

    public function getUser($user, $password)
    {
        $conexion = $this->EjecutarConexion();

        $consultaLogin = "SELECT u.idusuario, u.usuario, u.rol, u.estado, u.clave, m.idmedico, p.idpaciente
            FROM usuario u
            LEFT JOIN medico m ON u.idusuario = m.idusuario
            LEFT JOIN paciente p ON u.idusuario = p.idusuario
            WHERE u.usuario = ? AND u.estado = 'a'";

        $stmt = $conexion->prepare($consultaLogin);
        $stmt->bind_param("s", $user);
        $stmt->execute();
        $resultado = $stmt->get_result();

        if ($usuario = $resultado->fetch_assoc()) {
            // Verificar contraseña con password_verify
            if (password_verify($password, $usuario['clave'])) {

                // Guardar variables de sesión
                $_SESSION['idusuario'] = $usuario['idusuario'];
                $_SESSION['usuario'] = $usuario['usuario'];
                $_SESSION['rol'] = $usuario['rol'];
                $_SESSION['estado'] = $usuario['estado'];

                // Si es médico
                if ($usuario['rol'] == 'm' && !empty($usuario['idmedico'])) {
                    $_SESSION['param_idmedico'] = $usuario['idmedico'];
                }

                // Si es paciente
                if ($usuario['rol'] == 'p' && !empty($usuario['idpaciente'])) {
                    $_SESSION['param_idpaciente'] = $usuario['idpaciente'];
                }
                
                return $usuario;
            } else {
                return null; // Contraseña incorrecta
            }
        } else {
            return null; // Usuario no encontrado
        }
    }
}
?>