<?php
class Conexion
{
    // Método para establecer la conexión
    public function conectarbd()
    {
        try {
            $this->conn = new mysqli("localhost", "root", "Jorge.02.Bravo.09", "emfermedades_db");
            // Verificar si la conexión fue exitosa
            if ($this->conn->connect_error) {
                die("Error de conexión: " . $this->conn->connect_error);
            }
            return $this->conn;
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }
    public function guardarDiagnostico($idpaciente, $pares, $resultado)
    {
        $sql = "INSERT INTO atencion(idpaciente, fechahora, resultado)
            VALUES ($idpaciente, (SELECT CURRENT_TIMESTAMP()), '$resultado')";
        mysqli_query($this->conn, $sql);

        foreach ($pares as $par) {
            if (strlen($par) > 1) {
                list($idsintoma, $r) = explode(";", $par);
                $sql = "INSERT INTO atencion_sintoma(idatencion, idsintoma, respuesta)
                    VALUES ((SELECT MAX(idatencion) FROM atencion), $idsintoma, '$r')";
                mysqli_query($this->conn, $sql);
            }
        }
    }
    // Método para cerrar la conexión
    public function cerrar()
    {
        if ($this->conn) {
            $this->conn->close();
        }
    }
}
?>