<?php
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
}