<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
class atencionModel{
    
    function getNumPacientesEnfermedad(){
        include_once(__DIR__ . '/conexion.php');
        $OBJConexion = new Conexion;
        $conexion = $OBJConexion->conectarbd();
        $consulta = "
        SELECT resultado, COUNT(DISTINCT idpaciente) AS cantidad_pacientes
        FROM atencion
        GROUP BY resultado;
        ";

        $resultado = $conexion->query($consulta);
        if ($resultado){
            $enfermedadesCant = [];

            while ($fila = $resultado ->fetch_assoc()){
                $enfermedadesCant[$fila['resultado']] = $fila['cantidad_pacientes'];
            }
            return $enfermedadesCant;
        } else {
        die("Error en la consulta: " . $conexion->error);
        }
    }

    function getVecesEnfermedad($idPaciente){
        include_once(__DIR__ . '/conexion.php');
        $OBJConexion = new Conexion;
        $conexion = $OBJConexion->conectarbd();
        $consulta = "
        SELECT resultado, COUNT(idatencion) AS num_veces 
        FROM atencion
        WHERE idpaciente = ?
        GROUP BY resultado;
        ";
        $stmt = $conexion->prepare($consulta);
        $stmt->bind_param("i", $idPaciente);
        $stmt->execute();
        $resultado = $stmt->get_result();
        //$resultado = $conexion->query($consulta);
        if ($resultado){
            $enfermedadesCant = [];

            while ($fila = $resultado ->fetch_assoc()){
                $enfermedadesCant[] = [
                'enfermedad' => $fila['resultado'],
                'cantidad' => $fila['num_veces']
                ];
            }
            //print_r($enfermedadesCant);
            return $enfermedadesCant;
            
        } else {
        die("Error en la consulta: " . $conexion->error);
    }
    } 
}